
<div class="row">
  <a class="modal-trigger btn waves-effect waves-green grey darken-3" href="#NewQuestion"><i class="material-icons right">add_box</i><strong> New Question</strong></a>
  <button class="btn modal-trigger" href="#Questionhasactivity"><i class="material-icons right">playlist_add_check</i> Add question to Activity</button>
  <button class="btn modal-trigger" href="#Questionhasexam"><i class="material-icons right">playlist_add_check</i> Add question to Exam</button>
  <div id="NewQuestion" class="modal modal-fixed-footer">
    <div class="modal-content z-depth-3">
      <div class="input-field col s4">
        <textarea id="questionname" class="materialize-textarea validate" required maxlength="200"></textarea>
        <label for="questionname">Question</label>
      </div>
      <div class="input-field col s4">
        <textarea id="questiondescription" class="materialize-textarea" maxlength="200"></textarea>
        <label for="questiondescription">Question Option</label>
        <p>In this text box you can add the answer of the completion questions, marking the correct word the student will answer, with "@" at the start and "$" at the end, eg: "The Best Procesing CPU sale in the shop is @Ryzen7$".<p>
      </div>
      <div class="input-field col s4">
        <select id="idselectquestiontype">
          <?php $i = 0; foreach ($questiontype as $fil_qt):?>
          <option id="idquestiontype<?php echo $i?>" value="<?php echo $fil_qt->idquestiontype?>"><?php echo $fil_qt->typename ?></option>
          <?php $i++; endforeach;?>
        </select>
        <label>Select Question type</label>
      </div>
      <div class="input-field col s4">
        <select id="idselectmodeq">
          <?php $modq = 0; foreach ($mode as $fil_mode):?>
          <option value="<?php echo $fil_mode->idmode?>"><?php echo $fil_mode->namemode ?></option>
          <?php $modq++; endforeach;?>
        </select>
        <label>Select mode</label>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey lighten-3 black-text"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
      <button class="modal-trigger modal-close btn waves-effect waves-green green darken-1" id="savequestion" onclick="savequestion()"><i class="material-icons right">add_box</i><strong>Save question</strong></button>
    </div>
  </div>
</div>
<div class="row">

  <p class=""><input type="checkbox" class="filled-in" id="questioncheckedall"/>
    <label for="questioncheckedall">Check all</label></p>

    <div class="col s12 m6">
      <div id="check">
        <?php $e = 0; foreach ($question as $fil_question):?>
        <?php $checkcount = $e?>
        <div class="card blue-grey lighten-5 z-depth-5">
          <div class="card-content">
            <p>
              <input type="checkbox" id="selectquestion<?php echo $e?>"/>
              <label for="selectquestion<?php echo $e?>">Select </label></p>
              <span class="card-title"><strong> <?php echo $fil_question->questionname ?></strong><i class="material-icons right modal-trigger red-text" style="cursor:pointer;" href="#DeleteQuestion<?php echo $e?>">delete</i><i class="material-icons right modal-trigger grey-text" style="cursor:pointer;" href="#EditQuestion<?php echo $e?>">edit</i></span>
              <p><?php echo $fil_question->description ?></p>
              <div class="chip" >
                            <img src="img/mode.png" alt="Contact Person">
                            <span >
                              Mode :
                              <?php $mod = 0; foreach ($mode as $fil_mode):?>
                                <?php if($fil_mode->idmode === $fil_question->mode_idmode) echo $fil_mode->namemode?>
                              <?php $mod++; endforeach;?>
                            </span>
                          </div>

