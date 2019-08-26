@extends('layouts.app')


@section('content')

    <div class="container">

        @include('includes/tab')

        @include('includes.errors')

        <div class="col-md-10">

            <div class="card">

                <div class="card-header">Educational Background</div><br>

                <div class="card-body">

                    <form action="/education" method="POST">

                        @csrf

                        <div class="form-group row">

                            <label class="col-md-2 text-md-right" for="school"><i class="fa fa-university"></i> School</label>

                            <input type="text" name="school" class="form-control col-md-8" placeholder="Enter School" value="{{ old('school') }}" id="">

                        </div>


                        <div class="form-group row">

                            <label class="col-md-2 text-md-right" for="Program"><i class="fas fa-book-reader"></i> Program</label>

                            <input type="text" name="program" class="form-control col-md-8" placeholder="Enter program of Study" value="{{ old('program') }}" id="">

                        </div>

                        <div class="form-group row">

                            <label class="col-md-2 text-md-right" for="certificate"><i class="fa fa-certificate"></i> Certificate</label>


                            <select required class="form-control col-md-8" name="cert" id="cert" style="">

                                <option value="">Select Certificate</option>

                                @foreach($allcert as $cert)

                                    <option {{ (old('cert') == $cert->id) ? 'selected' : '' }} value="{{ $cert->id }}">{{ $cert->certificate }}</option>

                                @endforeach

                            </select>

                        </div>

                        <div class="form-group row">

                            <label class="col-md-2 text-md-right" for="Start Date"><i class="fa fa-calendar"></i> Starting Date</label>

                            <input type="month" required class="form-control col-md-8" name="start_date" value="{{ old('start_date') }}">

                        </div>

                        <div class="form-group row">

                            <div class="col-md-4 offset-md-2">

                                <div class="form-check">
                                    <input class="form-check-input" onchange="" type="checkbox" name="currently_enrolled" value="1">

                                    <label class="form-check-label" for="remember">
                                        Specify currently enrolled
                                    </label>

                                </div>

                            </div>

                        </div>

                        <div class="form-group row">

                            <label for="Completed" class="col-md-2 text-md-right"><i class="fa fa-calendar"></i> Completion Date</label>

                            <input type="month" class="form-control col-md-8" name="completion_date" value="{{ old('completion_date') }}">

                        </div>

                        <button class="btn btn-primary offset-md-2" type="submit">Submit</button>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
