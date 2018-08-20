@extends ('layouts.master')

@section ('content')

	<div class="col-md-8">

		<h2> Change Password </h2>
		<hr>

		<form action="" method="POST">

			{{ csrf_field() }}

			<div class="form-group">

				<label for="password">Current Password</label>

				<input type="password" name="password" class="form-control" id="password" required>

			</div>			

			<div class="form-group">

				<label for="new_password">New Password</label>

				<input type="password" name="new_password" class="form-control" id="new_password" required>

			</div>

			<br>

			<div class="form-group">

				<input type="submit" value="Submit" class="form-control btn-primary" id="submit">

			</div>

			@include ('layouts.errors')

		</form>

	</div>

@endsection