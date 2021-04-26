<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(){
        return view('sendmail');
    }

    public function sendMail(Request $request){
        $request->validate([
            'to' => 'required|email',
            'message'=>'required|string'
        ]);

        SendMail::dispatch($request->to, $request->message)
            ->onQueue('emails');
    }

    public function sendHtmlMail($name, $email){
        Mail::to($email)->queue(new WelcomeMail($name));
    }
}
