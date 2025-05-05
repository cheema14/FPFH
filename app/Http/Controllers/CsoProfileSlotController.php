<?php

namespace App\Http\Controllers;

use App\Models\CsoProfileSlot;
use Illuminate\Http\Request;

class CsoProfileSlotController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cso_profiles_id' => 'required|exists:cso_profiles,id',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
        ]);

        // Check for overlapping date slots
        $overlappingSlots = CsoProfileSlot::where('cso_profiles_id', $request->cso_profiles_id)
            ->where(function($query) use ($request) {
                $query->whereBetween('from_date', [$request->from_date, $request->to_date])
                      ->orWhereBetween('to_date', [$request->from_date, $request->to_date])
                      ->orWhere(function($query) use ($request) {
                          $query->where('from_date', '<=', $request->from_date)
                                ->where('to_date', '>=', $request->to_date);
                      });
            })
            ->exists();

        if ($overlappingSlots) {
            return response()->json(['message' => 'Error: Date slots overlap.'], 400);
        }

        CsoProfileSlot::create($request->all());

        return response()->json(['message' => 'Date slot added successfully.']);
    }

    public function index($profileId)
    {
        $slots = CsoProfileSlot::where('profile_id', $profileId)->get();
        return response()->json($slots);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
        ]);

        $slot = CsoProfileSlot::findOrFail($id);
        $slot->update($request->only(['from_date', 'to_date']));

        return response()->json(['message' => 'Date slot updated successfully.']);
    }

    public function destroy($id)
    {
        $slot = CsoProfileSlot::findOrFail($id);
        $slot->delete();

        return response()->json(['message' => 'Date slot deleted successfully.']);
    }
} 