<?php

namespace App\Http\Controllers;

use App\Connections;
use App\User;
use Illuminate\Http\Request;

class OtherUsersProfileController extends Controller
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
    public function store(User $user)
    {
        if($this->connectedUsers($user))
        {
            return back()->with('info', 'You are already connected');
        }

        auth()->user()->addConnection($user->id);

        return back()->withSuccess('You added '.$user->name.' to your connections');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if($user->id === auth()->id())
        {
            return redirect('/profile');
        }

        $connectedUsers = $this->connectedUsers($user); /*  return $connectedUsers === true ? 'true' : 'false'; */

        return view('profiles.profile.show', compact('user', 'connectedUsers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Connections $connection)
    {
        $connection->delete();

        return back()->withSuccess('Connection request was deleted successfully');
    }

    public function confirm()
    {
        $connections = Connections::where([['following_id', auth()->id()], ['confirmedConnection', '0']])->get();

        return view('profiles.profile.confirm', compact('connections'));
    }

    /*
    *
    */

    public function confirmed(Connections $connection)
    {
        $connection->update(['confirmedConnection' => true ]);

        return back()->withSuccess('You are now connected');
    }

    /*
        check if users are connected

        return booleen
    */

    public function connectedUsers(User $user)
    {
        if(Connections::where([['user_id', $user->id], ['following_id', auth()->id()]])->orWhere([['user_id', auth()->id()], ['following_id', $user->id]])->count() > 0)
        {
            return true;

        }else{

            return false;

        }

    }
}
