@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Rezervacija termina') }}</div>
                    <div class="card-body">
                        <form method="post" action="/appointments">
                            @csrf

                            <div class="form-group row">
                                <label for="sport" class="col-md-4 col-form-label text-md-right">{{ __('Sport') }}</label>

                                <div class="col-md-6">
                                    <input id="sport" type="text" class="form-control" name = "sport" required autocomplete="current-password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="datum" class="col-md-4 col-form-label text-md-right">{{ __('Datum') }}</label>

                                <div class="col-md-6">
                                    <input id="datum" type="date" class="form-control" name = "datum" required autocomplete="current-password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="vrijeme" class="col-md-4 col-form-label text-md-right">{{ __('Vrijeme') }}</label>

                                <div class="col-md-6">
                                    <input id="vrijeme" type="time" class="form-control" name = "vrijeme" required autocomplete="current-password">
                                </div>
                            </div>
                            @if(Route::has('appointments'))
                                  <p>Nesto</p>
                            @endif
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Rezervisi') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
