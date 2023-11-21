@extends('default')

@section('contentt')

@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif


<form action="{{ route('tdatas.excel.upload') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="upload">ارفق ملف الاكسل</label>
        <input type="file" name="file" id="upload" class="form-control">
    </div>
    <button class="btn btn-success mt-2" type="submit">رفع</button>
</form>

@endsection