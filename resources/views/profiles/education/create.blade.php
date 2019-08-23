@extends('layouts.app')


@section('content')

    <div class="container">

        @include('includes/profileTabs')

        @include('includes.errors')

        <div>

            <form action="/education" method="POST">

                @csrf

                <div class="form-group">

                    <label for="school">School</label>

                    <input type="text" name="school" class="form-control" placeholder="Enter School" value="{{ old('school') }}" id="">

                </div>


                <div class="form-group">

                    <label for="Program">Program of Study</label>

                    <input type="text" name="program" class="form-control" placeholder="Enter program of Study" value="{{ old('program') }}" id="">

                </div>

                <div class="form-group">

                    <label for="certificate">Certificate</label>


                    <select class="form-control" class="form-control" name="cert" id="cert" style="width:60%">

                            <option value="">Select Certificate</option>

                            @foreach($allcert as $cert)

                                <option {{ (old('cert') == $cert->id) ? 'selected' : '' }} value="{{ $cert->id }}">{{ $cert->certificate }}</option>

                            @endforeach

                    </select>

                </div>

                <div class="form-group">

                    <label for="Start Date">Starting Date</label>

                    <input type="date" required class="form-control" name="start_date" value="{{ old('start_date') }}">

                </div>

                <div class="custom-control custom-checkbox">

                    <input type="checkbox" class="custom-control-input" {{ old('currently_enrolled') == '1' ? 'checked' : '' }} id="defaultUnchecked" name="currently_enrolled" value="1">

                    <label class="custom-control-label"  id="defaultUnchecked" for="currently_enrolled">Specify Currently Enrolled</label>

                </div><br>

                <div class="form-group">

                    <label for="Start">Completion Date</label>

                    <input type="date" class="form-control" name="completion_date" value="{{ old('completion_date') }}">

                </div>

                <button class="btn btn-primary" type="submit">Submit</button>

            </form>

        </div>

    </div>

@endsection
