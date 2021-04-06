<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    public function create(Request $request)
    {
        $company = Company::create([
            'name' => $request->input('companyName'),
            'email' => $request->input('companyEmail'),
            'website' => $request->input('companyWebsite')
        ]);

        if (request()->hasFile('companyLogo')) {
            $logo = request()->file('companyLogo')->getClientOriginalName();
            request()->file('companyLogo')->storeAs('logos', $logo, '');
            $company->update(['logo' => $logo]);
        }

        return redirect()->route('home');
    }

    public function index()
    {
        return view('company.create');
    }
}
