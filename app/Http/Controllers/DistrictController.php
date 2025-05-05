<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Tehsil;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function getDistrictsByDivisions(Request $request)
    {
        $divisions = $request->input('divisions', []);

        $districts = District::whereIn('division_id', $divisions)
            ->orderBy('name')
            ->get();

        return response()->json($districts);
    }

    public function getDistricts($divisionId)
    {
        $districts = District::where('division_id', $divisionId)->get();

        return response()->json($districts);
    }

    public function getTehsils($districtId)
    {
        $tehsils = Tehsil::where('district_idFk', $districtId)->get();

        return response()->json($tehsils);
    }
}
