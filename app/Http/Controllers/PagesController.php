<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller {

    public function getIndex() {
        return view('pages.welcome');
    } 

    public function getAbout () {
        return view('pages.about');
    }

    public function getContact () { 
        return view('pages.contact');
    }

    public function postContact (Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:5',
            'message' => 'min:20']);

            $data = array(
                'email' => $request->email,
                'subject' => $request->subject,
                'body' => $request->message
            );

        Mail::send('emails.contact', $data, function($message)
        {
            $message->from($data['email']);
            $message->to('paulsakmentins@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your email was successfully sent');

        return redirect()->url('/');
    }
}