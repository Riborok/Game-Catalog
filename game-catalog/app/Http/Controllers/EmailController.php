<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Mail\EmailSender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function showEmailSender()
    {
        $users = User::retrieveCached();
        return TrackingController::view('send-email', ['users' => $users]);
    }

    public function send(EmailRequest $request)
    {
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
