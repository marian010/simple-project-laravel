@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Companies</div>
                    <div class="card-body">
                        <a href="{{ route('company.create') }}" class="mb-3 btn btn-success">Create new company</a>
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
                                    <td><img style="max-height:100%; max-width:100%" class="rounded-circle" src="{{ asset('/storage/logos/' . $company->logo) }}"></td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->website }}</td>
                                    <td>{{ $company->email }}</td>
                                    <th><a href="{{ route('company.edit', $company->id) }}" class="btn btn-light btn-sm">Edit</a><br>
                                    <form method="POST" action="{{ route('company.destroy', $company->id) }}">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Delete" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                                    </form>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    {!! $companies->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
