<?php

namespace App\Http\Controllers\Api;
use Illuminate\Validation\Rule;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class EmployeesController extends Controller
{
	public function index()
	{
		$items = Employee::with('company')->paginate(10);
		return $this->responseApi(true, $items);
	}
	public function create(Request $request){

		$validator = $this->validator($request->all());

		if ($validator->fails()) {
			return $this->responseAPi(false, $validator->errors());
		}
		$employee = Employee::create([
			'first_name' => $request->get('first_name'),
			'last_name' => $request->get('last_name'),
			'company_id' => $request->get('company_id'),
			'email' => $request->get('email'),
			'phone' => $request->get('phone'),
		]);
		$employee->save();
		return $this->responseApi(true, $employee);
	}
	public function view($id){
		$employee = Employee::with('company')->find($id);
		return $this->responseApi(true, $employee);
	} 
	public function edit(Request $request){

		$validator = $this->validator($request->all());

		if ($validator->fails()) {
			return $this->responseAPi(false, $validator->errors());
		}
		$employee = Employee::find($id);
		$employee->first_name = $request->get('first_name');
		$employee->last_name = $request->get('last_name');
		$employee->company_id = $request->get('company_id');
		$employee->email = $request->get('email');
		$employee->phone = $request->get('phone');
		$employee->save();

		return $this->responseApi(true, $employee);

	}
	public function delete($id){

		$employee = Employee::find($id);
		$employee->delete();
		return $this->responseApi(true, 'Employee deleted success!');
	}
	private function validator($data){

		return Validator::make($data, [
			'first_name' => 'required|string|min:6',
			'last_name' => 'required|string|min:6',
			'company_id' => 'required|integer|exists:companies,id', 
			'email' => 'nullable|string|email',
			'phone' => 'nullable|string|min:6'
		]);
	}
}
