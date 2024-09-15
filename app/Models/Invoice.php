<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'invoice_number',
        'status',
        'date',
        'due_date',
        'ponumber',
        'igst',
        'sgst',
        'cgst',
        'amount',
    ];

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
