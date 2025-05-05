@component('mail::message')
# Account Approved

Dear {{ $user->name }},

Your account has been approved by the administrator. You can now login to your account using your email address: {{ $user->email }}

@component('mail::button', ['url' => $loginUrl])
Login Now
@endcomponent

Thank you for joining us!

Best regards,<br>
{{ config('app.name') }}
@endcomponent 