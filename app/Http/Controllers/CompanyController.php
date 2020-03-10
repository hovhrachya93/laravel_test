<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function submit(CompanyRequest $req)
    {
        $company = new Company();
        $company->name = $req->input('name');
        $company->email = $req->input('email');
        $filename = time() . str_replace([' ', ')', '('], '', $req->logo->getClientOriginalName());
        $path = Storage::disk('public')->putFileAs('company', $req->logo, $filename);
        $company->logo = $path;
        $company->website = $req->input('website');
        $company->save();
        return redirect()->route('companies');
    }

    public function getData()
    {
        $company = new Company();
        return view('companies', ['data' => DB::table('companies')->paginate(2)]);
    }

    public function rename($id)
    {
        $company = new Company();
        return view('renameCompany', ['data' => $company->find($id)]);
    }

    public function update($id, CompanyRequest $req)
    {
        $company = Company::findOrFail($id);
        $company->name = $req->input('name');
        $company->email = $req->input('email');
        if ($req->hasFile('logo')) {
            $filename = time() . str_replace([' ', ')', '('], '', $req->logo->getClientOriginalName());
            $path = Storage::disk('public')->putFileAs('company', $req->logo, $filename);
            $company->logo = $path;
        }
        $company->website = $req->input('website');
        $company->update();
        return redirect()->route('companies');
    }

    public function delete($id)
    {
        Company::find($id)->delete();
        return redirect()->route('companies');
    }


}
