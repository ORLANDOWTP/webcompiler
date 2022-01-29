<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $datas=[
            [
                'id'=>'1',
                'name'=>'orlando',
                'role_id'=>Role::where('role_name','admin')->first()->id,
                'email'=>'orlando@gmail.com',
                'password'=>bcrypt('orlando123'),
                'theme_id'=>1,
                'result_background_color'=>'#000000',
                'result_text_color'=>'#FFFFFF',
                'font_size'=>18,
                'result_font_size'=>18,
                'currently_used_language'=>Language::where('language_name','html')->first()->id,
            ],[
                'id'=>'2',
                'name'=>'tes',
                'role_id'=>Role::where('role_name','user')->first()->id,
                'email'=>'tes@gmail.com',
                'password'=>bcrypt('tes123'),
                'theme_id'=>1,
                'result_background_color'=>'#000000',
                'result_text_color'=>'#FFFFFF',
                'font_size'=>18,
                'result_font_size'=>18,
                'currently_used_language'=>Language::where('language_name','html')->first()->id,
            ]
        ];
        foreach($datas as $d){
            $model=new User();
            $model->id=$d['id'];
            $model->role_id=$d['role_id'];
            $model->name=$d['name'];
            $model->email=$d['email'];
            $model->password=$d['password'];
            $model->theme_id=$d['theme_id'];
            $model->result_background_color=$d['result_background_color'];
            $model->result_text_color=$d['result_text_color'];
            $model->font_size=$d['font_size'];
            $model->result_font_size=$d['result_font_size'];
            $model->currently_used_language=$d['currently_used_language'];
            $model->save();
        }
    }
}
