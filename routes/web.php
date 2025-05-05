<?php

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\CsoProfileController;
use App\Http\Controllers\CsoProfileSlotController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\NadraApiController;
use App\Http\Controllers\OtpVerificationController;
use App\Http\Controllers\PmdApiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UniversityCampusController;

// dd(! app()->environment('local'));
if (! app()->environment(['local', 'staging', 'production'])) {
    Route::any('/{any}', function () {
        return view('partials.coming_soon');
    })->where('any', '.*');
}
Route::get('/testVerification', function () {
    return view('emails.verification');
});

Route::get('/', function () {
    return view('welcome'); // Redirect to the welcome blade
})->name('welcome');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
})->middleware('prevent-back-history');

Route::get('/test-sms', [ApplicationController::class, 'test_sms'])->name('testSms');

Auth::routes(['register' => true, 'verify' => true]);
Route::get('otp/verify', [OtpVerificationController::class, 'showForm'])->name('otp.verify');
Route::post('otp/verify', [OtpVerificationController::class, 'verify'])->name('otp.verify.submit');
Route::get('/verify-otp/{user_id}', [OtpVerificationController::class, 'verifyOtpForm'])->name('verify-otp');
Route::post('/verify-otp', [OtpVerificationController::class, 'verifyOtp'])->name('verify-otp.post');
Route::post('/resend-otp', [OtpVerificationController::class, 'resendOtp'])->name('otp.resend');

Route::post('/resend-verification-email', [UsersController::class, 'resend_verification_email'])->name('resend-verification-email');

