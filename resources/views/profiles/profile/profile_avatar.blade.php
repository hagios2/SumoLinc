@extends('layouts.app')

@section('content')

    <div class="container">

        @include('includes.errors')


        <div class="container">

            <div class="card">

                <div>

                    <img src="/storage/{{ $user->avatar }}"  class="rounded-circle card-img" style="margin-left:25%; width:15rem" alt="">

                </div><br>

                <div class="row">

                    <form action="/avatar/{{ auth()->id() }}" enctype="multipart/form-data" method="POST">

                        @csrf

                        @method('PATCH')

                        <div class="form-group">

                            <input type="file" class="form-control-file col-md-6" name="avatar" id="{{ auth()->id() }}">

                        </div>

                        <div>

                            <button class="btn btn-primary offset-md-2" type="submit">Update</button>

                        </div>

                    </form>

                    @if($user->avatar !== 'images/noimage.jpg')

                        <form action="/avatar/{{ $user->id }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger" type="submit">X Remove</button>

                        </form>

                    @endif

                </div>

            </div>

        </div>


@endsection
