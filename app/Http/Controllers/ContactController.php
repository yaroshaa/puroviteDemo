<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use JetBrains\PhpStorm\NoReturn;


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
            'name' => ['required'],
            'email' => ['required'],
            'message' => ['required'],
            'g-recaptcha-response' => 'required|captcha',
        ]);

        return view('pages.send-result')->with(['data' => 'or']);
    }
}