// Route::get('admin/{users}/{id}', [UsersController::class, 'show'])->name('users.show');
Route::group(['prefix' => 'home', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'profile.complete', 'prevent-back-history']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Other admin routes that require profile completion

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::get('users/{type}', [UsersController::class, 'index'])->name('users.type');
    Route::get('users/{type}/{id}', [UsersController::class, 'show'])->name('user.details.show');
    Route::post('users/{user}/approve', 'UsersController@approve')->name('users.approve');
    Route::resource('users', 'UsersController');

    // Add this route for viewing a specific user
    Route::get('users/{user}', [UsersController::class, 'show'])->name('users.show');

    // Watch
    Route::delete('watches/destroy', 'WatchController@massDestroy')->name('watches.massDestroy');
    Route::resource('watches', 'WatchController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    Route::get('/applications/all', [ApplicationController::class, 'index'])->name('applications.all'); // Ensure you have the appropriate middleware for authorization
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', 'prevent-back-history']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

Route::group(['middleware' => ['auth', 'prevent-back-history']], function () {
    Route::get('/profile/complete', [ProfileController::class, 'showCompleteForm'])->name('profile.complete');
    Route::post('/profile/complete', [ProfileController::class, 'complete'])->name('profile.complete.submit');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    // CSO Profile Routes
    Route::get('/cso/profile/complete', [CsoProfileController::class, 'showCompleteForm'])->name('cso.profile.complete');
    Route::post('/cso/profile/complete', [CsoProfileController::class, 'complete'])->name('cso.profile.complete.submit');
    Route::get('/cso/profile', [CsoProfileController::class, 'show'])->name('cso.profile.show');
    Route::put('/cso/profile', [CsoProfileController::class, 'update'])->name('cso.profile.update');

    Route::post('/campus', [UniversityCampusController::class, 'store'])->name('campus.store');
    Route::put('/campus/{campus}', [UniversityCampusController::class, 'update'])->name('campus.update');
    Route::delete('/campus/{campus}', [UniversityCampusController::class, 'destroy'])->name('campus.destroy');
    Route::get('/applicant-form', [ApplicationController::class, 'showForm'])->name('applicant.form');

    Route::post('/applicant-store', [ApplicationController::class, 'store'])->name('applicant.store');
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('/applications/{encryptedId}', [ApplicationController::class, 'show'])->name('applications.show');
    Route::post('/applicant/file-upload-applicant-picture', [ApplicationController::class, 'uploadPicture'])->name('applicant.file.upload.applicant.picture');
    Route::post('/applicant/file-upload-cnic-front', [ApplicationController::class, 'uploadCnicFront'])->name('applicant.file.upload.cnic.front');
    Route::post('/applicant/file-upload-cnic-back', [ApplicationController::class, 'uploadCnicBack'])->name('applicant.file.upload.cnic.back');
    Route::post('/applicant/file-upload-spouse-cnic-front', [ApplicationController::class, 'uploadSpouseCnicFront'])->name('applicant.file.upload.spouse.cnic.front');
    Route::post('/applicant/file-upload-spouse-cnic-back', [ApplicationController::class, 'uploadSpouseCnicBack'])->name('applicant.file.upload.spouse.cnic.back');
    Route::post('/applicant/file-upload-proof-of-income', [ApplicationController::class, 'uploadProofOfIncome'])->name('applicant.file.upload.proof.of.income');
    Route::post('/applicant/file-upload-rent-agreement', [ApplicationController::class, 'uploadRentAgreement'])->name('applicant.file.upload.rent.agreement');
    Route::post('/applicant/file-upload-other-documents', [ApplicationController::class, 'uploadOtherDocuments'])->name('applicant.file.upload.other.documents');
    Route::post('/applicant/file-upload-domicile', [ApplicationController::class, 'uploadDomicile'])->name('applicant.file.upload.domicile');
    Route::post('/applicant/file-upload-affidavit', [ApplicationController::class, 'uploadAffidavit'])->name('applicant.file.upload.affidavit');
    Route::delete('/applicant/delete-file', [ApplicationController::class, 'deleteFile'])->name('applicant.delete.file');

    // Store second acknowledgement checks
    Route::post('/store-second-checks', [ApplicationController::class, 'store_second_checks'])->name('storeSecondChecks');

    // Nadra API - Initially for testing
    Route::get('/verify/nadra/{cnic}', [NadraApiController::class, 'test_nadra'])->name('testNadra');
    Route::get('/verify/pmd/{cnic}', [PmdApiController::class, 'test_pmd'])->name('testPmd');
});

Route::post('api/districts-by-divisions', [DistrictController::class, 'getDistrictsByDivisions'])
    ->name('api.districts.by.divisions');

Route::post('/cso/profile/slots/store', [CsoProfileSlotController::class, 'store'])->name('cso.profile.slots.store');
Route::get('/cso/profile/{profileId}/slots', [CsoProfileSlotController::class, 'index'])->name('cso.profile.slots.index');
Route::put('cso/profile/slots/{slot}', [CsoProfileSlotController::class, 'update'])->name('cso.profile.slots.update');
Route::delete('cso/profile/slots/{slot}', [CsoProfileSlotController::class, 'destroy'])->name('cso.profile.slots.destroy');

Route::get('verify-email/{user}', [EmailVerificationController::class, 'verify'])->name('verify-email');

Route::post('application/submit', [ApplicationController::class, 'submit'])->name('application.submit');

// Route::get('/test-captcha', function () {
//     return captcha_img(); // This will return the CAPTCHA image directly
// });

Route::get('/get-districts/{divisionId}', [DistrictController::class, 'getDistricts']);
Route::get('/get-tehsils/{districtId}', [DistrictController::class, 'getTehsils']);

// Route for eligibility
Route::get('/eligibility', function () {
    return view('eligibility'); // Return the eligibility view
})->name('eligibility');

// Route for district-quota
Route::get('/district-quota', function () {
    return view('district-quota'); // Return the district-quota view
})->name('district.quota');

// Route for About Us
Route::get('/about-us', function () {
    return view('about'); // Return the About Us view
})->name('about');

Route::get('/about-phata', function () {
    return view('about-phata'); // Return the About Us view
})->name('about-phata');

Route::get('/how-to-apply', function () {
    return view('how-to-apply'); // Return the About Us view
})->name('how-to-apply');

// Route for viewing file - encrypted way

Route::get('/secure-file/{encrypted}', function (Request $request, $encrypted) {
    try {
        $decryptedPath = Crypt::decryptString($encrypted);
        if (! Storage::disk('public')->exists($decryptedPath)) {
            abort(404); // File not found
        }

        $filePath = Storage::disk('public')->path($decryptedPath);

        return response()->file($filePath);
    } catch (\Exception $e) {
        abort(403, 'Invalid or Expired File URL');
    }
})->name('secure.file');

Route::get('/show-complaint-box', [ComplaintController::class, 'show_complaint_form'])->name('showComplaintForm');
Route::post('/store-complaint', [ComplaintController::class, 'store_complaint'])->name('storeComplaint');
