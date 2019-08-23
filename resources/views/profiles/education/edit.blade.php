@extends('layouts.app')

@section('content')

    <div class="container">

        @include('includes.errors')

        <div>

            <form action="/education/{{ $education->id }}" method="POST">

                @csrf
                @method('PATCH')

                <div class="form-group">

                    <label for="school">School</label>

                    <input type="text" name="school" class="form-control" placeholder="Enter School" value="{{ $education->school }}" id="">

                </div>


                <div class="form-group">

                    <label for="Program">Program of Study</label>

                    <input type="text" name="program" class="form-control" placeholder="Enter program of Study" value="{{ $education->Program }}" id="">

                </div>

                <div class="form-group">

                    <label for="certificate">Certificate</label>


                    <select class="form-control" class="form-control" name="cert" id="cert" style="width:60%">

                            <option value="{{ $education->certificate_id }}">{{ $education->educationCert->certificate  }}</option>

                            <option value="">Select Certificate</option>

                            @foreach($allcert as $cert)

                                <option {{ (old('cert') == $cert->id) ? 'selected' : '' }} value="{{ $cert->id }}">{{ $cert->certificate }}</option>

                            @endforeach

                    </select>

                </div>

                <div class="form-group">

                    <label for="Start Date">Starting Date</label>

                    <input type="date" class="form-control" name="start_date" value="{{ $education->startDate }}">

                </div>


                <div class="custom-control custom-checkbox">

                    <input type="checkbox" class="custom-control-input" {{ ($education->TillDate) ? 'checked' : '' }} name="currently_enrolled" value="{{ $education->TillDate }}">

                    <label class="custom-control-label" for="currently_enrolled">Specify Currently Enrolled</label>

                </div><br>


                <div class="form-group">

                    <label for="Start">Completion Date</label>

                    <input type="date" class="form-control" name="completion_date" value="{{ $education->completionDate }}">

                </div>

                <button class="btn btn-primary" type="submit">Update</button>


            </form>

        </div>

    </div>

@endsection
