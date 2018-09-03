
<div class="panel"><!-- panel -->
  <div class="panel panel-heading">
    <h4 class="panel-title" align="center"><i class="material-icons left">person_add</i><strong>NEW TEACHER</strong></h4>
  </div>
  <div class="panel panel-body">
    <div class="row">

      <div class="col s3">
        <div class="input-field">
          <input type="text" class="validate" maxlength="10" required onkeypress="checkRut(this)" id="teacheridnumber">
          <label for="teacheridnumber">ID Number</label>
        </div>
      </div>
      <div class="col s8">
        <div class="input-field">
          <input type="text" class="validate" required maxlength="20" onkeypress="return soloLetras(event)" id="teachername">
          <label for="teachername">Name</label>
        </div>
      </div>
      <div class="col s6">
        <div class="input-field">
          <input type="text" class="validate" required maxlength="20" onkeypress="return soloLetras(event)"  id="teacherlastname">
          <label for="teacherlastname">Lastname</label>
        </div>
      </div>
      <div class="col s6">
        <div class="input-field">
          <input type="text" class="validate" required maxlength="20" onkeypress="return soloLetras(event)"  id="teacherusername">
          <label for="teacherusername">User Name</label>
        </div>
      </div>
      <div class="col s6">
        <div class="input-field">
          <input type="Password" maxlength="30" class="validate" required  id="teacherpassword">
          <label for="teacherpassword">Password</label>
        </div>
      </div>
      <div class="col s6">
        <div class="input-field">
          <input type="Password" maxlength="30" class="validate" required id="teacherpasswordconfirm">
          <label for="teacherpasswordconfirm">Password Comfirm</label>
        </div>
      </div>
      <div class="col s12">
        <div class="input-field">
          <input type="text" class="validate" maxlength="20" required   id="teacheremail">
          <label for="teacheremail">Email</label>
        </div>
      </div>
      <div class="col s6">
        <div class="input-field">
          <select disabled="true" id="idselect">
            <option value="1" disabled selected>Teacher</option>
          </select>
          <label>Rol Select</label>
        </div>
      </div>
      <div class="col s6">
        <?php if ($gender == 0): ?><p>Don't Gender!</p><?php else: ?>
          <div class="input-field">
            <select id="idselectgenderteacher">
              <?php $i = 0; foreach ($gender as $fila):?>
              <option value="<?php echo $fila->idgender?>"><?php echo $fila->name?></option>
              <?php $i++; endforeach; ?>
            </select>
            <label>Gender</label>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="panel-footer">
    <button class="waves-effect waves-light btn waves-green btn-large white black-text" type="button" onclick="saveteacher()" id="savestudent"><i class="material-icons right">save</i> Save Teacher</button>
    <br>
    <div class="progress">
      <div class="determinate" id="progress_login" style="<?php echo base_url()?>"></div>
    </div>
  </div>


</div><!--END  Panel-->

<br>
<br>

