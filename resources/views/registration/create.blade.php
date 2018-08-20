@extends ('layouts.master')

@section ('content')

	<div class="col-md-8">

		<h2> Registration </h2>
		<hr>

		<form action="" method="POST">

			{{ csrf_field() }}

			<div class="form-group">

				<label for="username">Username</label>

				<input type="text" name="username" class="form-control" id="username" required>

			</div>

			<div class="form-group">

				<label for="email">Email</label>

				<input type="email" name="email" class="form-control" id="email" required>

			</div>

			<div class="form-group">

				<label for="password">Password</label>

				<input type="password" name="password" class="form-control" id="password" required>

			</div>			

			<div class="form-group">

				<label for="password_confirmation">Confirm Password</label>

				<input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>

			</div>

			<br>

			<div class="form-group">

				<input type="submit" value="Submit" class="form-control btn-primary" id="submit">

			</div>
			
			@include ('layouts.errors')

		</form>

	</div>

@endsection