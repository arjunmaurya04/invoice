<?php

namespace App\Http\Controllers;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class InvoiceController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'client_id' => 'required|exists:addclients,id',
            'invoice_number' => 'required|string|max:255',
            'status' => 'required|string',
            'date' => 'required|date',
            'due_date' => 'required|date',
            'ponumber' => 'required|numeric|',
            'igst' => 'required|numeric',
            'sgst' => 'required|numeric',
            'cgst' => 'required|numeric',
            'amount' => 'required|numeric',
            'items' => 'required|array',
            'items.*.service_id' => 'required|exists:addservices,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unitprice' => 'required|numeric|min:0',
        ]);

        // Store the invoice in the database
        $invoice = Invoice::create([
            'client_id' => $validatedData['client_id'],
            'invoice_number' => $validatedData['invoice_number'],
            'status' => $validatedData['status'],
            'date' => $validatedData['date'],
            'due_date' => $validatedData['due_date'],
            'ponumber' => $validatedData['ponumber'],
            'igst' => $validatedData['igst'],
            'sgst' => $validatedData['sgst'],
            'cgst' => $validatedData['cgst'],
            'amount' => $validatedData['amount'],
        ]);

        // Store the invoice items in the database
        foreach ($validatedData['items'] as $item) {
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'service_id' => $item['service_id'],
                'quantity' => $item['quantity'],
                'unitprice' => $item['unitprice'],
                'total_price' => $item['unitprice'] * $item['quantity'],
            ]);
        }

        return response()->json(['message' => 'Invoice created successfully', 'invoice' => $invoice], 201);
    }
}
