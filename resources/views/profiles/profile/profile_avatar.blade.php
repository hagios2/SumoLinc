@extends('layouts.app')

@section('content')

    <div class="container">

        @include('includes.errors')


        <div class="container">

            <div>

                <div>

                    <img src="storage/images/{{ $user->id }}/{{ $user->avatar }}"  class="rounded-circle" width="170rem" alt="">

                </div>

                <div>

                    <form action="/avatar/{{ auth()->id() }}" enctype="multipart/form-data" method="POST">

                        @csrf
                        @method('PATCH')

                        <div class="form-group">

                            <label for="Profile_Picture">Upload Profile Picture</label>

                            <input type="file" name="avatar" id="{{ auth()->id() }}">

                        </div>

                        <div>

                            <button class="btn btn-primary" type="submit">Update</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>


@endsection
