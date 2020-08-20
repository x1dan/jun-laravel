@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">Welcome</div>

					<div class="card-body">
						<h1>Task to Test Junior Laravel Developer Skills </h1>
						<h3>Basically, u'll need to bring a small project to manage companies and their employees. Mini-CRM. </h3>
						<p><strong>There are a few steps to accomplish this task:</strong></p>
						<ul>
							<li>Basic Laravel Auth: ability to log in as administrator.</li>
							<li>Use database seeds to create first user with email <a href="mailto:admin@admin.com">admin@admin.com</a> and password “password”.</li>
							<li>CRUD functionality (Create / Read / Update / Delete) for two menu items: Companies and Employees.</li>
							<li>Companies DB table consists of these fields: Name (required), email, logo (minimum 100×100), website.</li>
							<li>Employees DB table consists of these fields: First name (required), last name (required), Company (foreign key to Companies), email, phone.</li>
							<li>Use database migrations to create those schemas above.</li>
							<li>Store companies logos in storage/app/public folder and make them accessible from public.</li>
							<li>Use basic Laravel resource controllers with default methods – index, create, store etc.</li>
							<li>Use Laravel’s validation function, using Request classes.</li>
							<li>Use Laravel’s pagination for showing Companies/Employees list, 10 entries per page.</li>
							<li>Use Laravel make:auth as default Bootstrap-based design theme, but remove ability to register.</li>
							<li><em>Also a point is to not use 3rd party packages in this task. Well, laravelcollective/html it’s allowed and also guzzle but another package to solve the problem with files or another stuff is prohibited.</em></li>
						</ul>
						<p><strong>Create REST API with Laravel</strong></p>
						<ul>
							<li>Create simple REST API with register,login,etc. functionality.</li>
							<li>Use jwt-token based auth.</li>
							<li>CRUD functionality to Companies and Employees via API methods.</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
