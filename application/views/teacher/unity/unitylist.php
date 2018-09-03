<div class="card-panel z-depth-5">
    <button class="btn modal-trigger" href="#unityhassection"><i class="material-icons right">playlist_add_check</i> Add Unity to Section</button>
   


<p class=""><input type="checkbox" class="filled-in" id="unitycheckedall"/>
<label for="unitycheckedall">Check all</label></p>

<div class="card-panel z-depth-3">
    <div id="check">

    <?php if ($unity == 0): ?><p>Don't unity save!</p><?php else: ?>
        <?php $i = 0; foreach ($unity as $filunity):?>
        <?php $checkcount = $i?>
            <div class="row">
                <div class="col s12 m6">
                  <div class="card blue-grey lighten-5 z-depth-5">
                    <div class="card-content">
                        <p>
                        <input type="checkbox" id="selectunity<?php echo $i?>"/>
                        <label for="selectunity<?php echo $i?>">Select </label></p>
                      <span class="card-title"><?php echo $filunity->unityname ?></span>
                      <blockquote><?php echo $filunity->descriptioncenter ?></blockquote>
                        <blockquote>
                            <?php echo $filunity->descriptionleft ?>
                        </blockquote>
                        <blockquote>
                            <?php echo $filunity->descriptionright ?>
                        </blockquote>
                          <?php $o = 0; foreach ($unity_has_section as $filuhs):?>
                            <?php $os = 0; foreach ($section as $fil_section): ?>
                                <?php if($filunity->idunity === $filuhs->unity_idunity && $filuhs->section_idsection === $fil_section->idsection): ?>
                                      <div class="chip" >
                                        <img src="img/section.png" alt="Contact Person">
                                        <span >
                                            section :
                                          <?php $section_idsection = $filuhs->section_idsection?>
                                          <?php $unity_idunity = $filuhs->unity_idunity ?>
                                          <?php echo $fil_section->sectionname ?>
                                          <i id="idsp<?php echo $i?>" onclick="deleterelunitysectionteacher(<?php echo $section_idsection?>,<?php echo $unity_idunity?>)" class="close material-icons" >close</i>
                                        </span>
                                      </div>


                                      <?php $r = 0; foreach ($section_has_class as $filshc):?>
                              <?php $ro = 0; foreach ($class as $fil_class): ?>
                                  <?php if($fil_class->idclass === $filshc->class_idclass && $filshc->section_idsection === $fil_section->idsection): ?>
                                        <div class="chip" >
                                          <img src="img/class.png" alt="Contact Person">
                                          <span >
                                            Class :
                                            <?php echo $fil_class->classname ?>
                                          </span>
                                        </div>
                                  <?php endif; ?>
                                <?php $ro++; endforeach; ?>
                            <?php $r++; endforeach;?>

                                <?php endif; ?>
                              <?php $os++; endforeach; ?>
                          <?php $o++; endforeach;?>
                        
                    </div>
                    <div class="card-action">
                      
                    </div>
                  </div>
                </div>
            </div>

            <div id="ModalEditunit<?php echo $i ?>" class="modal modal-fixed-footer">
              <div class="modal-content">
                  <h4>Edit Unit</h4>
                    <div class="input-field col s6" hidden="true">
                        <input type="text" id="editunitid<?php echo $i?>" class="validate" value="<?php echo $filunity->idunity ?>">
                        <label for="editunitid<?php $i?>" class="active">Unit Name</label>
                    </div>
                                    
                  
                    <div class="input-field col s6">
                        <input type="text" id="editunitname<?php echo $i?>" class="validate" value="<?php echo $filunity->unityname ?>">
                        <label for="editunitname<?php $i?>" class="active">Unit Name</label>
                    </div>
                    <div class="input-field col s6">
                        <textarea id="editunitdescriptioncenter<?php echo $i?>" class="materialize-textarea validate" required data-length="200" maxlength="200" ><?php echo $filunity->descriptioncenter ?></textarea>
                        <label for="editunitdescriptioncenter<?php echo $i?>" class="active">Description unit Center</label>
                    </div>
                    <div class="input-field col s6">
                        <textarea id="editunitdescriptionleft<?php echo $i?>" class="materialize-textarea" required data-length="200" maxlength="200" ><?php echo $filunity->descriptionleft ?></textarea>
                        <label for="editunitdescriptionleft<?php echo $i?>" class="active">Description unit left</label>
                    </div>
                    <div class="input-field col s6">
                        <textarea id="editunitdescriptionright<?php echo $i?>" class="materialize-textarea" required data-length="200" maxlength="200" ><?php echo $filunity->descriptionright ?></textarea>
                        <label for="editunitdescriptionright<?php echo $i?>" class="active">Description unit right</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <a class="modal-action modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></a>
                    <a id="btneditunit<?php echo $i?>" class="modal-action modal-close btn waves-effect waves-green green darken-1" onclick="updateunit(<?php echo $i?>)"><i class="material-icons right">save</i><strong> Save</strong></a>
                </div>
            </div>
            
        <div class="modal modal-fixed-footer" tabindex="-2" role="dialog" id="Modal_delete_unity<?php echo $i ?>">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="card-panel">
                <h3><strong>Are you sure?</strong></h3>
              <p>Please insert your password and delete.</p>
            </div>
            <div class="input-field col s4">
                <input type="password" class="form-control" id="deleteclassValidate<?php echo $i ?>">
                <label for="deleteclassValidate<?php echo $i ?>" >Password</label>
              </div>
          </div>
            <div class="modal-footer">
              <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey lighten-3 black-text" ><i class="material-icons right">expand_more</i><strong> Done</strong></button>
              <button type="button" class="btn modal-trigger modal-close red darken-3" id="btndeleteunity<?php echo $i ?>" onclick="deleteunity(<?php echo $i ?>)"><i class="material-icons right">delete_forever</i><strong> Delete</strong></button>
            </div>
          </div>
        </div>


        <?php $i++; endforeach;?>
    <?php endif; ?>


    <!-- MODALs News-->
    <div id="unityhassection" class="modal modal-fixed-footer">
        <div class="modal-content">
         <h4><strong>Unity has Section</strong></h4>
         <div class="input-field col s6">
          <select id="idselectsectionunity">
            <?php $e = 0; foreach ($section as $fil_section):?>
            <option value="<?php echo $fil_section->idsection?>"> <?php echo $fil_section->sectionname?> </option>
            <?php $e++; endforeach; ?>
          </select>
          <label>Section</label>
        </div>
        </div>
        <div class="modal-footer">
          <a class="modal-action modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></a>
          <a id="btnstudentclass" class="modal-action modal-close btn waves-effect waves-green green darken-1" onclick="unitysavesectionteacher(<?php echo $checkcount?>)"><i class="material-icons right">save</i><strong> Save</strong></a>
        </div>
      </div>
</div>
</div>



<script type="text/javascript">
    $(document).ready(function () {
        $('#collapsible').collapsible();
        $('ul.tabs').tabs();
        $('select').material_select();
        $(".button-collapse").sideNav();
        $('input#input_text, textarea#textarea1').characterCounter();
        $('.modal').modal();
        $("#unitycheckedall").change(function () {
            if ($(this).is(':checked')) {
                //$("input[type=checkbox]").prop('checked', true); //todos los check
                $('#check input[type = checkbox]').prop('checked', true); //solo los del objeto #diasHabilitados
            } else {
                //$("input[type=checkbox]").prop('checked', false);//todos los check
                $('#check input[type = checkbox]').prop('checked', false);//solo los del objeto #diasHabilitados
            }
        });

    });

</script>

