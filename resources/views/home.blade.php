@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Companies</div>

                <div class="card-body">
                    <a href="{{ route('company.create') }}" class="mb-3 btn btn-success">Create new company</a>
                    <div class="card">
                        <div class="card-header">
                            Companies list
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Website</th>
                                    <th>Email</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                @foreach ($companies as $company)
                                    <tr>
                                        <td><img style="max-height:100%; max-width:100%" src="{{ asset('/storage/logos/' . $company->logo) }}"></td>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->website }}</td>
                                        <td>{{ $company->email }}</td>
                                        <th><a href="{{ route('company.edit', $company->id) }}" class="btn btn-light btn-sm">Edit</a><br><a href="javaascript:void(0)" class="btn btn-danger btn-sm">Delete</a></th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
