<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompany;
class CompaniesController extends Controller
{
	public function index()
	{
		$items = Company::with('employees')->paginate(10);
		return view('admin.companies.index', compact('items'));
	}

	public function create()
	{
		return view('admin.companies.create');
	}

	public function store(StoreCompany $request)
	{
		$validated = $request->validated();
		$filename = '';
		if($request->hasfile('logo')) 
		{ 
			$file = $request->file('logo');
			$extension = $file->getClientOriginalExtension(); 
			$filename = time().'.'.$extension;
			$file->move('uploads/logos/', $filename);
		}
		$company = Company::create([
			'name' => $request->get('name'),
			'email' => $request->get('email'),
			'logo' => $filename,
			'website' => $request->get('website')
		]);
		$company->save();
		return redirect('/admin/companies')->with('success', 'Company saved!');
	}

	public function show($id)
	{
		$company = Company::find($id);
		return view('admin.companies.view', compact('company'));
	}

	public function edit($id)
	{
		$company = Company::find($id);
		return view('admin.companies.edit',compact('company'));
	}

	public function update(StoreCompany $request, $id)
	{

		$filename = '';
		if($request->hasfile('logo')) 
		{ 
			$file = $request->file('logo');
			$extension = $file->getClientOriginalExtension(); 
			$filename = time().'.'.$extension;
			$file->move('uploads/logos/', $filename);
		}
		$validated = $request->validated();
		$item = Company::find($id);
		$item->name = $request->get('name');
		$item->email = $request->get('email');
		$item->logo = $filename;
		$item->website = $request->get('website');
		$item->save();
		return redirect('/admin/companies')->with('success', 'Company update!');
	}

	public function destroy(Company $company)
	{
		$item = Company::find($company->id);
		$item->delete();
		return redirect('/admin/companies')->with('success', 'Company deleted!');
	}
}
