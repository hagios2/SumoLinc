@extends('layouts.app')

@section('content')

    <div class="container">

        @include('includes.errors')

        <div class="container" style="width:45rem">

            <div class="card">

                <div class="card-header">Connection request(s)</div>

            </div>

                @forelse ($connections as $connection)

                    <div class="card">

                        <div class="row">

                        <div>

                            <img style="width:10%; margin-left:4rem; margin-top:0.5rem;" class="rounded-circle card-img" src="/storage/{{ $connection->user->avatar }}" alt="">

                            <a style="margin-top:1rem;" href="/view/{{ $connection->user->id }}/profile"><strong>{{ $connection->user->name }}</strong></a>

                        </div>


                        <div class="row">

                            <form method="POST" style="margin-right:2rem; margin-left:20rem" action="/confirmed/{{ $connection->id }}/connections">
                                @csrf
                                @method('PATCH')

                                <button class="btn btn-primary">Confirm</button>

                            </form>


                            <form method="POST" action="/reject/{{ $connection->id }}/connection">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger">Reject</button>

                            </form>

                        </div>

                    </div><br>

                </div>

            @empty

                <div class="card">

                    <div class="card-body" style="max-width: 120rem;">

                        <p class="card-text">You have no connecions</p>

                    </div>

                </div>

            @endforelse

            </div>

        </div>

    </div>

@endSection
