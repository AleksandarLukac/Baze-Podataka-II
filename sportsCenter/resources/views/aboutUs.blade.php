@extends('layouts.app')

@section('content')
<div class="container">

</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-warning">
                <div class="card-header">{{ __('O sportskom centru Sportakos') }}</div>

                <div class="card-body text-primary">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    {{ __("Sportsko-rekreativni centar Sportakos se može pohvaliti bogatom istorijom kroz dugi niz godina postojanja. Njegovi počeci su bili davne 1990. godine, te ga to čini jednim od najstarijih sportskih centara u gradu, iako je preživio mnoga iskušenja.
                    Centar raspolaže velikim brojem sala, prilagođenih za razne vrste sportova, kako individualnih tako i timskih. Takođe ljubazan tim zaposlenih i stručnih ljudi našeg centra su uvijek na raspolaganju svim našim sportistima.
                    Ako želite sa društvom da ispunite svoje vrijeme i odigrate par utakmica u odbojci ili možda košarci ili ipak želite da se usavršite u nekom određenom sportu, pravi smo izbor za Vas.
                    Veliki broj škola sporta i klubova nam je ukazalo povjerenje i na našim terenima uče mlade nade i možda buduće svjetske sportiste. Dođite i uvjerite se sami.") }}
                    <br>
                    <br>
                
                    {{ _("
                    Naša adresa je: Nikole Pašića 62")}}
                    <br>
                    {{_("
                    Kontakt telefon: +387 66 022 389")}}
                    <br>
                    <br>
                    {{_("
                    Živimo ispunjeno uz sport!") }}

                    <div class="col-md-4; text-align:center" >
                        <img src="{{ URL::to('/') }}/frontend/slider/sportsCenterLogo.jpg" class="d-block w-100" height="400"  alt="...">
                        <p class="center">SPORTAKOS</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection
