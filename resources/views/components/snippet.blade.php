<!--modal snippet-->
<div class="modal fade" tabindex="-1" role="dialog" id="modalSnippet" aria-labelledby="modalSnippetLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create File</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2 snippets" id="blank" style="text-align:center;">
                        {{-- <img src="{{url('/img/blank.png')}}"  > --}}
                        <i class="fas fa-file fa-5x"></i>
                        <br>
                        Blank
                    </div>
                </div>
                <hr>
                <div class="row" id="snippetPlace">
                    {{-- @foreach ($snippet as $s)
                        <div class="col-md-2 col-sm-4 col-xs-6 snippets" id="{{$s->id}}"
                            style="overflow:hidden; min-height:100px;margin-top:10px; text-align:center;">
                            <i class="fas fa-file-alt fa-5x"></i>
                            <br>
                            {{$s->snippet_name}}
                        </div>
                    @endforeach --}}
                </div>
            </div>
            <div class="modal-footer">
                <button id="button_make_new_file" class="btn btn-primary">
                    New File
                </button>

            </div>
        </div>
    </div>
</div>
