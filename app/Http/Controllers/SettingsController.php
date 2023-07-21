<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Page;
use App\Models\Settings;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SettingsController extends Controller
{

    private const ID = 1;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index()
    {
        if(Auth::user() && Auth::user()->hasRole('admin')) {
                $settings = Settings::find($this::ID);
                $users =  User::all();
                $emails =  Email::all();
            return view('settings/settings')->with([
                'settings' => $settings,
                'users' => $users,
                'emails' => $emails ,
            ]);
        }else{
            return redirect()->route('/');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     * @return Response
     */
    public function edit()
    {
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Page $page
     * @return Response
     */
    public function update(Request $request)
    {
        Settings::find($this::ID)->update([
            'admin_email' => trim($request->input('admin_email'))
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Page $page
     * @return Response
     */
    public function destroy(Page $page)
    {
        return redirect()->back();
    }
}
