<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
class Employees extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$fake_employee = [
			'first_name' => Str::random(6),
			'last_name' => Str::random(6),
			'company_id' => 1,
			'email' => Str::random(4).'@gmail.com',
			'phone' => '+7xxxxxxxxxxx',
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		];
		DB::table('employees')->insert($fake_employee);
	}
}
