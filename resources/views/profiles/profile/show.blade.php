@extends('layouts.app')

@section('content')

    <div class="container">

        @include('includes.errors')


        <div class="col-md-11">

            <div class="card">

                <div class="card-header">Profile of {{ $user->name }}</div>

                <div >

                    <img src="/storage/{{ $user->avatar }}"  class="card-img rounded-circle" style="margin-left:25%; width:15rem" alt=""><br><br>

                    <h3 class="card-title " style="margin-right:10rem;">{{ $user->name }}</h3>

                </div>


                @if ($user->id !== auth()->id())

                  <div class="row">

                    <form method="POST" action="/add/{{ $user->id }}/connection">

                        @csrf


                        @if ($connectedUsers)

                            <button type="submit" style="margin-right:2rem; margin-left:20rem"  class="btn btn-primary" disabled>Connected</button>

                        @else

                            <button type="submit" style="margin-right:2rem; margin-left:20rem" class="btn btn-primary">Add Connection</button>

                        @endif

                    </form>

                    <a class="btn btn-primary" href="">Message</a>

                  </div>

                @endif


                <div class="card-body">
                  <h5 class="card-title">Primary card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                </div>

            </div><br>

            <div class="card">

                <div class="card-header"><strong>Profile summary</strong></div>

                <div class="card-body">

                    <div>

                        <p class="card-text">



                        </p>

                    </div>


                </div>


            </div><br>

            <div class="card">

                <div class="card-header">Solved challenge(s)</div>

                    <div class="card-body">

                        <p class="card-text">Show solved challenge shere</p>

                    </div>


            </div><br>

            <div class="card">

                    <div class="card-header">Education History</div>

                <div class="card-body">

                        <p class="card-text">

                            @if ($user->education)

                                @foreach ($user->education as $educated)

                                @endforeach

                            @else

                                No education record found

                            @endif

                        </p>

                </div>

            </div><br>


            <div class="card">

                <div class="card-header">Experience</div>

                <div class="card-body">

                     <p class="card-text">Show v. experience</p>

                </div>

            </div><br>


            <div class="card">

                    <div class="card-header">Interest</div>

                    <div class="card-body">

                            <p class="card-text">Show interest here</p>

                        </div>

            </div><br>

            <div class="card">

                    <div class="card-header">Recommendations</div>

                    <div class="card-body">

                            <p class="card-text">Display recommendation</p>

                        </div>

                </div><br>

        </div>




@endsection
