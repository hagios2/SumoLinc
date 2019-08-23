@extends('layouts.app')

@section('content')

    <div class="container">

        @include('includes.errors')


        <div class="container">

            <div class="card" style="max-width: 120rem;">


                <img src="storage/images/{{ $user->id }}/{{ $user->avatar }}"  class="card-img rounded-circle" style="margin-left:25rem; width:15rem" alt=""><br><br>

                <h3 class="card-title " style="margin-right:10rem;">{{ $user->name }}</h3>

                @if ($user->id === auth()->id())

                    <a style="width:10rem;"  class="btn btn-primary" href="/avatar/{{ auth()->id() }}/edit">change picture</a><br>

                @else

                    <a style="width:10rem;"  class="btn btn-primary" href="">Add connection</a>

                    <a style="width:10rem;"  class="btn btn-primary" href="">message</a>

                @endif


                {{--  //school  --}}
                @if($education)

                    <h5 class="card-title">{{ $education->first()->school ?? 'Add education Background' }}</h5>

                @endif


                <div class="card-body">
                  <h5 class="card-title">Primary card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                </div>

            </div><br>

            <a class="btn btn-default pull-right" href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            <div class="card">

                {{--  //summary  --}}
                <div class="card-body">

                    <div>

                        <strong>Profile summary</strong>

                        <p class="card-text">

                            {{ $summary }}

                        </p>

                    </div>


                </div>


            </div><br>

            <div class="card">

                    {{--  Solved Challenges  --}}
                    <div class="card-body">

                        <p class="card-text">Show solved challenge shere</p>

                    </div>


            </div><br>

            <div class="card">

                {{--  education  --}}

                <div class="card-body">

                        <p class="card-text">

                            Education Background

                            @foreach ($education as $educate)

                                <div>
                                    <strong>
                                        {{ $educate->school }}
                                    </strong> <br>

                                    <small>{{ $educate->Program }} ({{ $educate->educationCert->certificate }})</small>

                                </div><br>

                            @endforeach

                        </p>

                </div>

            </div><br>


            <div class="card">

                    {{--  Voluntering experience  --}}

                <div class="card-body">

                     <p class="card-text">Show v. experience</p>

                </div>

            </div><br>


            <div class="card">

                    {{--  interest  --}}

                    <div class="card-body">

                            <p class="card-text">Show interest here</p>

                        </div>

            </div><br>

            <div class="card">

                    {{--  recommendation  --}}

                    <div class="card-body">

                            <p class="card-text">Display recommendation</p>

                        </div>

                </div><br>

        </div>


@endsection
