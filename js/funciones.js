/* global base_url, Materialize */
    $(document).ready(
            	function (e) {
	$("#uploadimage").on('submit',(function(e) {
		e.preventDefault();
		$("#message").empty(); 
		$('#loading').show();
		$.ajax({
        	url: "application/controllers/subir_foto.php",   	// URL a la que se envía la solicitud
			type: "POST",      				// Tipo de solicitud que se enviará, llamado como método 
			data:  new FormData(this), 		// Datos enviados al servidor 
			contentType: false,       		// El tipo de contenido utilizado al enviar datos al servidor. El valor predeterminado es: "application / x-www-form-urlencoded"
    	    cache: false,					// Para no poder solicitar que las páginas se almacenen en caché
			processData:false,  			// Para enviar DOMDocument o archivo de datos no procesados, se establece en falso (es decir, los datos no deben estar en forma de cadena)
			success: function(data)  		// Una función a ser llamada si la solicitud tiene éxito
		    {
			$('#loading').hide();
			$("#message").html(data);			
		    }	        
	   });
	}));

// Función para previsualizar la imagen
	$(function() {
        $("#file").change(function() {
			$("#message").empty();         // Para eliminar el mensaje de error anterior
			var file = this.files[0];
			var imagefile = file.type;
			var match= ["image/jpeg","image/png","image/jpg"];	
			if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
			{
			$('#previewing').attr('src','noimage.png');
			$("#message").html("<p id='error'>Selecciona un archivo de imagen válido</p>"+"<h4>Nota</h4>"+"<span id='error_message'>Solo jpeg, jpg y png Tipo de imágenes permitidas</span>");
			return false;
			}
            else
			{
                var reader = new FileReader();	
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }		
        });
    });
	function imageIsLoaded(e) { 
		$("#file").css("color","green");
        $('#image_preview').css("display", "block");
        $('#previewing').attr('src', e.target.result);
		$('#previewing').attr('width', '250px');
		$('#previewing').attr('height', '230px');
	};
        // window.onbeforeunload = function (e) {
        //     var e = e || window.event;
        //    if (e) {
        //      close_session();
        //    }
        // }
        //se inicia con la carga del sistema\

        charger();});
        //carga el arranque para iniciar sesion
            function charger() {
                $.post(base_url + 'controller/charger', {}, function (page, data) {
                    $("#page-body").html(page, data);
                });}
            function load_user() {
                $.post(base_url + 'controller/load_user', {
                    username: $("#username").val(),
                    password: $("#password").val()
                }, function (datos) {
                    if (datos.message_load_user_s !== "") {
                        //si no esta vacio lanza mensaje de confirmacion
                        Materialize.toast(datos.message_load_user_s, 10000, 'light-green lighten-4');
                    } else if (datos.message_load_user_e !== "") {
                        //si no esta vacio lanza mensaje de error
                        Materialize.toast(datos.message_load_user_e, 10000, 'red');
                    } else {
                        //po ultimo si los campos estan vacios lanza mensaje de alerta
                        Materialize.toast(datos.message_load_user_w, 10000, 'yellow lighten-3');
                    }
                    charger();
                }, 'json');}
            function close_session() {
                $.post(base_url + 'controller/close_session', {},
                        function (datos) {
                            if (datos.message_close !== '') {
                                //si se completa con exito lanza mensaje de confirmacion
                                Materialize.toast(datos.message_close, 10000, 'red lighten-3');
                            } else {
                                //de los contrario lanza mensaje de error
                                $message_error = 'Not posible close session';
                                Materialize.toast($message_error, 10000, 'red lighten-3');
                            }
                            charger();
                        }, 'json');}

