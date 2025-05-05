<?php

namespace App\Http\Controllers\Admin;

use App\Models\Application;
use App\Models\District;
use App\Models\Division;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController
{
    public function index()
    {

        $districts = District::all()->pluck('name');
        $districts = District::leftJoin('applications', 'districts.id', '=', 'applications.current_district')
            ->select('districts.name as district', DB::raw('COUNT(applications.id) as total_applications'))
            ->where('applications.status', 1)
            ->where('applications.declaration', 1)
            ->groupBy('districts.name')
            ->orderBy('districts.name')
            ->get();

        $divisions = Division::all()->pluck('name');
        $divisions = Division::leftJoin('applications', 'divisions.id', '=', 'applications.current_division')
            ->select('divisions.name as division', DB::raw('COUNT(applications.id) as total_applications'))
            ->where('applications.status', 1)
            ->where('applications.declaration', 1)
            ->groupBy('divisions.name')
            ->orderBy('divisions.name')
            ->get();

        $total_registered_user = User::whereNotNull('email_verified_at')->whereNotNull('approved_at')->count();
        $total_submitted_applications = Application::where('declaration', 1)->where('status', 1)->count();

        $maleApplications = Application::where('gender', '0')->where('declaration', 1)->where('status', 1)->count();
        $femaleApplications = Application::where('gender', '1')->where('declaration', 1)->where('status', 1)->count();
        $otherApplications = Application::where('gender', '2')->where('declaration', 1)->where('status', 1)->count();
        $marriedApplications = Application::where('marital_status', '0')->where('declaration', 1)->where('status', 1)->count();
        $unmarriedApplications = Application::where('marital_status', '1')->where('declaration', 1)->where('status', 1)->count();

        return view('home',
            [
                'districts' => $districts,
                'divisions' => $divisions,
                'total_registered_user' => $total_registered_user,
                'total_submitted_applications' => $total_submitted_applications,
                'maleApplications' => $maleApplications,
                'femaleApplications' => $femaleApplications,
                'otherApplications' => $otherApplications,
                'marriedApplications' => $marriedApplications,
                'unmarriedApplications' => $unmarriedApplications,
            ]
        );
    }
}
