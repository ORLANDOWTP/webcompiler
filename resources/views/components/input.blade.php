<div id="input">

    <div class="row t">
        <div class="col-md-2">
            <h3>
                Input
            </h3>
            <textarea id="inputTextArea" rows="10" cols="70" class="form-control"></textarea>

        </div>

        <!--view debug-->
        <div class="col-md-10 col-sm-12 col-xs-12">
            <div class="row row-eq-height">
                <div class="col-md-2 col-sm-12 col-xs-12" style="vertical-align:bottom;">
                    <h3>
                        Debug
                    </h3>
                </div>

                <div class="col-md-2 col-md-offset-2 col-sm-12 col-xs-12 " style="padding:2vh;">
                    <button class="btn btn-primary startdebug form-control" disabled style="height:100%;" >
                        Start Debug
                    </button>
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12" style="padding:2vh;">
                    <button class="btn btn-primary stopdebug form-control" disabled style="height:100%;" >
                        Stop Debug
                    </button>
                </div>

                {{-- <div class="col-md-6 col-sm-12 col-xs-12 " style="padding-top:2vh;">
                    <div class="row rowprevnext">
                        <div class="col-md-6 col-sm-6 col-md-6 d-flex justify-content-center">
                            <button class="btn btn-primary prevbutton " id="prev">
                                <
                            </button>
                        </div>
                        <div class="col-md-6 col-sm-6 col-md-6 d-flex justify-content-center">
                            <button class="btn btn-primary nextbutton " id="next">
                                >
                            </button>
                        </div>
                    </div>

                    <div class="row rowline" style="" align="center">
                            <div class="col-md-6 col-md-12 col-xs-12" >
                                line
                                <input style="width:30px;" class="debugline" type="text" readonly>
                                of
                                <input style="width:30px;" class="debugof" type="text" readonly>
                            </div>

                    </div>


                </div> --}}

            </div>

            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <h5>
                        Var
                    </h5>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <h5>
                        Data Type
                    </h5>
                </div>

                <div class="col-md-2 col-sm-2 col-xs-2">
                    <h5>
                        Break Line
                    </h5>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <h5>
                        Value
                    </h5>
                </div>
            </div>

            <div class="row">
                <div class="span4">
                    <div id="debugrow">

                    </div>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-12 col-xs-12">

                    <button class="btn btn-primary form-control debugaddnewvariable">
                        Add Debug Variable
                    </button>
                </div>
            </div>
        </div>
        <!--view debug done-->

    </div>
</div>
