@extends('layouts.app')

@section('content')

    <div class="container">

        @include('includes.errors')


        <div class="container" style="width:45rem">

            @forelse ($connections as $connection)

               <div class="card">

                    <div class="row card-body">

                       @if ($connection->user->avatar !== 'noimage.jpg')

                            <span><img style="width:10rem:" class="rounded-circle" src="storage/images/{{ $connection->user->id }}/{{ $connection->user->avatar }}" alt=""></span>

                        @else

                            <span><img style="width:10rem:" class="rounded-circle" style="width:10rem:" src="storage/images/noimage.jpg" alt=""></span>

                       @endif

                       <a href="/profile/{{ $connection->user->id }}"><strong>{{ $connection->user->name }}</strong></a>


                    </div><br>

                    <div class="row">

                        <form method="POST" style="margin-right:2rem; margin-left:20rem" action="/confirmed/{{ $connection->id }}/connections">
                            @csrf
                            @method('PATCH')

                            <button class="btn btn-primary">Confirm</button>

                       </form>


                       <form method="POST" action="/reject/{{ $connection->id }}/connection">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-primary">Reject</button>

                       </form>

                    </div>

               </div><br>

            @empty

                <div class="card">

                    <div class="card-body" style="max-width: 120rem;">

                        <p class="card-text">You have no connecions</p>

                    </div>

               </div>

            @endforelse

        </div>

    </div>

@endSection
