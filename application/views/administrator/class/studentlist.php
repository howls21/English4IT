<br>
<?php $checkcount = 0?>
<div class="">
      <button class="modal-trigger btn waves-effect waves-green grey darken-3" href="#NewStudent"><i class="material-icons left">add_box</i><strong> New Student</strong></button>
      <button class="btn modal-trigger blue-grey" href="#StudentHasClass"><i class="material-icons right"><div class="chip" ><img src="img/section.png" alt="Contact Person"></div></i><i class="material-icons right">keyboard_tab</i><strong>STUDENT AS SECTION</strong></button>

<br>
          <div id="NewStudent" class="modal modal-fixed-footer">
            <div class="modal-content">
              <h4><strong>New Student</strong></h4>
              <div class="col s3">
                <div class="input-field">
                  <input type="text" class="validate" maxlength="10" data-length="10" required onkeypress="checkRut(this)" id="studentidnumber">
                  <label for="studentidnumber">ID Number</label>
                </div>
              </div>
              <div class="col s8">
                <div class="input-field">
                  <input type="text" class="validate" required maxlength="45" data-length="45" onkeypress="return soloLetras(event)" id="studentname">
                  <label for="studentname">Name</label>
                </div>
              </div>
              <div class="col s6">
                <div class="input-field">
                  <input type="text" class="validate" required maxlength="45" data-length="45" onkeypress="return soloLetras(event)"  id="studentlastname">
                  <label for="studentlastname">Lastname</label>
                </div>
              </div>
              <div class="col s6">
                <div class="input-field">
                  <input type="text" class="validate" required maxlength="45" data-length="45" onkeypress="return soloLetras(event)"  id="studentusername">
                  <label for="studentusername">User Name</label>
                </div>
              </div>
             
              <div class="col s12">
                <div class="input-field">
                  <input type="text" class="validate" maxlength="45" data-length="45" required   id="studentemail">
                  <label for="studentemail">Email</label>
                </div>
                <div class="card">
                <div class="card-content">
                  <span class="card-title">Password Default is: <strong>"1234"</strong></span>
                </div>
              </div>
              </div>
              <div class="col s6">
                <div class="input-field">
                  <select disabled="true" id="idselectgender">
                    <option value="1" disabled selected>Student</option>
                  </select>
                  <label>Rol Select</label>
                </div>
              </div>
              <div class="col s6">
                <?php if ($gender == 0): ?><p>Don't Gender!</p><?php else: ?>
                  <div class="input-field">
                    <select id="idselectgenderstudent">
                      <?php $i = 0; foreach ($gender as $f_g):?>
                      <option value="<?php echo $f_g->idgender?>"><?php echo $f_g->name?></option>
                      <?php $i++; endforeach; ?>
                    </select>
                    <label>Gender</label>
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></a>
              <a href="#!" class="modal-action modal-close btn waves-effect waves-green green darken-1" onclick="savestudentadmin()"><i class="material-icons right">save</i><strong> Save</strong></a>
            </div>
          </div>
</div>
  <p class=""><input type="checkbox" class="filled-in" id="studentcheckedall"/>
    <label for="studentcheckedall">Check all</label></p>
