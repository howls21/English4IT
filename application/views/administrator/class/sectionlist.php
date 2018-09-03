  <?php $checkcount = 0?>
  <a class="modal-trigger btn waves-effect waves-green grey darken-3" href="#NewSection"><i class="material-icons right">add_box</i><strong> New Section</strong></a>
  <button class="btn modal-trigger blue-grey" href="#sectionhasclass"><i class="material-icons right"><div class="chip" ><img src="img/class.png" alt="Contact Person"></div></i><i class="material-icons right">keyboard_tab</i>SECTION AS CLASS</button>
  <!-- MODALs News-->
  <div id="NewSection" class="modal modal-fixed-footer">
      <div class="modal-content">
           <h5><strong>New Section</strong></h5>
           <div class="input-field col s12">
            <input type="text" class="validate" maxlength="45" data-length="45" required id="sectionname">
            <label for="sectionname">Section Name</label>
           </div>
          <div class="input-field col s12">
            <textarea id="description" class="materialize-textarea validate" required maxlength="200" data-length="200" ></textarea>
            <label for="description">Description</label>
          </div>
          
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-action modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></a>
        <a href="#!" class="modal-action modal-close btn waves-effect waves-green green darken-1" onclick="savesection()"><i class="material-icons right">save</i><strong> Save</strong></a>
      </div>
  </div>
</div>


<p class=""><input type="checkbox" class="filled-in" id="sectioncheckedall"/>
<label for="sectioncheckedall">Check all</label></p>
        <div id="check">
          <br>
                <?php if ($section == 0): ?><p>Don't section!</p><?php else: ?>
                  <?php $i = 0; foreach ($section as $fila):?>
                  <?php $checkcount = $i?>
                          
                            <div class="col s12 m8 l5 ">
                              <div class="card blue-grey lighten-5 z-depth-3">
                                <div class="card-content">
                                  <p>
                                    <input type="checkbox" id="selectsection<?php echo $i?>"/>
                                    <label for="selectsection<?php echo $i?>">Select </label></p>
                                    <br>
                                  <span class="card-title">SECTION : <strong><?php echo $fila->sectionname ?></strong></span>
                                  <blockquote>DESCRIPTION: 
                                    <?php echo $fila->description ?>
                                  </blockquote>
                                    <?php $o = 0; foreach ($section_has_class as $filshc):?>
                                      <?php $os = 0; foreach ($class as $fil_class): ?>
                                          <?php if($fila->idsection === $filshc->section_idsection && $filshc->class_idclass === $fil_class->idclass): ?>
                                                <div class="chip" >
                                                  <img src="img/class.png" alt="Contact Person">
                                                  <span >
                                                    Class :
                                                    <?php $idsection = $filshc->section_idsection?>
                                                    <?php $idclass = $filshc->class_idclass ?>
                                                    <?php echo $fil_class->classname ?>
                                                    <i id="idsp<?php echo $i?>" onclick="deleterelsectionclass(<?php echo $idsection?>,<?php echo $idclass?>)" class="close material-icons" >close</i>
                                                  </span>
                                                </div>
                                          <?php endif; ?>
                                        <?php $os++; endforeach; ?>
                                    <?php $o++; endforeach;?>
                                </div>
                                <div class="card-action">
                                  <button class="modal-trigger btn waves-effect waves-green white lighten-3 black-text" id="btneditclasstable<?php echo $i ?>" style="cursor: pointer;" href="#Modal_edit_class<?php echo $i ?>" data-tooltip="Edit Class"><i class="material-icons right">edit</i>Edit</button>
                                  <button class="btn modal-trigger waves-effect waves-red  white red-text" id="btnclassdeletemodal<?php echo $i ?>" style="cursor: pointer;" href="#Modal_delete_class<?php echo $i ?>" data-tooltip="Delete Class"><i class="material-icons right">delete</i>Delete</button>
                                </div>
                              </div>
                            </div>
                          


                    <div class="modal modal-fixed-footer" tabindex="-1" role="dialog" id="Modal_edit_class<?php echo $i ?>">
                      <div class="modal-content">
                        <h4>Edit section</h4>
                        <div class="input-field col s6" hidden="true">
                          <input  id="idsectionedit<?php echo $i?>" type="text"  value="<?php echo $fila->idsection?>">
                          <label for="idsectionedit<?php echo $i?>" class="active">Id Section</label>
                        </div>
                        <div class="input-field col s6">
                          <input id="edit_section_name<?php echo $i?>" type="text"  value="<?php echo $fila->sectionname?>">
                          <label for="edit_section_name<?php echo $i?>" class="active">Name Section</label>
                        </div>
                        <div class="input-field col s6">
                          <input id="edit_description<?php echo $i?>" type="text"  value="<?php echo $fila->description?>">
                          <label for="edit_description<?php echo $i?>" class="active">Description</label>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey darken-3" ><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                        <button type="button" class="btn modal-trigger modal-close green darken-1" id="btneditclass<?php echo $i ?>" onclick="updatesection(<?php echo $i?>)" ><i class="material-icons right">save</i><strong> Save</strong></button>
                      </div>
                    </div>

                    <div class="modal modal-fixed-footer" tabindex="-2" role="dialog" id="Modal_delete_class<?php echo $i ?>">
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
                          <button type="button" class="btn modal-trigger modal-close grey lighten-5 darken-1" ><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                          <button type="button" class="btn modal-trigger modal-close  red darken-3" id="btndeleteclass<?php echo $i ?>" onclick="deletesection(<?php echo $i ?>)"><i class="material-icons right">delete_forever</i><strong> Delete</strong></button>
                        </div>
                      </div>
                    </div>

                  <?php $i++; endforeach; ?>
                <?php endif; ?>
      </div>
            <!-- MODALs News-->
            <div id="sectionhasclass" class="modal modal-fixed-footer">
                <div class="modal-content">
                   <h4><strong>Section has class</strong></h4>
                   <div class="input-field col s6">
                    <select id="idselectclasssection">
                      <?php $e = 0; foreach ($class as $fil_class):?>
                      <option  value="<?php echo $fil_class->idclass?>"> <?php echo $fil_class->classname?> </option>
                      <?php $e++; endforeach; ?>
                    </select>
                    <label>Class</label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="modal-action modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                  <button id="btnsectionclass" class="modal-action modal-close btn waves-effect waves-green green darken-1" onclick="sectionhasclass(<?php echo $checkcount?>)"><i class="material-icons right">save</i><strong> Save</strong></button>
                </div>
            </div>

<!-- Llamados a Js Visuales -->
<script type="text/javascript">
    $(document).ready(function () {
        $('.modal').modal();
        $('input#sectionname, textarea#description').characterCounter();
    });
    $('select').material_select();
    $("#sectioncheckedall").change(function () {
      if ($(this).is(':checked')) {
              //$("input[type=checkbox]").prop('checked', true); //todos los check
              $('#check input[type = checkbox]').prop('checked', true); //solo los del objeto #Habilitados
            } else {
              //$("input[type=checkbox]").prop('checked', false);//todos los check
              $('#check input[type = checkbox]').prop('checked', false);//solo los del objeto #Habilitados
            }
          });

</script>