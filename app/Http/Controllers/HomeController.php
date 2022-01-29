<?php

namespace App\Http\Controllers;

use App\Models\Directory;
use App\Models\File;
use App\Models\Language;
use App\Models\Role;
use App\Models\Snippet;
use App\Models\Theme;
use App\Models\Tutorial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang=Language::all();
        $theme=Theme::all();

        if(!Auth::check()){
            $snippet=Snippet::where('language_id',1)->get();
            $role=Role::where('role_name','guest')->first();
            $statement = DB::select("show table status like 'users'");
            $guest=new User();
            $guest->role_id=$role->id;
            $guest->name='Guest';
            $guest->email=Str::random(30);
            $guest->password=bcrypt('guest'.$statement[0]->Auto_increment);
            $guest->theme_id=$theme->first()->id;
            $guest->result_background_color="#000000";
            $guest->result_text_color="#FFFFFF";
            $guest->font_size=18;
            $guest->result_font_size=18;
            $guest->currently_used_language=Language::where('language_name','html')->first()->id;
            $guest->save();
            Auth::login($guest);
        }
        else{
            $snippet=Snippet::where('language_id',Auth::user()->currentLanguage->id)->get();
        }
        $tutorial=Tutorial::where('language_id',Auth::user()->currentLanguage->id)->get();

        //buat folder debug dan root kalau belum ada
        $root=Directory::where('user_id',Auth::user()->id)->where('is_visible',1)->first();
        if(is_null($root)){
            $rootpath="folder/".Auth::user()->id.'root/root';
            if (!is_dir($rootpath))
            {
                mkdir($rootpath, 0755, true);
                $rootDirectory=new Directory();
                $rootDirectory->directory_name="root";
                $rootDirectory->user_id=Auth::user()->id;
                $rootDirectory->is_visible=true;
                $rootDirectory->save();
            }
            $debugpath="folder/".Auth::user()->id.'root/debug';
            if(!is_dir($debugpath)){
                mkdir($debugpath, 0755, true);
                $debugDirectory=new Directory();
                $debugDirectory->directory_name="debug";
                $debugDirectory->user_id=Auth::user()->id;
                $debugDirectory->is_visible=false;
                $debugDirectory->save();
            }
        }


        return view('home',compact(['lang','theme','snippet','tutorial']));

    }
    public function setLanguage(Request $request){
        $user = User::find(Auth::user()->id);
        $user->currently_used_language=$request->currently_used_language;
        $user->save();
        $id= $request->currently_used_language;
        $language = Language::find($id);
        return json_encode($language);

    }
    public function changePDF(Request $request){
        $tutorial=Tutorial::where('language_id',$request->currently_used_language)->get();
        return $tutorial;
    }
    public function saveSetting(Request $request){
        $user = User::find(Auth::user()->id);
        $user->result_background_color = $request->result_background_color;
        $user->result_text_color = $request->result_text_color;
        $user->font_size = $request->font_size;
        $user->theme_id = $request->theme_id;
        $user->result_font_size = $request->result_font_size;
        $user->save();
        $data = Theme::find($request->theme_id);
        return json_encode($data);
    }
    public function getSnippet(Request $request){
        $data = Snippet::where('language_id',$request->id)->get();
        return json_encode($data);
    }
    public function getSnippetValue(Request $request){
        $snippet = Snippet::with('language')->find($request->id);
        $files = fopen("snippets/".$snippet->language->language_name."/".$snippet->snippet_file_name,"r");
      	$data="";
      	while(!feof($files)){
      		$data.=fgets($files);
      	}
      	fclose($files);
      	return $data;
    }
    public function getTutorial(Request $request){
		$tutorial_id = $request->id;
		$data = Tutorial::find($tutorial_id);

		return json_encode($data);
	}
    public function getTutorialByLanguage(Request $request){
		$language_id = $request->languageid;
		$data = Tutorial::where('language_id',$language_id)->get();

		return $data;
	}
    public function getDirectory(Request $req){
        $user_id= Auth::user()->id;
        $data = Directory::where("user_id",$user_id)->where("is_visible","1")->get();

        return json_encode($data);
    }
    public function getDirectoryFiles(Request $request){
        $id = $request->id;
        $data = File::where("directory_id",$id)->get();
        return json_encode($data);
    }
    public function checkAvailability(Request $request){
		$dirid = $request->dirid;
		$filename = $request->file_name;
		$langid= $request->lang_id;


    	$language = Language::find($langid);
		$data = File::where("file_name",$filename.".".$language->language_ext)->where("directory_id",$dirid)->count();

		echo $data;

	}
    public function createFile(Request $request)
    {
    	$lang_id = $request->lang_id;
    	$dir_id = $request->id;
    	$data = $request->data;
    	$file_name = $request->file_name;

        $directory = Directory::find($dir_id);
    	$language = Language::find($lang_id);

        if(Auth::user()->role->role_name=="guest"){
            $dir_id = Directory::where("user_id",Auth::user()->id)->first()->id;
            $directory = Directory::find($dir_id);
            $file_name = "file".Auth::user()->id;
        }


  		$datas = File::where("file_name",$file_name.".".$language->language_ext)->where("directory_id",$request->id)->count();

  		if($datas==0){

  	    	$file = new File();
  	    	$file->file_name = $file_name.'.'.$language->language_ext;
  	    	$file->directory_id = $dir_id;
  	    	$file->language_id = $lang_id;
  	    	$file->save();


  	    	echo $file->id;
  		}else{
  			$file= File::where("file_name",$file_name.".".$language->language_ext)->where("directory_id",$request->id)->first();
  			echo $file->id;
  		}


        $dirpath="folder/".Auth::user()->id.'root/'.$directory->directory_name;
        if (!is_dir($dirpath))
        {
            mkdir($dirpath, 0755, true);
        }
        touch($dirpath.'/'.$file_name.'.'.$language->language_ext);

    	$file = fopen($dirpath.'/'.$file_name.'.'.$language->language_ext,"w");
    	fwrite($file, $data);
    	fclose($file);

		return $dirpath.'/'.$file_name.'.'.$language->language_ext;
    }
    public function createFolder(Request $request)
    {
    	$dir_name = $request->dir_name;

    	$cekdata = Directory::where("directory_name",$dir_name)->where("user_id", Auth::user()->id)->count();

    	if($cekdata==0){

            $folder = new Directory();
            $folder->directory_name = $dir_name;
            $folder->is_visible = 1;
            $folder->user_id = Auth::user()->id;
            $folder->save();
            $dirpath='folder/'.Auth::user()->id.'root/'.$dir_name;
            mkdir($dirpath, 0755, true);
            return json_encode($folder);

    	}
        else{
    		echo -1;
    	}

    }
    public function renameFolder(Request $request){
        $isfolder = $request->isfolder;
        $dirid = $request->dirid;
        $folder_name  = $request->folder_name;
        $cekdata = Directory::where("directory_name",$folder_name)->where("user_id", Auth::user()->id)->count();

    	if($cekdata==0){
            if($isfolder){
                $dir = Directory::find($dirid);
                $dirpath="folder/".Auth::user()->id.'root/'.$dir->directory_name;
                if (!is_dir($dirpath))
                {
                    mkdir($dirpath, 0755, true);
                }
                rename($dirpath,"folder/".Auth::user()->id."root/".$folder_name);

                $dir->directory_name = $folder_name;
                $dir->save();
                return $dir;
            }
        }
        else{
            echo -1;

        }


    }
    public function deleteFolder(Request $request){
        $dirid = $request->input("dirid");
        $dir = Directory::find($dirid);
        $data = glob("folder/".Auth::user()->id."root/".$dir->directory_name."/*");
        foreach ($data as $key) {
            unlink($key);
        }
        $dirpath="folder/".Auth::user()->id.'root/'.$dir->directory_name;
        if (!is_dir($dirpath))
        {
            mkdir($dirpath, 0755, true);
        }
        rmdir($dirpath);
        $dir->delete();
        echo true;
    }
    public function deleteFile(Request $request){

        $fileid = $request->input("fileid");
        $data = File::find($fileid);
        $dir = Directory::find($data->directory_id);
        unlink("folder/".Auth::user()->id."root/".$dir->directory_name."/".$data->file_name);
        $data->delete();
        echo true;
    }
    public function checkRenameFileAvailability(Request $request){
        $directoryid = $request->input('dirid');
        $filename = $request->input("filename");
        $fileext= $request->input("fileext");
        $count = File::where('directory_id',$directoryid)
                        ->where('file_name',$filename.$fileext)
                        ->count();
        return json_encode($count);
    }
    public function renameFile(Request $request){
        $isfolder = $request->isfolder;
        $fileid = $request->fileid;
        $file_name  = $request->file_name;
        if(!$isfolder){
            $file = File::with('language')->where('id',$fileid)->first();
            // $lang = Language::find($file->language_id);
            $file_name .=".".$file->language->language_ext;
            $dir = Directory::find($file->directory_id);
            rename("folder/".Auth::user()->id."root/".$dir->directory_name."/".$file->file_name,"folder/".Auth::user()->id."root/".$dir->directory_name."/".$file_name);

            $file->file_name = $file_name;
            $file->save();
            return $file;
        }
        echo false;
    }

    public function openFile(Request $request){
		$fileid= $request->input('id');

		$file = File::find($fileid);

		$directory = Directory::find($file->directory_id);
		$directorypath="folder/".Auth::user()->id."root/".$directory->directory_name;
        if (!is_dir($directorypath))
        {
            // mkdir($dirpath, 0755, true);
            return null;
        }
        else{
            $files = fopen($directorypath.'/'.$file->file_name,"r");
            $data="";
            while(!feof($files)){
                $data.=fgets($files);
            }
            fclose($files);
            $result['file']=$file;
            $result['data']=$data;
            return $result;
        }

	}

    public function sendStartDebug(Request $request){
        putenv("PATH=C:\msys64\mingw64\bin;C:\cygwin64\bin\;C:\Python27;C:\Windows\Microsoft.NET\Framework64\v4.0.30319;C:\Program Files\Java\jdk1.8.0_241\bin;"); //masukin dulu pathnya

		$langid= $request->input("langid");
		$varname = $request->input("variablename");
        $vartype = $request->input("vartype");
        $breakline=$request->input("breakline");
        $fileid=$request->input("fileid");
        $sourcecode = $request->input("sourcecode");
		$input = $request->input("input");
        $debugIDPool=$request->input("debugIDPool");
        // dd($debugIDPool);
        // $startline = $request->input("startline");
        // $endline = $request->input("endline");
        //logic debug
        $directorypath="folder/".Auth::user()->id."root/debug";
        if (!is_dir($directorypath))
        {
            mkdir($directorypath, 0755, true);
        }
        $language=Language::where('id',$langid)->first();

    	//isi inputan
		// $inputData =$req->input('input');
		$inputFile = fopen('folder/'.Auth::user()->id.'root/debug/input.txt',"wb");
		fwrite($inputFile,$input);
		fclose($inputFile);
        $fileToBeDebug=File::with('directory')->where('id',$fileid)->first();
        touch('folder/'.Auth::user()->id.'root/debug/'.$fileToBeDebug->file_name);
        // dd($fileid);
        $files = fopen("folder/".Auth::user()->id."root/".$fileToBeDebug->directory->directory_name."/".$fileToBeDebug->file_name,"r");
      	$data="";
        $printStringType="";
        $openResultFile=fopen('folder/'.Auth::user()->id.'root/debug/result.txt',"wb");
        fclose($openResultFile);
        $current=1;
        if($language->id==Language::where('language_name','java')->first()->id){
            $data.="import java.io.FileWriter;\n";
            $data.="import java.io.PrintWriter;\n";
            $data.="import java.io.IOException;\n";
        }
        else if($language->id==Language::where('language_name','c#')->first()->id){
            $data.="using System.IO;\n";
        }
        $tempLineCode="";
      	while(!feof($files)){
            $tempLineCode=fgets($files);
      		$data.=$tempLineCode;
            for($i=0;$i<sizeof($breakline);$i++){
                if($breakline[$i]==$current){
                    if($vartype[$i]==1){
                        $printStringType="%d\\n";
                    }
                    else if($vartype[$i]==2){
                        $printStringType="%s\\n";
                    }
                    else if($vartype[$i]==3){
                        $printStringType="%f\\n";
                    }
                    else if($vartype[$i]==4){
                        $printStringType="%c\\n";
                    }
                    else if($vartype[$i]==5){
                        $printStringType="%s\\n";
                    }
                    if($language->id==Language::where('language_name','c')->first()->id||$language->id==Language::where('language_name','c++')->first()->id){

                        $data.="FILE *debugResult".$i."=fopen(\"result.txt\",\"a\");\n";
                        $data.="fprintf(debugResult".$i.",\"%d#%d#".$printStringType."\",".$debugIDPool[$i].",".$breakline[$i].",".$varname[$i].");\n";
                        $data.="fclose(debugResult".$i.");\n";
                    }
                    else if($language->id==Language::where('language_name','java')->first()->id){
                        $data.="try{\n";
                        $data.="FileWriter fileWriter".$i." = new FileWriter(\"result.txt\",true);\n";
                        $data.="PrintWriter printWriter".$i." = new PrintWriter(fileWriter".$i.");\n";
                        $data.="printWriter".$i.".printf(\"%d#%d#".$printStringType."\",".$debugIDPool[$i].",".$breakline[$i].",".$varname[$i].");\n";
                        $data.="printWriter".$i.".close();\n";
                        $data.="}catch (IOException e){\n";
                        $data.="e.printStackTrace();\n";
                        $data.="}\n";
                    }
                    else if($language->id==Language::where('language_name','python')->first()->id){
                        $firstCharacterBeforeIndent=[];
                        preg_match('/^[^a-z]*(?=[a-z])/i', $tempLineCode, $firstCharacterBeforeIndent);
                        $cekIndent=false;
                        $indentString="";
                        if(!empty($firstCharacterBeforeIndent)){
                            for($indent=0;$indent<strlen($firstCharacterBeforeIndent[0]);$indent++){
                                $indentString.=" ";
                            }
                            $cekIndent=true;

                        }
                        if(strrpos($tempLineCode, ":")==(strlen($tempLineCode)-3)){
                            $indentString.="   ";
                        }

                        if($cekIndent==true){
                            $data.=$indentString."f".$i." = open(\"result.txt\", \"a\")\n";
                            $data.=$indentString."f".$i.".write(\"%d#%d#".$printStringType."\" % (".$debugIDPool[$i].",".$breakline[$i].",".$varname[$i]."))\n";
                            $data.=$indentString."f".$i.".close()\n";
                        }
                        else{
                            $data.="f".$i." = open(\"result.txt\", \"a\")\n";
                            $data.="print(\"%d#%d#".$printStringType."\" % (".$debugIDPool[$i].",".$breakline[$i].",".$varname[$i]."),file=f".$i.")\n";
                            $data.="f.close()\n";
                        }


                    }
                    else if($language->id==Language::where('language_name','c#')->first()->id){
                        if($vartype[$i]==1){
                            $printStringType="D";
                        }
                        else if($vartype[$i]==2){
                            $printStringType="G";
                        }
                        else if($vartype[$i]==3){
                            $printStringType="N";
                        }
                        else if($vartype[$i]==4){
                            $printStringType="G";
                        }
                        else if($vartype[$i]==5){
                            $printStringType="G";
                        }
                        $data.="using (StreamWriter writer".$i." = new StreamWriter(\"result.txt\", append: true))\n";
                        $data.="{\n";
                        $data.="writer".$i.".WriteLine(\"{0:D}#{1:D}#{2:".$printStringType."}\",".$debugIDPool[$i].",".$breakline[$i].",".$varname[$i].");\n";
                        $data.="}\n";
                    }
                }
            }
            $current++;
      	}
      	fclose($files);

        $debugFile=fopen('folder/'.Auth::user()->id.'root/debug/'.$fileToBeDebug->file_name,"wb");

        fwrite($debugFile,$data);
		fclose($debugFile);
        chdir('folder/'.Auth::user()->id.'root/debug/');
        if($language->id==Language::where('language_name','c')->first()->id){
            exec(' gcc '.$fileToBeDebug->file_name.' -o '.$fileToBeDebug->id.' 2>&1',$strings);
            exec($fileToBeDebug->id.' <input.txt 2>&1',$strings);
            $result=array("");
            $i=0;
            foreach ($strings as $k) {
                $result['data'][$i]=$k;
                $i++;
            }
        }
        else if($language->id==Language::where('language_name','c++')->first()->id){

            exec('g++ '.$fileToBeDebug->file_name.' -o '.$fileToBeDebug->id.' 2>&1',$strings);
            exec($fileToBeDebug->id.' 2>&1 < input.txt',$strings);

            $data=array("");
            $i=0;
            foreach ($strings as $k) {
                $data['data'][$i]=$k;
                $i++;
            }
        }
        else if($language->id==Language::where('language_name','java')->first()->id){
            $string=[];
            exec('javac -cp . '.$fileToBeDebug->file_name." 2>&1 ",$string);
            // dd(exec('javac -cp . '.$fileToBeDebug->file_name." 2>&1 ",$string));
            $data=array("");
            $noerror=true;
            if(count($string)>0){
                $i=0;
                foreach ($string as $k) {
                    $data['data'][$i]=$k;
                    $i++;
                }
                $noerror=false;
            }

            if($noerror){
                exec("java ".substr($fileToBeDebug->file_name, 0,strpos($fileToBeDebug->file_name, '.'))."  2>&1  < input.txt",$string);
                $i=0;
                foreach ($string as $k) {
                    $data['data'][$i]=$k;
                    $i++;
                }
            }
        }
        else if($language->id==Language::where('language_name','python')->first()->id){
            exec('python '.$fileToBeDebug->file_name.' -o '.$fileToBeDebug->id.' 2>&1 < input.txt',$strings);
            exec($fileToBeDebug->id.'  < input.txt',$strings);
            $data=array("");
            $i=0;
            foreach ($strings as $k) {
                $data['data'][$i]=$k;
                $i++;
            }
        }
        else if($language->id==Language::where('language_name','c#')->first()->id){
            exec('C:\Windows\Microsoft.NET\Framework64\v4.0.30319\csc /out:'.$fileToBeDebug->id.'.exe '.$fileToBeDebug->file_name);
            exec($fileToBeDebug->id.'.exe  < input.txt',$strings);

            $data=array("");
            $i=0;
            foreach ($strings as $k) {
                $data['data'][$i]=$k;
                $i++;
            }
        }

        //save ke folder debug user terus jalankan kodingan pakai exec
        //hasilnya disimpan ke file txt dicatet dengan format value#line_number
        $finalDebugResult=[];
        $temp=[];

        $debugFileResult=fopen('result.txt',"r");
        $i=0;
        while(!feof($debugFileResult)){
            $file_per_line=fgets($debugFileResult);
            $temp=explode("#",$file_per_line);
            if(count($temp)==3){
                $finalDebugResult['data'][$i]['id']=$temp[0];
                $finalDebugResult['data'][$i]['breakline']=$temp[1];
                $finalDebugResult['data'][$i]['value']=$temp[2];
            }
            $i++;
        }
        fclose($debugFileResult);
        return $finalDebugResult;
    }

    public function compileCode(Request $request){
        //echo set_time_limit(200);
        //set_time_limit(5);
        //    putenv("PATH=C:\MinGW\bin;C:\cygwin64\bin\;C:\Python27;C:\Windows\Microsoft.NET\Framework64\v4.0.30319;C:\Program Files\Java\jdk1.8.0_131\bin;"); //masukin dulu pathnya
            putenv("PATH=C:\msys64\mingw64\bin;C:\cygwin64\bin\;C:\Python27;C:\Windows\Microsoft.NET\Framework64\v4.0.30319;C:\Program Files\Java\jdk1.8.0_241\bin;"); //masukin dulu pathnya

            //tentuin nama
            if(Auth::check()){
                $user = Auth::user();

                $code = $request->code;
                $file_id =$request->file_id;

                // dd($file_id);
                // buat ambil path directory
                $file = File::where('id',$file_id)->first();
                $directory = Directory::where('id',$file->directory_id)->first();
                //testing
                // $directory=Directory::where('user_id',$user->id)->first();
                $directorypath=$directory->directory_name;
                $fullpath="folder/".$user->id.'root/'.$directorypath;
                if (!is_dir($fullpath))
                {
                    mkdir($fullpath, 0755, true);
                }

                $files = fopen("folder/".$user->id.'root/'.$directorypath.'/'.$file->file_name, "wb");
                fwrite($files, $code);
                fclose($files);

                //write inputan
                $inputData =$request->input;
                //chdir('folder/'.$user->userid.'root/'.$directorypath);
                $files = fopen('folder/'.$user->id.'root/'.$directorypath.'/input.txt',"wb");
                fwrite($files,$inputData);
                fclose($files);

                $data['data'][0]="";

                    if($user->currently_used_language==Language::where('language_name','html')->first()->id){
                        $data['data'][0]="html";
                        // $data['data'][1]=$file->filename;
                        $data['data'][1]=$file->file_name;
                        $data['data'][2]=$directorypath;
                    }
                    else if($user->currently_used_language==Language::where('language_name','c')->first()->id){
                        chdir('folder/'.$user->id.'root/'.$directorypath);
                        //echo 'gcc '.'folder/'.$user->userid.'root/'.$directorypath.$file->filename.' -o '.$file->fileid;
                        exec(' gcc '.$file->file_name.' -o '.$file->id.' 2>&1',$strings);
                        // exec('gcc tes'.$file_ext.' -o tes 2>&1',$strings);
                        exec($file->id.' <input.txt 2>&1',$strings);
                        // exec('tes < input.txt 2>&1',$strings);


                        //echo 'gcc '.$file->filename.' -o text',$string;

                        //$data= "";
                        $data=array("");

                        $i=0;
                        //print_r($strings);

                        foreach ($strings as $k) {
                            $data['data'][$i]=$k;
                            //$data[$i]['data']=$k;
                            $i++;
                        }
                        //$data[100] = $cekpid;

                    }
                    else if($user->currently_used_language==Language::where('language_name','java')->first()->id){
                        chdir('folder/'.$user->id.'root/'.$directorypath);
                        $string=[];
                        exec('javac -cp . '.$file->file_name." 2>&1 ",$string);
                        // exec('javac -cp . tes'.$file_ext.' 2>&1 ',$string);
                        //$data="";
                        $data=array("");
                        $noerror=true;
                        if(count($string)>0){
                            $i=0;
                            foreach ($string as $k) {
                                $data['data'][$i]=$k;
                                $i++;
                            }
                            $noerror=false;
                        }

                        if($noerror){
                            exec("java ".substr($file->file_name, 0,strpos($file->file_name, '.'))."  2>&1  < input.txt",$string);
                            // exec("java ".substr('tes'.$file_ext,0,strpos('tes'.$file_ext,'.'))." 2>&1 < input.txt",$string);
                            $i=0;
                            //if(is_array($string)){
                              foreach ($string as $k) {
                                  $data['data'][$i]=$k;
                                  $i++;
                              }
                            //}else{
                            //$data['data'][0] = $string;
                            //}


                        }
                    }
                    else if($user->currently_used_language==Language::where('language_name','c++')->first()->id){
                        chdir('folder/'.$user->id.'root/'.$directorypath);
                        //echo 'gcc '.'folder/'.$user->userid.'root/'.$directorypath.$file->filename.' -o '.$file->fileid;

                        // exec('g++ '.$file->filename.' -o '.$file->fileid.' 2>&1',$strings);
                        // exec($file->fileid.' 2>&1 < input.txt',$strings);
                        exec('g++ '.$file->file_name.' -o '.$file->id.' 2>&1',$strings);
                        exec($file->id.' 2>&1 < input.txt',$strings);
                        // exec('g++ tes'.$file_ext.' -o tes 2>&1',$strings);
                        // exec($file->fileid.' <input.txt 2>&1',$strings);
                        // exec('tes 2>&1 <input.txt',$strings);
                        //echo 'gcc '.$file->filename.' -o text',$string;


                        //$data="";
                        $data=array("");
                        $i=0;
                        //print_r($strings);
                        foreach ($strings as $k) {
                            $data['data'][$i]=$k;
                            $i++;
                        }

                    }
                    else if($user->currently_used_language==Language::where('language_name','python')->first()->id){
                        chdir('folder/'.$user->id.'root/'.$directorypath);
                        exec('python '.$file->file_name.' -o '.$file->id.' 2>&1 < input.txt',$strings);
                        exec($file->id.'  < input.txt',$strings);

                        // exec('python tes'.$file_ext.' -o tes 2>&1 < input.txt',$strings);
                        // exec('tes < input.txt',$strings);

                        //$data="";
                        $data=array("");
                        $i=0;
                        //print_r($strings);
                        foreach ($strings as $k) {
                            $data['data'][$i]=$k;
                            $i++;
                        }

                    }
                    else if($user->currently_used_language==Language::where('language_name','c#')->first()->id){
                        chdir('folder/'.$user->id.'root/'.$directorypath);
                        exec('C:\Windows\Microsoft.NET\Framework64\v4.0.30319\csc /out:'.$file->id.'.exe '.$file->file_name);
                        exec($file->id.'.exe  < input.txt',$strings);

                        // exec('C:\Windows\Microsoft.NET\Framework64\v4.0.30319\csc /out:tes.exe tes'.$file_ext);
                        // exec('tes.exe  < input.txt',$strings);

                        //$data="";
                        $data=array("");
                        $i=0;
                        //print_r($strings);
                        foreach ($strings as $k) {
                            $data['data'][$i]=$k;
                            $i++;
                        }

                    }
                    echo json_encode($data);
            }


        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