<div class="">
      <div id="check">
        <br>
        <div class="">
            <?php if ($student == 0): ?><p>Don't Student!</p><?php else: ?>
              <?php $i = 0; foreach ($student as $fila):?>
              <?php $checkcount = $i?>
                  
                    <div class="col s12 m8 l6">
                      <div class="card blue-grey lighten-5 z-depth-3">
                        <div class="card-content">
                          <p>
                        <input type="checkbox" id="selectstudent<?php echo $i?>"/>
                        <label for="selectstudent<?php echo $i?>">Select </label></p>
                        <br>
                        <span class="card-title"> STUDENT: 
                              <strong><?php echo $fila->name ?> <?php echo $fila->lastname?></strong>
                        </span>
                          <blockquote><strong>Id Number :</strong> <?php echo $fila->idnumber ?></blockquote>
                          
                          <blockquote><strong>User Name :</strong> <?php echo $fila->username?></blockquote>
                          <blockquote><strong>Email:</strong> <?php echo $fila->email?></blockquote>
                            <?php $o = 0; foreach ($student_has_section as $filshs):?>
                              <?php $os = 0; foreach ($section as $fil_section): ?>
                                  <?php if($fila->idstudent === $filshs->student_idstudent && $filshs->section_idsection === $fil_section->idsection): ?>
                                        <div class="chip" >
                                          <img src="img/section.png" alt="Contact Person">
                                          <span >
                                            Section :
                                            <?php $idstudent = $filshs->student_idstudent?>
                                            <?php $idsection = $filshs->section_idsection ?>
                                            <?php echo $fil_section->sectionname ?>
                                            <i id="idsp<?php echo $i?>" onclick="deleterelstudentsection(<?php echo $idstudent?>,<?php echo $idsection?>)" class="close material-icons" >close</i>
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
                          <button class="modal-trigger btn waves-effect waves-green white lighten-3 black-text" id="btneditstudentmodal<?php echo $i ?>" style="cursor: pointer;" href="#Modal_edit_student<?php echo $i ?>" data-tooltip="Edit Student"><i class="material-icons right">edit</i>Edit</button>
                          <button  class="btn modal-trigger waves-effect waves-red  white red-text" id="btndeletestudent<?php echo $i ?>" style="cursor: pointer;" href="#Modal_delete_student<?php echo $i?>"  data-tooltip="Delete Student"><i class="material-icons right">delete</i>Delete</button>

                        </div>
                      </div>
                    </div>
                  
                    <div class="modal modal-fixed-footer" tabindex="-1" role="dialog" id="Modal_edit_student<?php echo $i ?>">
                    <div class="modal-content">
                      <h4>Edit Student</h4>
                      <div class="input-field col s6" hidden="true">
                        <input id="id_student_edit<?php echo $i?>" type="text" value="<?php echo $fila->idstudent?>">
                        <label for="id_student_edit<?php echo $i?>" class="active">Id student</label>
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
                        <input id="id_role_edit_student<?php echo $i?>" type="text" value="<?php echo $fila->role_idrole?>">
                        <label for="id_role_edit_student<?php echo $i?>" class="active">Id student</label>
                      </div>
                      <div class="input-field col s6">
                        <select id="idselectgender<?php echo $i?>">
                          <?php $e = 0; foreach ($gender as $fil_gender):?>
                          <option value="<?php echo $fil_gender->idgender?>" <?php if($fila->gender_idgender === $fil_gender->idgender) echo "selected"?>> <?php echo $fil_gender->name?> </option>
                          <?php $e++; endforeach; ?>
                        </select>
                        <label>Role</label>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                      <button type="button" class="btn modal-trigger modal-close green darken-1" id="btneditstudent<?php echo $i ?>" onclick="updatestudent(<?php echo $i?>)"><i class="material-icons right">save</i><strong> Save</strong></button>
                    </div>
                    </div>
                    <div class="modal modal-fixed-footer" tabindex="-1" role="dialog" id="Modal_delete_student<?php echo $i?>">
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
                      <button type="button" class="btn modal-trigger modal-close  red darken-3" onclick="deleteStudent(<?php echo $i ?>)"><i class="material-icons right">save</i> Delete</button>
                    </div>
                  </div>
              <?php $i++; endforeach; ?>
            <?php endif; ?>
        </div>
      </div>
    <!-- MODALs News-->
    <div id="StudentHasClass" class="modal modal-fixed-footer">
        <div class="modal-content">
         <h4><strong>Student has Section</strong></h4>
         <div class="input-field col s6">
          <select id="idselectsectionstudent">
            <?php $e = 0; foreach ($section as $fil_section):?>
            <option value="<?php echo $fil_section->idsection?>"> <?php echo $fil_section->sectionname?> </option>
            <?php $e++; endforeach; ?>
          </select>
          <label>section</label>
        </div>
        </div>
        <div class="modal-footer">
          <a class="modal-action modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></a>
          <a id="btnstudentclass" class="modal-action modal-close btn waves-effect waves-green green darken-1" onclick="studentsavesection(<?php echo $checkcount?>)"><i class="material-icons right">save</i><strong> Save</strong></a>
        </div>
      </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#collapsible').collapsible();
    $('ul.tabs').tabs();
    $('select').material_select();
    $(".button-collapse").sideNav();
    $('input#studentidnumber, input#studentname, input#studentlastname, input#studentusername,input#studentemail').characterCounter();
    $('.modal').modal();
    $("#studentcheckedall").change(function () {
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