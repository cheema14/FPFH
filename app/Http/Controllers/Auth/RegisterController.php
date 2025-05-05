<?php

namespace App\Mail;

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\SmsApi;
use App\Mail\EmailVerificationMail;
use App\Models\Role;
use App\Models\TelecomCompany;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers, SmsApi;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*]{8,}$/'],
            'focal_person_name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'focal_person_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'cnic' => ['required', 'string', 'min:15', 'unique:users,cnic', function ($attribute, $value, $fail) {
                $cleanedCnic = str_replace('-', '', $value);
                if (strlen($cleanedCnic) > 13) {
                    $fail('The '.$attribute.' must not exceed 13 characters when hyphens are removed.');
                }
                // Custom error message for duplicate CNIC
                if (User::where('cnic', $cleanedCnic)->exists()) {
                    $fail('The '.$attribute.' has already been taken.');
                }
            }],
            'telecom_company' => ['required', 'integer', 'exists:telecom_companies,id'],
            'contact_number' => ['required', 'string', 'regex:/^03[0-9]{2}-[0-9]{7}$/', function ($attribute, $value, $fail) {
                if (! preg_match('/^03[0-9]{2}-[0-9]{7}$/', $value)) {
                    $fail('The '.$attribute.' must be in the format 03##-#######.');
                }
            }],
        ],
            [
                'password.regex' => 'The password must be at least 8 characters long and must contain at least one number, one special character (!@#$%^&*), and one capital letter. آپ کے پاس ورڈ میں 1 کیپٹل الفابیٹ 1 خصوصی حرف 1 نمبر ہونا چاہیے اور یہ کم از کم 8 حروف کا ہونا چاہیے۔',
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\User
     */
    protected function create(array $data)
    {
        // dd($data);
        $documentPath = null;
        if (isset($data['registration_document'])) {
            $documentPath = $data['registration_document']->store('documents');
        }

        $user = User::create([
            'name' => $data['focal_person_name'],
            'email' => $data['focal_person_email'],
            'password' => Hash::make($data['password']),
            'cnic' => str_replace('-', '', $data['cnic']), // Remove hyphens from cnic
            'contact_number' => str_replace(['+', '-'], '', $data['contact_number']), // Remove + and - from contact number
        ]);

        // Determine role based on entity_type using Role constants
        $roleId = Role::USER; // Assign a simple user role directly

        // Sync the role with the user
        $user->roles()->sync([$roleId]);

        return $user;
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = $this->create($request->all());
        $language = 'english';
        $action = 'Registration';
        // Generate email verification URL
        $verificationUrl = route('verify-email', ['user' => $user->id]);
        $message = 'An email from AZAG has been sent to your provided email address for verification.
                    Kindly login to your email to verify and press "Verify E-mail" button.”

                    [Verify Email] ({{ verificationUrl }})

                    اپنی زمین اپنا گھر پروگرام کی طرف سے ایک ای میل تصدیق کے لیے آپ کے فراہم کردہ ای میل ایڈریس پر بھیجی گئی ہے۔
                    براہ کرم تصدیق کرنے کے لیے اپنا ای میل لاگ ان کریں اور ای میل کی تصدیق کریں کے بٹن کو دبائیں۔

                    [ای میل کی تصدیق] ({{ verificationUrl }})

                    Best regards,
                    AZAG';
        $text_message = 'Thank you for registering with APNI ZAMEEN APNA GHAR (AZAG). 
                Please verify your email to complete registration:'.urlencode($verificationUrl).' 
                If you didn`t sign up, ignore this message.';

        // dd($user);
        // Send SMS verification text and link to the user separately
        try {

            $this->send_sms($user->cnic, $user->contact_number, $text_message, $language, $action);
        } catch (\Exception $e) {
            \Log::error('SMS could not be sent: '.$e->getMessage());
        }
        // Send email verification link to the user
        try {
            Mail::to($user->email)->send(new EmailVerificationMail($verificationUrl));
        } catch (\Exception $e) {
            \Log::error('Email could not be sent: '.$e->getMessage());
        }
        $success_message_login_screen_en = 'Thank you for registering with us! To complete your registration, please verify your email address. If you did not create an account, no further action is required.
        Best regards,AZAG.';
        $success_message_login_screen_ur = ' ہماری ویب سائٹ پر رجسٹریشن کا شکریہ! اپنی رجسٹریشن مکمل کرنے کے لیے، براہ کرم اپنے ای میل ایڈریس کی تصدیق کریں۔ اگر آپ نے اکاؤنٹ نہیں بنایا، تو کوئی مزید کارروائی درکار نہیں ہے۔
نیک تمنائیں،';

        return redirect()->route('login')->with([
            'status_en' => $success_message_login_screen_en,
            'status_ur' => $success_message_login_screen_ur,
        ]);
    }

    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $telecomCompanies = TelecomCompany::all(); // Fetch all telecom companies

        return view('auth.register', compact('telecomCompanies'));
    }
}
