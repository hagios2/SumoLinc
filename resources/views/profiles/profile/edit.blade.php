@extends('layouts.app')

@section('content')

    <div class="container">

        @include('includes.errors')

        @include('includes.tab')

        <div>

            <form action="/profile/{{ auth()->id() }}" method="POST">
                @method('PATCH')

                @csrf

                <div class="form-group">

                    <label for="name">Name</label>

                    <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ auth()->user()->name }}" id="">

                </div>


                <div class="form-group">

                    <label for="email">Email</label>

                    <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{ auth()->user()->email }}" id="">

                </div>

                <div class="form-group">
                    <label for="BOD">BirthDate</label>

                    <input type="date" class="form-control" required name="date" value="{{ $profile->BirthDate }}">
                </div>

                <div class="form-group">

                    <label for="Summary">Profile Summary</label>

                    <textarea class="form-control" name="summary" id="" value="{{ old('summary') }}" cols="10" rows="10" placeholder="Enter summary">{{ $profile->summary }}</textarea>

                </div>

                <div class="form-group">

                    <label for="Country">Country</label>

                    <select class="form-control" class="form-control" name="country" id="country" style="width:60%">

                       {{--   @@if ()

                        @else

                        @endif  --}}
                        <option value="{{ $profile->country }}">{{ $profile->country }}</option>

                        <option value="">Select country</option>

                        @foreach($allcountries as $country)

                            <option {{ (old('country') == $country) ? 'selected' : '' }} value="{{ $country }}">{{ $country }}</option>

                        @endforeach

                    </select>

                </div>


                <div class="form-group">

                    <label for="States">State</label>

                    <input type="text" class="form-control" placeholder="Enter State" name="state" value="{{ $profile->State }}">

                </div>


                <div class="form-group">

                    <label for="religion">Religion</label>

                    <input type="text" class="form-control" placeholder="Enter Religion" name="religion" value="{{ $profile->Religion }}">

                </div>

                <button class="btn btn-primary" type="submit">Update</button>

            </form>

        </div>

    </div>

@endsection
