@extends('layouts.app')


@section('content')

    <div class="container">

        <div class="row">

           @include('chats.messagedFriends')

            <div class="col-md-6">

                <div>

                    @forelse ($messages as $message)

                        @if ($message->sender == auth()->user())

                            <span style="border-radius:60%" class="offset-md-5">

                                {{ $message->message }}

                            </span>

                        @else

                            <span style="border-radius:60%">

                                {{ $message->message }}

                            </span>

                        @endif
                        <br><br>

                    @empty

                            <h3 class="title">start conversation</h3>

                    @endforelse

                </div>

                <form action="/messages" method="POST">
                    @csrf

                    <input type="hidden" value="{{ $user->id }}" required name="user"><br>

                    <textarea name="message" class="form-control" placeholder="Type here" id="" cols="50" rows="3"></textarea><br>

                    <button class="btn btn-primary" type="submit">Send</button>

                </form>

            </div>

        </div>

    </div>

@endsection

