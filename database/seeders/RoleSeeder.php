<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'super_admin',
                'display_name' => 'المدير العام',
                'description' => 'صلاحية كاملة على النظام',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'admin',
                'display_name' => 'مدير النظام',
                'description' => 'يدير الطلبات والمستخدمين',
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
            [
                'name' => 'student',
                'display_name' => 'طالب',
                'description' => 'يقدم طلبات ويتابعها فقط',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}