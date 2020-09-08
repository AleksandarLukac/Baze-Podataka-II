@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

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
                    <a href="{{ url('/home')}}">Back on home page</a>
                    <br />
                    <a href="{{ url('/coaches')}}">Show all coaches in center</a>

            </div>
        </div>
    </div>
</div>
@endsection
