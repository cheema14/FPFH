<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\SmsApi;
use App\Mail\ApplicationSubmitted;
use App\Models\Application;
use App\Models\ApplicationMedia;
use App\Models\District;
use App\Models\Division;
use App\Models\IncomeSource;
use App\Models\MonthlyIncomeRange;
use App\Models\Occupation;
use App\Models\SecondAcknowledgement;
use App\Models\Tehsil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
    use SmsApi;

    public function test_sms()
    {
        $this->send_sms('1111111111111', '03334896145', 'testing sms API', 'english', 'Registration');
    }

    public function store(Request $request)
    {
        $messages = [
            'full_name.required' => 'The full name field is required.',
            'full_name.string' => 'The full name must be a valid string.',
            'full_name.max' => 'The full name may not be greater than 100 characters.',
            'full_name.regex' => 'The full name may only contain letters, spaces, periods, and hyphens.',

            'father_husband_name.required' => 'The father/husband name field is required.',
            'father_husband_name.string' => 'The father/husband name must be a valid string.',
            'father_husband_name.max' => 'The father/husband name may not be greater than 100 characters.',
            'father_husband_name.regex' => 'The father/husband name may only contain letters, spaces, periods, and hyphens.',

            'cnic.required' => 'The CNIC field is required.',
            'cnic.string' => 'The CNIC must be a valid string.',
            'cnic.max' => 'The CNIC may not be greater than 15 characters.',
            'cnic.unique' => 'The CNIC has already been taken.',

            'dob.required' => 'The date of birth field is required.',
            'dob.date' => 'The date of birth must be a valid date.',
            'dob.before' => 'You must be at least 18 years old.',

            'gender.required' => 'The gender field is required.',
            'gender.in' => 'The selected gender is invalid.',

            'marital_status.required' => 'The marital status field is required.',
            'marital_status.in' => 'The selected marital status is invalid.',

            'nominee.required' => 'The Nominee relation is required.',
            'nominee.required_if' => 'The Nominee relation is required when the relation is Unmarried.',
            'nominee.in' => 'The selected marital status is invalid.',

            'contact_number.required' => 'The contact number field is required.',
            'contact_number.string' => 'The contact number must be a valid string.',
            'contact_number.max' => 'Invalid Contact No provided Max.',
            'contact_number.min' => 'Invalid Contact No provided Min.',

            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than 255 characters.',
            'email.unique' => 'The email has already been taken.',

            'current_address.required' => 'The current address field is required.',
            'current_division.required' => 'The current division field is required.',
            'current_district.required' => 'The current district field is required.',
            'current_tehsil.required' => 'The current tehsil field is required.',
            'same_as_current_address.required' => 'Please indicate if the permanent address is the same as the current address.',
            'permanent_address.required' => 'The permanent address field is required.',
            'permanent_division.required' => 'The permanent division field is required.',
            'permanent_district.required' => 'The permanent district field is required.',
            'permanent_tehsil.required' => 'The permanent tehsil field is required.',
            'occupation.required' => 'The occupation field is required.',
            'employer_name.string' => 'The employer name must be a valid string.',
            'employer_name.max' => 'The employer name may not be greater than 255 characters.',
            'monthly_income_range.required' => 'The monthly income range field is required.',
            'source_of_income.required' => 'The source of income field is required.',
            'own_property.required' => 'The ownership of property field is required.',
            'total_family_members.required' => 'The total family members field is required.',
            'number_of_dependents.required' => 'The number of dependents field is required.',
            'spouse_occupation.required' => 'The spouse occupation field is required.',
            'combined_family_income.required' => 'The combined family income field is required.',
            'rented_house.required' => 'The rented house field is required.',
            'monthly_rent.required' => 'The monthly rent field is required.',
            'loan_option.required' => 'The Loan Option field is required.',
            'loan_amount.required' => 'The Loan amount field is required.',
            'government_housing.required' => 'The government housing field is required.',
            'scheme_name.required' => 'The scheme name field is required.',
            'housing_location.required' => 'The housing location field is required.',
            'plot_size.required' => 'The plot size field is required.',
            'declaration.required' => 'The declaration field is required.',
            'applicant_signature.required' => 'The applicant signature field is required.',
            'date.required' => 'The date field is required.',
            'current_division.exists' => 'The current division must be a valid division.',
            'current_district.exists' => 'The current district must be a valid district.',
            'current_tehsil.exists' => 'The current tehsil must be a valid tehsil.',
            'permanent_division.exists' => 'The permanent division must be a valid division.',
            'permanent_district.exists' => 'The permanent district must be a valid district.',
            'permanent_tehsil.exists' => 'The permanent tehsil must be a valid tehsil.',
            'occupation.exists' => 'The occupation must be a valid occupation.',
            'source_of_income.exists' => 'The source of income must be a valid source of income.',
            'monthly_income_range.exists' => 'The monthly income range must be a valid monthly income range.',
            'housing_location.exists' => 'The housing location must be a valid district.',

        ];
        $validatedData = [];
        $same_as_current_address = $request->same_as_current_address == 'on' ? true : false;
        $validator1_arr = [
            'full_name' => 'required|string|max:100|regex:/^[\p{L} .-]+$/u', // Allow letters (non-numeric), spaces, periods, and hyphens
            'father_husband_name' => 'required|string|max:100|regex:/^[\p{L} .-]+$/u', // Allow letters (non-numeric), spaces, periods, and hyphens
            'cnic' => 'required|string|max:15|unique:applications,cnic', // Ensure CNIC is unique in applications table
            'dob' => 'required|date|before:'.now()->subYears(18)->toDateString(), // Ensure user is at least 18 years old
            'gender' => 'required|in:0,1,2', // Ensure it matches the enum values
            'marital_status' => 'required|in:0,1,2,3,4', // Ensure it matches the enum values
            'nominee' => 'required_if:marital_status,1|in:FATHER,MOTHER,BROTHER,SISTER', // Ensure it matches the string values
            'contact_number' => 'required|string|min:12|max:12', // Adjust max length as needed
            'email' => 'nullable|email|max:255|unique:applications,email', // Ensure email is unique in applications table
            'current_address' => 'required|string|max:255',
            'current_division' => 'required|exists:divisions,id', // Ensure it exists in divisions table
            'current_district' => 'required|exists:districts,id', // Ensure it exists in districts table
            'current_tehsil' => 'required|exists:tehsils,id', // Ensure it exists in tehsils table
            'permanent_address' => 'nullable|string|max:255',
            'permanent_division' => 'nullable|exists:divisions,id', // Ensure it exists in divisions table
            'permanent_district' => 'nullable|exists:districts,id', // Ensure it exists in districts table
            'permanent_tehsil' => 'nullable|exists:tehsils,id', // Ensure it exists in tehsils table

        ];
        if (! $same_as_current_address) {
            $validator1_arr['permanent_address'] = 'required|string|max:255';
            $validator1_arr['permanent_division'] = 'required|exists:divisions,id'; // Ensure it exists in divisions table
            $validator1_arr['permanent_district'] = 'required|exists:districts,id'; // Ensure it exists in districts table
            $validator1_arr['permanent_tehsil'] = 'required|exists:tehsils,id'; // Ensure it exists in tehsils table

        }
        $validator1 = Validator::make($request->all(), $validator1_arr, $messages); // Pass the custom messages to the validator
        if ($validator1->fails()) {
            return response()->json([
                'success' => false,
                'current_step' => 1,
                'errors' => $validator1->errors(),
            ], 422);
        } else {
            $validatedData = array_merge($validatedData, $validator1->validated());
            $validatedData['user_id'] = Auth::id();
            $validatedData['cnic'] = Auth::user()->cnic;
            $validatedData['contact_number'] = Auth::user()->contact_number;
            $validatedData['email'] = Auth::user()->email;
            $validatedData['same_as_current_address'] = $request->same_as_current_address == 'on' ? true : false;
            if ($validatedData['same_as_current_address'] == 'on') {
                $validatedData['permanent_address'] = $validatedData['current_address'];
                $validatedData['permanent_division'] = $validatedData['current_division'];
                $validatedData['permanent_district'] = $validatedData['current_district'];
                $validatedData['permanent_tehsil'] = $validatedData['current_tehsil'];
            }
        }

        if ($request->current_step == 1) {
            $existingApplication = Application::where('cnic', $validatedData['cnic'])->first();
            if ($existingApplication) {
                // Update existing application
                $existingApplication->update($validatedData);

                return response()->json([
                    'success' => true,
                    'message' => 'Application updated successfully!',
                    'current_step' => 2, // Proceed to the next step
                ]);
            } else {
                $application = Application::create($validatedData);

                return response()->json([
                    'success' => true,
                    'message' => 'Application created successfully!',
                    'current_step' => 2, // Proceed to the next step
                ]);
            }
        }

        $validator2 = Validator::make($request->all(), [
            'occupation' => 'required|exists:occupations,id', // Ensure it exists in occupations table
            'employer_name' => 'nullable|string|max:100|regex:/^[a-zA-Z\s]+$/',
            'monthly_income_range' => 'nullable|exists:monthly_income_ranges,id', // Ensure it exists in income_ranges table
            'source_of_income' => 'nullable|exists:income_sources,id', // Ensure it exists in income_sources table
            // 'own_property' => 'required|in:1,0',
        ], $messages);
        if ($validator2->fails()) {
            return response()->json([
                'success' => false,
                'current_step' => 2,
                'errors' => $validator2->errors(),
            ], 422);
        } else {
            // dd($request->own_property);
            $validatedData = array_merge($validatedData, $validator2->validated());
            $validatedData['user_id'] = Auth::id();
            $validatedData['cnic'] = Auth::user()->cnic;
            $validatedData['contact_number'] = Auth::user()->contact_number;
            $validatedData['email'] = Auth::user()->email;
            $validatedData['own_property'] = $request->own_property == 'on' ? 1 : 0;
            $validatedData['own_property'] = $request->own_property == '1' ? 1 : 0;
            $validatedData['employer_name'] = $request->occupation != '13' ? $request->employer_name : null;
            $validatedData['monthly_income_range'] = $request->occupation != '13' ? $request->monthly_income_range : null;
            $validatedData['source_of_income'] = $request->occupation != '13' ? $request->source_of_income : null;
        }

        if ($request->current_step == 2) {
            $existingApplication = Application::where('cnic', $validatedData['cnic'])->first();
            if ($existingApplication) {
                // Update existing application
                $existingApplication->update($validatedData);

                return response()->json([
                    'success' => true,
                    'message' => 'Application updated successfully!',
                    'current_step' => 3,
                ]);
            } else {
                // Create new application
                return response()->json([
                    'success' => false,
                    'current_step' => 1,
                    'errors' => [
                        'application' => ['The application you are trying to access does not exist.'], // Custom error message
                    ],
                ], 422);
            }
        }

        $validator3 = Validator::make($request->all(), [
            'total_family_members' => 'required|integer|gt:0|max:99|regex:/^\d+$/|lt:100', // Must be a positive integer and max 99
            'number_of_dependents' => 'required|integer|gte:0|max:99|regex:/^\d+$/|lt:100', // Must be zero or a positive integer and max 99
            'spouse_occupation' => 'nullable|exists:occupations,id|required_if:marital_status,0', // Ensure it exists in occupations table
            'combined_family_income' => 'required|numeric|min:0|max:999999999|regex:/^[0-9]+(\.[0-9]{1,2})?$/', // Must be a positive number and max 999999999
        ], $messages);

        if ($validator3->fails()) {
            return response()->json([
                'success' => false,
                'current_step' => 3,
                'errors' => $validator3->errors(),
            ], 422);
        } else {
            $validatedData = array_merge($validatedData, $validator3->validated());
            $validatedData['user_id'] = Auth::id();
            $validatedData['cnic'] = Auth::user()->cnic;
            $validatedData['contact_number'] = Auth::user()->contact_number;
            $validatedData['email'] = Auth::user()->email;
            $validatedData['spouse_occupation'] = $validatedData['marital_status'] == 0 ? $validatedData['spouse_occupation'] : null;
            // dd($validatedData);
        }

        if ($request->current_step == 3) {
            $existingApplication = Application::where('cnic', $validatedData['cnic'])->first();
            if ($existingApplication) {
                $existingApplication->update($validatedData);

                return response()->json([
                    'success' => true,
                    'message' => 'Application updated successfully!',
                    'current_step' => 4, // Proceed to the next step
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'current_step' => 1,
                    'errors' => [
                        'application' => ['The application you are trying to access does not exist.'], // Custom error message
                    ],
                ], 422);
            }
        }

        $validator4 = Validator::make($request->all(), [
            'rented_house' => 'required|in:yes,no',
            'monthly_rent' => 'nullable|numeric|gte:0|max:500000|regex:/^\d+(\.\d{1,2})?$/',
            'loan_option' => 'required|in:yes,no',
            'loan_amount' => 'required_if:loan_option,yes',
            'government_housing' => 'required|in:yes,no',
            'scheme_name' => 'nullable|string|max:255|regex:/^[\p{L}\s]+$/u', // Only letters and spaces allowed
            'housing_location' => 'nullable|exists:districts,id', // Ensure it exists in districts table
            'plot_size' => 'nullable|integer|min:1|max:105',
        ], $messages); // Pass the custom messages to the validator
        if ($validator4->fails()) {
            return response()->json([
                'success' => false,
                'current_step' => 4,
                'errors' => $validator4->errors(),
            ], 422); // 422 Unprocessable Entity
        } else {
            $validatedData = array_merge($validatedData, $validator4->validated());
            $validatedData['user_id'] = Auth::id();
            $validatedData['cnic'] = Auth::user()->cnic;
            $validatedData['contact_number'] = Auth::user()->contact_number;
            $validatedData['email'] = Auth::user()->email;
        }

        // Final update or create based on CNIC
        if ($request->current_step == 4) {
            $existingApplication = Application::where('cnic', $validatedData['cnic'])->first();
            if ($existingApplication) {
                // Update existing application
                $existingApplication->update($validatedData);

                return response()->json([
                    'success' => true,
                    'message' => 'Application updated successfully!',
                    'current_step' => 5, // Final step or next step
                ]);
            } else {
                // Create new application
                return response()->json([
                    'success' => false,
                    'current_step' => 1,
                    'errors' => [
                        'application' => ['The application you are trying to access does not exist.'], // Custom error message
                    ],
                ], 422);
            }
        }

        $existingApplication = Application::where('cnic', $validatedData['cnic'])->first();
        // Check if applicant_picture exists in the ApplicationMedia table
        $applicantPictureExists = ApplicationMedia::where('application_id', $existingApplication->id)
            ->where('document_type', 'applicant_picture')
            ->exists();

        if (! $applicantPictureExists) {
            return response()->json([
                'success' => false,
                'current_step' => 5,
                'errors' => [
                    'applicant_picture' => ['The applicant picture is required.'], // Custom error message
                ],
            ], 422);
        }

        $cnicFrontExists = ApplicationMedia::where('application_id', $existingApplication->id)
            ->where('document_type', 'cnic_front')
            ->exists();

        if (! $cnicFrontExists) {
            return response()->json([
                'success' => false,
                'current_step' => 5,
                'errors' => [
                    'cnic_front' => ['The CNIC front is required.'], // Custom error message
                ],
            ], 422);
        }

        $cnicBackExists = ApplicationMedia::where('application_id', $existingApplication->id)
            ->where('document_type', 'cnic_back')
            ->exists();

        if (! $cnicBackExists) {
            return response()->json([
                'success' => false,
                'current_step' => 5,
                'errors' => [
                    'cnic_back' => ['The CNIC back is required.'], // Custom error message
                ],
            ], 422);
        }

        // $proofOfIncomeExists = ApplicationMedia::where('application_id', $existingApplication->id)
        //     ->where('document_type', 'proof_of_income')
        //     ->exists();

        // if (! $proofOfIncomeExists) {
        //     return response()->json([
        //         'success' => false,
        //         'current_step' => 5,
        //         'errors' => [
        //             'proof_of_income' => ['The proof of income is required.'], // Custom error message
        //         ],
        //     ], 422);
        // }

        // $affidavitExists = ApplicationMedia::where('application_id', $existingApplication->id)
        //     ->where('document_type', 'affidavit')
        //     ->exists();

        // if (! $affidavitExists) {
        //     return response()->json([
        //         'success' => false,
        //         'current_step' => 5,
        //         'errors' => [
        //             'affidavit' => ['The affidavit certificate is required.'], // Custom error message
        //         ],
        //     ], 422);
        // }

        if ($request->current_step == 5) {

            if ($existingApplication) {

                return response()->json([
                    'success' => true,
                    'message' => 'Application updated successfully!',
                    'current_step' => 6, // Final step or next step
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'current_step' => 1,
                    'errors' => [
                        'application' => ['The application you are trying to access does not exist.'], // Custom error message
                    ],
                ], 422);
            }
        }
        if ($request->current_step == 6) {

            $validator6 = Validator::make($request->all(), [
                'declaration' => 'required',
            ], $messages); // Pass the custom messages to the validator
            if ($validator6->fails()) {
                return response()->json([
                    'success' => false,
                    'current_step' => 6,
                    'errors' => $validator6->errors(),
                ], 422); // 422 Unprocessable Entity
            }
            $validatedData['declaration'] = $request->declaration == 'on' ? true : false;
            $existingApplication = Application::where('cnic', $validatedData['cnic'])->first();
            if ($existingApplication) {
                $validatedData['applicant_name'] = Auth::user()->name;
                $validatedData['applicant_signature'] = Auth::user()->name;
                $validatedData['date'] = date('Y-m-d');
                $validatedData['status'] = 1;
                $existingApplication->update($validatedData);
            }
            session()->flash('success', 'Application submitted successfully!');
            try {
                Mail::to(Auth::user()->email)->send(new ApplicationSubmitted($existingApplication)); // Send email notification

                // If the email is sent successfully, return a success response
                return response()->json([
                    'success' => true,
                    'message' => 'Application updated successfully! Email notification sent.',
                    'current_step' => 7, // Final step or next step
                ]);
            } catch (\Exception $e) {
                // Handle the exception if the email fails to send
                return response()->json([
                    'success' => false,
                    'message' => 'Application updated successfully, but failed to send email notification.',
                    'current_step' => 7, // Final step or next step
                ], 500); // Return a 500 Internal Server Error status
            }
        }
    }

    public function store_second_checks(Request $request)
    {
        $validatedData = $request->validate([
            'punjab_resident' => 'required|boolean',
            'same_district_application' => 'required|boolean',
            'no_plot_associated' => 'required|boolean',
            'not_blacklisted' => 'required|boolean',
            'no_criminal_record' => 'required|boolean',
        ], [
            'punjab_resident.required' => 'Please confirm Punjab residency.',
            'same_district_application.required' => 'Please confirm same district application.',
            'no_plot_associated.required' => 'Please confirm no plot is associated.',
            'not_blacklisted.required' => 'Please confirm you are not blacklisted.',
            'no_criminal_record.required' => 'Please confirm you have no criminal record.',
        ]);

        // Store in database
        $res = SecondAcknowledgement::updateOrCreate(
            ['user_id' => Auth::user()->id],
            [
                'punjab_resident' => $request->has('punjab_resident'),
                'same_district_application' => $request->has('same_district_application'),
                'no_plot_associated' => $request->has('no_plot_associated'),
                'not_blacklisted' => $request->has('not_blacklisted'),
                'no_criminal_record' => $request->has('no_criminal_record'),
            ]);

        if ($res) {
            return redirect()->route('applicant.form')->with('success', 'Acknowledgement submitted successfully!');
        }
    }

    public function showForm(Request $request)
    {
        $user = $request->user();

        // If application is complete then do not open the applicant form
        // because the user can open it from URL
        // so this check is to block that request if the application
        // is complete

        if ($user->isApplicationComplete()) {
            return redirect()->route('admin.home')->with('applicationComplete', 'Your application is already complete and submitted.');
        }

        $second_acknowledgement_checks = $user->secondAcknowledgement() ? $user->secondAcknowledgement()->first() : null;

        $hasFalseValue = SecondAcknowledgement::where('user_id', $user->id)
            ->where(function ($query) {
                $query->where('punjab_resident', false)
                    ->orWhere('same_district_application', false)
                    ->orWhere('no_plot_associated', false)
                    ->orWhere('not_blacklisted', false)
                    ->orWhere('no_criminal_record', false);
            })
            ->exists();

        if ($hasFalseValue || ! $second_acknowledgement_checks) {
            return view('second_checks');
        }

        $application = $user->applicationAvailable() ? $user->applications()->with('applicationMedia')->latest()->first() : null;

        // Fetch divisions, districts, and tehsils
        $divisions = Division::all(); // Assuming you have a Division model
        $districts = District::all(); // Assuming you have a District model
        $tehsils = Tehsil::all();
        $occupations = Occupation::all();
        $incomeRanges = MonthlyIncomeRange::where('income_type', '=', 1)->get();
        $combinedIncomeRanges = MonthlyIncomeRange::where('income_type', '=', 2)->get();
        $incomeSources = IncomeSource::all();
        // dd($application);
        $disabledCheckbox = '';
        // If an application exists, pass it to the view for editing
        if ($application) {
            // dd($application->housingLocation);
            $disabledCheckbox = $application->same_as_current_address ? 'readonly' : '';
            // dd($application->applicationMedia);

            return view('applicant_form', compact('user', 'divisions', 'districts', 'disabledCheckbox', 'tehsils', 'occupations', 'incomeRanges', 'incomeSources', 'application', 'combinedIncomeRanges')); // Pass application data to the view
        }

        // If no application exists, open the form for a new application
        return view('applicant_form', compact('user', 'divisions', 'disabledCheckbox', 'districts', 'tehsils', 'occupations', 'incomeRanges', 'incomeSources', 'combinedIncomeRanges')); // Pass data for new application
    }

    public function index()
    {
        // Fetch applications for the authenticated user or all applications if the user is an admin
        $applications = (auth()->user()->is_admin || auth()->user()->is_department)
            ? Application::paginate(10) // Adjust the number of items per page as needed
            : Application::where('user_id', auth()->id())->paginate(10); // Paginate user-specific applications

        // Return the view with the applications
        return view('applications.index', compact('applications'));
    }

    public function show(Request $request, $encryptedId)
    {
        $user = $request->user(); // Get the authenticated user

        // Decrypt the application ID
        try {
            $decryptedId = Crypt::decrypt($encryptedId);
        } catch (\Exception $e) {
            return redirect()->route('admin.home')->with('error', 'Invalid application ID.');
        }

        // Fetch the application by ID along with related data
        $application = Application::with([
            'user',
            'occupation',
            'sourceOfIncome',
            'spouseOccupation',
            'currentDivision',
            'currentDistrict',
            'currentTehsil',
            'combinedFamilyIncome',
            'permanentDivision',
            'permanentDistrict',
            'permanentTehsil',
            'housingLocation',
            'applicationMedia',
        ])->find($decryptedId);

        $documentOrder = [
            'applicant_picture', 'cnic_front', 'cnic_back',
            'spouse_cnic_front', 'spouse_cnic_back', 'proof_of_income',
            'rent_agreement', 'other_documents', 'domicile',
        ];

        // Encrypt the media
        if ($application && $application->applicationMedia) {
            // Encrypt file URLs and sort the media collection
            $application->applicationMedia = $application->applicationMedia
                ->each(function ($media) {
                    $media->file_path = route('secure.file', [
                        'encrypted' => Crypt::encryptString($media->file_path),
                    ]);
                })
                ->sortBy(function ($media) use ($documentOrder) {
                    return array_search($media->document_type, $documentOrder);
                });
        }
        // dd($application->applicationMedia);
        // Check if the application exists and belongs to the authenticated user or if the user is an admin
        if (! $application || ($application->user_id !== $user->id && ! $user->is_admin && ! $user->is_department)) {
            return redirect()->route('admin.home')->with('error', 'You do not have access to this application.');
        }

        // Return the view with the application details and related data
        return view('applications.show', compact('application'));
    }

    public function uploadPicture(Request $request)
    {

        return $this->uploadDocument($request, 'file_upload_applicant_picture', 'applicant_picture');
    }

    public function uploadCnicFront(Request $request)
    {
        return $this->uploadDocument($request, 'file_upload_cnic_front', 'cnic_front');
    }

    public function uploadCnicBack(Request $request)
    {
        return $this->uploadDocument($request, 'file_upload_cnic_back', 'cnic_back');
    }

    public function uploadSpouseCnicFront(Request $request)
    {
        return $this->uploadDocument($request, 'file_upload_spouse_cnic_front', 'spouse_cnic_front');
    }

    public function uploadSpouseCnicBack(Request $request)
    {
        return $this->uploadDocument($request, 'file_upload_spouse_cnic_back', 'spouse_cnic_back');
    }

    public function uploadProofOfIncome(Request $request)
    {
        return $this->uploadDocument($request, 'file_upload_proof_of_income', 'proof_of_income');
    }

    public function uploadRentAgreement(Request $request)
    {
        return $this->uploadDocument($request, 'file_upload_rent_agreement', 'rent_agreement');
    }

    public function uploadOtherDocuments(Request $request)
    {
        return $this->uploadDocument($request, 'file_upload_other_documents', 'other_documents');
    }

    public function uploadDomicile(Request $request)
    {
        return $this->uploadDocument($request, 'file_upload_domicile', 'domicile');
    }

    public function uploadAffidavit(Request $request)
    {
        return $this->uploadDocument($request, 'file_upload_affidavit', 'affidavit');
    }

    private function uploadDocument(Request $request, $inputName, $documentType)
    {
        $user = auth()->user();
        $application = $user->applicationAvailable() ? $user->applications()->latest()->first() : null;

        if (! $application) {
            return response()->json(['success' => false, 'message' => 'You do not have an application to upload documents.'], 422);
        }

        $validator = Validator::make($request->all(), [
            $inputName => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:1048', // Adjust max size and types as needed
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $document = $request->file($inputName);

        // Fetch district ID and CNIC from the application
        $districtId = $application->permanent_district; // Assuming this is the correct attribute
        $userCnic = $application->cnic; // Assuming this is the correct attribute

        // Get current date components
        $currentYear = date('Y');
        $currentMonth = date('m');
        $currentDate = date('d');

        // Define the storage path without document type folder
        $documentPath = "documents/{$districtId}/{$currentYear}/{$currentMonth}/{$currentDate}/{$userCnic}/";

        // Create a unique file name using the document type
        $fileName = "{$documentType}.".$document->getClientOriginalExtension();

        // Store the document in the specified path with the new file name
        $storedDocumentPath = $document->storeAs($documentPath, $fileName, 'public');

        // Delete existing document if it exists
        $applicant_photo = ApplicationMedia::where('user_id', $user->id)
            ->where('application_id', $application->id)
            ->where('document_type', $documentType)
            ->delete();

        $encryptedFilePath = Crypt::encryptString($storedDocumentPath);
        $fileUrl = route('secure.file', ['encrypted' => $encryptedFilePath]);

        // Create a new entry for the uploaded document
        ApplicationMedia::create([
            'user_id' => $user->id, // Assuming the user is authenticated
            'application_id' => $application->id, // Get the application ID
            'file_path' => $storedDocumentPath,
            'file_name' => $fileName,
            'file_type' => $document->getClientMimeType(),
            'document_type' => $documentType, // Store the document type
            'secure_file_path' => $fileUrl, // Store the document type
        ]);
        // Generate the URL for the uploaded file
        // $fileUrl = asset($storedDocumentPath);

        return response()->json([
            'success' => true,
            'message' => ucfirst($documentType).' uploaded successfully!',
            'file_path' => $fileUrl, // Return the file URL for the view button
        ]);
    }

    public function deleteFile(Request $request)
    {
        // Decode the file path
        $filePath = $request->input('filePath');
        $documentType = $request->input('inputName');
        $decodedPath = urldecode($filePath);
        $user = auth()->user();
        $application = $user->applicationAvailable() ? $user->applications()->latest()->first() : null;

        // Check if the application exists
        if (! $application) {
            return response()->json(['success' => false, 'message' => 'No application found for the user.'], 404);
        }

        // Remove the 'file_upload_' prefix if it exists
        $documentType = str_replace('file_upload_', '', $documentType);

        // Check if the file exists
        if (Storage::disk('public')->exists($decodedPath)) {
            // Delete the file
            Storage::disk('public')->delete($decodedPath);

            // Delete the corresponding record from the ApplicationMedia model
            ApplicationMedia::where('document_type', $documentType)
                ->where('application_id', $application->id) // Ensure it belongs to the correct application
                ->delete();

            // Return success message with document type
            return response()->json(['success' => true, 'message' => 'File deleted successfully!'], 200); // Adjusted response
        } else {
            return response()->json(['success' => false, 'message' => 'File not found.'], 404);
        }
    }

    private function getEncryptedImageUrl($filePath)
    {
        $encryptedPath = Crypt::encryptString($filePath);

        return route('image.show', ['encrypted' => $encryptedPath]);
    }
}