<ul class="collapsible" data-collapsible="expandable">
  <li>
      <div class="collapsible-header"><i class="material-icons">extension</i> Activities</div>
      <div class="collapsible-body">
                        <?php $r = 0; foreach ($question_has_activity as $fil_qha):?>
                        <?php $ro = 0; foreach ($activity as $fil_activity): ?>
                    
                           
                        <?php if($fil_activity->idactivity === $fil_qha->activity_idactivity && $fil_qha->question_idquestion === $fil_question->idquestion): ?>
                          <div class="chip" > 
                          <img src="img/activity.png" alt="Contact Person">
                            <span >
                           Activity : <?php echo $fil_activity->activityname ?>
                           </span>
                           </div>
                        <?php else: ?>
                          <!-- <div class="chip" > 
                            <span >
                            
                            </span>
                          </div> -->
                        <?php endif; ?>
                                                 
                                                      

                        <?php $ro++; endforeach; ?>
                        <?php $r++; endforeach;?>                                           
                        </div> 
    </li>
  </ul>
                          

              <div id="EditQuestion<?php echo $e?>" class="modal modal-fixed-footer">
                <div class="modal-content">
                  <h4><strong>EDIT QUESTION</strong></h4>
                  <div class="input-field col s6" hidden="true">
                    <input type="text" id="idEditQuestion<?php echo $e?>" value="<?php echo $fil_question->idquestion ?>">
                  </div>

                  <div class="input-field">
                    <input id="editquestionname<?php echo $e?>" type="text" value="<?php echo $fil_question->questionname ?>">
                    <label class="active" for="editquestionname<?php echo $e?>">question</label>
                  </div>
                  <div class="input-field">
                    <textarea id="addanswerdescription<?php echo $e?>" class="materialize-textarea" maxlength="200"><?php echo $fil_question->description ?></textarea>
                    <label class="active" for="addanswerdescription<?php echo $e?>">Option</label>
                    <p>En este cuadro de texto puede agregar para las preguntas de completado la oreacion de la respuesta, marcando la palabra correcta que el alumno deberá responder con un "@" al final, Ej: "The Best Procesing CPU sale in the shop is Ryzen7@".<p>
                  </div>
                  <br>
                  <div class="input-field">
                    <select id="idselectquestiontype<?php echo $e?>">
                      <?php $i = 0; foreach ($questiontype as $fil_qt):?>
                      <option value="<?php echo $fil_qt->idquestiontype?>" <?php if($fil_qt->idquestiontype === $fil_question->questiontype_idquestiontype) echo "selected"?>><?php echo $fil_qt->typename ?></option>
                      <?php $i++; endforeach;?>
                    </select>
                    <label>Select Question type</label>
                  </div>
                  <div class="input-field">
                    <select id="idselectmode<?php echo $e?>"  >
                      <?php $mod = 0; foreach ($mode as $fil_mode):?>
                      <option value="<?php echo $fil_mode->idmode?>" <?php if($fil_mode->idmode === $fil_question->mode_idmode) echo "selected"?> ><?php echo $fil_mode->namemode ?></option>
                      <?php $mod++; endforeach;?>
                    </select>
                    <label>Select mode</label>
                  </div>
                  <script type="text/javascript">
                    window.onload = function(){
                      document.getElementById('selectmode<?php echo $e?>').onfocus = function(){
                        if (document.getElementById('selectmode<?php echo $e?>').value = 'Complete') {
                          window.alert('modo Complete');
                        }
                      }
                    }
                  </script>
                </div>
                <div class="modal-footer">
                  <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey lighten-3 black-text"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                  <button class="modal-trigger modal-close  btn waves-effect waves-green green darken-1" id="btnupdatequestion<?php echo $e?>" onclick="updatequestion(<?php echo $e?>)"><i class="material-icons right">add_box</i><strong>Save Question</strong></button>
                </div>
              </div>
              <div class="modal modal-fixed-footer" tabindex="-1" role="dialog" id="DeleteQuestion<?php echo $e?>">
                <div class="modal-content">
                  <div class="card-panel">
                    <h3><strong>Are you sure?</strong></h3>
                    <p>Tambien se eliminaran las preguntas!</p>
                    <p>Si está asociada a una actividad o examen no se eliminará a menos que elimine la relación</p>
                    <p>Please insert your password and delete.</p>
                  </div>
                  <div class="input-field col s4">
                    <input type="password" class="form-control" id="deletequestionValidate<?php echo $e?>">
                    <label for="deletequestionValidate<?php echo $e ?>" >Password</label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey lighten-3 black-text"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                  <button type="button" class="btn modal-trigger modal-close  red darken-3" onclick="deletequestion(<?php echo $e ?>)"><i class="material-icons right">save</i> Delete</button>
                </div>
              </div>

