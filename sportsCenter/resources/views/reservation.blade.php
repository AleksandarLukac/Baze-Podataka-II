@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Rezervacija termina') }}</div>
                    <div class="card-body">
                        <form method="post" action="{{ action('AppointmentsController@showAvailableAppointmentsForDateAndHall') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="sport" class="col-md-4 col-form-label text-md-right">{{ __('Sport') }}</label>

                                <div class="col-md-6 dropdown_container">
{{--                                     <input id="sport" type="text" class="form-control" name = "sport" required autocomplete="current-password">
 --}}                                    <select name="sport" id="sport" class="selectpicker" data-style="select-with-transition" title="Select one of the available sports">
                                                @foreach ($allCourts as $court)
                                                    <option>{{ $court }}</option>
                                                @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="datum" class="col-md-4 col-form-label text-md-right">{{ __('Datum') }}</label>

                                <div class="col-md-6">
                                    <input id="datum" type="date" class="form-control" name = "datum" required autocomplete="current-password">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Next') }}
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
