
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ url('appointments/create/termin/'.Auth::user()->id)}}">
                {{ csrf_field() }}
            <div class="card mb-3 text-dark bg-warning">
                <div class="card-header">{{ __('Rezervacija termina za salu:') }}</div>
                <img src="{{ URL::to('/') }}/frontend/slider/termin.png" width="625" height="300" class="card-img-top" alt="...">

                <div class="row g-0">
                    <div class="col-md-4">
                      <img src="{{ URL::to('/') }}/frontend/slider/termini.jpg" width="250" height="900" alt="...">
                    </div>
                <div class="col-md-8">
                <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Odaberite vrijeme za rezervaciju sale!</p>
                    <p>Radno vrijeme: 08:00 - 23:00</p>
                    <br />

                   {{--  @guest

                    @else
                        @foreach ($club->coaches as $coach)
                            @if(Auth::user()->email == $coach['email'])
                                <p><a href="{{ url('/clubs/'.$club['id'].'/users') }}">Pogledaj clanove skole sporta</a></p>
                            @endif
                        @endforeach

                    @endguest --}}

                    <ul>
                        @foreach ($availableApp as $key=>$value)
                                    <td><li>Sala {{ $key }}</li></td>
                                    @foreach ($capacityOfHalls as $capacityOfHall)
                                        @if ($key == key($capacityOfHall))
                                            @foreach ($capacityOfHall as $jip)
                                                <p>Kapacitet ove sale je: {{ $jip[0] }}</p>
                                            @endforeach
                                        @endif
                                    @endforeach
                                    <p>Dostupni termini za ovu salu: </p>
                                    @foreach ($value as $interval)

                                            <p>{{ explode(' ',$interval[0])[1] }} - {{ explode(' ', $interval[1])[1] }}</p>
                                    @endforeach
                        @endforeach
                    </ul>

                </div>
                <h5>Izaberite salu:</h5>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="sport" class="col-md-4 col-form-label text-md-right">{{ __('Sala:') }}</label>

                        <div class="col-md-6 dropdown_container">
                                   <select name="hall" id="hall" class="selectpicker" data-style="select-with-transition" title="Select one of the available halls">
                                        @foreach ($availableApp as $key=>$value)
                                            <option>{{ $key }}</option>
                                        @endforeach
                                </select>
                        </div>
                    </div>
                    <p>Izaberite početak termina: </p>
                    <input id="begining" type="time" class="form-control" name = "begining" required autocomplete="current-password">
                    <p>Izaberite kraj termina: </p>
                    <input id="end" type="time" class="form-control" name = "end" required autocomplete="current-password">

                </div>
                <p>                    </p>
                <div class="col-md-6">
                    <div class="alert alert-success" style="display: none">
                    </div>

{{--                      <a href="{{ url('appointments/create/'.Auth::user()->id)}}" class="btn btn-success w-100">Rezervisi</a>
 --}}                    <input class="btn btn-primary" type="submit" value="Rezervisi" id="ajax-submit">
                </div>
                <br />
                <input type="hidden" id="hidden" class="sport" value="{{ $sportDate }}">
                <div class="col-md-6"><a class="btn btn-primary" href="{{ url('/user-appointments')}}">Tvoji zakazani termini</a></div>
                <p>                    </p>
                <div class="col-md-6"><a class="btn btn-primary" href="{{ url('/home')}}">Nazad</a></div>
                </div>
                </div>

            </div>
            </form>
</div>
        </div>
    </div>
</div>

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function(){
        $('#ajax-submit').click(function(e){
            e.preventDefault();
            var sport_date = $("#hidden").val();
            //alert(sport_date);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                }
            });

            var data = {
                        "hall": $("#hall").val(),
                        "date": sport_date,
                        "begining": $("#begining").val(),
                        "end": $("#end").val()
                    };

            $.ajax({
                url: "{{ url('/ajax-store') }}",
                method: 'POST',
                data: data,
                success: function(result){
                    $(".alert").show();
                    $(".alert").html(result.success);

                }
            });
        });
    })
</script>




{{--
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
 --}}
