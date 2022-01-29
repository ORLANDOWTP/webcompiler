<div id="material">
    <div class="row">
        <div class="col-md-6">
            <h4>
                Programming Language :
            </h4>
            <select class="form-select" aria-label=".form-select-lg example" id="tutoriallanguage" disabled>
                @foreach ($lang as $k)
                    <option value="{{ $k->id }}" {{Auth::user()->currently_used_language==$k->id ? 'selected' : ''}}>{{ ucfirst($k->language_name) }}</option>
                @endforeach
            </select>

        </div>

    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <h4>
                Chapter
            </h4>
            <select class="form-select" aria-label=".form-select-lg example" id="tutorialid">
                @foreach ($tutorial as $t)
                    <option value="{{ $t->id }}">Chapter {{$loop->index+1}}: {{ ucfirst($t->tutorial_name) }}</option>
                @endforeach
            </select>
        </div>

    </div>

</div>


