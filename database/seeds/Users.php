<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Users extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$fake_user = [
			'name' => 'admin',
			'email' => 'admin@admin.com',
			'password' => Hash::make('password')
		];
		DB::table('users')->insert($fake_user);   
	}
}
