@component('mail::message')
# Welcome, {{ $user->name }}!

Your tenant account has been created successfully. Below are your login details:

- **Email:** {{ $user->email }}
- **Password:** {{ $generatedPassword }}
- **Subscription:** {{ $subscription }}
- **domain:** {{ $domain }}


Please keep your login details secure. We recommend changing your password after your first login.

@component('mail::button', ['url' => route('login')])
Login Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent