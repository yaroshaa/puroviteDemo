<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        if(Auth::user() && Auth::user()->hasRole('admin')) {
            return view('settings.createUser');
        }else{
            return redirect()->route('/');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|\Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|RedirectResponse
     */
    public function store(Request $request)
    {
        if(Auth::user() && Auth::user()->hasRole('admin')) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', Rules\Password::defaults()],
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect('settings');
        }else{
            return redirect()->route('/');
        }
    }

    /**
     * Update the specified resource in storage.
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function edit(int $id)
    {
        if(Auth::user() && Auth::user()->hasRole('admin')) {
            $user = User::find($id);
            return view('settings.editUser')->with(['user' => $user]);
        }else{
            return redirect()->route('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        if(Auth::user() && Auth::user()->hasRole('admin')) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'password' => ['nullable','string', Rules\Password::defaults()],
            ]);

            User::find($id)->update([
                'name' => $request->input('name'),
                'role' => $request->input('role'),
            ]);

            if($request->input('password') != null){
                User::find($id)->update([
                    'password' => Hash::make($request->input('password'))
                ]);
            }
            return redirect()->back();
        }else{
            return redirect()->route('/');
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
            User::find($id)->delete();
            return redirect()->back();
        }else{
            return redirect()->route('/');
        }
    }
}
