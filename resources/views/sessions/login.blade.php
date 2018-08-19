@extends ('layouts.master')

@section ('content')

	<div class="col-md-8">

		<h2> Login </h2>
		<hr>

		<form action="{{ action('SessionsController@store') }}" method="POST">

			{{csrf_field()}}

			<div class="form-group">

				<label for="email">Email</label>

				<input type="email" name="email" class="form-control" id="email" required>

			</div>

			<div class="form-group">

				<label for="password">Password</label>

				<input type="password" name="password" class="form-control" id="password" required>

			</div>

			<br>

			<div class="form-group">

				<input type="submit" value="Submit" class="form-control" id="submit">

				<br>
				
				<div align="center">
					
					<a href="{{ action('PasswordsController@forgotPassword') }}">Forgot your password?</a>

				</div>
				

			</div>

			@include ('layouts.errors')

		</form>

	</div>

@endsection