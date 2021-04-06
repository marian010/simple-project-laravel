@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new company</div>

                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="companyName">Company Name</label>
                            <input type="text" name="companyName" class="form-control" id="companyName" aria-describedby="companyName" placeholder="Enter company name">
                        </div>
                        <div class="form-group">
                            <label for="companyEmail">Company Email Address</label>
                            <input type="email" name="companyEmail" class="form-control" id="companyEmail" placeholder="Enter company email address">
                        </div>
                        <div class="form-group">
                            <label for="companyWebsite">Company Website</label>
                            <input type="text" name="companyWebsite" class="form-control" id="companyWebsite" placeholder="Enter company website">
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