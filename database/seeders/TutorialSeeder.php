<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Tutorial;
use Illuminate\Database\Seeder;

class TutorialSeeder extends Seeder
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
                'tutorial_name'=>'C Foundation',
                'language_id'=>Language::where('language_name','c')->first()->id,
                'tutorial_chapter'=>1,
                'tutorial_file_name'=>'cpp.pdf'

            ], [
                'tutorial_name'=>'HTML Foundation',
                'language_id'=>Language::where('language_name','html')->first()->id,
                'tutorial_chapter'=>1,
                'tutorial_file_name'=>'html.pdf'

            ], [
                'tutorial_name'=>'Java Foundation',
                'language_id'=>Language::where('language_name','java')->first()->id,
                'tutorial_chapter'=>1,
                'tutorial_file_name'=>'java.pdf'

            ],[
                'tutorial_name'=>'Test',
                'language_id'=>Language::where('language_name','java')->first()->id,
                'tutorial_chapter'=>2,
                'tutorial_file_name'=>'demodoc.pdf'

            ],

        ];
        foreach($datas as $d){
            $model=new Tutorial();
            $model->tutorial_name=$d['tutorial_name'];
            $model->language_id=$d['language_id'];
            $model->tutorial_chapter=$d['tutorial_chapter'];
            $model->tutorial_file_name=$d['tutorial_file_name'];
            $model->save();
        }
    }
}
