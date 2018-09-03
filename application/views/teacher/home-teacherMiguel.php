  <nav class="nav-extended red darken-1">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo"><img src="img/inacap.png"></a>    
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li>
          <li><a disabled><strong>TEACHER</strong> :</a></li>
          <li><div class="chip"><img  alt="Contact Person" src="img/teacher.png"> <?php echo $name?> <?php echo $lastname?></div></li>
          <li></li>
          <li><a class="btn waves-effect waves-light black" onclick="close_session()"><i class="material-icons right white-text">exit_to_app</i> Log Out</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a><strong>TEACHER</strong> :</a></li>
          <li><div class="chip"><img  alt="Contact Person" src="img/teacher.png"> <?php echo $name?> <?php echo $lastname?></div></li>
          <li></li>
          <li><a class="btn waves-effect waves-light black" onclick="close_session()"><i class="material-icons right white-text">exit_to_app</i> Log Out</a></li>
      </ul>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a href="#class">CLASS</a></li>
        <li class="tab"><a href="#unity">UNITY</a></li>
        <li class="tab"><a href="#activity">ACTIVITY</a></li>
        <li class="tab"><a href="#test">TEST</a></li>
        <li class="tab"><a href="#material">MATERIALS</a></li>
        <li class="tab"><a href="#student">STUDENT PROGRESS</a></li>
        <li class="tab"><a href="#glosary">GLOSARY</a></li>
      </ul>
    </div>
  </nav>
<!-- Card Content-->
    <div class="card-content">
<!-- Class Content-->
      <div id="class" class="card yellow">

        <div class="row">
          <div class="col s12 m3 12">
            <ul class="collection z-depth-4">
              <li class="collection-item avatar">
                <i class="material-icons circle yellow">list</i>
                <span class="title"><strong>Class List</strong></span>
                <button class=" secondary-content waves-effect btn-large white black-text waves-yellow tooltipped" data-position="right" data-delay="50" data-tooltip="Class List!" onclick="classlist()"><i class="material-icons">list</i></button>
              </li>
              <li class="collection-item avatar">
                <i class="material-icons circle green">list</i>
                <span class="title"><strong>Student List<strong></span>
                <button class=" secondary-content waves-effect btn-large white black-text waves-yellow tooltipped" data-position="right" data-delay="50" data-tooltip="Student List" onclick="studentlist()"><i class="material-icons">list</i></button>
              </li>
            </ul>
            
          </div>
          <div class="col s12 m9 19 white">
            <div class="" id="bodyclass">
            </div>
          </div>
        </div>
      </div>
<!--End Class Content-->

    <div id="unity" class="card red">
        <div class="row">
          <div class="col s12 m3 12">
            <ul class="collection z-depth-4">
              <li class="collection-item avatar">
                <i class="material-icons circle red">list</i>
                <span class="title">Unity List</span>
                <button class=" secondary-content waves-effect btn-large white black-text waves-yellow tooltipped" data-position="right" data-delay="50" data-tooltip="Unity List!" onclick="unitylist()"><i class="material-icons">list</i></button>
              </li>
            </ul>
            
          </div>
          <div class="col s12 m9 19 white">
            <div class="" id="bodyunity">
              
            </div>
          </div>
        </div>
    </div>

      <div id="activity" class="card yellow">
        <div class="row">
          <div class="col s12 m3 12">
            <ul class="collection z-depth-4">
              <li class="collection-item avatar">
                <i class="material-icons circle yellow black-text">list</i>
                <span class="title"><strong>activity List</strong></span>
                <button class=" secondary-content waves-effect btn-large white black-text waves-yellow tooltipped" data-position="right" data-delay="50" data-tooltip="Activity List!" onclick="activitylist()"><i class="material-icons">list</i></button>
              </li>
            </ul>
            
          </div>
          <div class="col s12 m9 19">
            <div class="" id="bodyactivity">
              
            </div>
          </div>
        </div>
      </div>

      <div id="test" class="col s12 blue">
        <div class="row">
          <div class="col s12 m3 12">
            <ul class="collection z-depth-4">
              <li class="collection-item avatar">
                <i class="material-icons circle blue">list</i>
                <span class="title">Test List</span>
                <button class=" secondary-content waves-effect btn-large white black-text waves-yellow tooltipped" data-position="right" data-delay="50" data-tooltip="Test List!" onclick="testlist()"><i class="material-icons">list</i></button>
              </li>
            </ul>
            
          </div>
          <div class="col s12 m9 19">
            <div class="" id="bodytest">
              
            </div>
          </div>
        </div>
      </div>


      <div id="materials" class="col s12 black">
        <div class="row">
          <div class="col s12 m3 12">
            <ul class="collection z-depth-4">
              <li class="collection-item avatar">
                <i class="material-icons circle black">list</i>
                <span class="title">Material List</span>
                <button class=" secondary-content waves-effect btn-large white black-text waves-yellow tooltipped" data-position="right" data-delay="50" data-tooltip="Material List!" onclick="materiallist()"><i class="material-icons">list</i></button>
              </li>
            </ul>
            
          </div>
          <div class="col s12 m9 19 white">
            <div class="" id="bodymaterial">
              
            </div>
          </div>
        </div>

    </div>
        

      <div id="student" class="col s12 blue">
        
      </div>

      <div id="glosary" class="col s12 blue">
        
      </div>
    </div>
