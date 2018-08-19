@extends ('layouts.master')

@section ('content')

	<div class="col-md-8">

		<h2> Forgot Password? </h2>
		<hr>

		<form action="{{ action('PasswordsController@sendResetEmail') }}" method="POST">

			{{ csrf_field() }}

			<div class="form-group">

				<label for="email">Email</label>

				<input type="email" name="email" class="form-control" id="email" required>

			</div>

			<br>

			<div class="form-group">

				<input type="submit" value="Submit" class="form-control" id="submit">

			</div>

			@include ('layouts.errors')

		</form>

	</div>

@endsection