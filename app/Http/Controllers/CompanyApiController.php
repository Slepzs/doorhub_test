<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyApiController extends Controller
{

    public function index()
    {
        return response()->json(Company::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $company = Company::create($request->all());
        return response()->json($company, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $company
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Company $company)
    {
        return response()->json($company);
    }



    // admin resource
    public function clients(Company $company)
    {
        $company = Company::where('companyName', $company)->clients();
        return response()->json($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $company
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Company $company)
    {
        $company = Company::findOrFail($company);
        $company->update($request->all());
        return response()->json($company, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
