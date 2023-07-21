<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Settings;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Jobs\SendMailJob;



class ContactController extends Controller
{

    private const ID = 1;
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
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $mail = Email::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => strip_tags($request->input('message')),
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => strip_tags($request->input('message'))
        ];

        if ($mail->id != null) {
            $adminEmails = explode(',', Settings::find($this::ID)->admin_email);

            if(count($adminEmails) > 0){
                foreach($adminEmails as $item){
                    SendMailJob::dispatch($data, trim($item));
                }
            }

            return view('pages.send-result')->with(['data' => 'Your message has been sent']);

        }else {
            return view('pages.send-result')->with(['data' => 'Message not sent']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id)
    {
        if(Auth::user() && Auth::user()->hasRole('admin')) {
            Email::find($id)->delete();
            return redirect()->back();
        }else{
            return redirect()->route('/');
        }
    }
}
