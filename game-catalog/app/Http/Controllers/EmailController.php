<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Mail\EmailSender;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function showEmailSender()
    {
        $users = User::retrieveCached();
        $user = Auth::user();
        return TrackingController::view('send-email', ['user' => $user, 'users' => $users]);
    }

    public function send(EmailRequest $request)
    {
        if ($request->filled('send_to_all'))
            return static::sendAll($request);
        return static::sendToUser($request);
    }

    private static function sendAll(EmailRequest $request) {
        $users = User::retrieveCached();
        $successfulRecipients = [];

        foreach ($users as $user) {
            $objDemo = new \stdClass();
            $objDemo->text = $request->text;
            $objDemo->receiver = $user->email;
            if (Mail::to($objDemo->receiver)->send(new EmailSender($objDemo)))
                $successfulRecipients[] = $objDemo->receiver;
        }

        if (!empty($successfulRecipients)) {
            $successMessage = 'Message sent successfully to: ' . implode(', ', $successfulRecipients);
            return redirect()->back()->with('success', $successMessage)->withInput();
        } else
            return redirect()->back()->with('error', 'Failed to send message to any recipient')->withInput();
    }

    private static function sendToUser(EmailRequest $request) {
        $objDemo = new \stdClass();
        $objDemo->text = $request->text;
        $objDemo->receiver = $request->receiver;
        $result = Mail::to($objDemo->receiver)->send(new EmailSender($objDemo));
        if ($result) {
            return redirect()->back()->with('success', 'Message sent successfully!')->withInput();
        } else {
            return redirect()->back()->with('error', 'Something went wrong! Please try again!')->withInput();
        }
    }
}
