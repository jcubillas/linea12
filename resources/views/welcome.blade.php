@extends('layouts.app')

@section('content')
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Linea 12
                </div>

                <div class="links">
                    <a href="{{ url('/branch')  }}">Branches</a>
                    <a href="{{ url('/stop')  }}">Stops</a>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection