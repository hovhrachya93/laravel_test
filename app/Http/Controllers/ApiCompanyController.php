<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class ApiCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Company::get(), 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $filename = time() . str_replace([' ', ')', '('], '', $request->logo->getClientOriginalName());
        // $path = Storage::disk('public')->putFileAs('company', $request->logo, $filename);
        // $data = [
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'logo' => $path,
        //     'website' => $request->website,
        // ];

        $CompaniesData = Company::create($request->all());
        response()->json($CompaniesData, 201);
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // $filename = time() . str_replace([' ', ')', '('], '', $request->logo->getClientOriginalName());
        // $path = Storage::disk('public')->putFileAs('company', $request->logo, $filename);
        // $data = [
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'logo' => $path,
        //     'website' => $request->website,
        // ];
        return response()->json(Company::find($id)->update($request->all()), 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(Company::find($id)->delete(), 200);
    }
}
