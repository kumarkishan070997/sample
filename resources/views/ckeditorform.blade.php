@extends('layouts.app');

@section('content')

<div class="row my-5">
	<div class="col-md-12">
		<form action="{{url('/storepost')}}" id="submitform" method="POST" enctype="multipart/form-data">
			@csrf
			<textarea class="form-control" id="editor" name="editor" rows="3"></textarea>
			<input type="submit" name="submit" class="form-control">
		</form>
	</div>
</div>

@endsection

@section('scripts')

<script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor',{
            filebrowserUploadUrl:"{{route('upload',['_token' => csrf_token()])}}",
            filebrowserUploadMethod:'form'
        });
    </script>

@endsection

