<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RoleSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        $adminType = new \App\Models\Role();
        $adminType->key="admin";
        $adminType->name="Administrator";
        $adminType->description="Administrator";
        $adminType->save();

        $memberType = new \App\Models\Role();
        $memberType->key = "member";
        $memberType->name = "Member";
        $memberType->description = "Member";
        $memberType->save();




    }

}
