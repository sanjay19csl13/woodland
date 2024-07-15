<x-mail::message>
# Hello, you got an enquiry!

<h3>Name: {{$contact['name']}}</h3>
<h3>Email: {{$contact['email']}}</h3>
<h3>Message: {{$contact['message']}}</h3>



<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
