<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function show_complaint_form(Request $request)
    {
        $divisions = Division::all();
        $districts = District::all();

        return view('admin.complaints.create', compact('divisions', 'districts'));
    }

    public function store_complaint(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:100|regex:/^[A-Za-z\s]+$/',
            'father_name' => 'required|string|max:100|regex:/^[A-Za-z\s]+$/',
            'contact_number' => 'required|max:13|regex:/^03[0-9]{2}-[0-9]{7}$/',
            'cnic' => 'required|string|min:15|max:15',
            'email' => 'required|email|max:255',
            'division' => 'required|string|max:30',
            'district' => 'required|string|max:30',
            'feedback' => 'required|string|min:25|max:2000',
        ], [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a valid string.',
            'name.max' => 'The name must not exceed 100 characters.',

            'father_name.string' => 'The father name must be a valid string.',
            'father_name.max' => 'The father name must not exceed 100 characters.',

            'contact_number.required' => 'The contact number is required.',
            'contact_number.numeric' => 'The contact number must be a valid number.',
            'contact_number.digits_between' => 'The contact number must be between 10 and 15 digits.',

            'cnic.required' => 'CNIC is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'The email must not exceed 255 characters.',

            'division.required' => 'The division field is required.',
            'division.string' => 'The division must be a valid string.',
            'division.max' => 'The division must not exceed 255 characters.',

            'district.required' => 'The district field is required.',
            'district.string' => 'The district must be a valid string.',
            'district.max' => 'The district must not exceed 255 characters.',

            'feedback.required' => 'The feedback field is required.',
            'feedback.string' => 'The feedback must be a valid string.',
            'feedback.min' => 'The feedback must be at least 25 characters long.',
            'feedback.max' => 'The feedback must not exceed 2000 characters.',
        ]);

        // Remove hyphen from the contact number
        $contact_number = str_replace('-', '', $request->input('contact_number')); // Remove hyphen

        // Add the sanitized contact number to the request data
        $request->merge(['contact_number' => $contact_number]);

        $complaint_feedback = Complaint::create($request->all());

        if (! $complaint_feedback) {
            return redirect()->back()->with('failed', 'There was an error submitting your complaint. Try again!')->withInput();
        }

        return redirect()->back()->with('success', 'Your Complaint submitted successfully.');
    }
}
