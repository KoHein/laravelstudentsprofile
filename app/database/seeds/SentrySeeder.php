<?php
 
use App\Models\User;
 
class SentrySeeder extends Seeder {
 
    public function run()
    {
        DB::table('users')->delete();
        DB::table('groups')->delete();
        DB::table('users_groups')->delete();
 
        Sentry::getUserProvider()->create(array(
            'email'       => 'mmadmin@mmdevwork.com',
            'password'    => "@admin007",
            'first_name'  => 'MM',
            'last_name'   => 'Admin',
            'activated'   => 1,
        ));
 
        Sentry::getGroupProvider()->create(array(
            'name'        => 'Admin',
            'permissions' => array('admin' => 1),
        ));
 
        // Assign user permissions
        $adminUser  = Sentry::getUserProvider()->findByLogin('mmadmin@mmdevwork.com');
        $adminGroup = Sentry::getGroupProvider()->findByName('Admin');
        $adminUser->addGroup($adminGroup);
    }
 
}