@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-dark bg-warning mb-3">
                <div class="card-header">{{ __('Podatci o treneru:') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card mb-3 center" style="max-width: 540px;">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <img src="{{ URL::to('/') }}/frontend/slider/dummy.png" width="200" height="230" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Ime:   {{ $coach->name }}</h5>
                              <p class="card-text">E-mail:    {{ $coach->email }}</p>
                              <p class="card-text">Sportovi koje trenira:   {{$coach->domain }}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col-md-6"><a class="btn btn-primary" href="{{ url('/coaches')}}">Prikaži sve trenere iz sportskog centra</a></div>

                 <br />
                <div class="col-md-6"><a class="btn btn-primary" href="{{ url('/coaches')}}">Nazad</a></div>

            </div>

        </div>

    </div>

</div>
@endsection
