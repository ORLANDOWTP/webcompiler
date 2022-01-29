<?php

namespace Database\Seeders;

use App\Models\Directory;
use App\Models\Language;
use Illuminate\Database\Seeder;

class DirectorySeeder extends Seeder
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
                'directory_name'=>'root',
                'user_id'=>'1',
                'is_visible'=>true

            ], [
                'directory_name'=>'debug',
                'user_id'=>'1',
                'is_visible'=>false

            ], [
                'directory_name'=>'root',
                'user_id'=>'2',
                'is_visible'=>true

            ], [
                'directory_name'=>'debug',
                'user_id'=>'2',
                'is_visible'=>false
            ],

        ];
        foreach($datas as $d){
            $model=new Directory();
            $model->directory_name=$d['directory_name'];
            $model->user_id=$d['user_id'];
            $model->is_visible=$d['is_visible'];
            $model->save();
        }
    }
}
