@if(Auth::check()&&Auth::user()->role->role_name!="guest")
    <div class="modal fade mx-auto my-auto" tabindex="-1" role="dialog" id="modalfolder">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Choose Folder</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12" id="folderplace" >
                  <div class="row d-block" id="file" style="height:43vh;overflow-y:scroll;" >

                  </div>
                  <div class="row" id="addFolder" data-bs-toggle="modal" data-bs-target="#modalnewfolder" >
                    <hr>
                    <button class="btn btn-primary" style="padding-left:15px; display: block; width: 96%;">
                      New Folder+
                    </button>
                  </div>
                </div>

                <div class="col-md-8 col-sm-12 col-xs-12" style="height:50vh; overflow-y:scroll">

                  <div class="row" style="padding-top : 1vh; padding-bottom : 2vh; border-bottom : 1px solid #e5e5e5;">
                    <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                      <h4>
                        File
                      </h4>
                    </div>
                    <div class="menus col-md-6 col-sm-6 col-xs-6" align="right">
                      <button class="btn btn-danger" id="deletefile">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                      <button class="btn btn-primary" id="renamefile">
                        <i class="fas fa-edit"></i>
                      </button>
                    </div>

                  </div>

                  <div class="row"  id="insidefile">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        Please Choose Directory first
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div>
                <div class="modal-footer" id="chooseFileContainer">
                    <button id="chooseFile" class="btn btn-primary col-1" style="display: none">
                        Open
                    </button>

                </div>

                <div class="row m-3" id="saveFileRow">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <label>
                            File Name
                        </label>
                    </div>
                    <div class="col-md-10 col-sm-8 col-xs-8" style="padding-right: 0px;">
                        <input type="text" id="file_name" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-4" style="padding-left:20px;">
                        <input type="text" class="form-control" id="file_ext" value=".{{Auth::user()->currentLanguage->language_ext}}" readonly="">
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button id="saveFile" class="btn btn-primary pull-right">
                            Save File
                        </button>
                    </div>
                </div>
            </div>


          </div>
        </div>
    </div>



    <div class="modal fade" tabindex="-1" role="dialog" id="modalnewfolder">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Make New Folder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>
                            Folder Name
                        </label>
                        <input type="text" class="form-control" id="folder_name" name="folder_name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="confirm_folderName" class="btn btn-primary">
                        Save
                    </button>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->



    <div class="modal fade mx-auto my-auto" tabindex="-1" role="dialog" id="modalnewfile">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">File Name Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>
                                There's some file have the same name with your new file.<br>
                                Do you want to overwrite it?
                            </h3>

                        </div>
                        <div class="col-md-8" style="padding-right: 0px;">
                            <input type="text" id="file_name_confirmation" class="form-control" readonly="">
                        </div>
                        <div class="col-md-4" style="padding-left:20px;">
                            <input type="text" class="form-control" id="file_ext_confirmation" value=".html" readonly="">
                            <br>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button id="confirm_fileName" class="btn btn-primary">
                        Save
                    </button>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    @endif
