@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-dark bg-warning mb-3">
                <div class="card-header">{{ __('Dobro došli!') }}</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Ulogovani ste!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
