@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Employees</div>
                    <div class="card-body">
                        <a href="{{ route('employee.create') }}" class="mb-3 btn btn-success">Add new employee</a>
                            <table class="table table-bordered">
                                <thead>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Company</th>
                                    <th></th>
                                </thead>
                            <tbody>
                            @foreach ($employes as $employe)
                                <tr>
                                    <td>{{ $employe->first_name }}</td>
                                    <td>{{ $employe->last_name }}</td>
                                    <td>{{ $employe->email }}</td>
                                    <td>{{ $employe->phone_number }}</td>
                                    <td>{{ $employe->company->name }}</td>
                                    <th><a href="{{ route('employee.edit', $employe->id) }}" class="btn btn-light btn-sm">Edit</a><br>
                                    <form method="POST" action="{{ action('Employee\EmployeeController@destroy', $employe->id) }}">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Delete" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                                    </form>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    {!! $employes->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection