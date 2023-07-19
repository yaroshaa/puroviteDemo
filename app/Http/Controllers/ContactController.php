<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Jobs\SendMailJob;



class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index()
    {
        return view('pages.contact')->with([
            'name' => 'Contacts',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     */
    public function send(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required',  'email', 'max:255'],
            'message' => ['required', 'string'],
//            'g-recaptcha-response' => 'required|captcha',
        ]);

        $mail = Mail::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => strip_tags($request->message),
        ]);

        if ($mail->id != null) {
            SendMailJob::dispatch($request);
            return view('pages.send-result')->with(['data' => 'Your message has been sent']);

        }else {

            return view('pages.send-result')->with(['data' => 'Message not sent']);
        }
    }
}
