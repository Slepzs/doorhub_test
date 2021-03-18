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


                        @if($attachedCompanies)
                        <p>You are a part of these companies</p>
                        <ul>
                            @foreach($attachedCompanies as $company)

                               <li> {{ $company->companyName }}</li>

                            @endforeach
                        </ul>
                        @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
