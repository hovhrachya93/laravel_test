<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = DB::table('companies')->paginate(2);
        return view('companies.index', ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename = time() . str_replace([' ', ')', '('], '', $request->logo->getClientOriginalName());
        $path = Storage::disk('public')->putFileAs('company', $request->logo, $filename);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $path,
            'website' => $request->website,
        ];

        Company::create($data);
        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = new Company();
        return view('companies.edit', ['company' => $company->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = new Company();
        return view('companies.edit', ['company' => $company->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $filename = time() . str_replace([' ', ')', '('], '', $request->logo->getClientOriginalName());
        $path = Storage::disk('public')->putFileAs('company', $request->logo, $filename);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $path,
            'website' => $request->website,
        ];

        Company::whereId($id)->update($data);
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::find($id)->delete();
        return redirect()->route('companies.store');
    }
}
