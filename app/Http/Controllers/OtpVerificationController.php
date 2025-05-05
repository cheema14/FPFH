<?php

namespace App\Http\Controllers;

use App\Mail\OtpVerificationMail;
use App\Models\OtpVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class OtpVerificationController extends Controller
{
    public function showForm()
    {
        return view('auth.otp_verification');
    }

    // Verify the OTP entered by the user
    public function verify(Request $request)
    {
        // Validate OTP input
        $request->validate([
            'otp' => 'required|numeric|digits:4', // Validate as 4-digit numeric
        ]);

        // Check if OTP matches in the database and is still valid
        $otpVerification = OtpVerification::where('user_id', auth()->id())
            ->where('otp', $request->otp)
            ->where('expires_at', '>', now())
            ->first();

        if (!$otpVerification) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP']);
        }

        // OTP is valid, mark the user as verified
        $user = auth()->user();
        $user->email_verified_at = now();
        $user->save();

        // Delete OTP verification record after successful verification
        $otpVerification->delete();

        // Redirect to the homepage or any other desired page after verification
        return redirect()->route('home');
    }

    public function verifyOtpForm($encryptedUserId)
    {
        try {
            // Decrypt user_id
            $userId = Crypt::decrypt($encryptedUserId);
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['error' => 'Invalid verification link.']);
        }

        // Check if user exists
        $user = User::find($userId);
        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'User not found.']);
        }

        // Show OTP verification form (you can pass the user ID if needed)
        return view('auth.otp_verification', compact('userId'));
    }

    public function verifyOtp(Request $request)
    {
        // Validate the OTP input
        $request->validate([
            'otp' => 'required|digits:4'
        ]);

        // Get the user_id and OTP entered by the user
        $userId = Crypt::decrypt($request->user_id);  // Decrypt the user_id
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'User not found.']);
        }

        // Retrieve the OTP record for this user
        $otpVerification = OtpVerification::where('user_id', $user->id)->latest()->first();

        // Check if the OTP is valid and hasn't expired
        if ($otpVerification && $otpVerification->otp == $request->otp && $otpVerification->expires_at > now()) {
            // Mark the user's email as verified
            $user->email_verified_at = now();
            $user->save();

            // Optionally, delete the OTP record or keep it as you wish
            $otpVerification->delete();

            // Redirect the user to login page or dashboard
            return redirect()->route('login')->with('message', 'Your email has been verified. You can now log in.');
        }

        return redirect()->back()->withErrors(['otp' => 'Invalid or expired OTP.']);
    }
    public function resendOtp(Request $request)
    {
        // Validate the user_id passed in the form
        $request->validate([
            'user_id' => 'required|string',
        ]);

        try {
            // Decrypt user_id from the URL
            $userId = Crypt::decrypt($request->user_id);
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['error' => 'Invalid verification link.']);
        }

        // Find the user
        $user = User::find($userId);
        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'User not found.']);
        }

        // Generate a new OTP (4 digits)
        $otp = rand(1000, 9999);
        $expiresAt = now()->addMinutes(10);  // OTP expires in 10 minutes

        // Check if an OTP already exists for this user and update it
        $otpVerification = OtpVerification::where('user_id', $user->id)->latest()->first();

        if ($otpVerification) {
            // Update OTP and expiration time
            $otpVerification->update([
                'otp' => $otp,
                'expires_at' => $expiresAt
            ]);
        } else {
            // Create a new OTP record if it doesn't exist
            OtpVerification::create([
                'user_id' => $user->id,
                'otp' => $otp,
                'expires_at' => $expiresAt
            ]);
        }

        // Send the OTP verification email
        $verificationUrl = route('verify-otp', ['user_id' => Crypt::encrypt($user->id)]);
        Mail::to($user->email)->send(new OtpVerificationMail($otp, $verificationUrl));

        // Redirect back to OTP verification screen with success message
        return redirect()->route('verify-otp', ['user_id' => $request->user_id])->with('message', 'A new OTP has been sent to your email.');
    }
}
