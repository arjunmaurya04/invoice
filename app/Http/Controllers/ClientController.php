<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\addclient;
use Validator;
class ClientController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required',
            'website_url' => 'required',
            'email' => 'required|email',
            'client_number' => 'required',
            'address' => 'required',
            'postalcode' => 'required',
            'gstno' => 'required',
            'discount' => 'required',
            'payment_term' => 'required',
        ]);
        error_log("kladjflakjd");
        $client_table = new addclient;
        $client_table->company_name = $request->company_name;
        $client_table->website_url = $request->website_url;
        $client_table->email = $request->email;
        $client_table->client_number = $request->client_number;
        $client_table->address = $request->address;
        $client_table->postalcode = $request->postalcode;
        $client_table->gstno = $request->gst;
        $client_table->discount = $request->discount;
        $client_table->payment_term = $request->payment_term;

        $client_table->save();

        return response('Update successful', 200);
    }

    public function show()
    {
        // Fetch all clients from the database
        $clients = addclient::paginate(10);

        // Return the clients as a JSON response
        return response()->json([
            'showclient' => $clients
        ]);
    }

    public function index()
    {
        return Addclient::all();
    }

}
