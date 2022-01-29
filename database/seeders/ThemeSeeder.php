<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
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
                'id'=>'1',
                'theme_name'=>'ambiance',
                'theme_ace_name'=>'ambiance',

            ],[
                'id'=>'2',
                'theme_name'=>'chaos',
                'theme_ace_name'=>'chaos',
            ],[
                'id'=>'3',
                'theme_name'=>'chrome',
                'theme_ace_name'=>'chrome',
            ],[
                'id'=>'4',
                'theme_name'=>'clouds midnight',
                'theme_ace_name'=>'clouds_midnight',
            ],[
                'id'=>'5',
                'theme_name'=>'cobalt',
                'theme_ace_name'=>'cobalt',
            ]
        ];
        foreach($datas as $d){
            $model=new Theme();
            $model->id=$d['id'];
            $model->theme_name=$d['theme_name'];
            $model->theme_ace_name=$d['theme_ace_name'];
            $model->save();
        }
    }
}
