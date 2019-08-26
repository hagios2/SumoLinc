@extends('layouts.app')

@section('content')

    <div class="container">

        @include('includes/tab')

        @include('includes.errors')

        <div class="col-md-10">

            <div class="card">

                <div class="card-header">Work History</div><br>

                    <div class="card-body">

                        <form action="/workingExperience" method="POST">

                            @csrf

                            <div class="form-group row">

                                <label class="col-md-2 text-md-right" for="company"><i class="fas fa-industry"></i> Company</label>

                                <input type="text" name="company" class="form-control col-md-8" value="{{ old('company') }}" id="">

                            </div>


                            <div class="form-group row">

                                <label class="col-md-2 text-md-right" for="Position"><i class="fas fa-user-md"></i> Position</label>

                                <input type="text" name="position" class="form-control col-md-8"  value="{{ old('position') }}" id="">

                            </div>

                            <div class="form-group row">

                                    <label class="col-md-2 text-md-right" for="location"><i class="fas fa-city"></i> Location</label>

                                    <input type="text" name="location" class="form-control col-md-8"  value="{{ old('location') }}" id="">

                                </div>

                            <div class="form-group row">

                                <label class="col-md-2 text-md-right" for="Summary"><i class="fas fa-edit"></i> Roles</label>

                                <textarea class="form-control col-md-7" name="summary" id="article-ckeditor" cols="10" rows="10" placeholder="Enter summary">{!! old('summary') !!}</textarea>

                            </div>

                            <div class="form-group row">

                                <label class="col-md-2 text-md-right" for="Start Date"><i class="fas fa-calendar-alt"></i> Starting Date</label>

                                <input type="month" required class="form-control col-md-8" name="start_date" value="{{ old('start_date') }}">

                            </div>


                        <div class="form-group row">

                            <div class="col-md-4 offset-md-2">

                                <div class="form-check">
                                    <input class="form-check-input" onchange="" type="checkbox" name="current_employee" value="1">

                                    <label class="form-check-label" for="remember">
                                        Specify current employee
                                    </label>

                                </div>

                            </div>

                        </div><br>

                            <div class="form-group row">

                                <label class="col-md-2 text-md-right" for="Start"><i class="fas fa-calendar-alt"></i> Completion Date</label>

                                <input type="month" class="form-control col-md-8" name="completion_date" value="{{ old('completion_date') }}">

                            </div>

                            <button class="btn btn-primary offset-md-2" type="submit">Submit</button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
