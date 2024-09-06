@component('mail::message')
# You have a message from {{$details['name']}}

# Subject: {{$details['subject']}} <br>
# Phone: {{$details['phone']}}  <br>
{{$details['contact']}}

@component('mail::button', ['url' => 'https://fmapmedia.com/'])
www.fmapmedia.com
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
