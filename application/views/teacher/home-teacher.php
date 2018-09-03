<nav class="nav-extended red darken-1">
    <div class="nav-wrapper">
        <a href="<?php echo base_url() ?>" class="brand-logo"><img src="img/inacap.png"></a>    
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a><strong>TEACHER</strong> :</a></li>
            <li><div class="chip"><img  alt="Contact Person" src="img/teacher<?php echo $gender_name ?>.png" > <?php echo $name ?> <?php echo $lastname ?></div></li>
            <li></li>
            <li><a class="btn waves-effect waves-light black" onclick="close_session()"><i class="material-icons right white-text">exit_to_app</i> Log Out</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a><strong>TEACHER</strong> :</a></li>
            <li><div class="chip"><img  alt="Contact Person" src="img/teacher<?php echo $gender_name ?>.png" > <?php echo $name ?> <?php echo $lastname ?></div></li>
            <li></li>
            <li><a class="btn waves-effect waves-light black" onclick="close_session()"><i class="material-icons right white-text">exit_to_app</i> Log Out</a></li>
        </ul>
    </div>
</nav>

 

<br>
<!-- BODY PAGE AND BUTTON LIST-->
      <div class="row">
          <div class="col s12 m3">
            <ul class="collapsible popout" data-collapsible="accordion">
                <li>
                  <div class="collapsible-header" onclick="classlist()"><i class="material-icons">class</i>COURSES</div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="sectionlist()"><i class="material-icons">dehaze</i>SECTION</div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="studentlist()"><i class="material-icons">face</i>STUDENTS</div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="unitylist()"><i class="material-icons">view_module</i>UNITYS</div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="activitylist()"><i class="material-icons">extension</i>ACTIVITIES</div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="examlist()"><i class="material-icons">done_all</i>Exam</div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="questionlist()"><i class="material-icons">question_answer</i>QUESTIONS AND ANSWERS</div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="materiallist()"><i class="material-icons">work</i>MATERIALS</div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="glosarylist()"><i class="material-icons">g_translate</i>GLOSSARY</div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="progresslist()"><i class="material-icons">trending_up</i>PROGRESS</div>
                </li>
              </ul>
          </div>
            <div class="col s12 m9 19">
                <div id="contentteacher">
                    
                </div>
            </div>
      </div>



<!--Floatting Tooltipped-->
<div class="fixed-action-btn horizontal  click-to-toggle">
    <a class="btn-floating btn-large black tooltipped" data-position="top" data-delay="50" data-tooltip="Multimedia Upload">
        <i class="material-icons">menu</i>
    </a>
    <ul>
        <li><a class="btn-floating blue tooltipped modal-trigger" onclick="$('#modaluploadvideo').modal('open')" data-position="top" data-delay="50" data-tooltip="Upload archive"><i class="material-icons">insert_link</i></a></li>
        <li><a class="btn-floating red tooltipped" onclick="$('#modalyoutubelink').modal('open')" data-position="top" data-delay="50" data-tooltip="Youtube Link's"><i class="material-icons">subscriptions</i></a></li>
    </ul>
</div>
<!--End Floatting Tooltipped-->


<!--Modal UploadVideo Structure -->
<div id="modaluploadvideo" class="modal modal-fixed-footer">
    <?php echo form_open_multipart('controller/upload_video'); ?>
    <div class="modal-content">
        <h4>Load archive</h4>
        <br>
            <div class="input-field col s3">
                <input type="text" name="archivename" id="videoinput">
                <label for="videoinput" class="active">Name archive</label>
            </div>
            <br>
            <div class="input-field col s3">
                <select name="selectmaterialtype" id="selectmaterialtype">
                 <?php $io = 0; foreach ($materialtype as $filmaterialtype):?>
                    <option value="<?php echo $filmaterialtype->idmaterialtype ?>" <?php if ($filmaterialtype->materialtypename === "Youtube") echo "disabled"?>><?php echo $filmaterialtype->materialtypename ?></option>
                 <?php $io++;  endforeach; ?>
                </select>
                <label>Select Material Type</label>
            </div>
            <br>
    <div class="file-field input-field">
      <div class="btn">
        <span>File</span>
        <input type="file" name="userfile" size="20" />
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close btn waves-effect waves-green red darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></a>
        <input class="btn waves-effect waves-green green darken-1" type="submit" value="Save" />
    </div>
</div>
<!--End Modal UploadVideo Structure -->

<!--Modal Upload Youtube Link Structure -->
<div id="modalyoutubelink" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Youtube Link</h4>
                    <div class="input-field col s3">
                        <input type="text" class="validate" maxlength="45" required  id="materialname" value="">
                        <label for="materialname">Name</label>
                    </div>
                    <div class="input-field">
                        <textarea id="descriptionleft"  class="materialize-textarea" required maxlength="200" ></textarea>
                        <label for="descriptionleft">Description Left</label>
                    </div>
                    <div class="input-field">
                        <textarea id="descriptionright" class="materialize-textarea" maxlength="200" ></textarea>
                        <label for="descriptionclassright">Description Right</label>
                    </div>
                    <div class="input-field">
                        <input class="input" type="text" id="uploadyoutubelink">
                        <label for="uploadyoutubelink">Youtube Link</label>
                    </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close btn waves-effect waves-green red darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></a>
        <a href="#!" class="modal-action modal-close btn waves-effect waves-green green darken-1" onclick="saveyoutubelink()"><i class="material-icons right">save</i> Save</a>
    </div>
</div>
<!--End Modal Upload Youtube Link Structure -->







<script type="text/javascript">
    $(document).ready(function () {
        $('.modal').modal();
        $('#collapsible').collapsible('active');
        $('ul.tabs').tabs();
        $('select').material_select();
        $(".button-collapse").sideNav();
        //Materialize effects
        $('.tooltipped').tooltip({delay: 50});
    });
     $(document).ready(function(){
    $('.collapsible').collapsible();
  });
</script>