<div class="card-panel z-depth-5">
  <button class="btn modal-trigger" href="#activityhasunity"><i class="material-icons right">playlist_add_check</i> Add activity to unity</button>
 



  <p class=""><input type="checkbox" class="filled-in" id="activitycheckedall"/>
    <label for="activitycheckedall">Check all</label></p>
    <div class="card-panel z-depth-5">
      <div id="check">
        <?php if ($activity == 0): ?><h3>Don't Activity!</h3><?php else: ?>
          <?php $i = 0; foreach ($activity as $fil_activity): ?>
          <?php $checkcount = $i?>
          <div class="row">
            <div class="col s12 m6">
              <div class="card blue-grey lighten-5">
                <div class="card-content">
                  <p>
                    <input type="checkbox" id="selectactivity<?php echo $i?>"/>
                    <label for="selectactivity<?php echo $i?>">Select </label></p>
                    <span class="card-title"><strong><?php echo $fil_activity->activityname?></strong></span>
                    <blockquote><?php echo $fil_activity->descriptionleft?></blockquote>
                    <blockquote><?php echo $fil_activity->descriptionright?></blockquote>
                    <?php $o = 0; foreach ($activity_has_unity as $fil_ahu):?>
                    <?php $os = 0; foreach ($unity as $fil_unity): ?>
                    <?php if($fil_unity->idunity === $fil_ahu->unity_idunity && $fil_activity->idactivity === $fil_ahu->activity_idactivity): ?>
                      <div class="chip" >
                        <img src="img/unity.png" alt="Contact Person">
                        <span >
                          Unity :
                          <?php $unity_idunity = $fil_ahu->unity_idunity?>
                          <?php $activity_idactivity = $fil_ahu->activity_idactivity ?>
                          <?php echo $fil_unity->unityname ?>
                          <i id="idsp<?php echo $i?>" onclick="deleterelactivityunityteacher(<?php echo $activity_idactivity?>,<?php echo $unity_idunity?>)" class="close material-icons" >close</i>
                        </span>
                      </div>
                      <?php $oi = 0; foreach ($unity_has_section as $filuhs):?>
                      <?php $ose = 0; foreach ($section as $fil_section): ?>
                      <?php if($fil_unity->idunity === $filuhs->unity_idunity && $filuhs->section_idsection === $fil_section->idsection): ?>
                        <div class="chip" >
                          <img src="img/section.png" alt="Contact Person">
                          <span >
                            section :
                            <?php $section_idsection = $filuhs->section_idsection?>
                            <?php $unity_idunity = $filuhs->unity_idunity ?>
                            <?php echo $fil_section->sectionname ?>
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
                      <?php $ose++; endforeach; ?>
                      <?php $oi++; endforeach;?>


                    <?php endif; ?>
                    <?php $os++; endforeach; ?>
                    <?php $o++; endforeach;?>
                  </div>
                  <div class="card-action">
                  
                    </div>
                  </div>
                </div>
              </div>


              <p></p>

              <div class="modal modal-fixed-footer" tabindex="-1" role="dialog" id="Modal_edit_activity<?php echo $i ?>">
                <div class="modal-content">
                  <h4>Edit Activity</h4>
                  <div class="input-field col s6" hidden="true">
                    <input id="id_activity_edit<?php echo $i?>" type="text" value="<?php echo $fil_activity->idactivity?>">
                    <label for="id_activity_edit<?php echo $i?>" class="active">Id Activity</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="name_activity_edit<?php echo $i?>" type="text" value="<?php echo $fil_activity->activityname?>">
                    <label for="name_activity_edit<?php echo $i?>" class="active">Name</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="descriptionleft_activity_edit<?php echo $i?>" type="text" value="<?php echo $fil_activity->descriptionleft?>">
                    <label for="descriptionleft_activity_edit<?php echo $i?>" class="active">Description Left</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="descriptionright_activity_edit<?php echo $i?>" type="text" value="<?php echo $fil_activity->descriptionright?>">
                    <label for="descriptionright_activity_edit<?php echo $i?>" class="active">Description Right</label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                  <button type="button" class="btn modal-trigger modal-close green darken-1" id="btneditactivity<?php echo $i ?>" onclick="updateactivityadmin(<?php echo $i?>)"><i class="material-icons right">save</i><strong> Save</strong></button>
                </div>
              </div>

              <div class="modal modal-fixed-footer" tabindex="-1" role="dialog" id="Modal_delete_activity<?php echo $i?>">
                <div class="modal-content">
                  <div class="card-panel">
                    <h3><strong>Are you sure?</strong></h3>
                    <p>Please insert your password and delete.</p>
                  </div>
                  <div class="input-field col s4">
                    <input type="password" class="form-control" id="deleteactivityValidate<?php echo $i ?>">
                    <label for="deletestudentValidate<?php echo $i ?>" >Password</label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey lighten-3 black-text"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                  <button type="button" class="btn modal-trigger modal-close  red darken-3" onclick="deleteactivity(<?php echo $i ?>)"><i class="material-icons right">save</i> Delete</button>
                </div>
              </div>

              <?php $i++; endforeach; ?>
            <?php endif; ?>
            <!-- MODALs News-->
            <div id="activityhasunity" class="modal modal-fixed-footer">
              <div class="modal-content">
               <h4><strong>Activity to Class</strong></h4>
               <div class="input-field col s6">
                <select id="idselectactivityunity">
                  <?php $e = 0; foreach ($unity as $fil_unity):?>
                  <option value="<?php echo $fil_unity->idunity?>"> <?php echo $fil_unity->unityname?> </option>
                  <?php $e++; endforeach; ?>
                </select>
                <label>unity</label>
              </div>
            </div>
            <div class="modal-footer">
              <a class="modal-action modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></a>
              <a id="btnstudentclass" class="modal-action modal-close btn waves-effect waves-green green darken-1" onclick="activitysaveunityteacher(<?php echo $checkcount?>)"><i class="material-icons right">save</i><strong> Save</strong></a>
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
          $('input#activityname, textarea#descriptionleftactivity, textarea#descriptionrightactivity').characterCounter();
          $('.modal').modal();
          $("#activitycheckedall").change(function () {
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