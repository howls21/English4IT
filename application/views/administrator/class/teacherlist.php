<div class="">
   <a class="modal-trigger btn waves-effect waves-green grey darken-3" href="#NewTeacher"><i class="material-icons right">add_box</i><strong> New Teacher</strong></a>
  <button class="btn modal-trigger blue-grey" href="#teacherhassection"><i class="material-icons right"><div class="chip" ><img src="img/section.png" alt="Contact Person"></div></i><i class="material-icons right">keyboard_tab</i><strong>TEACHER AS SECTION</strong></button>

  <!-- MODALs News-->
  <div id="NewTeacher" class="modal modal-fixed-footer">
      <div class="modal-content">
           <h5><strong>New Teacher</strong></h5>
           <div class="input-field col s4">
            <input type="text" class="validate" onkeypress="checkRut(this)" maxlength="10" data-length="10" required id="idnumber">
            <label for="idnumber">Id number</label>
           </div>
           <div class="input-field col s6">
            <input type="text" class="validate" maxlength="45" data-length="45" required id="name">
            <label for="name">Name</label>
           </div>
           <div class="input-field col s6">
            <input type="text" class="validate" maxlength="45" data-length="45" required id="lastname">
            <label for="lastname">Last Name</label>
           </div>
           <div class="input-field col s6">
            <input type="text" class="validate" maxlength="45" data-length="45" required id="username">
            <label for="username">user Name</label>
           </div>
           <div class="input-field col s8">
            <input type="text" class="validate" maxlength="45" data-length="45" required id="email">
            <label for="email">Email</label>
            <div class="card">
                <div class="card-content">
                  <span class="card-title"><strong>Password Default is: "1234"</strong></span>
                </div>
              </div>
                  </div>
           <div class="input-field col s6">
              <select disabled="true" id="idselect">
                <option value="1" disabled selected>Teacher</option>
              </select>
              <label>Rol Select</label>
           </div>
            <?php if ($gender == 0): ?><p>Don't Gender!</p><?php else: ?>
              <div class="input-field col s6">
                <select id="idselectgenderteacher">
                  <?php $i = 0; foreach ($gender as $f_g):?>
                  <option value="<?php echo $f_g->idgender?>"><?php echo $f_g->name?></option>
                  <?php $i++; endforeach; ?>
                </select>
                <label>Gender</label>

              </div>
            <?php endif; ?>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-action modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></a>
        <a href="#!" class="modal-action modal-close btn waves-effect waves-green green darken-1" onclick="saveteacher()"><i class="material-icons right">save</i><strong> Save</strong></a>
      </div>
  </div>
</div>
 

<p class=""><input type="checkbox" class="filled-in" id="teachercheckedall"/>
    <label for="teachercheckedall">Check all</label></p>
