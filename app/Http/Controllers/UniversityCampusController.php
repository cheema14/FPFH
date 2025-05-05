<?php

namespace App\Http\Controllers;

use App\Models\UniversityCampus;
use Illuminate\Http\Request;

class UniversityCampusController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'campus_name' => 'required|string|max:255',
            'campus_address' => 'required|string'
        ]);

        $campus = auth()->user()->universityProfile->campuses()->create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Campus added successfully',
            'campus' => $campus
        ]);
    }

    public function update(Request $request, UniversityCampus $campus)
    {
        $request->validate([
            'campus_name' => 'required|string|max:255',
            'campus_address' => 'required|string'
        ]);

        $campus->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Campus updated successfully',
            'campus' => $campus
        ]);
    }

    public function destroy(UniversityCampus $campus)
    {
        $campus->delete();

        return response()->json([
            'success' => true,
            'message' => 'Campus deleted successfully'
        ]);
    }
}