<!DCOTYPE html>
<html>

<head>
	<title>Forgot your password?</title>
</head>

<body>
	
	<h1>Dear user</h1>

	<p>Following your request to reset the password, we hereby provide you with a new password: <b>{{ $newPassword }}</b></p>

	<p>By following the below link, the new password will be applied which you must change later in the "change password" page to set your own password:</p>

	<a href="{{ route('reset', [$email, \Crypt::encrypt($newPassword)]) }}">Reset Password</a>

	<p>If you haven't demand for your password to be reset, then please ignore this email without clickin on the link above.</p>


<footer>
	@copy;Dev task 2018
</footer>

</body>

</html>