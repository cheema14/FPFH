<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\CsoProfile;
use App\Models\Division;
use App\Models\District;
use App\Models\ExpertiseArea;
use App\Models\Activity;        
use App\Models\Facility;
use App\Models\WdcCollaboration;
use App\Models\CsoProfileSlot;


class CsoProfileController extends Controller
{
    public function showCompleteForm()
    {
        $profile = auth()->user()->csoProfile;
        $divisions = Division::all();
        $districts = District::all();
        $expertises = ExpertiseArea::all();
        $activities = Activity::all();         
        $facilities = Facility::all();
        $wdcCollaborations = WdcCollaboration::all();   
        $selectedDivisions = $profile->divisions->pluck('division_id')->toArray();
        $selectedDistricts = $profile->districts->pluck('district_id')->toArray();
        $selectedExpertises = $profile->expertiseAreas->pluck('expertise_area_id')->toArray();
        $selectedActivities = $profile->activities->pluck('activity_id')->toArray();
        $selectedFacilities = $profile->facilities->pluck('facility_id')->toArray();    
        // dd($selectedExpertises);
        // dd($selectedDivisions, $selectedDistricts);
        return view('profile.cso.complete', compact(
            'profile', 
            'divisions', 
            'districts', 
            'expertises', 
            'activities',
            'facilities',
            'selectedDivisions', 
            'selectedDistricts',
            'selectedExpertises',
            'selectedActivities',
            'selectedFacilities',
            'wdcCollaborations'
        ));
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
                'regex:/^\+92-\d{3}-\d{7}$/',
            ],
            'divisions' => 'required|array|min:1',
            'divisions.*' => 'exists:divisions,id',
            'districts' => 'required|array|min:1',
            'districts.*' => 'exists:districts,id',
            'expertises' => 'required|array|min:1', 
            'activities' => 'required|array|min:1',     
            'facilities' => 'required|array|min:1',
            'wdc_collaboration_id' => 'required|exists:wdc_collaborations,id',  
            'organization_name' => 'required|string|max:255',
        ];
        // dd($request->all());
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $profile = auth()->user()->csoProfile ?? new CsoProfile(['user_id' => auth()->id()]);
        if (!$profile->exists) {
            $profile->save();
        }
        
        // Prepare the data array
        $data = $request->only(['website', 'youtube', 'instagram', 'facebook', 'linkedin', 'organization_name']);
        
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
        $data['wdc_collaboration_id'] = $request->input('wdc_collaboration_id');

        // Update the profile
        $profile->update($data);

        // Delete existing relations
        $profile->divisions()->delete();
        $profile->districts()->delete();
        $profile->expertiseAreas()->delete();   
        $profile->activities()->delete();  
        $profile->facilities()->delete();
        // Create new division relations
        foreach ($request->input('divisions', []) as $divisionId) {
            $profile->divisions()->create([
                'division_id' => $divisionId
            ]);
        }

        // Create new district relations
        foreach ($request->input('districts', []) as $districtId) {
            $profile->districts()->create([
                'district_id' => $districtId
            ]);
        }

        // Create new expertise relations
        foreach ($request->input('expertises', []) as $expertiseId) {
            $profile->expertiseAreas()->create([
                'expertise_area_id' => $expertiseId
            ]);
        }
        foreach ($request->input('activities', []) as $activityId) {
            $profile->activities()->create([
                'activity_id' => $activityId
            ]);
        }   
        foreach ($request->input('facilities', []) as $facilityId) {
            $profile->facilities()->create([
                'facility_id' => $facilityId
            ]);
        }
        return redirect()
            ->route('cso.profile.complete')
            ->with('message', 'Profile updated successfully!');
    }

    public function show()
    {
        $profile = auth()->user()->csoProfile;
        $divisions = Division::all();
        $districts = District::all();
        $expertises = ExpertiseArea::all();             
        $activities = Activity::all();              
        $facilities = Facility::all();
        $wdcCollaborations = WdcCollaboration::all();   
        $selectedDivisions = $profile->divisions->pluck('division_id')->toArray();
        $selectedDistricts = $profile->districts->pluck('district_id')->toArray();
        $selectedExpertises = $profile->expertiseAreas->pluck('expertise_area_id')->toArray();
        $selectedActivities = $profile->activities->pluck('activity_id')->toArray();
        $selectedFacilities = $profile->facilities->pluck('facility_id')->toArray(); 
        $slots = CsoProfileSlot::where('cso_profiles_id', $profile->id)->get();   
        return view('profile.cso.show', compact(
            'profile', 
            'divisions', 
            'districts', 
            'expertises', 
            'activities',
            'facilities',
            'selectedDivisions', 
            'selectedDistricts',    
            'selectedExpertises',
            'selectedActivities',
            'selectedFacilities',
            'slots',
            'wdcCollaborations'
        ));
    }

    public function update(Request $request)
    {   
        // Add validation and profile update logic here
    }
} 