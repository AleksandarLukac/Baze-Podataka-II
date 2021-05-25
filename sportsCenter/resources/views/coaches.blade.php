@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <br />
        <h3>Treneri:</h3>
        <br />
        <table class="table table-dark table-sm">
            <tr>
                <th>Ime trenera</th>
                <th>Sport</th>
                <th>Škola sporta</th>
            </tr>
            @foreach ($coaches as $coach)
            <tr>
                @if (Route::has('login'))
                    @auth
                        <td><a href="{{ url('/coaches/'.$coach['id']) }}">{{ $coach['name'] }}</a></td>

                    @else
                        <td><a href="{{ url('/home') }}">{{ $coach['name'] }}</a></td>
                    @endauth
                @endif
                <td>{{ $coach['domain'] }}</td>
                <td>
                    <ul>
                     @foreach ($coach->clubs as $club)
                        <li><a href="{{ url('/clubs/'.$club['id']) }}">{{ $club->name }}</a></li>

                    @endforeach
                    </ul>
            </td>
            </tr>

            @endforeach
        </table>
    </div>
</div>
@endsection
