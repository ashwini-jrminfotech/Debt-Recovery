<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name', 'contact_number', 'email', 'alt_mobile', 'address', 'city', 'state', 'pincode',
        'client_type', 'source', 'agent', 'gst_number',
        'case_category', 'expected_amount', 'case_description', 'preferred_method', 'urgency_level',
        'documents', 'assigned_to', 'case_stage', 'internal_remarks'
    ];

    protected $casts = [
        'documents' => 'array',
    ];
}
