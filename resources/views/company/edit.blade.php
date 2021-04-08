@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header">Company Informations</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h5>{{ $company->name }}</h5>
                            </div>
                            <div class="col-6">
                                <img src="{{asset('/storage/logos/' . $company->logo) }}" style="max-height:100%; max-width:100%" class="rounded-circle">
                            </div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Company Email: <b>{{ $company->email }}</b></li>
                        <li class="list-group-item">Company Website: <b>{{ $company->website }}</b></li>
                    </ul>
                    <div class="card-footer">
                        <small class="text-muted">Last updated {{ $company->updated_at }}</small>
                    </div>
                </div>
            </div>
        <div class="col-6 col-md-4">
            <div class="card">
            <div class="card-header">
                Update Company Informations
            </div>
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="companyName">Company Name</label>
                            <input type="text" name="companyName" class="form-control" id="companyName" aria-describedby="companyName" placeholder="Enter new company name">
                        </div>
                        <div class="form-group">
                            <label for="companyEmail">Company Email Address</label>
                            <input type="email" name="companyEmail" class="form-control" id="companyEmail" placeholder="Enter new company email address">
                        </div>
                        <div class="form-group">
                            <label for="companyWebsite">Company Website</label>
                            <input type="text" name="companyWebsite" class="form-control" id="companyWebsite" placeholder="Enter new company website">
                        </div>
                        <div class="form-group">
                            <label for="companyLogo">Company Logo</label>
                            <input type="file" name="companyLogo" class="form-control-file" id="companyLogo">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection