<?php

namespace App\Http\Controllers;

use Google\Client as GoogleClient;
use Google\Service\Gmail;
use Google\Service\Gmail\Message;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    private $client;

    public function __construct() {
        $this->client = new GoogleClient();
        $this->client->setClientId(env('GOOGLE_CLIENT_ID'));
        $this->client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $this->client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $this->client->addScope(Gmail::GMAIL_SEND);
    }

    public function handleCallback(Request $request) {
        if (!$request->has('code')) {
            return redirect('/')->with('error', 'Authorization code not found');
        }
        $token = $this->client->fetchAccessTokenWithAuthCode($request->input('code'));
        $this->client->setAccessToken($token);

        $to = ['janssenaddisonchen@gmail.com'];
        $subject = 'Test Email from Laravel via Gmail API';
        $messageText = 'This is a test email sent from a Laravel application using the Gmail API.';

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
            return "Email sent successfully!";
        } catch (\Exception $e) {
            return "Error sending email: " . $e->getMessage();
        }

    }

    public function sendEmail()
    {
        $authUrl = $this->client->createAuthUrl();
        return redirect($authUrl);
    }
}
