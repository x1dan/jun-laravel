@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card">
					@if(session()->get('success'))
						<div class="alert alert-success">
							{{ session()->get('success') }}  
						</div>
					@endif
					<div class="card-header">Companies
						<a href="{{ route('companies.create')}}" class="btn btn-primary float-right btn-sm">Add company</a>
					</div>
					<div class="card-body">
						@if (count($items) >= 1) 
						<table class="table table-striped">
							<thead>
								<tr>
									<td>ID</td>
									<td>Name</td>
									<td>Email</td>
									<td>Logo</td>
									<td>Website</td>
									<td>Count employees</td>
									<td colspan = 2>Actions</td>
								</tr>
							</thead>
							<tbody>
								@foreach($items as $company)
									<tr>
										<td>{{$company->id}}</td>
										<td>{{$company->name}}</td>
										<td>{{$company->email}}</td>
										<td>{!!$company->logo ? '<img class="img-fluid img-thumbnail" src="/uploads/logos/'.$company->logo.'" />' : ''!!}</td>
										<td>{{$company->website}}</td>
										<td>{{count($company->employees)}}</td>
										<td>
											<a href="{{ route('companies.edit',$company->id)}}" class="btn btn-primary btn-sm">Edit</a>
										</td>
										<td>
											<form action="{{ route('companies.destroy', $company->id)}}" method="post">
												@csrf
												@method('DELETE')
												<button class="btn btn-danger btn-sm" type="submit">Delete</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>

			@else
	<p>Not found items</p>
	@endif
					</div>
					<div class="card-footer">
						{{ $items->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
