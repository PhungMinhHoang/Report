<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::where('slug','admin')->first();
        $QA_role = Role::where('slug','QA')->first();
        $QA_admin_role = Role::where('slug','QA-admin')->first();

        $developer_create = new User();
        $developer_create->name = 'admin';
        $developer_create->email = 'admin';
        $developer_create->password = bcrypt('123456a@');
        $developer_create->save();
        $developer_create->roles()->attach($QA_admin_role);

        // $developer_create = new User();
        // $developer_create->name = 'hoangpm7';
        // $developer_create->email = 'hoangpm7@viettel.com.vn';
        // $developer_create->password = bcrypt('123456a@');
        // $developer_create->save();
        // $developer_create->roles()->attach($admin_role);

        // $developer_create = new User();
        // $developer_create->name = 'tuanha35';
        // $developer_create->email = 'tuanha35@viettel.com.vn';
        // $developer_create->password = bcrypt('123456a@');
        // $developer_create->save();
        // $developer_create->roles()->attach($QA_role);

        // $developer_create = new User();
        // $developer_create->name = 'anhpnq';
        // $developer_create->email = 'anhpnq@viettel.com.vn';
        // $developer_create->password = bcrypt('123456a@');
        // $developer_create->save();
        // $developer_create->roles()->attach($QA_role);
        
        // $developer_create = new User();
        // $developer_create->name = 'dungnt125';
        // $developer_create->email = 'dungnt125@viettel.com.vn';
        // $developer_create->password = bcrypt('123456a@');
        // $developer_create->save();
        // $developer_create->roles()->attach($QA_role);

        // $developer_create = new User();
        // $developer_create->name = 'anhlp5';
        // $developer_create->email = 'anhlp5@viettel.com.vn';
        // $developer_create->password = bcrypt('123456a@');
        // $developer_create->save();
        // $developer_create->roles()->attach($QA_role);

        // $developer_create = new User();
        // $developer_create->name = 'giangptt';
        // $developer_create->email = 'giangptt@viettel.com.vn';
        // $developer_create->password = bcrypt('123456a@');
        // $developer_create->save();
        // $developer_create->roles()->attach($QA_role);

        // $developer_create = new User();
        // $developer_create->name = 'hangpt5';
        // $developer_create->email = 'hangpt5@viettel.com.vn';
        // $developer_create->password = bcrypt('123456a@');
        // $developer_create->save();
        // $developer_create->roles()->attach($QA_role);

        // $developer_create = new User();
        // $developer_create->name = 'hoanpt1';
        // $developer_create->email = 'hoanpt1@viettel.com.vn';
        // $developer_create->password = bcrypt('123456a@');
        // $developer_create->save();
        // $developer_create->roles()->attach($QA_role);

        // $developer_create = new User();
        // $developer_create->name = 'hongnt45';
        // $developer_create->email = 'hongnt45@viettel.com.vn';
        // $developer_create->password = bcrypt('123456a@');
        // $developer_create->save();
        // $developer_create->roles()->attach($QA_role);

        // $developer_create = new User();
        // $developer_create->name = 'namph3';
        // $developer_create->email = 'namph3@viettel.com.vn';
        // $developer_create->password = bcrypt('123456a@');
        // $developer_create->save();
        // $developer_create->roles()->attach($QA_role);

        // $developer_create = new User();
        // $developer_create->name = 'ngant10';
        // $developer_create->email = 'ngant10@viettel.com.vn';
        // $developer_create->password = bcrypt('123456a@');
        // $developer_create->save();
        // $developer_create->roles()->attach($QA_role);

        // $developer_create = new User();
        // $developer_create->name = 'thanghm';
        // $developer_create->email = 'thanghm@viettel.com.vn';
        // $developer_create->password = bcrypt('123456a@');
        // $developer_create->save();
        // $developer_create->roles()->attach($QA_role);

        // $developer_create = new User();
        // $developer_create->name = 'tuanld';
        // $developer_create->email = 'tuanld@viettel.com.vn';
        // $developer_create->password = bcrypt('123456a@');
        // $developer_create->save();
        // $developer_create->roles()->attach($QA_role);

        // $developer_create = new User();
        // $developer_create->name = 'lienvt1';
        // $developer_create->email = 'lienvt1@viettel.com.vn';
        // $developer_create->password = bcrypt('123456a@');
        // $developer_create->save();
        // $developer_create->roles()->attach($QA_role);
    }
}
