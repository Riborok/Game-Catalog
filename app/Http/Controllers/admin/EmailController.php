<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\handler\VisitedPages;
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
        return VisitedPages::view('pages.admin.send-email', ['user' => $user, 'users' => $users]);
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
            if (static::sendEmail($user->email, $request->text)) {
                $successfulRecipients[] = $user->email;
            }
        }

        if (!empty($successfulRecipients)) {
            return redirect()->back()->with('success',
                trans('session.message-sent-successfully',
                    ['receiver' => implode(', ', $successfulRecipients)]))->withInput();
        } else
            return redirect()->back()->with('error', trans('session.something-went-wrong'))->withInput();
    }

    private static function sendToUser(EmailRequest $request) {
        if (static::sendEmail($request->receiver, $request->text)) {
            return redirect()->back()->with('success',
                trans('session.message-sent-successfully', ['receiver' => $request->receiver]))->withInput();
        } else {
            return redirect()->back()->with('error', trans('session.something-went-wrong'))->withInput();
        }
    }

    private static function sendEmail($receiver, $text) {
        $objDemo = new \stdClass();
        $objDemo->receiver = $receiver;
        $objDemo->text = $text;
        return Mail::to($receiver)->send(new EmailSender($objDemo));
    }
}
