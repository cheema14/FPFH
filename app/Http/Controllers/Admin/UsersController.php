<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Mail\EmailVerificationMail;
use App\Mail\UserApprovalMail;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $type = ! empty(request()->type) ? strtolower(trim(request()->type)) : null;
        if ($type) {
            // Fetch users based on the provided role
            $users = User::with(['roles'])->whereHas('roles', function ($query) use ($type) {
                $query->whereRaw('LOWER(title) = ?', [strtolower($type)]);
            })->get();
        } else {
            // If 'type' is not provided, fetch all users with roles
            $users = User::with(['roles'])->get();
        }

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        $user->load('roles');

        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // dd($user);
        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        $users = User::find(request('ids'));

        foreach ($users as $user) {
            $user->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function approve(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user->update([
            'is_approved' => true,
            'approved_at' => now(),
        ]);

        // Send approval email
        Mail::to($user->email)->send(new UserApprovalMail($user));

        return response()->json([
            'success' => true,
            'message' => 'User has been approved successfully',
        ]);
    }

    public function resend_verification_email(Request $request)
    {

        $email = $request->user_email;

        $user = User::where('email', '=', $email)->first();

        if (! $user) {
            return redirect()->route('register')->with('notExist', 'Invalid email provided. This email does not exist.');
        }

        if ($user->email_verified_at !== null) {
            return redirect()->route('register')->with('alreadyVerified', 'This email has already been verified.');
        }

        // If email exists

        // Generate email verification URL
        $verificationUrl = route('verify-email', ['user' => $user->id]);

        // Send email verification link to the user
        Mail::to($user->email)->send(new EmailVerificationMail($verificationUrl));

        return redirect()->route('register')->with('emailSent', 'Verification Email sent.');
    }
}
