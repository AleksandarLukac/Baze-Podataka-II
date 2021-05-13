@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Podatci o treneru:') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ $coach->name }}
                    <br />
                    {{ $coach->email }}
                    <br  />
                    {{$coach->domain }}
                </div>
                <br />
                <div class="col-md-6"><a class="btn btn-primary" href="{{ url('/coaches')}}">Prikaži sve trenere iz sportskog centra</a></div>

                    <br />
                    <div class="col-md-6"><a class="btn btn-primary" href="{{ url('/')}}">Nazad na početnu stranicu</a></div>

            </div>
        </div>
    </div>
</div>
@endsection
