@extends('default')

@section('contentt')

	<div class="row">
		<div class="col-sm-2  mb-3"><a href="{{ route('tdatas.create') }}" class="btn btn-info">اضافه</a></div>
		<div class="col-sm-2  mb-3"><a href="{{ route('tdatas.excel') }}" class="btn btn-warning">رفع ملف اكسل</a></div>

	</div>
	<div class="row mt-2">
		<form action="" method="get">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="name">بحث بالاسم</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label for="name">بحث برقم الشهاده</label>
						<input type="text" name="certificate_num" class="form-control">
					</div>
				</div>
				<div class="col-sm-12">
					<button class="btn btn-secondary mt-2">بحث</button>
				</div>
			</div>
		</form>
	</div>
	<table class="table table-bordered mt-4">
		<thead>
			<tr>
				<th>اسم المتدرب</th>
				<th>الرقم المتسلسل المعتمد </th>
				<th>الرمز </th>
				<th>رقم الاعتماد </th>
				<th>نوع الوثيقة </th>
				<th>تاريخ الاعتماد</th>
				<th>اسم المدرب </th>
				<th>الحنسية</th>
				<th>ملاحظات  </th>

				<th>خيارات</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tdatas as $tdatum)

				<tr>
					<td>{{ $tdatum->name }}</td>
					<td>{{ $tdatum->serial }}</td>
					<td>{{ $tdatum->num }}</td>
					<td>{{ $tdatum->certificate_num }}</td>
					<td>{{ $tdatum->document_type }}</td>
					<td>{{ $tdatum->date }}</td>
					<td>{{ $tdatum->coach_name }}</td>
					<td>{{ $tdatum->nation }}</td>
					<td>{{ $tdatum->notes }}</td>

					<td>
						<div class="d-flex gap-2">
                            {{-- <a href="{{ route('tdatas.show', [$tdatum->id]) }}" class="btn btn-info">Show</a> --}}
                            <a href="{{ route('tdatas.edit', [$tdatum->id]) }}" class="btn btn-primary">تعديل</a>
                            {{-- {!! Form::open(['method' => 'DELETE','route' => ['tdatas.destroy', $tdatum->id]]) !!} --}}
                                {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}
                            {{-- {!! Form::close() !!} --}}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>
	{{ $tdatas->links() }}
@stop
