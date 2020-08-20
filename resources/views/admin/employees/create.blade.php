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
					<div class="card-header">Add Employees
					</div>
					<div class="card-body">
						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<ul style="margin-bottom:0">
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						<form method="post" action="{{ route('employees.store') }}">
							@csrf
							<div class="form-group">
								<label for="exampleFormControlInput1">First Name</label>
								<input type="text" class="form-control" name="first_name" id="exampleFormControlInput1" placeholder="Alex">
							</div>
							<div class="form-group">
								<label for="exampleFormControlSelect1">Last Name</label>
								<input type="text" class="form-control" name="last_name" id="exampleFormControlInput1" placeholder="Family">
							</div>

							<div class="form-group">
								<label for="exampleFormControlSelect1">Email</label>
								<input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Email">
							</div>

							<div class="form-group">
								<label for="exampleFormControlSelect1">Phone</label>
								<input type="tel" class="form-control" name="phone" id="exampleFormControlInput1" placeholder="+7xxxxxxxxxx">
							</div>
							<div class="form-group">
								<label for="exampleFormControlSelect1">Select Company</label>
								<select class="form-control" name="company_id" id="exampleFormControlSelect1">
									@foreach($companies as $company)
										<option value="{{ $company->id }}">{{ $company->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="col text-center">
								<button class="btn btn-primary mb-2">Create</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	@endsection
