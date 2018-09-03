<div class="card-panel z-depth-5">

  <button class="btn modal-trigger" href="#sectionhasclass"><i class="material-icons right">playlist_add_check</i> Add Section to Class</button>


<p class=""><input type="checkbox" class="filled-in" id="sectioncheckedall"/>
<label for="sectioncheckedall">Check all</label></p>
    <div class="card-panel z-depth-3">
        <div id="check">
                <?php if ($section == 0): ?><p>Don't section!</p><?php else: ?>
                  <?php $i = 0; foreach ($section as $fila):?>
                  <?php $checkcount = $i?>
                          <div class="row">
                            <div class="col s12 m6">
                              <div class="card blue-grey lighten-5 z-depth-5">
                                <div class="card-content">
                                  <p>
                                    <input type="checkbox" id="selectsection<?php echo $i?>"/>
                                    <label for="selectsection<?php echo $i?>">Select </label></p>
                                  <span class="card-title"><strong>Section</strong></span>
                                  <blockquote>
                                    <?php echo $fila->sectionname ?>
                                  </blockquote>
                                  <blockquote>
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
                                                    <i id="idsp<?php echo $i?>" onclick="deleterelsectionclassteacher(<?php echo $idsection?>,<?php echo $idclass?>)" class="close material-icons" >close</i>
                                                  </span>
                                                </div>
                                          <?php endif; ?>
                                        <?php $os++; endforeach; ?>
                                    <?php $o++; endforeach;?>
                                </div>

                              </div>
                            </div>
                          </div>


                <?php $i++; endforeach; ?>
                <?php endif; ?>
        </div> 
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