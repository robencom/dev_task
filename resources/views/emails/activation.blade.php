{{-- @component('mail::message')
Welcome {{ $user->username }}!

You have successfully registered. You need to activate your account by clicking on the below button or on the following link: {!! $text !!} 

@component('mail::button', ['url' => ''])
Activate Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
 --}}
<!DCOTYPE html>
<html>

<head>
	<title>Activate your account!</title>
</head>

<body>
	
	<h1>Welcome {{ $user->username }}</h1>

	<p>You have successfully registered. You need to activate your account by clicking on the following link:</p>

	<a href="{{ route('activate', $user->activation_code) }}">Activate Account</a>

	<p>Thanks for registering!</p>


<footer>
	@copy;Dev task 2018
</footer>

</body>

</html>