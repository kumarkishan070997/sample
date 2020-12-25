@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-4">
		
	</div>
	<div class="col-4 text-center">
		<form method="post" action="{{url('/sendmail')}}">
			{{csrf_field()}}
		<input type="email" name="email" class="form-control">
		<button class="btn btn-primary" type="submit">Send Mail</button>
		</form>
	</div>
	<div class="col-4">
		
	</div>
</div>

@endsection