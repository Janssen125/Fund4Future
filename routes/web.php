<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\GoogleDriveController;
use App\Http\Controllers\ProfileSettingController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
// use Illuminat\Support\Facades\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Http;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::middleware(['auth', 'verified'])->get('/emailverifiedsuccess', function () {
    return view('/');
})->name('emailverifiedsuccess');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

// Verification link clicked by user
Route::get('/email/verify/{id}/{token}', [VerificationController::class, 'verifyEmail'])
    ->name('verify.email'); // your Gmail API link

// Optional: resend verification email using Gmail API
Route::get('/email/resend/{id}', [VerificationController::class, 'sendVerificationEmail'])
->name('resend.verification.email');

Auth::routes(['verify' => true, 'reset' => true]);
// Route::get('/email/verify', function () {
//     return view('auth.verify');
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
//     return redirect()->route('home')->with('message', 'Email verified successfully!');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::post('/email/resend', function (Request $request) {
//     if (Auth::user()->hasVerifiedEmail()) {
//         return redirect('/emailverifiedsuccess');
//     }

//     Auth::user()->sendEmailVerificationNotification();
//     return back()->with('message', 'Verification email sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

// We don't talk about this route
Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/check-user-ip', function (Request $request) {
    $userIp = $request->ip();
    return response()->json(['ip' => $userIp]);
})->name('checkUserIp');

// Home Route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact')->middleware('auth');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout_home');