<ul class="collapsible" data-collapsible="expandable">
  <li>
      <div class="collapsible-header"><i class="material-icons">details</i> Answers</div>
      <div class="collapsible-body">
              <?php $a = 0; foreach ($answer as $fil_answer):?>
              <?php if($fil_answer->question_idquestion === $fil_question->idquestion): ?>
                <blockquote class="" id="idanswer<?php echo $a?>"><?php echo $fil_answer->answername ?>
                  <i class="material-icons right modal-trigger red-text" style="cursor:pointer;" href="#DeleteAnswer<?php echo $a?>" >delete</i>
                  <i class="material-icons right modal-trigger grey-text" style="cursor:pointer;" href="#EditAnswer<?php echo $a?>" >edit</i>
                  <?php endif; ?>
                  <?php $o = 0; foreach ($value as $fil_value):?>
                  <?php if($fil_value->idvalue === $fil_answer->value_idvalue && $fil_answer->question_idquestion === $fil_question->idquestion): ?>
                    <div class="chip 
                    <?php if($fil_value->valuename === 'Good'):?>
                      <?php echo 'green'?>
                    <?php elseif ($fil_value->valuename === 'Bad'):?>
                      <?php echo 'red'?>
                    <?php elseif ($fil_value->valuename === 'Regular'):?>
                      <?php echo 'yellow'?>
                    <?php endif;?>
                    right"><?php echo $fil_value->valuename ?>
                  </div>
                </blockquote>

              <div id="EditAnswer<?php echo $a?>" class="modal modal-fixed-footer">
                <div class="modal-content">
                  <h4><strong>EDIT ANSWER</strong></h4>
                  <div class="input-field col s6" hidden="true">
                    <input type="text" id="idQuestionanswer<?php echo $a?>"  value="<?php echo $fil_question->idquestion ?>">
                  </div>
                  <div class="input-field col s6" hidden="true">
                    <input type="text" id="idEditAnswer<?php echo $a?>"  value="<?php echo $fil_answer->idanswer ?>">
                  </div>
                  <div class="input-field col s4">
                    <input type="text" id="editanswername<?php echo $a?>"  value="<?php echo $fil_answer->answername ?>">
                    <label class="active" for="editanswername<?php echo $a?>">Answer</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="editanswerdescription<?php echo $a?>" type="text" class="active" value="<?php echo $fil_answer->description ?>">
                    <label class="active" for="editanswerdescription<?php echo $a?>">Answer Description</label>
                  </div>
                  <div class="input-field col s4">
                    <select id="editselectvalueanswer<?php echo $a?>">
                      <?php $it = 0; foreach ($value as $fil_valueedit):?>
                      <option value="<?php echo $fil_valueedit->idvalue?>" <?php if($fil_valueedit->idvalue === $fil_answer->value_idvalue) echo "selected"?> ><?php echo $fil_valueedit->valuename ?></option>
                      <?php $it++; endforeach;?>
                    </select>
                    <label>Select value</label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey lighten-3 black-text"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                  <button class="modal-trigger modal-close  btn waves-effect waves-green green darken-1" id="btnupdateanswer<?php echo $a?>" onclick="updateanswer(<?php echo $a?>)"><i class="material-icons right">add_box</i><strong>Save Question</strong></button>
                </div>
              </div>

              <div class="modal modal-fixed-footer" tabindex="-1" role="dialog" id="DeleteAnswer<?php echo $a?>">
                <div class="modal-content">
                  <div class="card-panel">
                    <h3><strong>Are you sure?</strong></h3>
                    <p>Please insert your password and delete.</p>
                  </div>
                  <div class="input-field col s4">
                    <input type="password" class="form-control" id="deleteactivityValidate<?php echo $a?>">
                    <label for="deletestudentValidate<?php echo $a ?>" >Password</label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey lighten-3 black-text"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                  <button type="button" class="btn modal-trigger modal-close  red darken-3" onclick="deleteanswer(<?php echo $a ?>)"><i class="material-icons right">save</i> Delete</button>
                </div>
              </div>


            <?php endif; ?>
            <?php $o++; endforeach;?>
            <?php $a++; endforeach;?>
                                    </div> 
    </li>
  </ul>
            <a id="btnmodal<?php echo $e?>" class="modal-trigger btn waves-effect waves-green light-green darken-4" href="#NewAnswer<?php echo $e?>"><i class="material-icons right">add_box</i><strong>Answer</strong></a>
          </div>
        </div>

        <div id="NewAnswer<?php echo $e?>" class="modal modal-fixed-footer">
          <div class="modal-content">
            <h4><strong>NEW ANSWER</strong></h4>
            <div class="input-field col s6" hidden="true">
              <input type="text" id="addidquestionanswer<?php echo $e?>" value="<?php echo $fil_question->idquestion ?>">
            </div>

            <div class="input-field">
              <textarea id="addanswername<?php echo $e?>" class="materialize-textarea validate" required maxlength="200"></textarea>
              <label for="addanswername">Answer</label>
            </div>
            <div class="input-field">
              <textarea id="addanswerdescription<?php echo $e?>" class="materialize-textarea" maxlength="200"></textarea>
              <label for="addanswerdescription">Answer Description</label>
            </div>
            <div class="input-field">
              <select id="addselectanswervalue<?php echo $e?>">
                <?php $ie = 0; foreach ($value as $fil_value):?>
                <option value="<?php echo $fil_value->idvalue?>"><?php echo $fil_value->valuename ?></option>
                <?php $ie++; endforeach;?>
              </select>
              <label>Select Value</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey lighten-3 black-text"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
            <button class="modal-trigger modal-close  btn waves-effect waves-green green darken-1" id="btnsaveanswer<?php echo $e?>" onclick="saveanswer(<?php echo $e?>)"><i class="material-icons right">add_box</i><strong>Save answer</strong></button>
          </div>
        </div>
        <?php $e++; endforeach;?>
      </div>
    </div>
  </div>


  <!-- MODALs News-->
  <div id="Questionhasactivity" class="modal modal-fixed-footer">
    <div class="modal-content">
     <h4><strong>Question to Activity</strong></h4>
     <div class="input-field col s6">
      <select id="idselectactactivityquestion">
        <?php $t = 0; foreach ($activity as $fil_activity):?>
        <option value="<?php echo $fil_activity->idactivity?>"> <?php echo $fil_activity->activityname?> </option>
        <?php $t++; endforeach; ?>
      </select>
      <label>activity</label>
    </div>
  </div>
  <div class="modal-footer">
    <a class="modal-action modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></a>
    <a id="btnstudentclass" class="modal-action modal-close btn waves-effect waves-green green darken-1" onclick="questionsaveactivity(<?php echo $checkcount?>)"><i class="material-icons right">save</i><strong> Save</strong></a>
  </div>
</div>

<!-- MODALs News-->
<div id="Questionhasexam" class="modal modal-fixed-footer">
  <div class="modal-content">
   <h4><strong>Question to Exam</strong></h4>
   <div class="input-field col s6">
    <select id="idselectactexam">
      <?php $t = 0; foreach ($exam as $fil_exam):?>
      <option value="<?php echo $fil_exam->idexam?>"> <?php echo $fil_exam->examname?> </option>
      <?php $t++; endforeach; ?>
    </select>
    <label>Exam</label>
  </div>
</div>
<div class="modal-footer">
  <a class="modal-action modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></a>
  <a id="btnstudentclass" class="modal-action modal-close btn waves-effect waves-green green darken-1" onclick="activitysaveunity(<?php echo $checkcount?>)"><i class="material-icons right">save</i><strong> Save</strong></a>
</div>
</div>




<script type="text/javascript">
  $(document).ready(function () {
    $('.collapsible').collapsible();
    $('ul.tabs').tabs();
    $('select').material_select();
    $(".button-collapse").sideNav();
    $('input#input_text, textarea#textarea1').characterCounter();
    $('.modal').modal();
    $("#questioncheckedall").change(function () {
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
