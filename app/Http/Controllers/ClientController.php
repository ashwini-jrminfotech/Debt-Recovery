<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function create()
    {
        return view('clients.create'); 
    }

    public function store(Request $request)
    {
        // Validate Inputs
        $data = $request->validate([
            'fullName'        => 'required|string|max:255',
            'contactNumber'   => 'required|string|max:20',
            'email'           => 'required|email|max:255',
            'altMobile'       => 'nullable|string|max:20',
            'address'         => 'required|string',
            'city'            => 'required|string|max:100',
            'state'           => 'required|string|max:100',
            'pincode'         => 'required|string|max:10',

            'clientType'      => 'required|in:individual,business',
            'source'          => 'required|in:direct,agent,website,referral',
            'agent'           => 'nullable|string|max:100',
            'gst'             => 'nullable|string|max:20',

            'caseCategory'    => 'required|string|max:50',
            'amount'          => 'required|numeric|min:0',
            'caseDesc'        => 'required|string',
            'method'          => 'required|in:Legal,Soft Recovery,Both',
            'urgency'         => 'required|in:Low,Medium,High',

            'assignedTo'      => 'required|string|max:100',
            'caseStage'       => 'required|in:New,Under Review,Approved',
            'remarks'         => 'nullable|string',

            'files.*'         => 'nullable|file|mimes:jpg,png,pdf,doc,docx|max:10240'
        ]);

        // Handle uploaded files
        $uploadedFiles = [];  // IMPORTANT FIX

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('uploads', 'public');  
                $uploadedFiles[] = $path;
            }
        }

        // Save Client Data
        Client::create([
            'full_name'        => $data['fullName'],
            'contact_number'   => $data['contactNumber'],
            'email'            => $data['email'],
            'alt_mobile'       => $data['altMobile'] ?? null,
            'address'          => $data['address'],
            'city'             => $data['city'],
            'state'            => $data['state'],
            'pincode'          => $data['pincode'],

            'client_type'      => $data['clientType'],
            'source'           => $data['source'],
            'agent'            => $data['agent'] ?? null,
            'gst_number'       => $data['gst'] ?? null,

            'case_category'    => $data['caseCategory'],
            'expected_amount'  => $data['amount'],
            'case_description' => $data['caseDesc'],
            'preferred_method' => $data['method'],
            'urgency_level'    => $data['urgency'],

            'documents'        => json_encode($uploadedFiles),  // FIXED: must be JSON
            'assigned_to'      => $data['assignedTo'],
            'case_stage'       => $data['caseStage'],
            'internal_remarks' => $data['remarks'] ?? null
        ]);

        // Flash notification data for header
        session()->flash('new_client_notification', [
            'name' => $data['fullName'],
            'message' => 'Successfully Registered'
        ]);

        return redirect()->back()->with('success', 'Client case submitted successfully!');
    }
}
