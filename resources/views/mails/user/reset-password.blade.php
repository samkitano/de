@component('mail::message')
# {{ __('passwords.reset_password') }}

{{ __('passwords.hi') }}, {{ $user->first_name }}!

{{ __('passwords.requested_pw') }} [{{ Request::getHost() }}]({{ url('recover').'/'.$token }}/{{ urlencode($user->email) }}).

@component('mail::button', ['url' => url('recover/'.$token.'/'.urlencode($user->email))])
{{ __('passwords.change_password') }}
@endcomponent

@component('mail::panel')
{{ __('passwords.change_pw_mistake') }}
@endcomponent

@slot('subcopy')
{{ __('passwords.set_password_before') }} {{ Carbon\Carbon::now()->addDays(3)->format('d/m/Y') }}
{{ __('passwords.disclaimer') }}
@endslot

@slot('footer')
@endslot
@endcomponent
