<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CompaniesController extends Controller
{
	public function index()
	{
		$items = Company::with('employees')->paginate(10);
		return $this->responseAPi(true, $items);
	}
	public function create(Request $request){

		$validator = $this->validator($request->all());

		if ($validator->fails()) {
		    return $this->responseAPi(false, $validator->errors());
		}
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
		return $this->responseAPi(true, $company);
	}
	public function view($id){
		$item = Company::with('employees')->find($id);
		return $this->responseAPi(true, $item);
	}
	public function edit(Request $request, $id){

		$validator = $this->validator($request->all());

		if ($validator->fails()) {
		    return $this->responseAPi(false, $validator->errors());
		}
		$filename = '';
		if($request->hasfile('logo')) 
		{ 
			$file = $request->file('logo');
			$extension = $file->getClientOriginalExtension(); 
			$filename = time().'.'.$extension;
			$file->move('uploads/logos/', $filename);
		}
		$item = Company::find($id);
		$item->name = $request->get('name');
		$item->email = $request->get('email');
		$item->logo = $filename;
		$item->website = $request->get('website');
		$item->save();

		return $this->responseAPi(true, $item);
	}
	public function delete($id){

		$item = Company::find($id);
		if ($item){

			$item->delete();
			return $this->responseAPi(true, 'Deleted success');
		}
		else {
			return $this->responseAPi(false, 'Company not found!');
		}
	}
	private function validator($data){

		return Validator::make($data, [
			'name' => 'required',
			'logo' => 'nullable|mimes:jpeg,png,jpg|dimensions:min_width=100,min_height=100',
			'email' => 'nullable|email',
			'phone' => 'nullable|string|min:6'
		]);
	}

}
