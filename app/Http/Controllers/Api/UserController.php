<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
class UserController extends Controller {

	public function __construct()
	{
		$this->middleware('jwt.auth', ['except' => ['login', 'register', 'refresh']]);
	}
	public function login(Request $request){
		$valid_user = Validator::make($request->all(), [
			'email' => 'required|email',
			'password' => 'required'
		]);
		if ($valid_user->fails()){
			return $this->responseApi(false, $valid_user->messages());
		}
		$credentials = request(['email', 'password']);
		if (!$token = auth('api')->attempt($credentials)) {
			return $this->responseApi(false, 'Unauthorized');
		}
		return $this->respondWithToken($token);
	}
	public function register(Request $request){
		$valid_user = Validator::make($request->all(), [
			'name' => 'required|string|max:255',
			'email' => 'required|unique:users|string|email|max:255',
			'password' => 'required|string|min:6'
		]);
		if ($valid_user->fails()){
			return $this->responseApi(false, $valid_user->messages());
		}
		$user = User::create([
			'name' => $request->get('name'),
			'email' => $request->get('email'),
			'password' => Hash::make($request->get('password'))
		]); 	
		return $this->responseApi(true, $user);
	}

	public function me(){
		return $this->responseApi(true, auth()->user());
	}
	public function logout()
	{
		auth()->logout();
		return $this->responseApi(true, 'Successfully logged out');
	}

	public function refresh()
	{
		return $this->respondWithToken(auth()->refresh());
	}

	protected function respondWithToken($token)
	{
		$data = [
			'token' => $token,
			'expires_in' => auth('api')->factory()->getTTL() * 60
		];
		return $this->responseApi(true, $data);
	}

}
