@extends('layouts.app')

@section('content')

    <div class="container">

        @include('includes.errors')


        <div class="container">

            <div class="card" style="max-width: 120rem;">


                <img src="storage/images/{{ $user->id }}/{{ $user->avatar }}"  class="card-img rounded-circle" style="margin-left:25rem; width:15rem" alt=""><br><br>

                <h3 class="card-title " style="margin-right:10rem;">{{ $user->name }}</h3>

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

                {{--  //summary  --}}
                <div class="card-body">

                    <div>

                        <strong>Profile summary</strong>

                        <p class="card-text">



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

                                <div>
                                    <strong>

                                    </strong> <br>



                                </div><br>


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
