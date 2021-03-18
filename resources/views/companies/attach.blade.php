@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welcome To admin panel  </div>
                    @include('partials.flash-messages')


                    <a class="btn text-left" href="{{ route('users.create') }}" role="button">Create user</a>

                    <a class="btn text-left" href="{{ route('users.create') }}" role="button">Attach Clients</a>

                    <div class="card-body">
                        <form method="post" action="{{ route('companies.attachment') }}" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('put') }}

                            <div class="form-group">
                                <label style="display: block" for="company">Choose Company</label>
                                <select name="company" class="form-select">
                                    <option value="none">none</option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}">{{$company->companyName}}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label style="display: block" for="client">Choose client</label>

                                <select name="client" class="form-select">
                                    <option value="none">none</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}">{{$client->firstName}} {{ $client->lastName }}</option>
                                    @endforeach
                                </select>

                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <button type="submit" class="btn btn-primary">Attach client to company</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
