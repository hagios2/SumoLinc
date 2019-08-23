@yield('layouts.app')

@section('content')

<div class="container">

    <form action="" method="post">
        @csrf

        <input type="text" name="skill" value="{{ old('skill') }}" id="">

        <button class="btn btn-primary" type="submit">Add skill</button>


        <!--add endorsement-->

    </form>

</div>

@endsection
