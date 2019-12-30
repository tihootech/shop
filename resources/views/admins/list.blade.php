@extends('layouts.dashboard')
@section('main')

	<div class="tile">
		@if ($admins->count())
			<div class="direct-x">

				<table class="table table-bordered text-center">
					<thead>
						<tr>
							<th scope="col"> ردیف </th>
							<th scope="col"> نام </th>
							<th scope="col"> شماره تماس </th>
							<th scope="col" colspan="2"> عملیات </th>
						</tr>
					</thead>
					<tbody>
						@foreach ($admins as $i => $admin)
							<tr>
								<th scope="row"> {{ $i+1 }} </th>
								<td> {{ $admin->name }} </td>
								<td> {{ $admin->phone }} </td>
								<td>
									<a href="{{url("admins/$admin->id/edit")}}" class="text-success" title="ویرایش" data-toggle="tooltip">
										<i class="fa fa-edit"></i>
									</a>
								</td>
								<td>
									<a href="#" class="text-danger delete" title="حذف" data-toggle="tooltip" data-target="delete-admin-{{$admin->id}}">
										<i class="fa fa-trash"></i>
									</a>
									<form class="d-none" action="{{url("admins/$admin->id")}}" method="post" id="delete-admin-{{$admin->id}}">
										@csrf
										{{ method_field('DELETE') }}
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>

				{{$admins->links()}}

			</div>
		@else
			<div class="alert alert-warning">
				سفارشی یافت نشد.
			</div>
		@endif
	</div>

@endsection
