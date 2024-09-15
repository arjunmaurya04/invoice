<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\addservice;
class AddServiceController extends Controller
{
    public function storeser(Request $request)
    {
        $data = $request->validate([
            'service_name' => 'required',
            'hsn' => 'required',
            'service_description' => 'required',
        ]);
        error_log("kladjflakjd");
        $service_table = new addservice;
        $service_table->service_name = $request->service_name;
        $service_table->hsn = $request->hsn;
        $service_table->service_description = $request->service_description;

        $service_table->save();

        return response('Update successful', 200);
    }

    public function showser()
    {
        // Fetch all clients from the database
        $service = addservice::all();

        // Return the clients as a JSON response
        return response()->json([
            'servicelist' => $service
        ]);
    }

    public function index()
    {
        return Addservice::all();
    }
}
