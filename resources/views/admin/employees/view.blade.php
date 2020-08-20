@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">View Employees {{$employee->first_name}} {{$employee->last_name}}
					</div>
					<div class="card-body">

						<table class="table table-striped">
							<thead>
								<tr>
									<td>ID</td>
									<td>First Name</td>
									<td>Last Name</td>
									<td>Company</td>
									<td>Email</td>
									<td>Phone</td>
									<td colspan = 2>Actions</td>
								</tr>
							</thead>
							<tbody>
									<tr>
										<td>{{$employee->id}}</td>
										<td>{{$employee->first_name}}</td>
										<td>{{$employee->last_name}}</td>
										<td>{{$employee->company->name}}</td>
										<td>{{$employee->email}}</td>
										<td>{{$employee->phone}}</td>
										<td>
											<a href="{{ route('employees.edit',$employee->id)}}" class="btn btn-primary btn-sm">Edit</a>
										</td>
										<td>
											<form action="{{ route('employees.destroy', $employee->id)}}" method="post">
												@csrf
												@method('DELETE')
												<button class="btn btn-danger btn-sm" type="submit">Delete</button>
											</form>
										</td>
									</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	@endsection
