<div id="setting">
    <div class="row">
        <div class="col-md-6">
            <h4>
                Programming Language :
            </h4>
            <select class="form-select" aria-label=".form-select-lg example" id="languageid">
                @foreach ($lang as $k)
                    <option value="{{ $k->id }}" {{Auth::user()->currently_used_language==$k->id ? 'selected' : ''}}>{{ ucfirst($k->language_name) }}</option>
                @endforeach
            </select>

        </div>

    </div>

    <hr>
    <h3>
        Editor
    </h3>
    <div class="row">
        <div class="col-md-6">
            <h4>
                Set Font Size:
            </h4>
            <select id="setfontsize" name="setfontsize" class="form-select">
                @for ($i=12;$i<31;$i++)
                    <option value="{{$i}}" {{Auth::user()->font_size==$i ? 'selected' : ''}}>{{$i}}</option>
                @endfor
            </select>
        </div>
        <div class="col-md-6">
            <h4>
                Set Editor Theme:
            </h4>
            <select id="settheme" name="settheme" class="form-select">
                @foreach ($theme as $t)
                    @if ($t->id == Auth::user()->theme_id)
                        <option value="{{ $t->id }}" selected="selected">{{ $t->theme_name }}</option>
                    @else
                        <option value="{{ $t->id }}">{{ $t->theme_name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

    </div>
    <hr>
    <h3>
        Result
    </h3>
    <div class="row">
        <div class="col-md-6">
            <h4>
                Set Result Background Color:
            </h4>
            <input id="resultbackgroundcolor" class="form-control" data-jscolor="{preset:'light medium'}"
                value="{{ Auth::user()->result_background_color }}">
        </div>
        <div class="col-md-6">
            <h4>
                Set Result Text Color:
            </h4>
            <input id="resulttextcolor" class="form-control" data-jscolor="{preset:'light medium'}" value="{{ Auth::user()->result_text_color }}">
        </div>
        <div class="col-md-6">
            <h4>
                Set Result Font Size:
            </h4>
            <select id="setresultfontsize" name="setfontsize" class="form-select">
                @for ($i=12;$i<31;$i++)
                    <option value="{{$i}}" {{Auth::user()->result_font_size==$i ? 'selected' : ''}}>{{$i}}</option>
                @endfor
            </select>
        </div>
    </div>

</div>


