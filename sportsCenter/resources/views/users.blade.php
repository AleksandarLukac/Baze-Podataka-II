@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">{{ __('Učlanjeni u školu sporta:') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <tr>
                        <th>{{ $club['name'] }} </th>
                    </tr>

                    <table class="table table-border text-center">

                            @foreach ($club->users as $user)
                        <tr>
                            <td>{{ $user['name'] }}
                            </td>
                        </tr>

                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
