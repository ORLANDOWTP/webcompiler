<?php

namespace Database\Seeders;

use App\Models\Snippet;
use Illuminate\Database\Seeder;

class SnippetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas=[
            [ 'id'=>1, 'snippet_name'=>'Arrays in General', 'snippet_file_name' => 'Arrays in General.c', 'language_id'=>2],
            [ 'id'=>2, 'snippet_name'=>'Function getchar & putchar', 'snippet_file_name' => 'Function getchar & putchar.c', 'language_id'=>2],
            [ 'id'=>3, 'snippet_name'=>'Function gets & puts', 'snippet_file_name' => 'Function gets & puts.c', 'language_id'=>2],
            [ 'id'=>4, 'snippet_name'=>'Function scanf & printf', 'snippet_file_name' => 'Function scanf & printf.c', 'language_id'=>2],
            [ 'id'=>5, 'snippet_name'=>'Function-Call By Reference', 'snippet_file_name' => 'Function-Call By Reference.c', 'language_id'=>2],
            [ 'id'=>6, 'snippet_name'=>'Function-Call by Value', 'snippet_file_name' => 'Function-Call by Value.c', 'language_id'=>2],
            [ 'id'=>7, 'snippet_name'=>'If Else Statement', 'snippet_file_name' => 'If Else Statement.c', 'language_id'=>2],
            [ 'id'=>8, 'snippet_name'=>'Looping Do...While', 'snippet_file_name' => 'Looping Do...While.c', 'language_id'=>2],
            [ 'id'=>9, 'snippet_name'=>'Looping For', 'snippet_file_name' => 'Looping For.c', 'language_id'=>2],
            [ 'id'=>10, 'snippet_name'=>'Looping While', 'snippet_file_name' => 'Looping While.c', 'language_id'=>2],
            [ 'id'=>11, 'snippet_name'=>'Multidimensional Arrays', 'snippet_file_name' => 'Multidimensional Arrays.c', 'language_id'=>2],
            [ 'id'=>12, 'snippet_name'=>'Switch Statement', 'snippet_file_name' => 'Switch Statement.c', 'language_id'=>2],
            [ 'id'=>13, 'snippet_name'=>'Arrays in General', 'snippet_file_name' => 'Arrays in General.cs', 'language_id'=>6],
            [ 'id'=>14, 'snippet_name'=>'Console Input', 'snippet_file_name' => 'Console Input.cs', 'language_id'=>6],
            [ 'id'=>15, 'snippet_name'=>'Console Output', 'snippet_file_name' => 'Console Output.cs', 'language_id'=>6],
            [ 'id'=>16, 'snippet_name'=>'Function-Passing by ', 'snippet_file_name' => 'Function-Passing by Reference.cs', 'language_id'=>6],
            [ 'id'=>17, 'snippet_name'=>'Function-Passing by ', 'snippet_file_name' => 'Function-Passing by Value.cs', 'language_id'=>6],
            [ 'id'=>18, 'snippet_name'=>'If Else Statement', 'snippet_file_name' => 'If Else Statement.cs', 'language_id'=>6],
            [ 'id'=>19, 'snippet_name'=>'Jagged Arrays', 'snippet_file_name' => 'Jagged Arrays.cs', 'language_id'=>6],
            [ 'id'=>20, 'snippet_name'=>'Looping Do...While', 'snippet_file_name' => 'Looping Do...While.cs', 'language_id'=>6],
            [ 'id'=>21, 'snippet_name'=>'Looping For', 'snippet_file_name' => 'Looping For.cs', 'language_id'=>6],
            [ 'id'=>22, 'snippet_name'=>'Looping While', 'snippet_file_name' => 'Looping While.cs', 'language_id'=>6],
            [ 'id'=>23, 'snippet_name'=>'Multidimensional Arrays', 'snippet_file_name' => 'Multidimensional Arrays.cs', 'language_id'=>6],
            [ 'id'=>24, 'snippet_name'=>'Switch Statements', 'snippet_file_name' => 'Switch Statements.cs', 'language_id'=>6],
            [ 'id'=>25, 'snippet_name'=>'Arrays in General', 'snippet_file_name' => 'Arrays in General.cpp', 'language_id'=>4],
            [ 'id'=>26, 'snippet_name'=>'Basic Input-Output', 'snippet_file_name' => 'Basic Input-Output.cpp', 'language_id'=>4],
            [ 'id'=>27, 'snippet_name'=>'Function-Call by Ref', 'snippet_file_name' => 'Function-Call by Reference.cpp', 'language_id'=>4],
            [ 'id'=>28, 'snippet_name'=>'Function-Call By Val', 'snippet_file_name' => 'Function-Call By Value.cpp', 'language_id'=>4],
            [ 'id'=>29, 'snippet_name'=>'If..Else Statements', 'snippet_file_name' => 'If..Else Statements.cpp', 'language_id'=>4],
            [ 'id'=>30, 'snippet_name'=>'Looping Do...While', 'snippet_file_name' => 'Looping Do...While.cpp', 'language_id'=>4],
            [ 'id'=>31, 'snippet_name'=>'Looping For', 'snippet_file_name' => 'Looping For.cpp', 'language_id'=>4],
            [ 'id'=>32, 'snippet_name'=>'Looping While', 'snippet_file_name' => 'Looping While.cpp', 'language_id'=>4],
            [ 'id'=>33, 'snippet_name'=>'Multidimensional Arrays', 'snippet_file_name' => 'Multidimensional Arrays.cpp', 'language_id'=>4],
            [ 'id'=>34, 'snippet_name'=>'Switch Statements', 'snippet_file_name' => 'Switch Statements.cpp', 'language_id'=>4],
            [ 'id'=>35, 'snippet_name'=>'Blank with Snippet', 'snippet_file_name' => 'Blank with Snippet.html', 'language_id'=>1],
            [ 'id'=>36, 'snippet_name'=>'Array in General', 'snippet_file_name' => 'Array in General.java', 'language_id'=>3],
            [ 'id'=>37, 'snippet_name'=>'Basic Input-Output', 'snippet_file_name' => 'Basic Input-Output.java', 'language_id'=>3],
            [ 'id'=>38, 'snippet_name'=>'If Else Statement', 'snippet_file_name' => 'If Else Statement.java', 'language_id'=>3],
            [ 'id'=>39, 'snippet_name'=>'Looping Do...While', 'snippet_file_name' => 'Looping Do...While.java', 'language_id'=>3],
            [ 'id'=>40, 'snippet_name'=>'Looping For', 'snippet_file_name' => 'Looping For.java', 'language_id'=>3],
            [ 'id'=>41, 'snippet_name'=>'Looping While', 'snippet_file_name' => 'Looping While.java', 'language_id'=>3],
            [ 'id'=>42, 'snippet_name'=>'Method Overloading', 'snippet_file_name' => 'Method Overloading.java', 'language_id'=>3],
            [ 'id'=>43, 'snippet_name'=>'Method-Passing by Va', 'snippet_file_name' => 'Method-Passing by Value.java', 'language_id'=>3],
            [ 'id'=>44, 'snippet_name'=>'Switch Statement', 'snippet_file_name' => 'Switch Statement.java', 'language_id'=>3],
            [ 'id'=>45, 'snippet_name'=>'Basic Acessing Tuple', 'snippet_file_name' => 'Basic Acessing Tuples.py', 'language_id'=>5],
            [ 'id'=>46, 'snippet_name'=>'Basic Deleting Tuple', 'snippet_file_name' => 'Basic Deleting Tuples.py', 'language_id'=>5],
            [ 'id'=>47, 'snippet_name'=>'Basic Input-Ouput', 'snippet_file_name' => 'Basic Input-Ouput.py', 'language_id'=>5],
            [ 'id'=>48, 'snippet_name'=>'Basic Updating Tuple', 'snippet_file_name' => 'Basic Updating Tuples.py', 'language_id'=>5],
            [ 'id'=>49, 'snippet_name'=>'elif Statement', 'snippet_file_name' => 'elif Statement.py', 'language_id'=>5],
            [ 'id'=>50, 'snippet_name'=>'Function in Python', 'snippet_file_name' => 'Function in Python.py', 'language_id'=>5],
            [ 'id'=>51, 'snippet_name'=>'Looping For', 'snippet_file_name' => 'Looping For.py', 'language_id'=>5],
            [ 'id'=>52, 'snippet_name'=>'Looping While', 'snippet_file_name' => 'Looping While.py', 'language_id'=>5],
        ];
        foreach($datas as $d){
            $model=new Snippet();
            $model->id=$d['id'];
            $model->snippet_name=$d['snippet_name'];
            $model->snippet_file_name=$d['snippet_file_name'];
            $model->language_id=$d['language_id'];
            $model->save();
        }
    }
}
