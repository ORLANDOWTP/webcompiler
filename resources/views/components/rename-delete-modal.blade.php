 <!--modal delete rename-->
 @if(Auth::check()&&Auth::user()->role->role_name!="guest")
 <div class="modal fade mx-auto my-auto" tabindex="-1" role="dialog" id="modaldeleterename">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title title-delete-rename"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

          </div>
          <div class="modal-body" >
            <div class="row" id="rename_detail">
                <div class="col-auto">
                    <input type="hidden" id="isfolder">
                    {{-- <div class="form-inline"> --}}

                    <label>
                        Name :
                    </label>




                    {{-- </div> --}}

                </div>
                <div class="col-8">
                    <input type="text" id="rename_name" class="form-control">
                </div>
                <div class="col-2 p-0">
                    <input type="text" id="rename_ext" class="form-control" readonly>

                </div>
            </div>
            <div id="confirm_delete">
              Are you sure you want to delete ?
            </div>
            <hr>
            <div class="row" id="snippetPlace">

            </div>
          </div>
          <div class="modal-footer">
                <button id="button_rename" class="btn btn-primary">
                    Rename
                </button>
                <button id="button_rename_file" class="btn btn-primary">
                    Rename
                </button>
                <button id="button_delete" class="btn btn-danger">
                    Delete
                </button>
                <button id="button_delete_file" class="btn btn-danger">
                    Delete
                </button>

          </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endif
