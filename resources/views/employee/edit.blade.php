@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header">Employee Informations</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h5>Name: {{ $employee->first_name }} {{ $employee->last_name }}</h5>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Email:{{ $employee->email }}</li>
                        @if ($employee->phone_number != null)
                        <li class="list-group-item">Phone number:{{ $employee->phone_number }}</li>
                        @else
                        <li class="list-group-item">Phone number: not set</li>
                        @endif
                        <li class="list-group-item">Company Name: {{ $employee->company->name }}</li>
                    </ul>
                    <div class="card-footer">
                        <small class="text-muted">Last updated {{ $employee->updated_at }}</small>
                    </div>
                </div>
            </div>
        <div class="col-6 col-md-4">
            <div class="card">
            <div class="card-header">
                Update Employee Informations
            </div>
                <div class="card-body">
                    <form method="post" action="">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="first_name" value="{{ $employee->first_name }}" aria-describedby="first_name" placeholder="Enter new first name">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="last_name" value="{{ $employee->last_name }}" placeholder="Enter last name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ $employee->email }}" placeholder="Enter new email address">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" value="{{ $employee->phone_number }}" id="phone_number" placeholder="Enter new phone number">
                        </div>
                        <div class="form-group">
                            <label for="company">Company</label>
                            <select class="form-control" id="company" name="company[]" multiple>
                                <option selected value="{{$employee->company_id}}">{{$employee->company->name}}</option>
                                @foreach ($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection