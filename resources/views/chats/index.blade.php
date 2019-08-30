@extends('layouts.app')


@section('content')

    <div class="container">

        <div class="row">

           @include('chats.messagedFriends')

            <div class="col-md-6">

                <h4 class="title">Click on a user to start a conversation</h4>

            </div>

        </div>

    </div>

@endsection

