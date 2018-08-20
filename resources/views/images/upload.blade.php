@extends ('layouts.master')

@section ('content')

	<div class="col-md-8">

		<h2> Upload an image </h2>
		<hr>

		<form action="{{ action('ImagesController@upload') }}" method="POST" enctype="multipart/form-data">

			{{ csrf_field() }}

			<div class="form-group">

				<label for="password">Select an image</label>

				<input type="file" name="uploaded_image" id="uploaded_image">

			</div>			

			<br>

			<div class="form-group">

				<input type="submit" value="Submit" class="form-control btn-primary" id="submit">

			</div>

			@include ('layouts.errors')

		</form>

	</div>

@endsection