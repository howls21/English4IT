<?php $checkcount = 0?>
<div>
<a class="modal-trigger btn waves-effect waves-green grey darken-3" href="#modaluploadarchive"><i class="material-icons right">add_box</i> New Material</a>
    <!--Modal UploadVideo Structure -->
        <div id="modaluploadarchive" class="modal modal-fixed-footer">
          <?php echo form_open_multipart('controller/upload_video'); ?>
          <div class="modal-content">
              <h4>NEW MATERIAL</h4>
              <br>
                  <div class="input-field col s12">
                      <input type="text" name="archivename" id="videoinput">
                      <label for="videoinput" class="active">Name</label>
                  </div>
                  <div class="input-field col s12">
                      <select name="selectmaterialtype" id="selectmaterialtype">
                       <?php $io = 0; foreach ($materialtype as $filmaterialtype):?>
                          <option value="<?php echo $filmaterialtype->idmaterialtype ?>" <?php if ($filmaterialtype->materialtypename === "Youtube") echo "disabled" ?>><?php echo $filmaterialtype->materialtypename ?></option>
                       <?php $io++;  endforeach; ?>
                      </select>
                      <label>Select Material Type</label>
                  </div>
                  <br>

                <div class="file-field input-field col s12">
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
                <input class="btn waves-effect waves-green green darken-1" type="submit"  value="Save" />
            </div>
        </div>
    <!--End Modal UploadVideo Structure -->
<a class="modal-trigger btn waves-effect waves-green grey darken-3" href="#modalyoutubelink"><i class="material-icons right">subscriptions</i>New Youtube Link</a>

 <!--Modal Upload Youtube Link Structure -->
        <div id="modalyoutubelink" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>Youtube Link</h4>
                    <div class="input-field col s12">
                        <input type="text" class="validate" maxlength="45" required  id="materialname" value="">
                        <label for="materialname">Name</label>
                    </div>
                    <div class="input-field col s6">
                        <textarea id="descriptionleft"  class="materialize-textarea" required maxlength="200" ></textarea>
                        <label for="descriptionleft">Description Left</label>
                    </div>
                    <div class="input-field col s6">
                        <textarea id="descriptionright" class="materialize-textarea" maxlength="200" ></textarea>
                        <label for="descriptionclassright">Description Right</label>
                    </div>
                    <div class="input-field col s12">
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

   <a class="btn modal-trigger" href="#Addclass"><i class="material-icons right">playlist_add_check</i><strong> Add Material to Class</strong></a>
