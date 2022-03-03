{#
 # Copyright (c) 2022 Manuel Pasti <mapa@max-it.de>
 # All rights reserved.
 #}

<!-- Navigation bar -->
<ul class="nav nav-tabs" data-tabs="tabs" id="maintabs">
    <li class="active"><a data-toggle="tab" href="#general">{{ lang._('General') }}</a></li>
</ul>

<div class="tab-content content-box tab-content">
    <div id="general" class="tab-pane fade in active">
        <div class="content-box" style="padding-bottom: 1.5em;">
            {{ partial("layout_partials/base_form",['fields':generalForm,'id':'frm_general_settings'])}}
            <div class="col-md-12">
                <hr />
                <button class="btn btn-primary" id="saveAct" type="button"><b>{{ lang._('Mtr') }}</b> <i id="saveAct_progress"></i></button>
                <input type="checkbox" class="form-check-input" id="testt">
                <label class="form-check-label" for="exampleCheck1">ASJSON</label>
            </div>
        </div>
    <div id="ip" class="tab-pane fade in">
      <pre id="ipl"></pre>
    </div>
 </div>
</div>

<script>
$( document ).ready(function() {
    var data_get_map = {'frm_general_settings':"/api/mtr/general/get"};
    mapDataToFormUI(data_get_map).done(function(data){
        formatTokenizersUI();
        $('.selectpicker').selectpicker('refresh');
    });
             $("#saveAct").click(function(){
              //saveFormToEndpoint(url="/api/mtr/general/set", formid="frm_general_settings",callback_ok=function(){
              $("#saveAct_progress").addClass("fa fa-spinner fa-pulse");
                ajaxCall(
                url="/api/mtr/service/ip",
                sendData={"ipadd":$("#ip").val(), "ipcount":$("#turn").val(), "iprev":$("#drl").val(), "ipjson":$("#jj").val()},
                callback=function(data, status){$("#ipl").text(data['response']);
                 $("#saveAct_progress").removeClass("fa fa-spinner fa-pulse");
            });
       });


});
</script>

