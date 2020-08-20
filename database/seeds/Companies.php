<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Companies extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$company_name = Str::random(6);
		$fake_company = [
			'name' => $company_name,
			'email' => Str::random(4).'@'.$company_name.'.com',
			'logo' => 'default_logo.png',
			'website' => $company_name.'.com', 
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
		];
		DB::table('companies')->insert($fake_company);
	}
}
