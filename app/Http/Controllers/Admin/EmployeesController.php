<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployee;

class EmployeesController extends Controller
{
	public function index()
	{
		$items = Employee::with('company')->paginate(10);

		return view('admin.employees.index', compact('items'));
	}

	public function create()
	{
		$companies = Company::all();
		return view('admin.employees.create', compact('companies'));
	}

	public function store(StoreEmployee $request)
	{
		$validated = $request->validated();
		$employee = Employee::create([
			'first_name' => $request->get('first_name'),
			'last_name' => $request->get('last_name'),
			'company_id' => $request->get('company_id'),
			'email' => $request->get('email'),
			'phone' => $request->get('phone')
		]);
		$employee->save();

		return redirect('/admin/employees')->with('success', 'Employee saved!');
	}

	public function show($id)
	{
		$employee = Employee::findOrFail($id);
		return view('admin.employees.view', compact('employee'));
	}

	public function edit($id)
	{
		$employee = Employee::findOrFail($id);
			$companies = Company::all();
			return view('admin.employees.edit',compact('employee', 'companies'));
	}

	public function update(StoreEmployee $request, $id)
	{

		$validated = $request->validated();
		$item = Employee::find($id);
		$item->first_name = $request->get('first_name');
		$item->last_name = $request->get('last_name');
		$item->company_id = $request->get('company_id');
		$item->email = $request->get('email');
		$item->phone = $request->get('phone');
		$item->save();
		return redirect('/admin/employees')->with('success', 'Employee update!');
	}

	public function destroy($id)
	{
		$item = Employee::find($id);
		if ($item){
			$item->delete();
			return redirect('/admin/employees')->with('success', 'Employee deleted!');
		} else {

		return redirect('/admin/employees')->with('error', 'Employee not found!');
		}
	}
}
