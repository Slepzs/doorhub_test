<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $isUserClient = Client::where('user_id', Auth::user()->id)->get();
         if(!empty($isUserClient)) {
             $attachedCompanies = [];
             foreach ($isUserClient as $client) {
                 $company = company::find($client->company_id)->first();
                 array_push($attachedCompanies, $company);
             }
             return view('home', compact('attachedCompanies'));
         } else {
             return view('home');
         }








    }
}
