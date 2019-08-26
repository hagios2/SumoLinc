@extends('layouts.app')

@section('content')

    <div class="container">

        @include('includes.errors')

        @include('includes.tab')

        <div class="col-md-10">

            <div class="card">
                <div class="card-header">Profile</div>

            <div id="app" class="card-body">

               <div class="justify-content-center">

                    <form action="/profile" method="POST">

                        @csrf

                        <div class="form-group row">

                            <label for="name" class="col-md-2 text-md-right"><i class="fas fa-user-alt"></i> Name</label>

                            <input type="text" name="name" class="form-control col-md-8" placeholder="Enter name" value="{{ auth()->user()->name }}" id="">

                        </div>


                        <div class="form-group row">

                            <label  class="col-md-2 text-md-right" for="email"><i class="fa fa-envelope"></i> Email</label>

                            <input type="email" name="email" class="form-control col-md-8" placeholder="Enter email" value="{{ auth()->user()->email }}" id="">

                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 text-md-right" for="BOD"><i class="fa fa-calendar"></i> D.O.B</label>

                            <input type="date" class="form-control col-md-8" required name="date" value="{{ old('date') }}">
                        </div>

                        <div class="form-group row">

                            <label class="col-md-2 text-md-right" for="Summary"><i class="fa fa-edit"></i> Summary</label>

                            <textarea class="form-control col-md-7" name="summary" id="article-ckeditor" cols="10" rows="10" placeholder="Enter summary">{!! old('summary') !!}</textarea>

                        </div>


                        <state-component></state-component>

                         <button class="btn btn-primary offset-md-2" type="submit">Update</button>

                    </form>

               </div>

            </div>

        </div>

    </div>

    @section('extra-js')

        <script src="/js/app.js"></script>

    @endsection

@endsection
