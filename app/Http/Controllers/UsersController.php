<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if (auth()->guest()) {
            flash('You have to connect to view this page.')->error();
            return redirect('/login');
        } 
        else {
            $user = auth()->user();
            return view('user-index', [
                'name' => $user['name']
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if (auth()->guest()) {
            flash('You have to connect to view this page.')->error();
            return redirect('/login');
        } 
        else {
            $user = auth()->user();
            return view('form-edit', [
                'user' => $user
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required'
        ]);

        auth()->user()->update([
            'Name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]); 
        
        flash('Your profil has updated !')->success();
        return redirect('/edit');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = auth()->user();
        auth()->logout();
        $user->delete();
        flash('Account deleted.')->success();
        return redirect('/login');
    }

    public function logout () {
        auth()->logout();
        return redirect('/login');
    }
}
