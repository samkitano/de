{{--TODO--}}
@component('mail::message')
# {{ __('welcome') }}

{{ __('mail.hi') }} {{ $user->first_name }},

{{ __('mail.welcome_text') }}
@endcomponent
