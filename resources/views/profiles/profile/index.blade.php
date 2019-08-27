@extends('layouts.app')

@section('content')

    <div class="container">

        @include('includes.errors')


        <div class="col-md-11">

            <div class="card">

            <div class="row">

                <img src="/storage/{{ $user->avatar }}"  class="card-img rounded-circle" style="margin-left:25%; margin-top:1rem; width:15rem" alt="">

                <span><a class="btn btn-primary" style="margin-left:10%; margin-top:7rem;" href="/avatar/{{ auth()->id() }}/edit">change picture</a></span><br>

            </div>


                <h3 class="card-title " style="margin-right:10rem;">{{ $user->name }}</h3>


                <h5 class="card-title">{!! auth()->user()->education->last()->school ?? '<a class="btn btn-default" href="/education/create">Add education</a>' !!}</h5>




                <div class="card-body">
                  <h5 class="card-title">Primary card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                </div>

            </div><br>

            <a class="btn btn-default pull-right" href="/profile/{{ $user->id }}/edit"><i class="fa fa-edit"></i>Edit Profile</a>
            <div class="card">

                <div class="card-header"><strong>Profile summary</strong></div>

                {{--  //summary  --}}
                <div class="card-body">

                    <div>

                        <p class="card-text">

                            {!! $summary !!}

                        </p>

                    </div>


                </div>


            </div><br>

            <div class="card">

                <div class="card-header"><strong>Solved Challenge(s)</strong></div>


                    <div class="card-body">

                        <p class="card-text">Show solved challenge shere</p>

                    </div>


            </div><br>

            <div class="card">

                <div class="card-header"><i class="fas fa-graduation-cap"></i> <strong>Education History</strong></div>

                <div class="card-body">

                    <p class="card-text">

                        @if (auth()->user()->education)

                            <div class="col-md-10 offset-md-1">

                                <table class="table table-striped " >

                                    @forelse(auth()->user()->education as $educate)

                                        <tr>

                                            <td>

                                                <strong>
                                                    {{ $educate->school }}
                                                </strong> <br>

                                                {{ $educate->program }}   <small class="badge badge-primary">{{ $educate->educationCert['certificate'] }}</small>

                                            </td>

                                            <td><br>

                                                {{ $educate->startDate }} <strong> - </strong> {{ $educate->completionDate ?? 'currently enrolled' }}


                                                    <a style="padding:0.5rem;" class="badge badge-info offset-md-1" href="/education/{{ $educate->id }}/edit">Edit</a>

                                            </td>

                                        </tr>
                                        <br>
                                    @empty

                                        <p class="title">No Education history Added</p><br>

                                    @endforelse

                                </table>

                            </div>

                        @endif

                    </p>

                    <a style="width:15%;" class="btn btn-primary pull-right" href="/education/create">Add education</a>

                </div>

            </div><br>

            <div class="card">

                <div class="card-header"><i class="fas fa-user-md"></i>  <strong>Experience</strong></div>

                <div class="card-body">

                    <p class="card-text">

                        @if (auth()->user()->experience)

                            <div class="col-md-10 offset-md-1">

                                <table class="table table-striped " >

                                    @forelse(auth()->user()->experience as $workingExperience)

                                        <tr>

                                            <td>

                                                <strong>

                                                    {{ $workingExperience->company }} <small class="badge badge-primary">{{ $workingExperience->position }}</small>

                                                </strong> <br>

                                                {!! $workingExperience->summary !!}

                                            </td>

                                            <td>

                                                {{ $workingExperience->startDate }} <strong> - </strong> {{ $workingExperience->completionDate ?? 'current employee' }}
                                                <br>

                                                {{ 'Location:  ' .$workingExperience->location }}

                                                 <a style="padding:0.5rem;" class="badge badge-info offset-md-1" href="/workingExperience/{{ $workingExperience->id }}/edit">Edit</a>


                                            </td>

                                        </tr>
                                    <br>

                                    @empty

                                        <p class="title">No Experience Added</p><br>

                                    @endforelse

                                </table>

                            </div>


                        @endif

                    </p>

                    <a style="width:15%;" class="btn btn-primary pull-right" href="/workingExperience/create">Add experience</a>

                </div>

            </div><br>

            <div class="card">

                    <div class="card-header">Interest</div>

                    <div class="card-body">

                            <p class="card-text">Show interest here</p>

                        </div>

            </div><br>

            <div class="card">

                    <div class="card-header">Recommendation(s)</div>

                    <div class="card-body">

                            <p class="card-text">Display recommendation</p>

                        </div>

                </div><br>

        </div>


@endsection