<?php if ($teacher == 0): ?><p>Don't Teacher!</p><?php else: ?>
  <table class="highlight" id="tblDatos">
    <thead>
      <tr>
        <h3>Teacher List</h3>
      </tr>
    </thead>
    <?php $i = 0; foreach ($teacher as $fila):?>
    <tbody>
      <tr>
        <td>
          <div class="row">
              <div class="card">
                <div class="card-content">
                  <div class="row">
                    <div class="col s3">
                      <div class="input-field">
                        <i class="material-icons prefix">perm_identity</i>
                        <input type="text" disabled class="validate active" id="idteacher<?php echo $i?>" value="<?php echo $fila->idteacher ?>">
                        <label for="idteacher<?php echo $i?>" class="active">ID Teacher</label>
                      </div>
                    </div>
                    <div class="col s4">
                      <div class="input-field">
                        <i class="material-icons prefix">perm_identity</i>
                        <input type="text" class="validate active" onkeypress="checkRut(this)" data-length="45" maxlength="45" id="idnumberteacher<?php echo $i?>" value="<?php echo $fila->idnumber ?>">
                        <label for="idnumberteacher<?php echo $i?>" class="active">ID Number</label>
                      </div>
                    </div>
                    <div class="col s6">
                      <div class="input-field">
                        <input type="text" class="active" data-length="45" maxlength="45" id="nameteacher<?php echo $i?>" value="<?php echo $fila->name ?>">
                        <label for="nameteacher<?php echo $i?>" class="active">Name</label>
                      </div>
                    </div>
                    <div class="col s6">
                      <div class="input-field col">
                        <input type="text" class="active" data-length="45" maxlength="45" id="lastnamenameteacher<?php echo $i?>" value="<?php echo $fila->lastname?>">
                        <label for="lastnameteacher<?php echo $i?>" class="active">Last Name</label>
                      </div>
                    </div>

                    <div class="col s4">
                      <div class="input-field">
                        <i class="material-icons prefix">assignment_ind</i>
                        <!-- <textarea id="textarea1" class="materialize-textarea" data-length="200" maxlength="200"></textarea> -->
                        <input type="text" class="active" data-length="45" maxlength="45" id="usernameteacher<?php echo $i?>" value="<?php echo $fila->username?>">
                        <label for="usernameteacher<?php echo $i?>" class="active">User Name</label>
                      </div>
                    </div>
                    <div class="col s4">
                      <div class="input-field">
                        <select disabled>
                          <option value="1">Teacher</option>
                        </select>
                        <label>Role</label>
                      </div>
                    </div>
                    <div class="col s4">
                      <?php if ($gender == 0): ?><p>Don't Gender!</p><?php else: ?>
                        <div class="input-field">
                          <select id="selectgenderStudentedit<?php echo $i?>">
                            <?php $i = 0; foreach ($gender as $filgender):?>
                            <option value="<?php echo $filgender->idgender?>"><?php echo $filgender->name?></option>
                            <?php $i++; endforeach; ?>
                          </select>
                          <label>Role</label>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s6">
                      <button class="btn" onclick="updatesteacher(<?php echo $i?>)" id="editteacher<?php echo $i?>"><i class="material-icons right">edit</i> Edit</button>
                    </div>
                    <div class="col s6">
                      <button id="deleteteacher<?php echo $i ?>" href="#Modal_delete_teacher<?php echo $i ?>"  class="btn red darken-4 modal-trigger"><i class="material-icons right">delete</i> Delete</button>

                      <div class="modal" tabindex="-1" role="dialog" id="Modal_delete_teacher<?php echo $i ?>">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <p>Pleace, Enter your password for continue!</p>
                            <div class="col s6">
                              <div class="input-field">
                                <input type="Password" maxlength="30" class="validate" required  id="teacherpassworddelete<?php echo $i?>">
                                <label for="teacherpassworddelete<?php echo $i?>">Password</label>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn modal-close" >Cancel</button>
                            <button type="button" class="btn modal-close" id="deleteteachermodal<?php echo $i ?>" onclick="deleteteacher(<?php echo $i?>)">Delete</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
              </div>
          </div>
        </td>
      </tr>
    </tbody>
    <?php $i++; endforeach; ?>
  </table>
<?php endif; ?>
<script type="text/javascript">
  var p = new Paginador(
    document.getElementById('paginador'),
    document.getElementById('tblDatos'),
    4
    );
  p.Mostrar();
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#collapsible').collapsible();
    $('ul.tabs').tabs();
    $('select').material_select();
    $(".button-collapse").sideNav();
    $('input#input_text, textarea#textarea1').characterCounter();
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
<script type="text/javascript">
  Paginador = function(divPaginador, tabla, tamPagina)
  {
    this.miDiv = divPaginador; //un DIV donde irán controles de paginación
    this.tabla = tabla;           //la tabla a paginar
    this.tamPagina = tamPagina; //el tamaño de la página (filas por página)
    this.pagActual = 1;         //asumiendo que se parte en página 1
    this.paginas = Math.floor((this.tabla.rows.length - 1) / this.tamPagina); //¿?

    this.SetPagina = function(num)
    {
      if (num < 0 || num > this.paginas)
        return;

      this.pagActual = num;
      var min = 1 + (this.pagActual - 1) * this.tamPagina;
      var max = min + this.tamPagina - 1;

      for(var i = 1; i < this.tabla.rows.length; i++)
      {
        if (i < min || i > max)
          this.tabla.rows[i].style.display = 'none';
        else
          this.tabla.rows[i].style.display = '';
      }
      this.miDiv.firstChild.rows[0].cells[1].innerHTML = this.pagActual;
    }

    this.Mostrar = function()
    {
        //Crear la tabla
        var tblPaginador = document.createElement('table');

        //Agregar una fila a la tabla
        var fil = tblPaginador.insertRow(tblPaginador.rows.length);

        //Ahora, agregar las celdas que serán los controles
        var ant = fil.insertCell(fil.cells.length);
        ant.innerHTML = 'Anterior';
        ant.className = 'pag_btn'; //con eso le asigno un estilo
        var self = this;
        ant.onclick = function()
        {
          if (self.pagActual == 1)
            return;
          self.SetPagina(self.pagActual - 1);
        }

        var num = fil.insertCell(fil.cells.length);
        num.innerHTML = ''; //en rigor, aún no se el número de la página
        num.className = 'pag_num';

        var sig = fil.insertCell(fil.cells.length);
        sig.innerHTML = 'Siguiente';
        sig.className = 'pag_btn';
        sig.onclick = function()
        {
          if (self.pagActual == self.paginas)
            return;
          self.SetPagina(self.pagActual + 1);
        }

        //Como ya tengo mi tabla, puedo agregarla al DIV de los controles
        this.miDiv.appendChild(tblPaginador);

        //¿y esto por qué?
        if (this.tabla.rows.length - 1 > this.paginas * this.tamPagina)
          this.paginas = this.paginas + 1;

        this.SetPagina(this.pagActual);
      }
    }
  </script>
