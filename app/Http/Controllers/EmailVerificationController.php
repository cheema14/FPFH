<?php

namespace App\Http\Controllers;

use App\Models\User;
use DB;

class EmailVerificationController extends Controller
{
    public function verify($userId)
    {
        // Find the user by ID
        $user = User::findOrFail($userId);

        // Check if the user's email is already verified
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('login')->with('status', 'Email is already verified.');
        }

        // Mark the user's email as verified
        $user->markEmailAsVerified();

        // Update the approved_at field
        $user->approved_at = now();

        // update the email_verified_at column to
        // handle the verification emails
        $user->email_verified_at = now();
        $user->is_approved = 1;
        $user->save();

        // Now as the email has been verified
        // Now we will create a row inside our `second_acknowledgement_checks`
        // And will use it before loading the applicant_form

        $second_acknowledgement_checks = DB::table('second_acknowledgement_checks')->insert([
            'user_id' => $user->id,
            'punjab_resident' => false,
            'same_district_application' => false,
            'no_plot_associated' => false,
            'not_blacklisted' => false,
            'no_criminal_record' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect to the login page without logging in
        return redirect()->route('login')->with('status', '<strong>Email Verification Successful!</strong> Your email has been successfully verified.<br>'.
            'Please log in to your account to continue creating your application.');
    }
}
