<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use DB;

class CompanyController extends Controller
{
    public function viewCompanies()
    {
        $companies = Company::paginate(10);

        return view('company.list', compact('companies'));
    }
    
    public function viewCreateCompany()
    {
        return view('company.create');
    }
    
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

        return redirect()->route('company.list');
    }

    public function viewEditPage($id)
    {
        $company = Company::findOrFail($id);

        return view('company.edit', compact('company'));
    }


    public function destroy(Company $company, $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return view('home');
    }
}
