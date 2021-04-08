@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <p class="card-text">You are logged in as {{ Auth::user()->name }}</p>
                    <p class="card-text">There are {{ App\Company::count() }} companies and {{ App\Employee::count() }} employers</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
