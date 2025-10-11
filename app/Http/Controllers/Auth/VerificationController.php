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
        $this->client->refreshToken(env('GOOGLE_REFRESH_TOKEN'));
        $accessToken = $this->client->getAccessToken();

        if(!isset($accessToken['access_token'])) {
            throw new \Exception('Failed to obtain access token from refresh token.');
        }
        // $this->client->setAccessToken($this->client->fetchAccessTokenWithRefreshToken(env('GOOGLE_REFRESH_TOKEN')));
        // if ($this->client->isAccessTokenExpired()) {
        //     $this->client->fetchAccessTokenWithRefreshToken(env('GOOGLE_REFRESH_TOKEN'));
        // }

        // $this->middleware('auth');
        // $this->middleware('signed')->only('verify');
        // $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function sendVerificationEmail(User $user)
    {
        $token = Str::random(64);

        $verifyUrl = URL::temporarySignedRoute(
            'verify.email',
            now()->addHours(24),
            ['token' => $token, 'id' => $user->id]
        );

        $subject = 'Verify Your Email Address';
        $body = "Hi {$user->name},\n\nPlease verify your email:\n{$verifyUrl}\n\nExpires in 24h.";

        $message = new Message();
        $rawMessage = "From: " . env('GOOGLE_GMAIL_USER') . "\r\n";
        $rawMessage .= "To: {$user->email}\r\n";
        $rawMessage .= "Subject: {$subject}\r\n\r\n";
        $rawMessage .= $body;

        $encoded = base64_encode($rawMessage);
        $encoded = str_replace(['+', '/', '='], ['-', '_', ''], $encoded);
        $message->setRaw($encoded);

        $gmail = new Gmail($this->client);

        Auth::login($user);
        try {
            $gmail->users_messages->send('me', $message);
            return redirect()->route('verification.notice')->with('message', 'Verification email sent! Please check your inbox.');
        } catch (\Exception $e) {
            \Log::error('Gmail API Error: ' . $e->getMessage());
            return redirect()->route('verification.notice')->with('error', 'Failed to send verification email. Please try again later.');
        }
    }

    public function verifyEmail($id, $token)
    {
        $user = User::find($id); // fetch manually

        $user->email_verified_at = now();
        $user->save();

        Auth::login($user); // login after verification

        return redirect()->route('home')->with('success', 'Your email has been verified!');
    }

}