//load save
    function saveteacher(){
        var idgender = document.getElementById("idselectgenderteacher").value;
        $.post(base_url + 'controller/saveteacher',{
            idnumber: $("#idnumber").val(),
            name: $("#name").val(),
            lastname: $("#lastname").val(),
            username: $("#username").val(),
            passwordconfirm: $("#passwordconfirm").val(),
            email: $("#email").val(),
            gender: idgender
        },function(datos){
            var msj_teacher = datos;
            $.each(msj_teacher, function (i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');}
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');}
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');}});
            teacherlistadmin();
        }, 'json');}
    function savesection(){
        $.post(base_url + 'controller/savesection',{
            sectionname: $("#sectionname").val(),
            description: $("#description").val()
        },function(datos){
            var msj_section = datos;
            $.each(msj_section, function (i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            sectionlistadmin();
        }, 'json');}
    function saveclass() {
        $.post(base_url + 'controller/saveclass', {
            classname: $('#classname').val(),
            descriptionclasscenter: $('#descriptionclasscenter').val(),
            descriptionclassleft: $('#descriptionclassleft').val(),
            descriptionclassright: $('#descriptionclassright').val()
        }, function (datos) {
            var msj_load_class = datos;
            $.each(msj_load_class, function (i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            classlistadmin();
        }, 'json');}
    function savestudentadmin() {
        var idgender = document.getElementById("idselectgenderstudent").value;
        $.post(base_url + 'controller/savestudent', {
            idnumber: $('#studentidnumber').val(),
            name: $('#studentname').val(),
            lastname: $('#studentlastname').val(),
            username: $('#studentusername').val(),
            email: $('#studentemail').val(),
            gender_idgender: idgender
        }, function (datos) {
            var savestudent = datos;
            $.each(savestudent, function (i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            studentlistadmin();
        }, 'json');}
    function saveunity() {
        $.post(base_url + 'controller/saveunity', {
            unityname: $("#unityname").val(),
            descriptioncenter: $("#descriptionunitycenter").val(),
            descriptionleft: $("#descriptionunityleft").val(),
            descriptionright: $("#descriptionunityright").val()
        }, function (datos) {
            var msjunity = datos;
            $.each(msjunity, function (i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            unitylistadmin();
        }, 'json');}
    function saveactivity() {
        $.post(base_url + 'controller/saveactivity', {
            activityname: $("#activityname").val(),
            descriptionleft: $("#descriptionleftactivity").val(),
            descriptionright: $("#descriptionrightactivity").val()
        }, function (datos) {
            var msjactivity = datos;
            $.each(msjactivity, function (i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            activitylistadmin();
        }, 'json');}
    function saveexam(){
        $.post(base_url + 'controller/saveexam',{
            examname: $("#examname").val(),
            descriptionleftexam: $("#descriptionleftexam").val(),
            descriptionrightexam: $("#descriptionrightexam").val()
        },function(datos){
            var msj = datos;
            $.each(msj, function (i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            examlistadmin();
        },'json');
    }
    function savequestion(){
        var idquestiontype = document.getElementById("idselectquestiontype").value;
        var idmode = document.getElementById("idselectmodeq").value;
        $.post(base_url + 'controller/savequestion', {
            questionname: $("#questionname").val(),
            description: $("#questiondescription").val(),
            idquestiontype: idquestiontype,
            idmode: idmode
        }, function (datos) {
            var msjquestion = datos;
            $.each(msjquestion, function (i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            questionlistadmin();
        }, 'json');}
    function saveanswer(id){
        var idquestion = document.getElementById("addidquestionanswer"+id).value;
        var idvalue = document.getElementById("addselectanswervalue"+id).value;
        $.post(base_url + 'controller/saveanswer', {
            answerename: $("#addanswername"+id).val(),
            description: $("#addanswerdescription"+id).val(),
            value_idvalue: idvalue,
            question_idquestion: idquestion
        }, function (datos) {
            var msjanswer = datos;
            $.each(msjanswer, function (i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            questionlistadmin();
        }, 'json');}
    function saveyoutubelink() {
        $.post(base_url + 'controller/saveyoutubelink', {
            materialname: $("#materialname").val(),
            descriptionleft: $("#descriptionleft").val(),
            descriptionright: $("#descriptionright").val(),
            link: $("#uploadyoutubelink").val()
        }, function () {

        });}
    function saveword(){
        $.post(base_url + 'controller/saveword',{
            wordname: $("#wordname").val(),
            description: $("#descriptionword").val(),
            aditionaldescription: $("#aditionaldescriptionword").val()
        },function(datos){
            var msjword = datos;
            $.each(msjword, function (i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            glosarylistadmin();
        },'json');}
    function studentsaveclass(checkload){
        var checked = 0;
        var idclass = document.getElementById("idselectclassstudent").value;
        for (i = 0; i <= checkload; i++) {
            if($('#selectstudent' + i).prop('checked')){
                checked += 1;}
        }
        if(checked === 0){
           var msj = "<p class='black-text'><strong>Any student Select</strong></p>";
             Materialize.toast(msj, 10000, 'yellow lighten-3');
        }else{
            for (i = 0; i <= checkload; i++) {
            if($('#selectstudent' + i).prop('checked')){
               var idgender = document.getElementById("idselectgender"+ i).value;
            $.post(base_url + 'controller/studentsaveclass',{
                idclass: idclass,
                idstudent: $('#id_student_edit'+i).val(),
                idgender: idgender
            },function (datos) {
            var msjsstudenclass = datos;
            $.each(msjsstudenclass, function (i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            studentlist();
        },'json');
            }
        }
        }}
    function sectionhasclass(checkload){
        var checked = 0;
        var idclass = document.getElementById("idselectclasssection").value;
        for (i = 0; i <= checkload; i++) {
            if($('#selectsection' + i).prop('checked')){
                checked += 1;}
        }
        if (checked === 0) {
            var msj = "<p class='black-text'><strong>Any Section select</strong></p>";
            Materialize.toast(msj, 10000, 'yellow lighten-3');
        }else{
            for(i = 0; i <= checkload; i++){
                if ($("#selectsection" + i).prop('checked')) {
                    var idclass = document.getElementById("idselectclasssection").value;
                    var idsection = document.getElementById("idsectionedit"+i).value;
                    $.post(base_url + 'controller/sectionhasclass',{
                        idsection: idsection,
                        idclass: idclass
                    },function(datos){
                        var msjs = datos;
                        $.each(msjs, function (i, o) {
                            if (o.msjw !== "") {
                                Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                            }
                            if (o.msjs !== "") {
                                Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                            }
                            if (o.msje !== "") {
                                Materialize.toast(o.msje, 10000, 'red lighten-3');
                            }
                        });
                    sectionlistadmin();
                    },'json');
                }
            }
        }}
    function teachersavesection(checkload){
        var checked = 0;
        var idsection = document.getElementById("idselectsectionteacher").value;
        for (i = 0; i <= checkload; i++) {
            if($('#selectteacher' + i).prop('checked')){
                checked += 1;}
        }
        if (checked === 0) {
            var msj = "<p class='black-text'><strong>Any teacher select</strong></p>";
            Materialize.toast(msj, 10000, 'yellow lighten-3');
        }else{
            for(i = 0; i <= checkload; i++){
                if ($("#selectteacher" + i).prop('checked')) {
                    var teacher_idteacher = document.getElementById("id_teacher_edit"+i).value;
                    var section_idsection = idsection;
                    $.post(base_url + 'controller/teachersavesection',{
                        teacher_idteacher: teacher_idteacher,
                        section_idsection: section_idsection
                    },function(datos){
                        var msjs = datos;
                        $.each(msjs, function (i, o) {
                            if (o.msjw !== "") {
                                Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                            }
                            if (o.msjs !== "") {
                                Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                            }
                            if (o.msje !== "") {
                                Materialize.toast(o.msje, 10000, 'red lighten-3');
                            }
                        });
                    teacherlistadmin();
                    }, 'json');}
            }
        }
    }
    function unitysavesection(checkload){
        var checked = 0;
        var idsection = document.getElementById("idselectsectionunity").value;
        for (i = 0; i <= checkload; i++) {
            if($('#selectunity' + i).prop('checked')){
                checked += 1;}
        }
        if (checked === 0) {
            var msj = "<p class='black-text'><strong>Any unity select</strong></p>";
            Materialize.toast(msj, 10000, 'yellow lighten-3');
        }else{
            for(i = 0; i <= checkload; i++){
                if ($("#selectunity" + i).prop('checked')) {
                    var unity_idunity = document.getElementById("editunitid"+i).value;
                    $.post(base_url + 'controller/unitysavesection',{
                        unity_idunity: unity_idunity,
                        section_idsection: idsection
                    },function(datos){
                        var msjs = datos;
                        $.each(msjs, function (i, o) {
                            if (o.msjw !== "") {
                                Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                            }
                            if (o.msjs !== "") {
                                Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                            }
                            if (o.msje !== "") {
                                Materialize.toast(o.msje, 10000, 'red lighten-3');
                            }
                        });
                    unitylistadmin();
                    },'json');}
            }
        }
    }
        function unitysavesectionteacher(checkload){
        var checked = 0;
        var idsection = document.getElementById("idselectsectionunity").value;
        for (i = 0; i <= checkload; i++) {
            if($('#selectunity' + i).prop('checked')){
                checked += 1;}
        }
        if (checked === 0) {
            var msj = "<p class='black-text'><strong>Any unity select</strong></p>";
            Materialize.toast(msj, 10000, 'yellow lighten-3');
        }else{
            for(i = 0; i <= checkload; i++){
                if ($("#selectunity" + i).prop('checked')) {
                    var unity_idunity = document.getElementById("editunitid"+i).value;
                    $.post(base_url + 'controller/unitysavesection',{
                        unity_idunity: unity_idunity,
                        section_idsection: idsection
                    },function(datos){
                        var msjs = datos;
                        $.each(msjs, function (i, o) {
                            if (o.msjw !== "") {
                                Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                            }
                            if (o.msjs !== "") {
                                Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                            }
                            if (o.msje !== "") {
                                Materialize.toast(o.msje, 10000, 'red lighten-3');
                            }
                        });
                    unitylist();
                    },'json');}
            }
        }
    }
    function activitysaveunity(checkload){
        var checked = 0;
        var unity_idunity = document.getElementById("idselectactivityunity").value;
        
        for (i = 0; i <= checkload; i++) {
            if($('#selectactivity' + i).prop('checked')){
                checked += 1;}
        }
        if (checked === 0) {
            var msj = "<p class='black-text'><strong>Any activity select</strong></p>";
            Materialize.toast(msj, 10000, 'yellow lighten-3');
        }else{
            for(i = 0; i <= checkload; i++){
                if ($("#selectactivity" + i).prop('checked')) {
                    var activity_idactivity= document.getElementById("id_activity_edit"+i).value;
                    $.post(base_url + 'controller/activitysaveunity',{
                        unity_idunity: unity_idunity,
                        activity_idactivity: activity_idactivity
                    },function(datos){
                        var msjs = datos;
                        $.each(msjs, function (i, o) {
                            if (o.msjw !== "") {
                                Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                            }
                            if (o.msjs !== "") {
                                Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                            }
                            if (o.msje !== "") {
                                Materialize.toast(o.msje, 10000, 'red lighten-3');
                            }
                        });
                    activitylistadmin();
                    },'json');}
            }
        }
    }
        function activitysaveunityteacher(checkload){
        var checked = 0;
        var unity_idunity = document.getElementById("idselectactivityunity").value;
        
        for (i = 0; i <= checkload; i++) {
            if($('#selectactivity' + i).prop('checked')){
                checked += 1;}
        }
        if (checked === 0) {
            var msj = "<p class='black-text'><strong>Any activity select</strong></p>";
            Materialize.toast(msj, 10000, 'yellow lighten-3');
        }else{
            for(i = 0; i <= checkload; i++){
                if ($("#selectactivity" + i).prop('checked')) {
                    var activity_idactivity= document.getElementById("id_activity_edit"+i).value;
                    $.post(base_url + 'controller/activitysaveunity',{
                        unity_idunity: unity_idunity,
                        activity_idactivity: activity_idactivity
                    },function(datos){
                        var msjs = datos;
                        $.each(msjs, function (i, o) {
                            if (o.msjw !== "") {
                                Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                            }
                            if (o.msjs !== "") {
                                Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                            }
                            if (o.msje !== "") {
                                Materialize.toast(o.msje, 10000, 'red lighten-3');
                            }
                        });
                    activitylist();
                    },'json');}
            }
        }
    }
    function questionsaveactivity(checkload){
        var checked = 0;
        var activity_idactivity= document.getElementById("idselectactactivityquestion").value;
        
        for (i = 0; i <= checkload; i++) {
            if($('#selectquestion' + i).prop('checked')){
                checked += 1;}
        }
        if (checked === 0) {
            var msj = "<p class='black-text'><strong>Any question select</strong></p>";
            Materialize.toast(msj, 10000, 'yellow lighten-3');
        }else{
            for(i = 0; i <= checkload; i++){
                if ($("#selectquestion" + i).prop('checked')) {
                    var question_idquestion = document.getElementById("idEditQuestion"+i).value;
                    $.post(base_url + 'controller/questionsaveactivity',{
                        activity_idactivity: activity_idactivity,
                        question_idquestion: question_idquestion
                    },function(datos){
                        var msjs = datos;
                        $.each(msjs, function (i, o) {
                            if (o.msjw !== "") {
                                Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                            }
                            if (o.msjs !== "") {
                                Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                            }
                            if (o.msje !== "") {
                                Materialize.toast(o.msje, 10000, 'red lighten-3');
                            }
                        });
                    questionlistadmin();
                    },'json');}
            }
        }
    }
    function materialhasclass(checkload){
        var checked = 0;
        var class_idclass = document.getElementById("selectmaterialhasclass").value;
        
        for (i = 0; i <= checkload; i++) {
            if($('#selectmaterial' + i).prop('checked')){
                checked += 1;}
        }
        if (checked === 0) {
            var msj = "<p class='black-text'><strong>Any activity select</strong></p>";
            Materialize.toast(msj, 10000, 'yellow lighten-3');
        }else{
            for(i = 0; i <= checkload; i++){
                if ($("#selectmaterial" + i).prop('checked')) {
                    var material_idmaterial = document.getElementById("idmaterial"+i).value;
                    $.post(base_url + 'controller/materialhasclass',{
                        class_idclass: class_idclass,
                        material_idmaterial: material_idmaterial
                    },function(datos){
                        var msjs = datos;
                        $.each(msjs, function (i, o) {
                            if (o.msjw !== "") {
                                Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                            }
                            if (o.msjs !== "") {
                                Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                            }
                            if (o.msje !== "") {
                                Materialize.toast(o.msje, 10000, 'red lighten-3');
                            }
                        });
                    materiallistadmin();
                    },'json');}
            }
        }
    }

    function studentsavesection(checkload){
        var checked = 0;
        var idsection = document.getElementById("idselectsectionstudent").value;
        for (i = 0; i <= checkload; i++) {
            if($('#selectstudent' + i).prop('checked')){
                checked += 1;}
        }
        if (checked === 0) {
            var msj = "<p class='black-text'><strong>Any student select</strong></p>";
            Materialize.toast(msj, 10000, 'yellow lighten-3');
        }else{
            for(i = 0; i <= checkload; i++){
                if ($("#selectstudent" + i).prop('checked')) {
                    var student_idstudent = document.getElementById("id_student_edit"+i).value;
                    var section_idsection = idsection;
                $.post(base_url + 'controller/studentsavesection',{
                        student_idstudent: student_idstudent,
                        section_idsection: section_idsection
                    },function(datos){
                        var msjs = datos;
                        $.each(msjs, function (i, o) {
                            if (o.msjw !== "") {
                                Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                            }
                            if (o.msjs !== "") {
                                Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                            }
                            if (o.msje !== "") {
                                Materialize.toast(o.msje, 10000, 'red lighten-3');
                            }
                        });
                    studentlistadmin();
                    }, 'json');}
            } 
        }
    }
    function studentsavesectionteacher(checkload){
        var checked = 0;
        var idsection = document.getElementById("idselectsectionstudent").value;
        for (i = 0; i <= checkload; i++) {
            if($('#selectstudent' + i).prop('checked')){
                checked += 1;}
        }
        if (checked === 0) {
            var msj = "<p class='black-text'><strong>Any student select</strong></p>";
            Materialize.toast(msj, 10000, 'yellow lighten-3');
        }else{
            for(i = 0; i <= checkload; i++){
                if ($("#selectstudent" + i).prop('checked')) {
                    var student_idstudent = document.getElementById("id_student_edit"+i).value;
                    var student_role_idrole = document.getElementById("id_role_edit_student"+i).value;
                    var student_gender_idgender = document.getElementById("idselectgender"+i).value;
                    var section_idsection = idsection;
                $.post(base_url + 'controller/studentsavesection',{
                        student_idstudent: student_idstudent,
                        student_role_idrole: student_role_idrole,
                        student_gender_idgender: student_gender_idgender,
                        section_idsection: section_idsection
                    },function(datos){
                        var msjs = datos;
                        $.each(msjs, function (i, o) {
                            if (o.msjw !== "") {
                                Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                            }
                            if (o.msjs !== "") {
                                Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                            }
                            if (o.msje !== "") {
                                Materialize.toast(o.msje, 10000, 'red lighten-3');
                            }
                        });
                    studentlist();
                    }, 'json');}
            } 
        }
    }
    function deleterelstudentsection(student_idstudent,section_idsection){
        $student_idstudent = student_idstudent;
        $section_idsection = section_idsection;
        $.post(base_url + 'controller/deleterelstudentsection',{
            student_idstudent: $student_idstudent,
            section_idsection: $section_idsection
        },function(datos){
            var msjsstuden = datos;
            $.each(msjsstuden, function (i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            studentlistadmin();
        },'json');}
    function deletematerial(idmaterial){
        $idmaterial = idmaterial
        $.post(base_url + 'controller/deletematerial',{
            idmaterial: $idmaterial
        },function(datos){
            var msjs = datos;
            $.each(msjs, function (i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            materiallistadmin();
        },'json');}
    function deleterelstudentsectionadmin(student_idstudent,section_idsection){
        $student_idstudent = student_idstudent;
        $section_idsection = section_idsection;
        $.post(base_url + 'controller/deleterelstudentsection',{
            student_idstudent: $student_idstudent,
            section_idsection: $section_idsection
        },function(datos){
            var msjsstuden = datos;
            $.each(msjsstuden, function (i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            studentlistadmin();
        },'json');}
    function deleterelstudentsectionteacher(student_idstudent,section_idsection){
        $student_idstudent = student_idstudent;
        $section_idsection = section_idsection;
        $.post(base_url + 'controller/deleterelstudentsection',{
            student_idstudent: $student_idstudent,
            section_idsection: $section_idsection
        },function(datos){
            var msjsstuden = datos;
            $.each(msjsstuden, function (i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            studentlist();
        },'json');}

    function deleterelsectionclass(section_idsection,class_idclass){
        $.post(base_url + 'controller/deleterelsectionclass',{
            section_idsection: section_idsection,
            class_idclass: class_idclass
        },function(datos){
            var msj = datos;
            $.each(msj , function(i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            sectionlistadmin();
        },'json');}
    function deleterelsectionclassteacher(section_idsection,class_idclass){
        $.post(base_url + 'controller/deleterelsectionclass',{
            section_idsection: section_idsection,
            class_idclass: class_idclass
        },function(datos){
            var msj = datos;
            $.each(msj , function(i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            sectionlist();
        },'json');}
    function deleterelactivityunity(activity_idactivity,unity_idunity){
        $.post(base_url + 'controller/deleterelactivityunity',{
            activity_idactivity: activity_idactivity,
            unity_idunity: unity_idunity
        },function(datos){
            var msj = datos;
            $.each(msj , function(i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            activitylistadmin();
        },'json');
    }
    function deleterelactivityunityteacher(activity_idactivity,unity_idunity){
        $.post(base_url + 'controller/deleterelactivityunity',{
            activity_idactivity: activity_idactivity,
            unity_idunity: unity_idunity
        },function(datos){
            var msj = datos;
            $.each(msj , function(i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            activitylist();
        },'json');
    }
    function deleterelmaterialclass(material_idmaterial,class_idclass){
                $.post(base_url + 'controller/deleterelmaterialclass',{
            material_idmaterial: material_idmaterial,
            class_idclass: class_idclass
        },function(datos){
            var msj = datos;
            $.each(msj , function(i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            materiallistadmin();
        },'json');
    }
    function deletereltechersection(section_idsection, teacher_idteacher){
        $.post(base_url + 'controller/deletereltechersection',{
            section_idsection: section_idsection,
            teacher_idteacher: teacher_idteacher
        },function(datos){
            var msj = datos;
            $.each(msj , function(i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            teacherlistadmin();
        }, 'json');}
    function deleterelunitysection(section_idsection,unity_idunity){
        $.post(base_url + 'controller/deleterelunitysection',{
            section_idsection: section_idsection,
            unity_idunity: unity_idunity
        },function(datos){
            var msj = datos;
            $.each(msj , function(i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            unitylistadmin();
        },'json');}
        function deleterelunitysectionteacher(section_idsection,unity_idunity){
        $.post(base_url + 'controller/deleterelunitysection',{
            section_idsection: section_idsection,
            unity_idunity: unity_idunity
        },function(datos){
            var msj = datos;
            $.each(msj , function(i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            unitylist();
        },'json');}
    function materialsaveactivity(checkload){
        var checked = 0;
        var idactivity = document.getElementById("selectmaterialactivity").value;
        for (i = 0; i <= checkload; i++) {
            if($("#selectmaterial" + i).prop('checked')){
                checked += 1;
            }
        }
        if(checked === 0){
            var msj = "<p class='black-text'><strong>Any material Select</strong></p>";
            Materialize.toast(msj, 10000, 'yellow lighten-3');
        }else{
            for (i = 0; i <= checkload; i++) {
                if($("#selectmaterial" + i).prop('checked')){
                    var idmaterial = document.getElementById("idmaterial"+i).value;
                     $.post(base_url + 'controller/materialsaveactivity',{
                        idmaterial: idmaterial,
                        idactivity: idactivity
                    },function (datos) {
                        var msjsstudenclass = datos;
                        $.each(msjsstudenclass, function (i, o) {
                            if (o.msjw !== "") {
                                Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                            }
                            if (o.msjs !== "") {
                                Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                            }
                            if (o.msje !== "") {
                                Materialize.toast(o.msje, 10000, 'red lighten-3');
                            }
                        });
                        materiallist();
                    },'json');
                }
            }
        }     }
//Load Update
    function updateclass(id) {
        $.post(base_url + 'controller/updateclass', {
            idclassedit: $('#idclassedit' + id).val(),
            classnameedit: $('#edit_class_name' + id).val(),
            classdescriptioncenteredit: $('#edit_description_center' + id).val(),
            classdescriptionleftedit: $('#edit_description_left' + id).val(),
            classdescriptionrightedit: $('#edit_description_right' + id).val()
        }, function (datos) {
            var msjclassedit = datos;
            $.each(msjclassedit, function (i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            classlistadmin();
        },'json');}
    function updateword(id){
        $.post(base_url + 'controller/updateword',{
            idglosary: $("#edit_id_class"+id).val(),
            wordname: $("#edit_class_name"+id).val(),
            description: $("#edit_description_center"+id).val(),
            aditionaldescription: $("#edit_description_left"+id).val()
        },function(datos){
            var msj = datos;
            $.each(msj, function (i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            glosarylistadmin();
        },'json');
    }
    function updatesection(id){
        $.post(base_url + 'controller/updatesection', {
            idsection: $("#idsectionedit"+id).val(),
            sectionname: $("#edit_section_name"+id).val(),
            description: $("#edit_description"+id).val()
        }, function(datos){
            var $msj = datos;
                $.each($msj, function (i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            sectionlist();
        }, 'json');}
    function updateunit(id){
        var idunity = $("#editunitid"+id).val();
        var unitname = $("#editunitname"+id).val();
        var descriptioncenter = $("#editunitdescriptioncenter"+id).val();
        var descriptionleft = $("#editunitdescriptionleft"+id).val();
        var descriptionright = $("#editunitdescriptionright"+id).val();
         $.post(base_url + 'controller/updateunit', {
            idunity: idunity,
            unityname: unitname,
            descriptioncenter: descriptioncenter,
            descriptionleft: descriptionleft,
            descriptionright: descriptionright
        }, function (datos) {
            var msjunit = datos;
            $.each(msjunit, function (i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            unitylistadmin();
        }, 'json');}
    function updatestudent(id) {
        var idgender = document.getElementById("idselectgender"+ id).value;
            $.post(base_url + 'controller/updatestudent', {
                idstudent: $('#id_student_edit' + id).val(),
                idnumber: $('#id_number_edit' + id).val(),
                name: $('#name_edit' + id).val(),
                lastname: $('#lastname_edit' + id).val(),
                username: $('#username_edit' + id).val(),
                email: $('#email_edit' + id).val(),
                gender_idgender: idgender
                //gender_idgender: $('#gender_option_edit' + id).val()
            }, function (msjdate) {
                var msjstudentedit = msjdate;
                $.each(msjstudentedit, function (i, o) {
                    if (o.msjw !== "") {
                        Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                    }
                    if (o.msjs !== "") {
                        Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                    }
                    if (o.msje !== "") {
                        Materialize.toast(o.msje, 10000, 'red lighten-3');
                    }
                    studentlist();
                });
            }, 'json');}
    function updateactivityadmin(id){
        var idactivity = $("#id_activity_edit"+id).val();
        var activityname = $("#name_activity_edit"+id).val();
        var descriptionleft = $("#descriptionleft_activity_edit"+id).val();
        var descriptionright = $("#descriptionright_activity_edit"+id).val();
        $.post(base_url + 'controller/updateactivity', {
            idactivity: idactivity,
            activityname: activityname,
            descriptionleft: descriptionleft,
            descriptionright: descriptionright
        }, function (datos) {
            var msjactivity = datos;
            $.each(msjactivity, function (i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            activitylistadmin();
        }, 'json');}
    function updatequestion(id){
        var idquestion = $("#idEditQuestion"+id).val();
        var questionname = $("#editquestionname"+id).val();
        var description = $("#addanswerdescription"+id).val();
        var idquestiontype = document.getElementById("idselectquestiontype"+id).value;
        var idmode = document.getElementById("idselectmode"+id).value;
        $.post(base_url + 'controller/updatequestion',{
            idquestion: idquestion,
            questionname: questionname,
            description: description,
            idquestiontype: idquestiontype,
            idmode: idmode
        },function(datos){
            var msj = datos;
            $.each(msj, function (i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            questionlistadmin();
        },'json');
    }
    function updateanswer(id){
        var idanswer = $("#idEditAnswer"+id).val();
        var answername = $("#editanswername"+id).val();
        var answerdescription = $("#editanswerdescription"+id).val();
        var idvalue = document.getElementById("editselectvalueanswer"+id).value;
        var idquestion = document.getElementById("idQuestionanswer"+id).value;
        $.post(base_url + 'controller/updateanswer',{
            idanswer: idanswer,
            answername: answername,
            description: answerdescription,
            value_idvalue: idvalue,
            question_idquestion: idquestion
        },function(datos){
            var msj = datos;
            $.each(msj, function (i, o) {
                if (o.msjw !== "") {
                    Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                }
                if (o.msjs !== "") {
                    Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                }
                if (o.msje !== "") {
                    Materialize.toast(o.msje, 10000, 'red lighten-3');
                }
            });
            questionlistadmin();
        },'json');
    }
//Load View
    function teacherlistadmin() {
        $.post(base_url + 'controller/teacherlist', {}, function (page, datos) {
            $("#contentadministrator").html(page, datos);
        }), 'json';}
    function studentlist() {
        $.post(base_url + 'controller/studentlist', {}, function (page, datos) {
            $("#contentteacher").html(page, datos);
        });}
    function studentlistadmin(){
        $.post(base_url + 'controller/studentlist', {}, function (page, datos) {
            $("#contentadministrator").html(page, datos);
        });}
    function sectionlist(){
        $.post(base_url + 'controller/sectionlist', {}, function (page, datos){
            $("#contentteacher").html(page, datos);
        });}
    function sectionunity(idsection){
        $.post(base_url + 'controller/sectionunity', {
            idsection: idsection
        }, function (page, datos){
            $("#contentstudent").html(page, datos);
        });
    }
    function sectionlistadmin(){
        $.post(base_url + 'controller/sectionlist', {}, function (page, datos){
            $("#contentadministrator").html(page, datos);
        });}
    function classlist() {
        $.post(base_url + 'controller/classlist', {}, function (page, datos) {
            $("#contentteacher").html(page, datos);
        });}
    function classlistadmin() {
        $.post(base_url + 'controller/classlist', {}, function (page, datos) {
            $("#contentadministrator").html(page, datos);
            $('#collapsible').collapsible('active');
        });}
    function unitylistadmin() {
        $.post(base_url + 'controller/unitylist', {}, function (page, datos) {
            $("#contentadministrator").html(page, datos);
        });}
    function unitylist(){
        $.post(base_url + 'controller/unitylist', {}, function (page, datos) {
            $("#contentteacher").html(page, datos);
        });}
    function activitylistadmin() {
        $.post(base_url + 'controller/activitylist', {}, function (page, datos) {
            $("#contentadministrator").html(page, datos);
        });}
    function activitylist(){
        $.post(base_url + 'controller/activitylist', {}, function (page, datos) {
            $("#contentteacher").html(page, datos);
        });}
    function examlistadmin() {
        $.post(base_url + 'controller/examlist', {}, function (page, datos) {
            $("#contentadministrator").html(page, datos);
        });}
    function examlist() {
        $.post(base_url + 'controller/examlist', {}, function (page, datos) {
            $("#contentteacher").html(page, datos);
        });}
    function questionlistadmin(){
        $.post(base_url + 'controller/questionlist', {}, function (page, datos) {
            $("#contentadministrator").html(page, datos);
        });}
    function questionlist(){
        $.post(base_url + 'controller/questionlist', {}, function (page, datos) {
            $("#contentteacher").html(page, datos);
        });}
    function materiallistadmin() {
        $.post(base_url + 'controller/materiallist', {}, function (page, datos) {
            $("#contentadministrator").html(page, datos);
        });}
    function materiallist() {
        $.post(base_url + 'controller/materiallist', {}, function (page, datos) {
            $("#contentteacher").html(page, datos);
        });}
    function glosarylistadmin(){
        $.post(base_url + 'controller/glosarylist', {}, function (page, datos) {
            $("#contentadministrator").html(page, datos);
        });}
    function glosarylist(){
        $.post(base_url + 'controller/glosarylist', {}, function (page, datos) {
            $("#contentteacher").html(page, datos);
        });}
    function progresslistadmin(){
        $.post(base_url + 'controller/progresslist', {}, function (page, datos) {
            $("#contentadministrator").html(page, datos);
        });}
//editar y eliminar
        function deleteteacher(id){
        	$.post(base_url + 'controller/deleteteacher',{
        		idteacher: $("#id_teacher_edit"+id).val(),
        		password: $("#teacherpassworddelete"+id).val()
        	},function(datos){
        		var msjdeleteteacher = datos;
                $.each(msjdeleteteacher, function (i, o) {
                    if (o.msjw !== "") {
                        Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                    }
                    if (o.msjs !== "") {
                        Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                    }
                    if (o.msje !== "") {
                        Materialize.toast(o.msje, 10000, 'red lighten-3');
                    }
                });
                teacherlistadmin();
        	},'json');}
        function deleteclass(id){
            $.post(base_url  + 'controller/deleteclass',{
                idclass: $("#idclassedit"+id).val(),
                password: $("#deleteclassValidate"+id).val()
            },function(datos){
                var msjdeleteclass = datos;
                $.each(msjdeleteclass, function (i, o) {
                    if (o.msjw !== "") {
                        Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                    }
                    if (o.msjs !== "") {
                        Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                    }
                    if (o.msje !== "") {
                        Materialize.toast(o.msje, 10000, 'red lighten-3');
                    }
                });
                classlistadmin();
            },'json');}
        function deletesection(id){
            $.post(base_url + 'controller/deletesection',{
                idsection: $("#idsectionedit"+id).val(),
                password: $("#deleteclassValidate"+id).val()
            },function(datos){
                var msj = datos;
                $.each(msj, function (i, o) {
                    if (o.msjw !== "") {
                        Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                    }
                    if (o.msjs !== "") {
                        Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                    }
                    if (o.msje !== "") {
                        Materialize.toast(o.msje, 10000, 'red lighten-3');
                    }
                });
                sectionlistadmin();
            },'json');}
        function deleteunity(id){
            $.post(base_url  + 'controller/deleteunity',{
                idunity: $("#editunitid"+id).val(),
                password: $("#deleteclassValidate"+id).val()
            },function(datos){
                var msjdeleteclass = datos;
                $.each(msjdeleteclass, function (i, o) {
                    if (o.msjw !== "") {
                        Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                    }
                    if (o.msjs !== "") {
                        Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                    }
                    if (o.msje !== "") {
                        Materialize.toast(o.msje, 10000, 'red lighten-3');
                    }
                });
                unitylistadmin();
            },'json');}
        function deleteactivity(id){
            $.post(base_url + 'controller/deleteactivity',{
                idactivity: $("#id_activity_edit"+ id).val(),
                password: $("#deleteactivityValidate"+ id).val()
            },function(datos){
                var msjdeleteactivity = datos;
                $.each(msjdeleteactivity, function (i, o) {
                    if (o.msjw !== "") {
                        Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                    }
                    if (o.msjs !== "") {
                        Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                    }
                    if (o.msje !== "") {
                        Materialize.toast(o.msje, 10000, 'red lighten-3');
                    }
                });
                activitylistadmin();
            },'json');}
        function deletequestion(id){
            $.post(base_url + 'controller/deletequestion',{
                password: $('#deletequestionValidate'+ id).val(),
                idquestion: $('#idEditQuestion'+id).val()
            },function(datos){
                var msjdeleteactivity = datos;
                $.each(msjdeleteactivity, function (i, o) {
                    if (o.msjw !== "") {
                        Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                    }
                    if (o.msjs !== "") {
                        Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                    }
                    if (o.msje !== "") {
                        Materialize.toast(o.msje, 10000, 'red lighten-3');
                    }
                });
                questionlistadmin();
            },'json');
        }
        function deleteStudent(id){
            $.post(base_url  + 'controller/deleteStudent',{
                    idstudent: $("#id_student_edit"+id).val(),
                    password: $("#deletestudentValidate"+id).val()
                },function(datos){
                    var msjdeleteclass = datos;
                    $.each(msjdeleteclass, function (i, o) {
                        if (o.msjw !== "") {
                            Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                        }
                        if (o.msjs !== "") {
                            Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                        }
                        if (o.msje !== "") {
                            Materialize.toast(o.msje, 10000, 'red lighten-3');
                        }
                    });
                    studentlistadmin();
                },'json');}
        function deleteword(id){
            $.post(base_url + 'controller/deleteword',{
                idglosary: $("#edit_id_class"+id).val(),
                password: $("#deleteclassValidate"+id).val()
            },function(datos){
                var msj = datos;
                    $.each(msj, function (i, o) {
                        if (o.msjw !== "") {
                            Materialize.toast(o.msjw, 10000, 'yellow lighten-3');
                        }
                        if (o.msjs !== "") {
                            Materialize.toast(o.msjs, 10000, 'light-green lighten-4');
                        }
                        if (o.msje !== "") {
                            Materialize.toast(o.msje, 10000, 'red lighten-3');
                        }
                    });
                    glosarylistadmin();
            },'json');}

//------------------student-------------------
function unityactivities(idunity){
    $.post(base_url + 'controller/unity_activities',{
        idunity : idunity
    },function(pagina, datos){
        $("#contentstudent").html(pagina,datos);
    });
}
//*Valida Campos*/
        function checkRut(rut) {
            // Despejar Puntos
            var valor = rut.value.replace('.', '');
            // Despejar Guión
            valor = valor.replace('-', '');

            // Aislar Cuerpo y Dígito Verificador
            cuerpo = valor.slice(0, -1);
            dv = valor.slice(-1).toUpperCase();

            // Formatear RUN
            rut.value = cuerpo + '-' + dv

            // Si no cumple con el mínimo ej. (n.nnn.nnn)
            if (cuerpo.length < 7) {
                rut.setCustomValidity("RUT Incompleto");
                return false;
            }

            // Calcular Dígito Verificador
            suma = 0;
            multiplo = 2;

            // Para cada dígito del Cuerpo
            for (i = 1; i <= cuerpo.length; i++) {

                // Obtener su Producto con el Múltiplo Correspondiente
                index = multiplo * valor.charAt(cuerpo.length - i);

                // Sumar al Contador General
                suma = suma + index;

                // Consolidar Múltiplo dentro del rango [2,7]
                if (multiplo < 7) {
                    multiplo = multiplo + 1;
                } else {
                    multiplo = 2;
                }

            }

            // Calcular Dígito Verificador en base al Módulo 11
            dvEsperado = 11 - (suma % 11);

            // Casos Especiales (0 y K)
            dv = (dv == 'K') ? 10 : dv;
            dv = (dv == 0) ? 11 : dv;

            // Validar que el Cuerpo coincide con su Dígito Verificador
            if (dvEsperado != dv) {
                rut.setCustomValidity("RUT Inválido");
                return false;
            }

            // Si todo sale bien, eliminar errores (decretar que es válido)
            rut.setCustomValidity('');}
        function soloLetras(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
            especiales = "8-37-39-46";
            tecla_especial = false;
            for (var i in especiales) {
                if (key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }

            if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                return false;
            }}
        function soloNumeros(e) {
            var key = window.Event ? e.which : e.keyCode
            if (key == 8) {
                return key;
            } else {
                return (key >= 48 && key <= 57)
            }}
