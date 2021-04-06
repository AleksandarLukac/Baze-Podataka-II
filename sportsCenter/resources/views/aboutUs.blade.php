@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('About us') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __("Sportsko-rekreativni centar Sportakos se može pohvaliti bogatom istorijom kroz dugi niz godina postojanja. Njegovi počeci su bili davne 1990. godine, te ga to čini jednim od najstarijih sportskih centara u gradu, iako je preživio mnoga iskušenja.
                    Centar raspolaže velikim brojem sala, prilagođenih za razne vrste sportova, kako individualnih tako i timskih. Takođe ljubazan tim zaposlenih i stručnih ljudi našeg centra su uvijek na raspolaganju svim našim sportistima.
                    Ako želite sa društvom da ispunite svoje vrijeme i odigrate par utakmica u odbojci ili možda košarci ili ipak želite da se usavršite u nekom određenom sportu, pravi smo izbor za vas.
                    Veliki broj škola sporta i klubova nam je ukazalo povjerenje i na našim terenima uče mlade nade i možda buduće svjetske sportiste. Dođite i uvjerite se sami.
                    Naša adresa je: ___________
                    Kontakt telefon: ___________
                    Živimo ispunjeno uz sport!") }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
