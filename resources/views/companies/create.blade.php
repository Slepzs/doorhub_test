@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome To admin panel  </div>
                @include('partials.flash-messages')


                <a class="btn text-left" href="{{ route('users.create') }}" role="button">Create user</a>

                <a class="btn text-left" href="{{ route('companies.attach') }}" role="button">Attach Clients</a>

                <div class="card-body">
                    <form method="POST" action="{{ route('companies.store') }}"  enctype="multipart/form-data">
                        @csrf
                        {{ method_field('POST') }}
                        <div class="form-group">
                            <label for="companyName">Company Name</label>
                            <input type="text" name="companyName" class="form-control" id="companyName" aria-describedby="NameHelp" placeholder="Company Name" value="Company Name 1">
                        </div>
                        <div class="form-group">
                            <label for="companyAddress">Company Address</label>
                            <input type="text" name="companyAddress" class="form-control" id="companyAddress" aria-describedby="companyAddress" placeholder="Company Address" value="Krumtappen">
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" name="country" class="form-control" id="country" aria-describedby="Country" placeholder="Country" value="Denmark">
                        </div>
                        <div class="form-group">
                            <label for="town">Town/City</label>
                            <input type="text" name="town" class="form-control" id="town" aria-describedby="Town/City" placeholder="Town / City" value="Copenhagen">
                        </div>
                        <div class="form-group">
                            <label for="houseNo">House Number</label>
                            <input type="number" name="houseNo" class="form-control" id="houseNo" aria-describedby="House Number" placeholder="House Number" value="2">
                        </div>

                        <div class="form-group">
                            <label for="phoneNumber">Phone Number</label>
                            <input type="text" name="phoneNumber" class="form-control" id="phoneNumber" aria-describedby="Phone Number" placeholder="phoneNumber" value="+4598726543">
                        </div>

                        <div class="form-group">
                            <label for="VAT">VAT</label>
                            <input type="number" name="vatNumber" class="form-control" id="VAT" aria-describedby="VAT" placeholder="VAT" value="1234433">
                        </div>


                        <div class="form-group">
                        <label style="display: block" for="VAT">Choose client</label>

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

                        <button type="submit" class="btn btn-primary">Create Company</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
