@extends('default')

@section('contentt')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($tdatum, array('route' => array('tdatas.update', $tdatum->id), 'method' => 'PUT')) }}


		<div class="mb-3">
			{{ Form::label('name', 'اسم المتدرب', ['class'=>'form-label']) }}
			{{ Form::text('name', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('serial', 'الرقم المتسلسل المعتمد ', ['class'=>'form-label']) }}
			{{ Form::text('serial', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('num', 'الرمز ', ['class'=>'form-label']) }}
			{{ Form::text('num', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('certificate_num', 'رقم الاعتماد', ['class'=>'form-label']) }}
			{{ Form::text('certificate_num', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('document_type', 'نوع الوثيقة ', ['class'=>'form-label']) }}
			{{ Form::text('document_type', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('date', 'تاريخ الاعتماد', ['class'=>'form-label']) }}
			{{ Form::text('date', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('coach_name', 'اسم المدرب ', ['class'=>'form-label']) }}
			{{ Form::text('coach_name', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('nation', 'الحنسية', ['class'=>'form-label']) }}
			{{ Form::text('nation', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('notes', 'ملاحظات  ', ['class'=>'form-label']) }}
			{{ Form::textarea('notes', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('تعديل', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
