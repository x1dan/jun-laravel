<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
		    'website' => $company_name.'.com' 
	    ];
	    DB::table('companies')->insert($fake_company);
    }
}
