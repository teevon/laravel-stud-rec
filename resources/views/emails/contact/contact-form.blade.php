@component('mail::message')
thank you for your message
<strong>Name </strong> {{$data["name"]}} <br>
<strong>email </strong> {{$data["email"]}} <br>
<strong>Message </strong> {{$data["message"]}}
@endcomponent