</div>
<br>
<div class="row">
<p><input type="checkbox" class="filled-in" id="materialcheckedall"/>
<label for="materialcheckedall">Check all</label></p>
</div>
<div class="row" id="check">
  <div class="row">
    <?php $i = 0; foreach ($material as $filmaterial):?>
      <?php $checkcount = $i?>
        <?php if($filmaterial->materialtype_idmaterialtype === '1'):?>
          <div class="col s12 m6 l6">
           <div class="card blue-grey lighten-5" id="cardpdf<?php echo $i?>">
                  <div class="card-image">
                    <br><object data="media/<?php echo $filmaterial->route?>" type="application/pdf" width="100%" height="100%"/><br>
                  </div>
                  <div class="card-content">
                    <p><input type="checkbox" id="selectmaterial<?php echo $i?>"/>
                      <label for="selectmaterial<?php echo $i?>"> Select</label></p>
                    <h4><?php echo $filmaterial->materialname?></h4>
                    <input id="idmaterial<?php echo $i?>" type="text" hidden value="<?php echo $filmaterial->idmaterial?>" >
                    <input id="idmaterialtype<?php echo $i?>" type="text" hidden value="<?php echo $filmaterial->materialtype_idmaterialtype?>" >
                    <blockquote><?php echo $filmaterial->descriptionleft?></blockquote>
                    <blockquote><?php echo $filmaterial->descriptionright?></blockquote>

                    <?php $r = 0; foreach ($material_has_class as $filmhc):?>
                        <?php $ro = 0; foreach ($class as $fil_class): ?>
                        <?php if($fil_class->idclass === $filmhc->class_idclass && $filmhc->material_idmaterial === $filmaterial->idmaterial): ?>
                          <div class="chip" >
                            <img src="img/class.png" alt="Contact Person">
                            <span >
                              Class :
                              <?php $idmaterial = $filmhc->material_idmaterial?>
                              <?php $idclass = $filmhc->class_idclass ?>
                              <?php echo $fil_class->classname ?>
                              <i id="idmhc<?php echo $i?>" onclick="deleterelmaterialclass(<?php echo $idmaterial?>,<?php echo $idclass?>)" class="close material-icons" >close</i>
                            </span>

                          </div>
                        <?php endif; ?>
                        <?php $ro++; endforeach; ?>
                    <?php $r++; endforeach;?>
                
                  </div>
                  <div class="card-action">
                      <button class="modal-trigger btn red darken-3" id="btndeletematerial<?php echo $i ?>" style="cursor: pointer;" href="#Modal_delete_material<?php echo $i?>"  data-tooltip="Delete material"><i class="material-icons right">delete</i></button>
                  </div>
                  <div class="modal modal-fixed-footer" tabindex="-1" role="dialog" id="Modal_delete_material<?php echo $i?>">
                      <div class="modal-content">
                        <div class="card-panel">
                          <h3><strong>Are you sure?</strong></h3>
                          <p>Please insert your password and delete.</p>
                        </div>
                        <div class="input-field col s4">
                          <input type="password" class="form-control" id="deletematerialValidate<?php echo $i ?>">
                          <label for="deletematerialValidate<?php echo $i ?>" >Password</label>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                        <button type="button" class="btn modal-trigger modal-close  red darken-3" onclick="deletematerial(<?php echo $filmaterial->idmaterial?>)"><i class="material-icons right">save</i> Delete</button>
                      </div>
                    </div>
           </div>
          </div>

        <?php endif;?>
        <?php if($filmaterial->materialtype_idmaterialtype === '2'):?>
          <div class="col s12 m6 l6">
              <div class="card blue-grey lighten-5" id="cardaudio<?php echo $i?>">
                  <div class="card-image">
                    <br>
                    <audio controls>
                      <source src="media/<?php echo $filmaterial->route?>">
                        Tu navegador no soporta HTML5 audio.
                    </audio>
                    <br>
                  </div>
                  <div class="card-content">
                    <p>
                      <input type="checkbox" id="selectmaterial<?php echo $i?>"/>
                      <label for="selectmaterial<?php echo $i?>"> Select</label>
                    </p>
                    <h4><?php echo $filmaterial->materialname?></h4>
                    <input id="idmaterial<?php echo $i?>" type="text" hidden value="<?php echo $filmaterial->idmaterial?>" >
                      <blockquote><?php echo $filmaterial->descriptionleft?></blockquote>
                      <blockquote><?php echo $filmaterial->descriptionright?></blockquote>
                      <?php $r = 0; foreach ($material_has_class as $filmhc):?>
                        <?php $ro = 0; foreach ($class as $fil_class): ?>
                        <?php if($fil_class->idclass === $filmhc->class_idclass && $filmhc->material_idmaterial === $filmaterial->idmaterial): ?>
                          <div class="chip" >
                            <img src="img/class.png" alt="Contact Person">
                            <span >
                              Class :
                              <?php $idmaterial = $filmhc->material_idmaterial?>
                              <?php $idclass = $filmhc->class_idclass ?>
                              <?php echo $fil_class->classname ?>
                              <i id="idmhc<?php echo $i?>" onclick="deleterelmaterialclass(<?php echo $idmaterial?>,<?php echo $idclass?>)" class="close material-icons" >close</i>
                            </span>
                          </div>
                        <?php endif; ?>
                        <?php $ro++; endforeach; ?>
                      <?php $r++; endforeach;?>
                  </div>
                  <div class="card-action">
                      <button class="modal-trigger btn red darken-3" id="btndeletematerial<?php echo $i ?>" style="cursor: pointer;" href="#Modal_delete_material<?php echo $i?>"  data-tooltip="Delete material"><i class="material-icons right">delete</i></button>
                  </div>
                  <div class="modal modal-fixed-footer" tabindex="-1" role="dialog" id="Modal_delete_material<?php echo $i?>">
                      <div class="modal-content">
                        <div class="card-panel">
                          <h3><strong>Are you sure?</strong></h3>
                          <p>Please insert your password and delete.</p>
                        </div>
                        <div class="input-field col s4">
                          <input type="password" class="form-control" id="deletematerialValidate<?php echo $i ?>">
                          <label for="deletematerialValidate<?php echo $i ?>" >Password</label>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                        <button type="button" class="btn modal-trigger modal-close  red darken-3" onclick="deletematerial(<?php echo $filmaterial->idmaterial?>)"><i class="material-icons right">save</i> Delete</button>
                      </div>
                    </div>
              </div>
            </div>
        <?php endif;?>
        <?php if($filmaterial->materialtype_idmaterialtype === '3'):?>
          <div class="col s12 m6 l6">
             <div class="card blue-grey lighten-5" id="cardvideo<?php echo $i?>">
              <div class="card-image">

                <video class="responsive-video" controls>
                  <source src="media/<?php echo $filmaterial->route?>" controls>
                  </video>
                </div>
                <div class="card-content">
                  <p>
                            <input type="checkbox" id="selectmaterial<?php echo $i?>"/>
                            <label for="selectmaterial<?php echo $i?>"> Select</label>
                          </p>
                  <h4><?php echo $filmaterial->materialname?></h4>
                  <input id="idmaterial<?php echo $i?>" type="text" hidden value="<?php echo $filmaterial->idmaterial?>" >
                  <blockquote><?php echo $filmaterial->descriptionleft?></blockquote>
                  <blockquote><?php echo $filmaterial->descriptionright?></blockquote>
                  <?php $r = 0; foreach ($material_has_class as $filmhc):?>
                            <?php $ro = 0; foreach ($class as $fil_class): ?>
                            <?php if($fil_class->idclass === $filmhc->class_idclass && $filmhc->material_idmaterial === $filmaterial->idmaterial): ?>
                              <div class="chip" >
                                <img src="img/class.png" alt="Contact Person">
                                <span >
                                  Class :
                                  <?php $idmaterial = $filmhc->material_idmaterial?>
                                  <?php $idclass = $filmhc->class_idclass ?>
                                  <?php echo $fil_class->classname ?>
                                  <i id="idmhc<?php echo $i?>" onclick="deleterelmaterialclass(<?php echo $idmaterial?>,<?php echo $idclass?>)" class="close material-icons" >close</i>
                                </span>
                              </div>
                            <?php endif; ?>
                            <?php $ro++; endforeach; ?>
                        <?php $r++; endforeach;?>
                </div>
               <div class="card-action">
                          <button class="modal-trigger btn red darken-3" id="btndeletematerial<?php echo $i ?>" style="cursor: pointer;" href="#Modal_delete_material<?php echo $i?>"  data-tooltip="Delete material"><i class="material-icons right">delete</i></button>
                      </div>
                      <div class="modal modal-fixed-footer" tabindex="-1" role="dialog" id="Modal_delete_material<?php echo $i?>">
                          <div class="modal-content">
                            <div class="card-panel">
                              <h3><strong>Are you sure?</strong></h3>
                              <p>Please insert your password and delete.</p>
                            </div>
                            <div class="input-field col s4">
                              <input type="password" class="form-control" id="deletematerialValidate<?php echo $i ?>">
                              <label for="deletematerialValidate<?php echo $i ?>" >Password</label>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                            <button type="button" class="btn modal-trigger modal-close  red darken-3" onclick="deletematerial(<?php echo $filmaterial->idmaterial?>)"><i class="material-icons right">save</i> Delete</button>
                          </div>
                        </div>
              </div>
        </div>
        <?php endif;?>
        <?php if($filmaterial->materialtype_idmaterialtype === '4'):?>
          <div class="col s12 m6 l6">
          <div class="card blue-grey lighten-5" id="cardyoutube<?php echo $i?>">
            <div class="card-image">

              <div class="video-container">

                <?php
                $original = $filmaterial->link;
                $length = strlen($original);
                $base = substr($original,0,24);
                $dir = substr($original, strpos($original, "=") + 1, $length);
                $link = $base . "embed/" . $dir . "?enablejsapi=1";?>
                <iframe width="360" height="480" src="<?php  echo $link;?>" frameborder="1" allowfullscreen></iframe>

              </div>

              <span class="card-title">Material</span>
            </div>
            <div class="card-content">
              <p>
                        <input type="checkbox" id="selectmaterial<?php echo $i?>"/>
                        <label for="selectmaterial<?php echo $i?>"> Select</label>
                      </p>
              <h4><?php echo $filmaterial->materialname?></h4>
              <input id="idmaterial<?php echo $i?>" type="text" hidden value="<?php echo $filmaterial->idmaterial?>" hidden>
              <blockquote><?php echo $filmaterial->descriptionleft?></blockquote>
              <blockquote><?php echo $filmaterial->descriptionright?></blockquote>
              <?php $r = 0; foreach ($material_has_class as $filmhc):?>
                        <?php $ro = 0; foreach ($class as $fil_class): ?>
                        <?php if($fil_class->idclass === $filmhc->class_idclass && $filmhc->material_idmaterial === $filmaterial->idmaterial): ?>
                          <div class="chip" >
                            <img src="img/class.png" alt="Contact Person">
                            <span >
                              Class :
                              <?php $idmaterial = $filmhc->material_idmaterial?>
                              <?php $idclass = $filmhc->class_idclass ?>
                              <?php echo $fil_class->classname ?>
                              <i id="idmhc<?php echo $i?>" onclick="deleterelmaterialclass(<?php echo $idmaterial?>,<?php echo $idclass?>,<?php echo $idmaterialtype?>)" class="close material-icons" >close</i>
                            </span>
                          </div>
                        <?php endif; ?>
                        <?php $ro++; endforeach; ?>
                    <?php $r++; endforeach;?>
                  </div>
            </div>
            <div class="card-action">
                      <button class="modal-trigger btn red darken-3" id="btndeletematerial<?php echo $i ?>" style="cursor: pointer;" href="#Modal_delete_material<?php echo $i?>"  data-tooltip="Delete material"><i class="material-icons right">delete</i></button>
                  </div>
                  <div class="modal modal-fixed-footer" tabindex="-1" role="dialog" id="Modal_delete_material<?php echo $i?>">
                      <div class="modal-content">
                        <div class="card-panel">
                          <h3><strong>Are you sure?</strong></h3>
                          <p>Please insert your password and delete.</p>
                        </div>
                        <div class="input-field col s4">
                          <input type="password" class="form-control" id="deletematerialValidate<?php echo $i ?>">
                          <label for="deletematerialValidate<?php echo $i ?>" >Password</label>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                        <button type="button" class="btn modal-trigger modal-close  red darken-3" onclick="deletematerial(<?php echo $filmaterial->idmaterial?>)"><i class="material-icons right">save</i> Delete</button>
                      </div>
                    </div>
          </div>
        <?php endif;?>
        <?php $checkcount = $i?>
    <?php $i++; endforeach; ?>
  </div>
  </div>



    <div id="Addclass" class="modal modal-fixed-footer">
      <div class="modal-content">

        <div class="input-field col s6">
          <select id="selectmaterialhasclass">
            <?php $io = 0; foreach ($class as $fil_class):?>
            <option value="<?php echo $fil_class->idclass ?>"><?php echo $fil_class->classname ?></option>
            <?php $io++;  endforeach; ?>
          </select>
          <label>Select Class</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn modal-trigger modal-close red darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
        <button type="button" class="btn modal-trigger modal-close green darken-1" id="btnmaterialclass" onclick="materialhasclass(<?php echo $checkcount?>)"><i class="material-icons right">save</i><strong> Add</strong></button>
      </div>
    </div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#collapsible').collapsible();
    $('ul.tabs').tabs();
    $('select').material_select();
    $(".button-collapse").sideNav();
    $('input#input_text, textarea#textarea1').characterCounter();
    $('.modal').modal();
    $("#materialcheckedall").change(function () {
      if ($(this).is(':checked')) {
              //$("input[type=checkbox]").prop('checked', true); //todos los check
              $('#check input[type = checkbox]').prop('checked', true); //solo los del objeto #Habilitados
            } else {
              //$("input[type=checkbox]").prop('checked', false);//todos los check
              $('#check input[type = checkbox]').prop('checked', false);//solo los del objeto #Habilitados
            }
          });
  });
</script>