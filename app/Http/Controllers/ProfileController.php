<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UniversityProfile;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function showCompleteForm()
    {
        $profile = auth()->user()->universityProfile;
        return view('profile.complete', compact('profile'));
    }

    public function complete(Request $request)
    {
        $rules = [
            'website' => 'required|url',
            'youtube' => 'required|url',
            'instagram' => 'required|url',
            'facebook' => 'required|url',
            'linkedin' => 'required|url',
            'focal_person_contact' => [
                'required',
                'string',
                'regex:/^\+92-\d{3}-\d{7}$/'
            ],
            'activity_preference' => 'required|string',
        ];

        $request->validate($rules);

        // Get or create university profile
        $profile = auth()->user()->universityProfile ?? new UniversityProfile(['user_id' => auth()->id()]);
        if (!$profile->exists) {
            $profile->save();
        }
        
        // Prepare the data array
        $data = $request->only(['website', 'youtube', 'instagram', 'facebook', 'linkedin', 'activity_preference']);
        
        // Convert and add focal person contact
        if ($request->filled('focal_person_contact')) {
            $cleanNumber = preg_replace('/[^0-9]/', '', $request->focal_person_contact);
            $data['focal_person_contact'] = $cleanNumber; // Store as string to prevent integer overflow
        }

        // Handle document upload if present
        if ($request->hasFile('registration_document')) {
            if ($profile->registration_document) {
                Storage::delete('public/' . $profile->registration_document);
            }
            $data['registration_document'] = $request->file('registration_document')
                ->store('documents', 'public');
        }

        // Debug information
        \Log::info('Profile update data:', $data);
        
        // Update the profile
        $updated = $profile->update($data);
        
        // Debug information
        \Log::info('Profile update success:', ['updated' => $updated]);

        return redirect()
            ->route('profile.complete')
            ->with('message', 'Profile updated successfully!');
    }

    public function show()
    {
        $profile = auth()->user()->universityProfile;
        return view('profile.show', compact('profile'));
    }
} 