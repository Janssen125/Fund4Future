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
use App\Http\Controllers\GoogleClientController;

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

    public function sendVerificationEmail(User $user)
    {
        // $user = $request->user();
        // dd($user);
        $token = Str::random(64);

        $verifyUrl = URL::temporarySignedRoute(
            'verify.email',
            now()->addHours(24),
            ['token' => $token, 'id' => $user->id]
        );

        $subject = 'Verify Your Email Address';
        $body = "Hi {$user->name},\n\nPlease verify your email:\n{$verifyUrl}\n\nExpires in 24h.";

        $google = new GoogleClientController;
        $google->sendEmail($user->email, $subject, $body);

        Auth::login($user);

        try {
            // $gmail->users_messages->send('me', $message);
            // dd('Email sent');
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
