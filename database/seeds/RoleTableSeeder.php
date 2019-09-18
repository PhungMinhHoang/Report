<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $admin_role = new Role();
        // $admin_role->slug = 'admin';
        // $admin_role->name = 'Administrator';
        // $admin_role->save();

        // $QA_role = new Role();
        // $QA_role->slug = 'QA';
        // $QA_role->name = 'Quality Assurance';
        // $QA_role->save();

        $QA_role = new Role();
        $QA_role->slug = 'QA-admin';
        $QA_role->name = 'Quality Assurance Administrator';
        $QA_role->save();
    }
}
