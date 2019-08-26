<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('profiles.profile.profile_avatar', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([

            'avatar' => 'required|image|mimes:png,jpg,svg,jpeg|max:1999',

        ]);

        $fileName = $request->file('avatar')->getClientOriginalName();

        request()->file('avatar')->storeAs('public/images/'.$user->id, $fileName);

        $user->avatar = 'images/'.$user->id.'/'.$fileName;

        $user->save();

        return redirect('/profile')->withSuccess('Profile Picture was changed successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //delete file from storage disk

        Storage::disk('public')->delete($user->avatar);

        //set user image to noimage.jpg

        $user->update(['avatar' => 'images/noimage.jpg']);

        //redirect user

        return redirect('/avatar/'.$user->id.'/edit')->withSuccess('Profile avatar removed');
    }
}
