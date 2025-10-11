<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;
use Google\Client as GoogleClient;
use Google\Service\Gmail;
use Google\Service\Gmail\Message;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $client;
    public function __construct()
    {
        $this->client = new GoogleClient();
        $this->client->setClientId(env('GOOGLE_CLIENT_ID'));
        $this->client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $this->client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $this->client->addScope(Gmail::GMAIL_SEND);
        $this->client->setAccessToken($this->client->fetchAccessTokenWithRefreshToken(env('GOOGLE_REFRESH_TOKEN')));
        // $this->middleware('auth');
        // $this->middleware('signed')->only('verify');
        // $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function sendVerificationEmail(User $user)
    {
        // 1️⃣ Generate a unique token
        $token = Str::random(64);
        $user->email_verification_token = $token;
        $user->save();

        // 2️⃣ Prepare verification link
        $verifyUrl = URL::temporarySignedRoute(
            'verify.email',
            now()->addHours(24),
            ['token' => $token, 'id' => $user->id]
        );

        // 3️⃣ Compose email
        $to = [$user->email];
        $subject = 'Verify Your Email Address';
        $messageText = "Hi {$user->name},\n\n";
        $messageText .= "Please verify your email by clicking the link below:\n";
        $messageText .= $verifyUrl . "\n\n";
        $messageText .= "This link will expire in 24 hours.";

        $message = new Message();
        $rawMessageString = "From: me\r\n";
        $rawMessageString .= "To: " . implode(',', $to) . "\r\n";
        $rawMessageString .= "Subject: " . $subject . "\r\n\r\n";
        $rawMessageString .= $messageText;

        $rawMessage = base64_encode($rawMessageString);
        $rawMessage = str_replace(['+', '/', '='], ['-', '_', ''], $rawMessage);
        $message->setRaw($rawMessage);

        $service = new Gmail($this->client);

        try {
            $service->users_messages->send('me', $message);
            return true;
        } catch (\Exception $e) {
            \Log::error("Error sending verification email: " . $e->getMessage());
            return false;
        }
    }

public function verifyEmail(Request $request)
{
    $user = User::findOrFail($request->route('id'));

    if (!$user || $user->email_verification_token !== $request->token) {
        return redirect('/')->with('error', 'Invalid or expired verification link.');
    }

    $user->email_verified_at = now();
    $user->email_verification_token = null;
    $user->save();

    Auth::login($user);

    return redirect()->route('login')->with('success', 'Your email has been verified!');
}
}