Route::middleware(['license'])->group(function () {
// Admin Route
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home')->middleware('auth');
Route::get('/activity', [App\Http\Controllers\AdminController::class, 'activity'])->name('admin.activity')->middleware('auth');
Route::get('/notification', [App\Http\Controllers\AdminController::class, 'notification'])->name('admin.notification')->middleware('auth');
Route::get('/ticketing', [App\Http\Controllers\AdminController::class, 'ticketing'])->name('admin.ticketing')->middleware('auth');
Route::get('/userManagement', [App\Http\Controllers\AdminController::class, 'userManagement'])->name('admin.userManagement')->middleware('auth');
Route::get('/fundList', [App\Http\Controllers\AdminController::class, 'fundList'])->name('admin.fundList')->middleware('auth');

// CRUD routes
Route::resource('category', CategoryController::class);
Route::resource('fund', FundController::class);
Route::resource('mail', MailController::class)->middleware('auth');
Route::resource('user', UserController::class);
Route::resource('admin', AdminController::class)->middleware('auth');
Route::resource('comments', CommentController::class);
Route::resource('chats', ChatController::class)->middleware('auth');

// Profile Setting routes
Route::get('/profile/fundingList', [ProfileSettingController::class, 'fundingList'])->name('profileFundingList');
Route::get('/profile/transactionHistory', [ProfileSettingController::class, 'fundingTransactionHistory'])->name('profileTransactionHistory');
Route::get('/profile/fundingHistory', [ProfileSettingController::class, 'fundingHistory'])->name('profileFundingHistory');
Route::get('/profile/topup', [ProfileSettingController::class, 'topup'])->name('topup');
Route::get('/profile/settings', [ProfileSettingController::class, 'settings'])->name('profileSettings');
Route::get('/profile/verifyProfile', [ProfileSettingController::class, 'advancedData'])->name('verifyProfile');
Route::post('/profile/verifyProcess', [ProfileSettingController::class, 'saveNikAndKtp'])->name('saveNikAndKtp');
Route::put('/profile/updateName', [ProfileSettingController::class, 'updateName'])->name('updateName');
Route::get('/profile/help', [ProfileSettingController::class, 'help'])->name('profileHelp');
Route::get('/profile/createFund', [ProfileSettingController::class, 'createFund'])->name('profile.createFund');

// Midtrans routes
Route::post('/midtrans/topup', [MidtransController::class, 'createTransaction'])->name('midtrans.topup');
Route::post('/midtrans/notification', [MidtransController::class, 'handleNotification'])->name('midtrans.notification');
Route::post('/midtrans/withdraw', [MidtransController::class, 'withdraw'])->name('midtrans.withdraw');


// Custom routes
Route::get('/search-funds', [FundController::class, 'search'])->name('search.funds');
Route::post('/process-fund', [FundController::class, 'processFund'])->name('process.funds');
Route::post('/comments/reply', [CommentController::class, 'reply'])->name('comments.reply');
Route::put('/mail/{id}/reply', [MailController::class, 'reply'])->name('mail.reply');
Route::put('chats/{id}/changeStatus', [ChatController::class, 'changeStatus'])->name('chats.changeStatus');

// Google
Route::get('/send-email', [EmailController::class, 'sendEmail'])->name('email.send');
Route::get('/callback', [EmailController::class, 'handleCallback'])->name('email.callback');
Route::get('/drive/files', [GoogleDriveController::class, 'listFiles']);
Route::post('/drive/upload', [GoogleDriveController::class, 'uploadFile']);

// Test MidTrans
// Route::get('/test', function() {
//     return view('test.test');
// })->middleware('auth');
// Route::post('/test-midtrans', function (Request $request) {
//     Log::info('📩 Test Midtrans Route:', ['data' => $request->all()]);
//     return response()->json(['message' => 'Test route working!', 'data' => $request->all()], 200);
// });
Route::get('/tempcat', function() {return view('admin/category');});

Route::get('/attachment/{filename}', function ($filename) {
    $path = storage_path('app/public/' . $filename);

    if (!file_exists($path)) {
        abort(404, 'File not found.');
    }

    return response()->file($path);
})->where('filename', '.*')->name('attachment');

Route::get('/getimage/{filename}', function ($filename) {
    $path = storage_path('app/public/img/' . $filename);

    Log::info('🖼️ Serving image:', ['path' => $path]);

    if (!file_exists($path)) {
        abort(404, 'File not found.');
    }

    return response()->file($path);
})->where('filename', '.*')->name('getimage');


// Route::get('/gmail-auth', function () {
//     $dotenv = Dotenv\Dotenv::createImmutable(base_path());
//     $dotenv->safeLoad();
//     $client = new GoogleClient();
//     $client->setClientId(env('GOOGLE_CLIENT_ID'));
//     $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
//     $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
//     $client->setAccessType('offline'); // important for refresh token
//     $client->setPrompt('consent');
//     $client->setScopes(['https://www.googleapis.com/auth/gmail.send', 'https://www.googleapis.com/auth/drive.file']);

//     $authUrl = $client->createAuthUrl();
//     return redirect($authUrl);
// });

// Route::get('/callback', function (\Illuminate\Http\Request $request) {
//     $dotenv = Dotenv\Dotenv::createImmutable(base_path());
//     $dotenv->safeLoad();
//     $code = $request->get('code');
//     $client = new GoogleClient();
//     $client->setClientId(env('GOOGLE_CLIENT_ID'));
//     $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
//     $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));

//     $token = $client->fetchAccessTokenWithAuthCode($code);
//     return response()->json($token); // contains access_token & refresh_token
// });

// Route::get('/test-email', function () {
//     $dotenv = Dotenv\Dotenv::createImmutable(base_path());
//     $dotenv->safeLoad();
//     $userEmail = env('GOOGLE_GMAIL_USER'); // your Gmail
//     $toEmail = 'janssenaddisonchen@gmail.com';       // recipient email
//     $subject = 'Test Email via Gmail API';
//     $bodyText = 'Hello! This is a test email sent using Gmail API and Laravel.';

//     $client = new Google\Client();
//     $client->setAuthConfig(base_path('credentials.json'));
//     $client->setScopes(['https://www.googleapis.com/auth/gmail.send']);
//     $client->setSubject($userEmail); // impersonate user if using service account
//     $client->refreshToken(env('GOOGLE_REFRESH_TOKEN'));
//     $service = new Gmail($client);

//     $rawMessage = "From: {$userEmail}\r\n";
//     $rawMessage .= "To: {$toEmail}\r\n";
//     $rawMessage .= "Subject: {$subject}\r\n";
//     $rawMessage .= "Content-Type: text/plain; charset=UTF-8\r\n\r\n";
//     $rawMessage .= $bodyText;

//     $encodedMessage = rtrim(strtr(base64_encode($rawMessage), '+/', '-_'), '=');

//     $gmailMessage = new Google\Service\Gmail\Message();
//     $gmailMessage->setRaw($encodedMessage);

//     // ✅ Use 'me' here
//     $service->users_messages->send('me', $gmailMessage);

//     return 'Test email sent via Gmail API!';
// });


});
