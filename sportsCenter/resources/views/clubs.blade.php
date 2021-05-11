@extends('layouts.app')

@section('content')
<div class="container">
<br />
        <h3>Škole sporta:</h3>
        <br />
<table class="table table-bordered border-primary">
    <thead class="center">
      <tr>
        <th scope="col">IME SKOLE</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($clubs as $club)
        <tr>
            <td><a href="{{ url('/clubs/'.$club['id'])}}">{{ $club['name'] }}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
<div class="center">
    <div class="col-md-12">
        <br />
        <h3>Škole sporta:</h3>
        <br />
        <table class="center">
            <tr class="table-primary">
                <th>Ime škole</th>
            </tr>
            @foreach ($clubs as $club)
            <tr class="table-primary">
                <td><a href="{{ url('/clubs/'.$club['id'])}}">{{ $club['name'] }}</td>
            </tr>

            @endforeach
        </table>
    </div>
</div>
@endsection
