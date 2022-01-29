@extends('layouts.master')
@include('components.navbar')
@section('title', 'Login')
@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/login.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('css/debug-style.css') }}">

@endsection
@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-sm-10 p-0">
            <div class="card my-3">
                {{-- @yield('profile-content') --}}

                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="input-tab" data-bs-toggle="tab" data-bs-target="#input"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Input</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="setting-tab" data-bs-toggle="tab" data-bs-target="#setting"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">Setting</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="material-tab" data-bs-toggle="tab" data-bs-target="#material"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">Material</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active p-3" id="input" role="tabpanel" aria-labelledby="home-tab">
                            @include('components.input')
                        </div>
                        <div class="tab-pane fade p-3" id="setting" role="tabpanel" aria-labelledby="profile-tab">
                            @include('components.setting')
                        </div>
                        <div class="tab-pane fade p-3" id="material" role="tabpanel" aria-labelledby="contact-tab">
                            @include('components.material')
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-sm-10 place menus" style="background-color: #3d3d3d; padding:1vh 3vw; height:7vh;">
            <span style="color: white" id="choosenfilename">filename</span>
            <button data-bs-toggle="modal" data-bs-target="#modalSnippet" class="btn btn-primary" id="new-button">
                <i class="fas fa-plus"></i>
            </button>
            @if (Auth::check()&& Auth::user()->role->role_name!="guest")
                <button class="btn btn-primary" id="open" role="button" data-bs-toggle="modal"
                data-bs-target="#modalfolder">
                    <i class="fas fa-folder-open"></i>
                </button>
            @endif
            <button id="undo" style="color: white" class="btn btn-warning">
                <i class="fa fa-undo"></i>
            </button>
            <button id="redo" style="color: white" class="btn btn-warning">
                <i class="fa fa-repeat"></i>
            </button>
            @if (Auth::check()&& Auth::user()->role->role_name!="guest")
                <button href="#" class="btn btn-success" id="save" role="button" data-bs-toggle="modal"
                    data-bs-target="#modalfolder">
                    <i class="fas fa-save"></i>
                </button>
            @else
            <button href="#" class="btn btn-success" id="save" role="button">
                <i class="fas fa-save"></i>
            </button>
            @endif
            <button href="#" class="btn btn-danger" id="run-button" role="button">
                <i class="fas fa-play"></i>
            </button>

        </div>

    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-sm-5 place" id="editorplace" style="padding:0px 0px; height:70vh">
            <pre id="editor" style="height:100%; margin-top: 0px;border-radius:0px;"></pre>

        </div>
        <div class="col-sm-5 place" id="background-result"
            style="background-color: {{ Auth::user()->result_background_color }};color: {{ Auth::user()->result_text_color }}; height:70vh;padding-top: 1vh;overflow:scroll;">
            <div style="position:relative;">
                <div id="loading-animation" style="visibility :  hidden; position:absolute;">
                    {{-- <img src="{{ url('/img/hourglass.gif') }}" style="width:50px"> --}}
                    <div class="spinner-border text-warning" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <div id="result" style="position:absolute; font-size:20px;">
                    Result
                </div>

            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">

        <!--pdf-->
        <div class="col-sm-10 place" id="tutorial" style="height:80vh; padding:0px 0px;">
            @if (count($tutorial) > 0)
                <iframe id="pdf-viewer" src="{{ asset('/pdf/'.$tutorial->first()->tutorial_file_name) }}" width='100%' height='100%' allowfullscreen
                    webkitallowfullscreen>
                </iframe>
            @else
            <div class="d-flex justify-content-center" style="font-size: 30px">
                There are currently no tutorial for the selected programming language

            </div>
            @endif

        </div>
        <!--pdf done-->

    </div>
    @include('components.snippet')
    @include('components.save-modal')
    @include('components.rename-delete-modal')
    <script>
        var editor = ace.edit("editor");
        ace.require("ace/ext/language_tools");
        editor.setFontSize({{ Auth::user()->font_size }});
        editor.setOptions({
            enableBasicAutocompletion: true,
        });
        editor.setTheme("ace/theme/{{ Auth::user()->theme->theme_ace_name }}");

        var fileid = -1;
        var choosefile = -1;
        var choosenfile = -1;
        var choosedir = -1;
        var selectedSnippet = -1;
        var directoryid=-1;

        var debugid=0;
        var focusedline=0;
        var debugdata=[""];
        var debugIDPool=[];
        var delimeter="";
        var hightlightLine = 0;
        var debuglineanswer=0;
        var lengthdebugdata = 0;

        //set language
        editor.session.setMode("ace/mode/{{ Auth::user()->currentLanguage->language_ace_format }}");

        function changeLanguage() {
            var id = $(this).val();

            $.ajax({
                url: "{{ url('setLanguage') }}",
                method: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'currently_used_language': id,
                },
                dataType: "json",
                success: function(data) {
                    // console.log(data)
                    editor.session.setMode("ace/mode/" + data.language_ace_format);

                    // format = $("#languageid option:selected").text().toLowerCase();

                    // var text = $("#languageid option:selected").text();
                    $('#file_ext').val('.' + data.language_ext);
                    if (data.language_name == "html") {
                        $(".startdebug").attr("disabled", true);
                        $(".stopdebug").attr("disabled", true);

                    } else {
                        $(".startdebug").removeAttr("disabled");
                        $(".stopdebug").removeAttr("disabled");

                    }
                    alert(data.language_name.charAt(0).toUpperCase() + data.language_name.slice(1) +
                        " language has been apllied successfuly!");
                    $("#languageid").val(data.id)
                    location.reload();
                }
            });
        }
        $(document).ready(function(){
            var language_id=$("#languageid").val();

                if(language_id == 1){
                    $(".startdebug").attr("disabled",true);
                    $(".stopdebug").attr("disabled",true);

                }
                else{
                    $(".startdebug").removeAttr("disabled");
                    $(".stopdebug").removeAttr("disabled");

                }
        });
        function changeSettings() {
            $.ajax({
                url: "{{ url('saveSetting') }}",
                method: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "theme_id": $("#settheme").val(),
                    "result_background_color": $("#resultbackgroundcolor").val(),
                    "result_text_color": $("#resulttextcolor").val(),
                    "font_size": $('#setfontsize').val(),
                    "result_font_size": $("#setresultfontsize").val(),
                    // 'language_id': $("#languageid").val(),
                },
                dataType: "json",
                success: function(data) {

                    //   editor.session.setMode("ace/mode/"+data['language'].languageaceformat);

                    //   format =  $("#languageid option:selected").text().toLowerCase();

                    //   var text= $("#languageid option:selected").text();

                    $("#result").attr("style", "position:absolute; font-size:" + $("#setresultfontsize").val() +"px;");


                    editor.setFontSize(parseInt($('#setfontsize').val()));
                    //   $("#popup-all").attr("style","display:none;");

                    //   $('#file_ext').val('.'+data['language'].languageext);
                    //   choosefile=-1;
                    //   $("#filename").val(-1);
                    //   choosefile=-1;
                    //   fileid=-1;
                    //editor.setTheme("ace/theme/{{ Auth::user()->theme->themefilename }}");
                    editor.setTheme("ace/theme/" + data.theme_ace_name);
                    //console.log(data['theme'].themeid);

                    $("#background-result").attr("style", "background-color: " + $("#resultbackgroundcolor")
                        .val() + ";color: " + $("#resulttextcolor").val() +
                        "; height:70vh;padding-top: 1vh;overflow:scroll");
                }
            })
        }

        function getTutorial() {

            $.ajax({
                url: "{{ url('getTutorial') }}",
                method: "post",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id': $("#tutorialid").val(),
                },
                dataType: "json",
                success: function(data) {
                    //buat ganti si pdfnya
                    // $("#pdf-viewer").attr("src", "{{url('/pdf')}}/"+data.tutorial_file_name);
                    PDFObject.embed("/pdf/"+data.tutorial_file_name+"", "#tutorial");

                }
            });

        }
        function getTutorialByLanguage(languageid) {

            $.ajax({
                url: "{{ url('getTutorialByLanguage') }}",
                method: "post",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'languageid': languageid,
                },
                dataType: "json",
                success: function(data) {
                    //buat ganti si pdfnya
                    // $("#pdf-viewer").attr("src", "{{url('/pdf')}}/"+data.tutorial_file_name);
                    // PDFObject.embed("/pdf/"+data.tutorial_file_name+"", "#tutorial");
                    var result="";
                    for(var i=0;i<data.length;i++){

                        result+="<option value='"+data[i].id+"'>Chapter "+(i+1)+": "+data[i].tutorial_name+"</option>"
                    }
                    $('#tutorialid').html(result);
                }
            });

        }

        function setSelectedSnippet() {
            var allfile = $('.snippets');
            allfile.css('background-color', 'white');
            $(this).css('background-color', '#BBDEFB');
            selectedSnippet = this.id;
        }
        function getSnippet(){
            $.ajax({
                    url :"{{ url('getSnippet') }}",
                    method : "post",
                    data : {'_token':"{{ csrf_token() }}",
                                'id': $("#languageid").val(),
                            },
                    dataType : "json",
                    success: function(data){
                        var html = "";
                        for( var i=0;i<data.length;i++){
                                html+="<div class='col-md-2 col-sm-4 col-xs-6 snippets' id='"+data[i].id+"' style='overflow:hidden; min-height:100px;margin-top:10px; text-align:center;'>";
                                html+="<i class='fas fa-file-alt fa-5x'></i>";
                                html+="<br>"+data[i].snippet_name;
                                html+="</div>";
                        }
                      $('#snippetPlace').html(html);

                    }
                });
        }
        function getSnippetValue() {
            @if (Auth::user()->role->role_name != 'guest')
                $("#choosenfilename").html("");
            @endif
            if (selectedSnippet == 'blank') {
                editor.setValue("", -1);
            } else {
                $.ajax({
                    url: "{{ url('getSnippetValue') }}",
                    method: "post",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'id': selectedSnippet,
                    },
                    //dataType : "json",
                    success: function(data) {
                        var result=data.substring(data.indexOf("\n")+1,data.length)
                        editor.setValue(result, -1);
                    }
                });

            }
            choosefile=-1;
            choosenfile=-1
            $("#filename").val(-1);
            choosefile=-1;
            fileid=-1;
            $('#modalSnippet').modal('hide');
        }

        function undoCode() {
            editor.execCommand("undo", false, null);
        }

        function redoCode() {
            editor.execCommand("redo", false, null);
        }
        function saveButtonClick() {
            var alldir  = $('.save');
            alldir.css('background-color','white');

            var allfile  = $('.file');
            allfile.css('background-color','white');

            directoryid = -1;
            var txt = '<div class="col-md-12 col-sm-12 col-xs-12">';
            txt+='Please Choose Directory first';
            txt+='</div>';
            // $('#insidefile').html(txt);
            @if(Auth::check()&&Auth::user()->role->role_name=="guest")
                //ini save buat guest
                var value = editor.getValue();
                var dirid = directoryid;
                var langid = $('#languageid').val();
                var file_name = '{{Auth::user()->id}}';
                $.ajax({
                    url :"{{url('createFile')}}",
                    method : "post",
                    data : {'_token':"{{ csrf_token() }}",
                    'id': dirid,
                    'lang_id' : langid,
                    'file_name' : 'file'+file_name,
                    'data' : value },
                    success: function(data){
                        $("#filename").val(data);
                        console.log(data);
                        alert("Data successfuly saved. Your file name is : file{{Auth::user()->id}}");
                        // fileid = choosefile;
                        // choosenfile = data;
                        fileid = data.substring(1,data.indexOf("folder"));
                        var file_ext=data.substring(data.lastIndexOf("."),data.length);
                        $("#choosenfilename").html('file'+file_name+file_ext);
                        choosefile=fileid;
                        choosenfile = data;

                    }
                });
            @else

                fileid=-1;
                choosefile=-1;
                choosedir=-1;
                //$("#filename").val(-1);
                $.ajax({
                        url :"{{url('getDirectory')}}",
                        method : "post",
                        data : {_token:"{{ csrf_token() }}" },
                        dataType : "json",
                        success: function(data){

                            var append ='';
                            for(var i =0;i<data.length;i++){
                                append+='<div class="row save p-2" id="'+data[i].id+'" style="border-bottom: 2px solid #e5e5e5">';
                                append+='<div class="col-md-6 col-xs-8 col-sm-8 dirname" >';
                                append+=data[i].directory_name;
                                append+='</div>';
                                append+='<div class="menus col-md-6 col-xs-4 col-sm-4 d-flex justify-content-around" style="text-align : center;"  id="'+data[i].id+'">';
                                append+='<button class="btn btn-danger delete_folder"><i class="fas fa-trash-alt"></i></button>';
                                append+='<button class="btn btn-primary rename_folder"><i class="fas fa-edit"></i></button>';
                                append+='</div>';
                                append+='</div>';

                            }
                            //alert(data.file.length);

                            $('#file').html(append);

                        }
                    });

                cekopen = 0;
                $('#saveFileRow').css('display', 'flex');
                $('#chooseFile').css('display', 'none');


            @endif
        }

        function createFolder() {
            var folder_name = $('#folder_name').val();
            $('.save').attr('style', 'pointer-events: auto;');
            if(folder_name.length > 15 || folder_name.length < 1){
              alert("Folder name must between 1 to 14 characters!");
            }else{

              $.ajax({
                  url: "{{url('createFolder')}}",
                  method: "post",
                  data: {
                      '_token': "{{ csrf_token() }}",
                      'dir_name': folder_name
                  },
                  dataType: "json",
                  success: function(data) {
                      if(data==-1){
                          alert("Please choose another name for your new directory");

                      }else{
                        $.ajax({
                              url :"{{url('getDirectory')}}",
                              method : "post",
                              data : {_token:"{{ csrf_token() }}" },
                              dataType : "json",
                              success: function(data){

                                var append ='';
                                for(var i =0;i<data.length;i++){
                                    append+='<div class="row save p-2" id="'+data[i].id+'" style="border-bottom: 2px solid #e5e5e5">';
                                    append+='<div class="col-md-6 col-xs-8 col-sm-8 dirname" >';
                                    append+=data[i].directory_name;
                                    append+='</div>';
                                    append+='<div class="menus col-md-6 col-xs-4 col-sm-4 d-flex justify-content-around" style="text-align : center;"  id="'+data[i].id+'">';
                                    append+='<button class="btn btn-danger delete_folder"><i class="fas fa-trash-alt"></i></button>';
                                    append+='<button class="btn btn-primary rename_folder"><i class="fas fa-edit"></i></button>';
                                    append+='</div>';
                                    append+='</div>';

                                }
                                  $('#file').html(append);

                              }
                          });
                          $("#modalnewfolder").modal('hide');


                      }
                  }
              });


              //$('#modalfolder, #modalnewfolder, #modalnewfile').modal('hide');

            }

        }

        function showRenameFolderModal(){
            choosedir = $(this).parent().parent().attr("id");
            $("#confirm_delete").hide();
            $("#rename_detail").show();
            $("#button_delete").hide();
            $("#button_delete_file").hide();
            $("#button_rename").show();
            $("#button_rename_file").hide();
            $("#isfolder").val('1');
            $(".title-delete-rename").html("Rename Directory");
            $("#rename_name").val($(this).parent().parent().children('.dirname').html());
            $("#modaldeleterename").modal('show');
            $("#rename_ext").hide();

        }

        function showDeleteFolderModal(){
            choosedir =$(this).parent().parent().attr("id");
            directory_name=$(this).parent().parent().text();
            confirmation_text="Are you sure you want to delete folder \""+directory_name+"\" ?";
            $("#button_rename").hide();
            $("#button_rename_file").hide();
            $("#button_delete").show();
            $("#button_delete_file").hide();
            $("#rename_detail").hide();
            $("#confirm_delete").show();
            $("#confirm_delete").text(confirmation_text);
            $("#isfolder").val('1');
            $(".title-delete-rename").html("Delete Directory");
            $("#modaldeleterename").modal('show');


        }

        function renameFolder(){
            var folder_name=$("#rename_name").val();

            if(folder_name.length > 15 || folder_name.length < 1){
              alert("Folder name must between 1 to 14 characters!");
            }else{
                $.ajax({
                    url :"{{url('renameFolder')}}",
                    method : "post",
                    data : {'_token':"{{ csrf_token() }}",
                            "dirid" : choosedir,
                            "isfolder" : $("#isfolder").val(),
                            "folder_name" : $("#rename_name").val()
                            },
                    dataType : "json",
                    success: function(data){
                        if(data==-1){
                            alert("Directory with the same name exists ! Please choose another name to rename your directory");
                        }
                        else{
                            alert("Folder name has been renamed successfuly!");
                            var updated;
                            $(".save").each(function(){
                                if($(this).attr('id')==choosedir){
                                    updated=$(this);
                                }
                            });

                            if($("#isfolder").val()==1){
                                updated.children(".dirname").html($("#rename_name").val());
                            }
                            $("#modaldeleterename").modal('hide');
                        }
                    }
                });

            }
        }

        function deleteFolder(){
            $.ajax({
                url :"{{url('deleteFolder')}}",
                method : "post",
                data : {'_token':"{{ csrf_token() }}",
                        'fileid': choosefile,
                        "dirid" : choosedir,
                        },
                dataType : "json",
                success: function(data){
                if(data){
                    alert("Successfully deleted folder");
                    $(".save#"+choosedir).hide();
                    $("#modaldeleterename").modal('hide');
                    var txt = '<div class="col-md-12 col-sm-12 col-xs-12">';
                    txt+='Please Choose Directory first';
                    txt+='</div>';
                    $('#insidefile').html(txt);

                }
                }
            });
        }

        function showRenameFileModal(){

            //alert($(".filename"+choosefile).innerHTML());

            if(choosefile ==-1){
                alert("Please choose the file!");
            }
            else{
                $("#confirm_delete").hide();
                $("#rename_detail").show();
                $("#button_delete").hide();
                $("#button_rename").hide();
                $("#button_delete_file").hide();
                $("#button_rename_file").show();
                $("#isfolder").val('0');
                $(".title-delete-rename").html("Rename File");
                $("#modaldeleterename").modal('show');

                $("#rename_ext").show();
                var text =$(".filename"+choosefile).html();
                var index = ($(".filename"+choosefile).html()).indexOf(".");
                //alert(text.substring(0,index));

                $("#rename_name").val(text.substring(0,index));
                $("#rename_ext").val(text.substring(index,100));
            }


        }

        function renameFile(){
            var file_name=$("#rename_name").val();
            if(file_name.length > 15 || file_name.length < 1){
                alert("File name must be between 1 to 14 characters!");
            }
            else{
                $.ajax({
                    url :"{{url('checkRenameFileAvailability')}}",
                    method : "post",
                    data : {'_token':"{{ csrf_token() }}",
                                'dirid': directoryid,
                                "filename" : $("#rename_name").val(),
                                "fileext" : $("#rename_ext").val()
                            },
                    dataType : "json",
                    success: function(data){
                        if(data>0){
                        alert("File with the same name already exists! Please choose another name !");
                        }
                        else{
                            $.ajax({
                                url :"{{url('renameFile')}}",
                                method : "post",
                                data : {'_token':"{{ csrf_token() }}",
                                        'fileid': choosefile,
                                        "isfolder" : $("#isfolder").val(),
                                        "file_name" : $("#rename_name").val()
                                        },
                                dataType : "json",
                                success: function(data){
                                    if(data){
                                        alert("File name has been renamed successfuly!");
                                        if($("#isfolder").val()!=1){
                                            $(".filename"+choosefile).html($("#rename_name").val()+$("#rename_ext").val());
                                        }
                                        //kalau file yang dibuka direname tampilan choosenfilename di front end blom berubah
                                        $("#modaldeleterename").modal('hide');
                                    }
                                }
                            });
                        }
                    }

                });
            }

        }
        function showDeleteFileModal(){

            //alert($(".filename"+choosefile).innerHTML());

            if(choosefile ==-1){
                alert("Please choose the file!");
            }
            else{
                $("#confirm_delete").show();
                $("#rename_detail").hide();
                $("#button_delete").hide();
                $("#button_rename").hide();
                $("#button_delete_file").show();
                $("#button_rename_file").hide();
                $("#isfolder").val('0');
                $(".title-delete-rename").html("Delete File");
                $("#modaldeleterename").modal('show');
                file_name = $('#file_name').val();
                file_ext=$('#file_ext').val();
                confirmation_text="Are you sure you want to delete file \""+file_name+file_ext+"\" ?";
                $("#confirm_delete").text(confirmation_text);

            }

        }
        function deleteFile(){
          $.ajax({
                  url :"{{url('deleteFile')}}",
                  method : "post",
                  data : {'_token':"{{ csrf_token() }}",
                          'fileid': choosefile,
                          },
                  dataType : "json",
                  success: function(data){
                    if(data){
                        alert("Successfully deleted file");
                        $(".file#"+choosefile).hide();
                        choosefile = -1;
                        $("#modaldeleterename").modal('hide');
                    }
                  }
              });
        }


        function getDirectoryFiles(){

            var alldir  = $('.save');
            choosefile =-1;
            alldir.css('background-color','white');
            /*for(var i=0;i<allfile.length;i++){
                allfile[i].css('background-color','white');
            }*/
            $(this).css('background-color','#BBDEFB');

            //choosedir=this.id;
            //choosefile=-1;
            directoryid = this.id;


            $.ajax({
                url :"{{url('getDirectoryFiles')}}",
                method : "post",
                data : {_token:"{{ csrf_token() }}", id: this.id },
                dataType : "json",
                success: function(data){
                    var append ='';
                    for(var i =0; i<data.length;i++){
                        append +='<div class="file col-md-4 col-sm-4 col-xs-4" id="'+data[i].id+'" style="margin-top:10px; margin-bottom:10px;text-align:center;">';
                        append +='<i class="fas fa-file-code fa-3x folder_click"></i>';
                        append +='<br>';
                        append+="<div class='filename"+data[i].id+"'>";
                        append +=data[i].file_name;
                        append +="</div>";
                        append +='</div>';
                    }
                    $('#insidefile').html(append);
                }

            });
        }

        function selectFile(){
            $(".rename").removeClass("disabled");
            choosefile=this.id;
            $("#filename").val(this.id);
            var allfile = $('.file');
            allfile.css('background-color','white');
            $(this).css('background-color','#BBDEFB');
            $("#file_name").val($(document).find(".filename"+this.id).html().substring(0,$(document).find(".filename"+this.id).html().indexOf(".")));
        }

        function saveAsFile(){
            var data = editor.getValue();
            var dirid = directoryid;
            var langid = $("#languageid").val();
            var file_name = $('#file_name').val();
            if(file_name.length > 15 || file_name.length < 1){
                alert("File name must be between 1 to 14 characters!");
            }
            else if(dirid==-1){
                alert("Please choose directory first")
            }
            else{
              $('.save').attr('style','pointer-events: auto;');

              $("#file_name_confirmation").val($("#file_name").val());
              $("#file_ext_confirmation").val($("#file_ext").val());
              $("#choosenfilename").html(file_name+$("#file_ext").val());
              //cek dia bisa ada file yang namanya sama atau nga
              var value = editor.getValue();
              $.ajax({
                url :"{{url('checkAvailability')}}",
                method : "post",
                data : {'_token':"{{ csrf_token() }}",
                            'dirid': dirid,
                            'lang_id' : langid,
                            'file_name' : file_name },
                success: function(data){
                    if(data!=0){
                        var overrideFileConfirmationModal = new bootstrap.Modal(document.getElementById('modalnewfile'))
                        overrideFileConfirmationModal.show();

                    }
                    else{
                        $.ajax({
                            url :"{{url('createFile')}}",
                            method : "post",
                            data : {'_token':"{{ csrf_token() }}",
                                        'id': dirid,
                                        'lang_id' : langid,
                                        'file_name' : file_name,
                                        'data' : value },
                            success: function(data){
                                $("#filename").val(data);
                                fileid = data.substring(1,data.indexOf("folder"));
                                choosefile=fileid;
                                choosenfile = data;
                                alert("Successfully saved file");
                            }
                        });

                        $('#modalfolder, #modalnewfolder, #modalnewfile').modal('hide');
                        // $('.modal-backdrop').remove();
                    }
                }
              });
            }




        }

        function overrideFile(){
            var value = editor.getValue();
            var dirid = directoryid;
            //alert(dirid);
            var langid = $("#languageid").val();
            var file_name = $('#file_name').val();
            if(file_name.length > 15){
              alert("File name must be below than 15!");
            }else{
              $.ajax({
                  url :"{{url('createFile')}}",
                  method : "post",
                  data : {'_token':"{{ csrf_token() }}",
                              'id': dirid,
                              'lang_id' : langid,
                              'file_name' : file_name,
                              'data' : value },
                    success: function(data){
                        //$('#save').click();
                        $("#filename").val(data);
                        choosenfile = data;
                        fileid = data.substring(1,data.indexOf("folder"));
                        choosefile=fileid;
                        alert("Successfully saved file")
                    }
              });

              $('#modalfolder, #modalnewfolder, #modalnewfile').modal('hide');
            //   $('.modal-backdrop').remove();
            }
        }
        function openFileModal(){

            var alldir  = $('.save');
            alldir.css('background-color','white');

            var allfile  = $('.file');
            allfile.css('background-color','white');

            choosefile=-1;
            choosedir=-1;

            directoryid = -1;

            var txt = '<div class="col-md-12 col-sm-12 col-xs-12">';
            txt+='Please Choose Directory first';
            txt+='</div>';
            $('#insidefile').html(txt);
            $("#filename").val(-1);
            fileid=-1;
            choosefile=-1;

            cekopen=1;
            $('#saveFileRow').css('display','none');
            $('#chooseFile').css('display','flex');
            $.ajax({
                url :"{{url('getDirectory')}}",
                method : "post",
                data : {_token:"{{ csrf_token() }}" },
                dataType : "json",
                success: function(data){

                    var append ='';
                    for(var i =0;i<data.length;i++){
                        append+='<div class="row save p-2" id="'+data[i].id+'" style="border-bottom: 2px solid #e5e5e5">';
                        append+='<div class="col-md-6 col-xs-8 col-sm-8 dirname" >';
                        append+=data[i].directory_name;
                        append+='</div>';
                        append+='<div class="menus col-md-6 col-xs-4 col-sm-4 d-flex justify-content-around" style="text-align : center;"  id="'+data[i].id+'">';
                        append+='<button class="btn btn-danger delete_folder"><i class="fas fa-trash-alt"></i></button>';
                        append+='<button class="btn btn-primary rename_folder"><i class="fas fa-edit"></i></button>';
                        append+='</div>';
                        append+='</div>';

                    }
                    //alert(data.file.length);

                    $('#file').html(append);

                }
            });

            $('#popup-save').attr('style','display:block;');
        }
        function openFile(){
            if(choosefile==-1){
                alert("Please choose file!");
            }
            else{
                choosenfile = choosefile;

                //alert($('.filename'+choosefile).html());
                $("#choosenfilename").html($('.filename'+choosefile).html());
                var language_id=$("#languageid").val();
                if(language_id ==1){
                    $(".startdebug").attr("disabled",true);
                    $(".stopdebug").attr("disabled",true);

                }
                else{
                    $(".startdebug").removeAttr("disabled");
                    $(".stopdebug").removeAttr("disabled");

                }

                $.ajax({
                    url :"{{url('openFile')}}",
                    method : "post",
                    data : {_token:"{{ csrf_token() }}", id: choosefile },
                    //dataType : "json",
                    success: function(data){
                        if(data!=null){
                            $.ajax({
                                url: "{{ url('setLanguage') }}",
                                method: "post",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    'currently_used_language': data.file.language_id,
                                },
                                dataType: "json",
                                success: function(data) {
                                    // console.log(data)
                                    editor.session.setMode("ace/mode/" + data.language_ace_format);

                                    // format = $("#languageid option:selected").text().toLowerCase();

                                    // var text = $("#languageid option:selected").text();
                                    $('#file_ext').val('.' + data.language_ext);
                                    if (data.language_name == "html") {
                                        $(".startdebug").attr("disabled", true);
                                        $(".stopdebug").attr("disabled", true);

                                    } else {
                                        $(".startdebug").removeAttr("disabled");
                                        $(".stopdebug").removeAttr("disabled");

                                    }
                                    alert(data.language_name.charAt(0).toUpperCase() + data.language_name.slice(1) +
                                        " language has been apllied successfuly!");
                                    $("#languageid").val(data.id)
                                    changePDF(data.id);
                                }
                            });
                            // var result=data.data.substring(data.data.indexOf("\n")+1,data.length)
                            editor.setValue(data.data,1);
                            // $("#popup-folder").attr("style","display:none;");
                        }
                        else{
                            alert("File that you are trying to open does not exist")
                        }
                    }
                });

                $("#filename").val(choosefile);
                fileid= choosefile;
                $('#modalfolder, #modalnewfolder, #modalnewfile').modal('hide');
                // $('.modal-backdrop').remove();

            }

        }
        function changePDF(language_id) {
            $.ajax({
                url: "{{ url('changePDF') }}",
                method: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'currently_used_language': language_id,
                },
                dataType: "json",
                success: function(data) {
                    $('#tutoriallanguage').val(language_id);
                    result=""
                    if(data.length>0){
                        getTutorialByLanguage(language_id)
                        PDFObject.embed("/pdf/"+data[0].tutorial_file_name+"", "#tutorial");
                    }
                    else{
                        result+="<div class='d-flex justify-content-center' style='font-size: 30px'>"
                        result+="There are currently no tutorial for the selected programming language"
                        result+="</div>"
                        $("#tutorial").html(result);
                    }
                }
            });
        }

        $('#run-button').click(function() {
            // alert($("#filename").text());
            cekfile = false;
            if(fileid==-1 && choosefile==-1){
                cekfile=true;
            }


            if(cekfile){
                alert("You have to save your file!");
            }
            else{
                alert("Data saved");
                var acevalue = editor.getSession().getValue();

                var langid = $('#languageid').val();
                //alert(langid);

                var currentdate = new Date();
                var datetime = "Last Sync: " + currentdate.getDate() + "/" +
                    (currentdate.getMonth() + 1) + "/" +
                    currentdate.getFullYear() + " @ " +
                    currentdate.getHours() + ":" +
                    currentdate.getMinutes() + ":" +
                    currentdate.getSeconds();
                console.log(acevalue);
                console.log(datetime);

                $("#result").html("");
                $("#loading-animation").attr('style', 'visibility:visible;');
                $.ajax({
                    url: "{{ url('runCode') }}",
                    method: "post",
                    data: {
                        _token: "{{ csrf_token() }}",
                        code: acevalue,
                        file_id: choosefile,
                        input: $('#inputTextArea').val()
                    },
                    dataType: "json",
                    success: function(data) {

                        //console.log(Array.isArray(data.data));
                        if (Array.isArray(data.data)) {
                            if (data.data[0] == 'html') {
                                var w = window.open("{{ url('folder') }}/{{ Auth::user()->id }}root/" +
                                    data.data[2] + "/" + data.data[1]);
                            } else {
                                var text = "";
                                console.log(Array.isArray(data.data));
                                if (Array.isArray(data.data)) {
                                    for (var i = 0; i < data.data.length; i++) {
                                        //if(data.data[i][0]=="#"){

                                        text += data.data[i];
                                        text += "<br>";

                                    }

                                }
                            }
                        }
                        $("#result").html(text);
                        $('#popup-input').attr('style', 'display:none;');
                        $("#loading-animation").attr('style', 'visibility :  hidden; position:absolute;');
                        if (data.data[0] != 'html') {

                            alert("Done Compiling");
                        }
                        currentdate = new Date();
                        datetime = "Last Sync: " + currentdate.getDate() + "/" +
                            (currentdate.getMonth() + 1) + "/" +
                            currentdate.getFullYear() + " @ " +
                            currentdate.getHours() + ":" +
                            currentdate.getMinutes() + ":" +
                            currentdate.getSeconds();
                        console.log(datetime);
                    }
                });

            }


        });

        $(".debugaddnewvariable").click(function(){
            var text="";
            text+='<div class="row innerdebugrow" id="debugrow'+debugid+'">';

            //nama variablenya
            text+='<div class="col-md-2 col-sm-2 col-xs-2 smallpadding">';
            text+='<input type="text" name="" class="form-control variablename" required id="variabelname'+debugid+'" >';
            text+='</div>';

            //tipe variablenya
            text+='<div class="col-md-2 col-sm-2 col-xs-2 smallpadding">';
            text+='<select name="" class="form-control variabletype" id="variabletype'+debugid+'" >';
            text+="<option value='1'>integer</option>";
            text+="<option value='2'>string</option>";
            text+="<option value='3'>float</option>";
            text+="<option value='4'>char</option>";
            text+="<option value='5'>boolean</option>";
            text+='</select>';
            text+='';
            text+='</div>';

             //break linenya
            text+='<div class="col-md-2 col-sm-2 col-xs-2 smallpadding">';
            text+='<input type="number" name="" class="form-control debugbreakline" id="breakline'+debugid+'"  >';
            text+='';
            text+='</div>';
            // //start linenya
            // text+='<div class="col-md-2 col-sm-2 col-xs-2 smallpadding">';
            // text+='<input type="number" name="" class="form-control debugstartline" id="startline'+debugid+'"  >';
            // text+='';
            // text+='</div>';

            // //endlinenya
            // text+='<div class="col-md-2 col-sm-2 col-xs-2 smallpadding">';
            // text+='<input type="number" name="" class="form-control debugendline" id="endline'+debugid+'"  >';
            // text+='';
            // text+='</div>';

            //value
            text+='<div class="col-md-4 col-sm-2 col-xs-2 smallpadding">';
            text+='<input type="text" name="" class="form-control debugvalue" id="value'+debugid+'" readonly >';
            text+='';
            text+='</div>';


            text+='<div class="col-md-2 col-sm-2 col-xs-2">';
            text+='<button class="btn btn-danger debugdelete form-control" id="'+debugid+'" >';
            text+='X';
            text+='</button>';
            text+='</div>';

            text+='</div>';
            debugIDPool.push(debugid+"");
            debugid++;
            $("#debugrow").append(text);
        });

        $(document).on('click', '.debugdelete', function() {
            var index=debugIDPool.indexOf(this.id);
            debugIDPool.splice(index,1);
            $("#debugrow"+this.id).remove();
        });

        $(".startdebug").click(function(){

            cekfile = false;
            var data = $(document).find(".variablename");
            var type = $(document).find(".variabletype");
            var breakline = $(document).find(".debugbreakline");
            if(fileid==-1 && choosefile==-1){
                cekfile=true;
            }
            if(cekfile){
                alert("You have to save your file!");
            }
            else if(data.length==0){
                alert("You have to add debug variable first!");
            }
            else{
               var isEmpty=false;
                for(var i=0;i<data.length;i++){
                    if(data[i].value==""||type[i].value==""||breakline[i].value==""){
                        isEmpty=true;
                        break;
                    }
                }
                if(isEmpty==true){
                    alert("Debug variable field must all be filled");
                }
                else{
                    // var startline = $(document).find(".debugstartline");
                    // var endline = $(document).find(".debugendline");


                    var acevalue= editor.getSession().getValue();
                    var variablename = [""];
                    var variabletype = [""];
                    var breaklinetemp = [""];
                    // var startlinetemp = [""];
                    // var endlinetemp = [""];

                    for(var i=0;i<data.length;i++){
                        // alert($(data[i]).val());
                        $(data[i]).attr("readonly","true");
                        variablename[i]=$(data[i]).val();
                        $(type[i]).attr("readonly","true");
                        variabletype[i]=$(type[i]).val();
                        $(breakline[i]).attr("readonly","true");
                        breaklinetemp[i]=$(breakline[i]).val();
                        // $(endline[i]).attr("readonly","true");
                        // endlinetemp[i]=$(endline[i]).val();
                    }
                    console.log($("#languageid").val());

                    $.ajax({
                        url :"{{url('sendStartDebug')}}",
                        method : "post",
                        data : {'_token':"{{ csrf_token() }}",
                                    'langid': $("#languageid").val(),
                                    'variablename' : variablename,
                                    'sourcecode' : acevalue,
                                    'input' : $('#inputTextArea').val(),
                                    'vartype' : variabletype,
                                    'breakline' : breaklinetemp,
                                    'fileid':choosefile,
                                    'debugIDPool': debugIDPool,
                                    // 'endline' : endlinetemp
                                },
                        dataType : "json",
                        success: function(data){
                            console.log(data);
                            //cek apakah ada error atau nga
                            if(data.length==0){
                                alert("Debug Error, please check your debug's details!");
                                var data = $(document).find(".variablename");
                                for(var i=0;i<data.length;i++){
                                    //alert($(data[i]).val());
                                    $(data[i]).removeAttr("readonly","true");
                                }

                                data = $(document).find(".variabletype");
                                for(var i=0;i<data.length;i++){
                                    //alert($(data[i]).val());
                                    $(data[i]).removeAttr("readonly","true");
                                }
                                data = $(document).find(".debugbreakline");
                                for(var i=0;i<data.length;i++){
                                    //alert($(data[i]).val());
                                    $(data[i]).removeAttr("readonly","true");
                                }
                                // data = $(document).find(".debugstartline");
                                // for(var i=0;i<data.length;i++){
                                //     //alert($(data[i]).val());
                                //     $(data[i]).removeAttr("readonly","true");
                                // }
                                // data = $(document).find(".debugendline");
                                // for(var i=0;i<data.length;i++){
                                //     //alert($(data[i]).val());
                                //     $(data[i]).removeAttr("readonly","true");
                                // }
                                // //editor.renderer.setStyle("disabled", true)
                                editor.setReadOnly(false);

                                $(".btn").removeAttr("disabled");
                            }
                            else{

                                $(".debugdelete").attr("disabled","disabled");
                                $(".btn").attr("disabled","disabled");
                                $("#next").removeAttr("disabled");
                                $(".stopdebug").removeAttr("disabled");
                                $("#prev").removeAttr("disabled");
                                // var result = [[],[]];
                                var result=new Array();
                                for(var i=0;i<debugIDPool.length;i++){
                                    var temp =[];
                                    for(var j=0;j<data.data.length;j++){
                                        if(debugIDPool[i]==data.data[j].id){
                                            if(temp.length==0){
                                                temp=(data.data[j].value).split("\n")[0];
                                            }
                                            else{
                                                temp+=", "+(data.data[j].value).split("\n")[0];
                                            }
                                            // console.log(data.data[j].id);
                                        }
                                    }
                                    console.log(result);
                                    object={
                                        id: debugIDPool[i],
                                        value: temp
                                    }
                                    result.push(object);
                                    console.log(result);
                                    // result[i]['id']=debugIDPool[i];
                                    // result[i]['value']=temp;
                                    console.log("value hasil concat"+temp);
                                }

                                for(var i=0;i<debugIDPool.length;i++){
                                    if(debugIDPool[i]==result[i]['id']){
                                        // console.log(value[i]['value']);
                                        $("#value"+debugIDPool[i]).val(result[i]['value']);
                                    }
                                }

                            }


                        }
                    });


                    editor.setReadOnly(true);
                }
            }

        });

        $(".stopdebug").click(function(){
            var data = $(document).find(".variablename");
            for(var i=0;i<data.length;i++){
                //alert($(data[i]).val());
                $(data[i]).removeAttr("readonly","true");
            }

            data = $(document).find(".variabletype");
            for(var i=0;i<data.length;i++){
                //alert($(data[i]).val());
                $(data[i]).removeAttr("readonly","true");
            }
            data = $(document).find(".debugbreakline");
            for(var i=0;i<data.length;i++){
                //alert($(data[i]).val());
                $(data[i]).removeAttr("readonly","true");
            }
            // data = $(document).find(".debugendline");
            // for(var i=0;i<data.length;i++){
            //     //alert($(data[i]).val());
            //     $(data[i]).removeAttr("readonly","true");
            // }
            //editor.renderer.setStyle("disabled", true)
            editor.setReadOnly(false);

            $(".btn").removeAttr("disabled");

        });

        $(document).on('click', '.snippets', setSelectedSnippet);
        $('#settheme, #setfontsize, #setresultfontsize, #resultbackgroundcolor, #resulttextcolor').change(changeSettings);
        $("#languageid").change(changeLanguage);
        $("#new-button").click(getSnippet);
        $("#tutorialid").change(getTutorial);
        $('#button_make_new_file').click(getSnippetValue);
        $('#open').click(openFileModal);
        $('#chooseFile').click(openFile);
        $("#undo").click(undoCode);
        $("#redo").click(redoCode);
        $('#save').click(saveButtonClick);
        $(document).on('click','.save', getDirectoryFiles);
        $(document).on('click','.file', selectFile);
        $(document).on('click','#saveFile', saveAsFile);
        $("#confirm_fileName").click(overrideFile);
        $(document).on('click', '#confirm_folderName',createFolder );
        $(document).on("click",".rename_folder",showRenameFolderModal);
        $("#button_rename").click(renameFolder);
        $(document).on("click",".delete_folder",showDeleteFolderModal);
        $("#button_delete").click(deleteFolder);

        $("#renamefile").click(showRenameFileModal);
        $("#deletefile").click(showDeleteFileModal);

        $("#button_rename_file").click(renameFile);
        $("#button_delete_file").click(deleteFile);
    </script>

@endsection
