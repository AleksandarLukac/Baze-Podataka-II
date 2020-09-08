@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3>Sport schools</h3>
        <br />
        <table class="table table-border">
            <tr>
                <th>Name</th>
            </tr>
            @foreach ($clubs as $club)
            <tr>
                <td><a href="{{ url('/clubs/'.$club['id'])}}">{{ $club['name'] }}</td>
            </tr>

            @endforeach
        </table>
    </div>
</div>
@endsection
