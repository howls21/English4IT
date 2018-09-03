<nav class="nav-extended red darken-1">
    <div class="nav-wrapper">
        <a href="<?php echo base_url() ?>" class="brand-logo"><img src="img/inacap.png"></a>    
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a><strong>Administrator</strong> :</a></li>
            <li><div class="chip"><img  alt="Contact Person" src="img/teacher<?php echo $gender_name ?>.png" > <?php echo $name ?> <?php echo $lastname ?></div></li>
            <li></li>
            <li><a class="btn waves-effect waves-light black" onclick="close_session()"><i class="material-icons right white-text">exit_to_app</i> Log Out</a></li>
        </ul>
        <ul class="side-nav black-text" id="mobile-demo">
            <li><a><strong>TEACHER</strong> :</a></li>
            <li><div class="chip"><img  alt="Contact Person" src="img/teacher<?php echo $gender_name ?>.png" > <?php echo $name ?> <?php echo $lastname ?></div></li>
            <li></li>

            <li><a class="btn waves-effect waves-light black" onclick="close_session()"><i class="material-icons right white-text">exit_to_app</i> Log Out</a></li>
        </ul>
    </div>
</nav>
<br>
<!-- BODY PAGE AND BUTTON LIST-->
      <div class="row">
          <div class="col s12 m4 l3">
              <ul class="collapsible popout" data-collapsible="accordion">
                <li>
                  <div class="collapsible-header" onclick="classlistadmin()">
                    <div class="chip" ><img src="img/class.png" alt="Contact Person"></div>
                    <span><strong>CLASS</strong></span>
                  </div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="sectionlistadmin()">
                    <div class="chip" ><img src="img/section.png" alt="Contact Person"></div>
                    <span><strong>SECTION</strong></span>
                  </div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="teacherlistadmin()">
                    <div class="chip"><img src="img/teacher.png" alt="Contact Person"></div>
                      <span><strong>TEACHERS</strong></span>
                  </div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="studentlistadmin()">
                    <div class="chip"><img src="img/student-hat.png" alt="Contact Person"></div>
                            <span><strong>STUDENTS</strong></span>
                  </div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="unitylistadmin()">
                    <div class="chip"><img src="img/unity.png" alt="Contact Person"></div>
                          <span><strong>UNIT</strong></span>
                  </div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="activitylistadmin()">
                    <div class="chip"><img src="img/activity.png" alt="Contact Person"></div>
                          <span><strong>ACTIVITIES</strong></span>
                  </div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="examlistadmin()">
                    <div class="chip"><img src="img/exam.png" alt="Contact Person"></div>
                          <span><strong>EXAM</strong></span>
                  </div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="questionlistadmin()">
                    <div class="chip"><img src="img/question.png" alt="Contact Person"></div>
                          <span><strong>QUESTIONS AND ANSWERS</strong></span>
                  </div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="materiallistadmin()">
                    <div class="chip"><img src="img/folder.png" alt="Contact Person"></div>
                          <span><strong>MATERIALS</strong></span>
                  </div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="glosarylistadmin()">
                    <div class="chip"><img src="img/dictionary.png" alt="Contact Person"></div>
                          <span><strong>GLOSSARY</strong></span>
                  </div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="progresslistadmin()">
                    <div class="chip"><img src="img/analytics.png" alt="Contact Person"></div>
                          <span><strong>PROGRESS</strong></span>
                  </div>
                </li>
              </ul>

           

          </div>
            <div class="col s12 m8 l9">
                <div id="contentadministrator">
                    
                </div>
            </div>
      </div>

<!--Floatting Tooltipped-->
    <div class="fixed-action-btn horizontal  click-to-toggle">
        <a class="btn-floating btn-large black tooltipped" data-position="top" data-delay="50" data-tooltip="Multimedia Upload">
            <i class="material-icons">menu</i>
        </a>
        <ul>
            <li></li>
            <li><a class="btn-floating red tooltipped" onclick="$('#modalyoutubelink').modal('open')" data-position="top" data-delay="50" data-tooltip="Youtube Link's"><i class="material-icons">subscriptions</i></a></li>
        </ul>
    </div>
<!--End Floatting Tooltipped-->



   

<script type="text/javascript">
    $(document).ready(function () {
        $('.modal').modal();
        $('#collapsible').collapsible('active');
        $('ul.tabs').tabs();
        $('select').material_select();
        $(".button-collapse").sideNav();
        //Materialize effects
        $('.tooltipped').tooltip({delay: 50});
    });
     $(document).ready(function(){
    $('.collapsible').collapsible();
  });
</script>