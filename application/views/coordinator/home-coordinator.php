<nav class="nav-extended red darken-1">
    <div class="nav-wrapper">
        <a href="<?php echo base_url() ?>" class="brand-logo"><img src="img/inacap.png"></a>    
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a><strong>Coordinator</strong> :</a></li>
            <li><div class="chip"><img  alt="Contact Person" src="img/teacher<?php echo $gender_name ?>.png" > <?php echo $name ?> <?php echo $lastname ?></div></li>
            <li></li>
            <li><a class="btn waves-effect waves-light black" onclick="close_session()"><i class="material-icons right white-text">exit_to_app</i> Log Out</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a><strong>TEACHER</strong> :</a></li>
            <li><div class="chip"><img  alt="Contact Person" src="img/teacher.png"> <?php echo $name ?> <?php echo $lastname ?></div></li>
            <li></li>
            <li><a class="btn waves-effect waves-light black" onclick="close_session()"><i class="material-icons right white-text">exit_to_app</i> Log Out</a></li>
        </ul>
    </div>
    <div class="nav-content">
        <ul class="tabs tabs-transparent">
            <li class="tab"><a href="#usermanagement">USERS MANAGEMENT</a></li>
            <li class="tab"><a href="#teacherprogress">TEACHER PROGRESS</a></li>
            <li class="tab"><a href="#studentprogress">STUDENT PROGRESS</a></li>
        </ul>
    </div>
</nav>


<!-- Class Content-->
    <div id="usermanagement" class="card lime lighten-2">

        <div class="row">
            <div class="col s12 m4 12">
                <ul class="collection z-depth-4">
                    <li class="collection-item avatar">
                        <i class="material-icons circle lime accent-2">list</i>
                        <span class="title"><strong>Teacher List</strong></span>
                        <button class=" secondary-content waves-effect btn-large white black-text waves-yellow tooltipped" data-position="right" data-delay="50" data-tooltip="Teacher List!" onclick="teacherlist()"><i class="material-icons">list</i></button>
                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle green">list</i>
                        <span class="title"><strong>Student List</strong></span>
                        <button class=" secondary-content waves-effect btn-large white black-text waves-yellow tooltipped" data-position="right" data-delay="50" data-tooltip="Student List" onclick="studentlist()"><i class="material-icons">list</i></button>
                    </li>
                </ul>

            </div>
            <div class="col s12 m7 12 white">
                <div class="" id="bodyusermanagement">

                </div>
            </div>
            <div class="col s12 m1 12 white">
            </div>
        </div>
    </div>
    <!--End student Content-->
        <div id="studentprogress" class="col s12 lime accent-2">
        <div class="row">
            <div class="col s12 m3 12">
                <ul class="collection z-depth-4">
                    <li class="collection-item avatar"><i class="material-icons circle black">list</i>
                        <span class="title">Progress List</span>
                        <button class=" secondary-content waves-effect btn-large white black-text waves-yellow tooltipped" data-position="right" data-delay="50" data-tooltip="Prgress List!" onclick="progresslist()"><i class="material-icons">list</i></button>
                    </li>
                </ul>
            </div>

            <div class="col s12 m9 19 white">
                <div class="" id="bodyprogress">

                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
    $(document).ready(function () {
        $('.modal').modal();
        $('#collapsible').collapsible();
        $('ul.tabs').tabs();
        $('select').material_select();
        $(".button-collapse").sideNav();
        //Materialize effects
        $('.tooltipped').tooltip({delay: 50});
    });
</script>