<div class="">
      <div id="check">
        <br>
        <div class="row">   
            <?php if ($teacher == 0): ?><p>Don't Student!</p><?php else: ?>
              <?php $i = 0; foreach ($teacher as $fila):?>
              <?php $checkcount = $i?>
              

                    <div class="col s12 m8 l6">
                      <div class="card blue-grey lighten-5 z-depth-3">
                        <div class="card-content">
                          <p>
                        <input type="checkbox" id="selectteacher<?php echo $i?>"/>
                        <label for="selectteacher<?php echo $i?>">Select </label></p>
                        <br>
                          <span class="card-title">TEACHER: <strong><?php echo $fila->name ?> <?php echo $fila->lastname?></strong></span>
                          <blockquote><strong>Id Number :</strong> <?php echo $fila->idnumber ?></blockquote>
                          <blockquote><strong>User Name :</strong> <?php echo $fila->username?></blockquote>
                          <blockquote><strong>Email:</strong> <?php echo $fila->email?></blockquote>
                          
                          <?php $o = 0; foreach ($teacher_has_section as $filths):?>
                            <?php $os = 0; foreach ($section as $fil_section): ?>
                                <?php if($fila->idteacher === $filths->teacher_idteacher && $filths->section_idsection === $fil_section->idsection): ?>
                                      <div class="chip" >
                                        <img src="img/section.png" alt="Contact Person">
                                        <span >
                                          Section :
                                          <?php $section_idsection = $filths->section_idsection?>
                                          <?php $teacher_idteacher = $filths->teacher_idteacher ?>
                                          <?php echo $fil_section->sectionname ?>
                                          <i id="idsp<?php echo $i?>" onclick="deletereltechersection(<?php echo $section_idsection?>,<?php echo $teacher_idteacher?>)" class="close material-icons" >close</i>
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
                          <button class="modal-trigger btn waves-effect waves-green white lighten-3 black-text" id="btneditteachermodal<?php echo $i ?>" style="cursor: pointer;" href="#Modal_edit_teacher<?php echo $i ?>" data-tooltip="Edit Teacher"><i class="material-icons right">edit</i>Edit</button>
                          <button  class="btn modal-trigger waves-effect waves-red  white red-text" id="btndeleteteacher<?php echo $i ?>" style="cursor: pointer;" href="#Modal_delete_teacher<?php echo $i?>"  data-tooltip="Delete Teacher"><i class="material-icons right">delete</i>Delete</button>

                        </div>
                      </div>
                    </div>

                    <div class="modal modal-fixed-footer" tabindex="-1" role="dialog" id="Modal_edit_teacher<?php echo $i ?>">
                        <div class="modal-content">
                          <h4>Edit Teacher</h4>
                          <div class="input-field col s6" hidden="true">
                            <input id="id_teacher_edit<?php echo $i?>" type="text" value="<?php echo $fila->idteacher?>">
                            <label for="id_teacher_edit<?php echo $i?>" class="active">Id Teacher</label>
                          </div>
                          <div class="input-field col s6">
                            <input id="id_number_edit<?php echo $i?>" type="text" value="<?php echo $fila->idnumber?>">
                            <label for="id_number_edit<?php echo $i?>" class="active">Id number</label>
                          </div>
                          <div class="input-field col s6">
                            <input id="name_edit<?php echo $i?>" type="text"  value="<?php echo $fila->name?>">
                            <label for="name_edit<?php echo $i?>" class="active">Name</label>
                          </div>
                          <div class="input-field col s6">
                            <input id="lastname_edit<?php echo $i?>" type="text"  value="<?php echo $fila->lastname?>">
                            <label for="lastname_edit<?php echo $i?>" class="active">Lastname</label>
                          </div>
                          <div class="input-field col s6">
                            <input id="username_edit<?php echo $i?>" type="text" value="<?php echo $fila->username?>">
                            <label for="username_edit<?php echo $i?>" class="active">User Name</label>
                          </div>
                          <div class="input-field col s6">
                            <input id="email_edit<?php echo $i?>" type="text" value="<?php echo $fila->email?>">
                            <label for="email_edit<?php echo $i?>" class="active">email</label>
                          </div>
                          <div class="input-field col s6" hidden="true">
                            <input id="id_role_edit<?php echo $i?>" type="text" value="<?php echo $fila->role_idrole?>">
                            <label for="id_role_edit<?php echo $i?>" class="active">Id role</label>
                          </div>
                          <div class="input-field col s6">
                            <select id="idselectgender<?php echo $i?>">
                              <?php $e = 0; foreach ($gender as $fil_gender):?>
                              <option id="gender_option_edit<?php echo $e?>" value="<?php echo $fil_gender->idgender?>" <?php if($fila->gender_idgender === $fil_gender->idgender) echo "selected"?>> <?php echo $fil_gender->name?> </option>
                              <?php $e++; endforeach; ?>
                            </select>
                            <label>gender</label>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                          <button type="button" class="btn modal-trigger modal-close green darken-1" id="btneditteacher<?php echo $i ?>" onclick="updateteacher(<?php echo $i?>)"><i class="material-icons right">save</i><strong> Save</strong></button>
                        </div>
                    </div>
                    <div class="modal modal-fixed-footer" tabindex="-1" role="dialog" id="Modal_delete_teacher<?php echo $i?>">
                      <div class="modal-content">
                        <div class="card-panel">
                          <h3><strong>Are you sure?</strong></h3>
                          <p>Please insert your password and delete.</p>
                        </div>
                        <div class="input-field col s4">
                          <input type="password" class="form-control" id="deletestudentValidate<?php echo $i ?>">
                          <label for="deletestudentValidate<?php echo $i ?>" >Password</label>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                        <button type="button" class="btn modal-trigger modal-close  red darken-3" onclick="deleteteacher(<?php echo $i ?>)"><i class="material-icons right">save</i> Delete</button>
                      </div>
                    </div>
              <?php $i++; endforeach; ?>
            <?php endif; ?>
        </div>
                    
      </div>
    <!-- MODALs News-->
    <div id="teacherhassection" class="modal modal-fixed-footer">
        <div class="modal-content">
         <h4><strong>Teacher has Section</strong></h4>
         <div class="input-field col s6">
          <select id="idselectsectionteacher">
            <?php $e = 0; foreach ($section as $fil_section):?>
            <option value="<?php echo $fil_section->idsection?>"> <?php echo $fil_section->sectionname?> </option>
            <?php $e++; endforeach; ?>
          </select>
          <label>Section</label>
        </div>
        </div>
        <div class="modal-footer">
          <a class="modal-action modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></a>
          <a id="btnstudentclass" class="modal-action modal-close btn waves-effect waves-green green darken-1" onclick="teachersavesection(<?php echo $checkcount?>)"><i class="material-icons right">save</i><strong> Save</strong></a>
        </div>
      </div>
</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#collapsible').collapsible();
    $('ul.tabs').tabs();
    $('select').material_select();
    $(".button-collapse").sideNav();
    $('input#idnumber, input#name ,input#lastname,input#username ,input#password, input#passwordconfirm, input#email').characterCounter();
    $('.modal').modal();
    $("#teachercheckedall").change(function () {
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