<!--END Card Content-->


  <div class="fixed-action-btn horizontal  click-to-toggle">
    <a class="btn-floating btn-large black tooltipped" data-position="top" data-delay="50" data-tooltip="Multimedia Upload">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a class="btn-floating red tooltipped modal-trigger" onclick="$('#modaluploadvideo').modal('open')" data-position="top" data-delay="50" data-tooltip="Upload Video"><i class="material-icons">insert_link</i></a></li>
      <li><a class="btn-floating yellow darken-1 tooltipped" onclick="$('#modaluploadaudio').modal('open')" data-position="top" data-delay="50" data-tooltip="Audio Listening"><i class="material-icons">headset</i></a></li>
      <li><a class="btn-floating red tooltipped" onclick="$('#modalyoutubelink').modal('open')" data-position="top" data-delay="50" data-tooltip="Youtube Link's"><i class="material-icons">subscriptions</i></a></li>
      <li><a class="btn-floating blue tooltipped" data-position="top" data-delay="50" data-tooltip="Files"><i class="material-icons">attach_file</i></a></li>
    </ul>
  </div>

<!-- Modal Structure -->
          <div id="modaluploadvideo" class="modal">
            <div class="modal-content">
              <h4>Load Archive</h4>
              <div class="card">
                <?php echo form_open_multipart('controller/upload_video');?>
                <input type="file" name="userfile" size="20" />
                <input type="submit" value="upload" />
              </div>
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" onclick="">SAVE</a>
            </div>
          </div>

          <!-- Modal Structure -->
          <div id="modaluploadaudio" class="modal">
            <div class="modal-content">
              <h4>Load Archive</h4>
              <div class="card">
                <?php echo form_open_multipart('controller/upload_audio');?>
                <input type="file" name="userfile" size="20" />
                <input type="submit" value="upload" />  
              </div>
              <div class="modal-footer">
              </div>
            </div>
          </div>

           <!-- Modal Structure -->
          <div id="modalyoutubelink" class="modal">
            <div class="modal-content">
              <h4>Load Youtube Link</h4>
              <div class="card">
                
              </div>
                <form action="#">
                  <div class="row">
                      <div class="col s3">
                          <div class="input-field">
                          <input type="text" class="validate" maxlength="45" required  id="materialname" value="">
                          <label for="materialname">NAME</label>
                        </div>
                      </div>
                      <div class="col s6">
                          <div class="input-field">
                            <textarea id="descriptionleft"  class="materialize-textarea" required maxlength="200" ></textarea>
                            <label for="descriptionleft">DESCRIPTION LEFT</label>
                          </div>
                          <div class="input-field">
                            <textarea id="descriptionright" class="materialize-textarea" maxlength="200" ></textarea>
                            <label for="descriptionclassright">DESCRIPTION RIGHT</label>
                          </div>
                      </div>
                        <div class="col s12">
                          <div class="input-field">
                            <input class="input" type="text" id="uploadyoutubelink">
                            <label for="uploadyoutubelink">Youtube Link</label>
                          </div>
                      </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" onclick="saveyoutubelink()">SAVE</a>
            </div>
          </div>

<script type="text/javascript">
   // Initialize collapse button
  //Materialize effects
  $(document).ready(function(){
    $('.modal').modal();
    $('#collapsible').collapsible();
    $('ul.tabs').tabs();
    $('select').material_select();
    $(".button-collapse").sideNav();
    $('.tooltipped').tooltip({delay: 50});
  });
        
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  //$('.collapsible').collapsible();

</script>