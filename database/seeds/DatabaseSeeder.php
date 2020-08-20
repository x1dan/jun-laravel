<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Companies::class);
        $this->call(Employees::class);
        $this->call(Users::class);
    }
}
