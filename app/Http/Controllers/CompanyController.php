<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyRequest;
use App\Models\Client;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = User::whereHas(
            'roles', function($q){
            $q->where('role', 'Client');
        }
        )->get();
        return view('companies.create', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = User::whereHas(
            'roles', function($q){
            $q->where('role', 'Client');
        }
        )->get();
        return view('companies.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCompanyRequest $request, company $company)
    {
        if($request->client != 'none') {

            $client = User::find($request->client);

            $newCompany = $company->create($request->except(['client']));

            $newCompany->clients()->save(new Client(['user_id'=>$client->id]));

            return back()->with('success', 'Big success ༼ つ ◕_◕ ༽つ');

        }
        $company->create($request->except('client'));
        return back()->with('success','Company created successfully!');
    }


    public function attach(company $company) {
        $clients = User::whereHas(
            'roles', function($q){
            $q->where('role', 'Client');
        }
        )->get();
        $companies = $company->all();
        return view('companies.attach', compact('clients', 'companies'));
    }

    public function attachment(Request $request, company $company)
    {
        // Check if user already is attached to a company
        $getCompany = Client::where('user_id', $request->client)->where('company_id', $request->company)->first();
        if (!empty($getCompany)) {
            return back()->with('warning', 'Already in a relationship (╯°□°）╯︵ ┻━┻ ');
        } else {
            // create new relationship
            $companyX = $company->find($request->company);
            $companyX->clients()->save(new Client(['user_id' => $request->client, 'company_id', $request->company]));
            return back()->with('success', 'Big success (⌐■_■)');
        }

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
