<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas=[
            [
                'role_name'=>'user'

            ], [
                'role_name'=>'admin'
            ], [
                'role_name'=>'guest'
            ]

        ];
        foreach($datas as $d){
            $model=new Role();
            $model->role_name=$d['role_name'];
            $model->save();
        }
    }
}
