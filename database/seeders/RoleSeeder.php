<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $all_permission=Permission::all();
        
            Role::create([
                'name'=>'Super Admin',
                'slug'=>'super-admin'
            ])->permissions()->sync($all_permission->pluck('id'));
            Role::create([
                'name'=>'Admin',
                'slug'=>'admin'
            ])->permissions()->sync($all_permission->pluck('id'));
            Role::create([
                'name'=>'Client',
                'slug'=>'client'
            ])->permissions()->sync($all_permission->pluck('id'));
        
    }
}
