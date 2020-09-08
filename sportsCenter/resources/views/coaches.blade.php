@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3>Coaches</h3>
        <br />
        <table class="table table-border">
            <tr>
                <th>Name</th>
                <th>Domain</th>
                <th>Sport schools</th>
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
