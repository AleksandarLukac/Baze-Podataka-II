@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-black bg-warning mb-3">
                <div class="card-header">{{ __('Podaci o školi sporta:') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Ime škole sporta: {{ $club['name'] }}</p>
                    <br />
                    <br />
                    <p>Broj korisnika škole sporta: {{ $club['number_of_users'] }}</p>
                    <br />
                    <br />

                    @guest

                    @else
                        @foreach ($club->coaches as $coach)
                            @if(Auth::user()->email == $coach['email'])
                                {{--<p><a href="{{ url('/clubs/'.$club['id'].'/users') }}">Pogledaj clanove skole sporta</a></p>--}}
                                <div class="col-md-6"><a class="btn btn-primary" type="submit" href="{{ url('/clubs/'.$club['id'].'/users') }}">Pogledaj članove škole sporta</a></div>
                            @endif
                        @endforeach

                    @endguest
                    <br/>


                        <h4>Treneri škole sporta:</h4>
                        <table class="table table-border text-center">
                        @foreach ($club->coaches as $coach)
                            @if (Route::has('login'))
                                @auth
                                    <tr><td><a href="{{ url('/coaches/'.$coach['id']) }}">{{ $coach['name'] }}</a></td></tr>

                                @else
                                    <tr><td><a href="{{ url('/home') }}">{{ $coach['name'] }}</a></td></tr>
                                @endauth
                            @endif

                        @endforeach
                       </table>


                </div>
                <br />
            <div class="col-md-6"><a class="btn btn-primary" type="submit" href="{{ url('/clubs')}}">Nazad</a></div>
            </div>
        </div>
    </div>
</div>
@endsection
