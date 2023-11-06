<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'app-settings',
           'meeting-list',
           'meeting-create',
           'meeting-edit',
           'meeting-delete',
           'setting-edit',
           'camera-setting',
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}