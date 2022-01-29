<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
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
                'language_name'=>'html',
                'language_ext'=>'html',
                'language_ace_format'=>'html'

            ], [
                'language_name'=>'c',
                'language_ext'=>'c',
                'language_ace_format'=>'c_cpp'

            ], [
                'language_name'=>'java',
                'language_ext'=>'java',
                'language_ace_format'=>'java'

            ], [
                'language_name'=>'c++',
                'language_ext'=>'cpp',
                'language_ace_format'=>'c_cpp'

            ], [
                'language_name'=>'python',
                'language_ext'=>'py',
                'language_ace_format'=>'python'

            ], [
                'language_name'=>'c#',
                'language_ext'=>'cs',
                'language_ace_format'=>'c_cpp'

            ]

        ];
        foreach($datas as $d){
            $model=new Language();
            $model->language_name=$d['language_name'];
            $model->language_ext=$d['language_ext'];
            $model->language_ace_format=$d['language_ace_format'];
            $model->save();
        }
    }
}
