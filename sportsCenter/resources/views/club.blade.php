@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Podatci o klubu:') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ $club['name'] }}
                    <br />
                    <br />
                    <p>Broj korisnika škole sporta: {{ $club['number_of_users'] }}</p>
                    <br />
                    <br />

                    @guest

                    @else
                        @foreach ($club->coaches as $coach)
                            @if(Auth::user()->email == $coach['email'])
                                <p><a href="{{ url('/clubs/'.$club['id'].'/users') }}">Pogledaj clanove skole sporta</a></p>
                            @endif
                        @endforeach

                    @endguest

                    <ul>
                        <p>Treneri:</p>
                        @foreach ($club->coaches as $coach)
                            @if (Route::has('login'))
                                @auth
                                    <td><li><a href="{{ url('/coaches/'.$coach['id']) }}">{{ $coach['name'] }}</a></li></td>

                                @else
                                    <td><li><a href="{{ url('/home') }}">{{ $coach['name'] }}</a></li></td>
                                @endauth
                            @endif

                        @endforeach
                    </ul>

                </div>
                <br />
            <div class="col-md-6"><a class="btn btn-primary" type="submit" href="{{ url('/clubs')}}">Nazad</a></div>
            </div>
        </div>
    </div>
</div>
@endsection
