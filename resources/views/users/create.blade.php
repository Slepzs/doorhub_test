@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welcome To admin panel  </div>
                    @include('partials.flash-messages')

                    <a class="btn text-left" href="{{ route('companies.create') }}" role="button">Create Company</a>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.store') }}"  enctype="multipart/form-data">
                            @csrf
                            {{ method_field('POST') }}
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" name="firstName" class="form-control" id="firstName" aria-describedby="firstName" placeholder="First Name" value="MeMyselfAndI">
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" name="lastName" class="form-control" id="lastName" aria-describedby="lastName" placeholder="Last name" value="MylastName">
                            </div>
                            <div class="form-group">
                                <label for="username">userName</label>
                                <input type="text" name="username" class="form-control" id="username" aria-describedby="username" placeholder="username" value="username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" aria-describedby="User email" placeholder="User Email" value="john@doe.com">
                            </div>

                            <div class="form-group">
                                <label for="phoneNumber">Phone Number</label>
                                <input type="text" name="phoneNumber" class="form-control" id="phoneNumber" aria-describedby="Phone Number" placeholder="phoneNumber" value="+4598726543">
                            </div>


                            <div class="form-group">
                                <label for="password">Password (is password) :-))</label>
                                <input type="password" name="password" class="form-control" id="password" aria-describedby="Password" placeholder="Password" value="password">
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

                            <button type="submit" class="btn btn-primary">Create user</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
