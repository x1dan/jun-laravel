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
					<div class="card-header">Edit Company {{$company->name}}
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
						<form method="post" enctype="multipart/form-data" action="{{ route('companies.update', $company->id ) }}">
							@method('PATCH') 
							@csrf
							<div class="form-group">
								<label for="exampleFormControlInput1">Name</label>
								<input type="text" class="form-control" name="name" id="exampleFormControlInput1" value="{{$company->name}}" placeholder="Google inc">
							</div>
							<div class="form-group">
								<label for="exampleFormControlSelect1">Email</label>
								<input type="email" class="form-control" name="email" value="{{$company->email}}" id="exampleFormControlInput1" placeholder="Email">
							</div>
							<div class="form-group">
								<label for="exampleFormControlFile1">Logo</label>
								<input type="file" class="form-control-file" name="logo" id="exampleFormControlFile1">
							</div>
							<div class="form-group">
								<label for="exampleFormControlSelect1">Website</label>
								<input type="text" class="form-control" name="website" value="{{$company->website}}" id="exampleFormControlInput1" placeholder="https://google.com">
							</div>

							<div class="col text-center">
								<button class="btn btn-primary mb-2">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	@endsection
