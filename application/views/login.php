<div class="container red darken-1 hoverable z-depth-5">
  <br>
  <div class="row">
    <div class="col s12 m6">
      <!-- I am full-width on mobile (col s12 m6)-->
      <div class="panel panel-default card-panel hoverable z-depth-5">
        <div class="panel panel-heading">
          <h3 class="panel-title">
            <i class="material-icons">account_box</i>
            <strong>Enter</strong>
          </h3>
        </div>
        <div class="panel panel-body">
          <form>
            <div class="input-field col s12">
              <span class="input-group-addon"><strong>USER NAME</strong></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" pattern="[A-Za-z0-9_-]{1,15}" required maxlength="20" class="form-control" placeholder="User name" id="username">
            </div>
            <div class="input-field col s12">
              <span class="input-group-addon"><strong>PASSWORD</strong></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
              <input type="password" pattern="[A-Za-z0-9_-]{1,15}" onkeyup="if (event.keyCode == 13) load_user()" maxlength="30" required class="form-control" id="password" placeholder="password">
            </div>
          </form>
        </div>
        <div class="panel-footer">
          <a type="submit" class="btn waves-effect waves-green white darken-4 btn-large black-text" onkeyup="if (event.keyCode == 13) load_user()" onclick="load_user()"><i class="material-icons right">lock_open</i> Enter</a>
        </div>
        <br>
      </div>
    </div>
    <div class="grid-example col s12">
      <!--I am always full-width (col s12)-->
      <a href="#!" class="brand-logo"><img class="right" src="img/inacap.png"></a>
        
    </div>
  </div>

</div>

