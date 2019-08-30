<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Http\Requests\MessagesRequest;
use App\Messages;
use App\User;
use Illuminate\Http\Request;

class MessagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('chats.index', compact('messagedFriends'));
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
    public function store(MessagesRequest $request)
    {
        /**
         * get user id from reqeust
         * and the message
         * check for conversation id
         */

         $conversation = Conversation::where([['user1_id', auth()->id()], ['user2_id', $request->user]])

            ->orWhere([['user1_id', $request->user], ['user2_id', auth()->id()]])->first();

        if($conversation)
        {

           $conversation->addMessage(auth()->id(), $request->user, $request->message);

        }else{

            $conversation = $this->createConversation(auth()->id(), $request->user);

            $conversation->addMessage(auth()->id(), $request->user, $request->message);

        }

        return redirect('/message/'.$request->user);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function show(Messages $messages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function edit(Messages $messages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Messages $messages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Messages $messages)
    {
        //
    }

    public function createConversation($user1_id, $user2_id)
    {
        if($user1_id !== $user2_id)
        {
            return Conversation::create(compact('user1_id', 'user2_id'));
        }

    }


    public function chatWith(User $user)
    {

       $conversation = Conversation::where([['user1_id', auth()->id()], ['user2_id', $user->id]])

        ->orWhere([['user1_id', $user->id], ['user2_id', auth()->id()]])->first();

        $messages = $conversation->message;

        return view('chats.show', compact('messages', 'user'));
    }


}
