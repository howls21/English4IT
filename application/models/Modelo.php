<?php

class Modelo extends CI_Model{


//teacher

	function login($username, $password){
	//se consulta por el rut y contraseña en la tabla teacher
		$this->db->select('*');
		$this->db->where('username',$username);
		$this->db->where('password', $password);
		$this->db->limit(1);
		//se almacena la respuesta
		$queryteacher = $this->db->get('teacher');
		//se consulta por el rut y contraseña en la tabla student
		$this->db->select('*');
		$this->db->where('username',$username);
		$this->db->where('password', $password);
		$this->db->limit(1);
		//se almacena la respuesta
		$querystudent = $this->db->get('student');
                //se consulta por el rut y contraseña en la tabla coordinator
		$this->db->select('*');
		$this->db->where('username',$username);
		$this->db->where('password', $password);
		$this->db->limit(1);
		//se almacena la respuesta
		$querycoordinator = $this->db->get('coordinator');
		        //se consulta por el rut y contraseña en la tabla coordinator
		$this->db->select('*');
		$this->db->where('username',$username);
		$this->db->where('password', $password);
		$this->db->limit(1);
		//se almacena la respuesta
		$queryadministrator = $this->db->get('administrator');

		//se declara los arreglos vacios para evitar errores de compilacion
		$data_response['idadministrator'] = '';
        $data_response['idcoordinator'] = '';
		$data_response['idteacher'] = '';
		$data_response['idstudent'] = '';
		$data_response['username'] = ''; 
		$data_response['name'] = '';
		$data_response['lastname'] = '';
		$data_response['idnumber'] = '';
		$data_response['role_idrole'] = '';
        $data_response['gender_idgender'] = '';
		$data_response['email'] = '';

		if($queryteacher->num_rows() != 0){
			//se almacena la respuesta 
			foreach ($queryteacher->result() as $fila) {
				$data_response['idteacher'] = $fila->idteacher;
				$data_response['idnumber'] = $fila->idnumber;
				$data_response['name'] = $fila->name;				
				$data_response['lastname'] = $fila->lastname;
				$data_response['username'] = $fila->username;
                $data_response['email'] = $fila->email;
				$data_response['role_idrole'] = $fila->role_idrole;
                $data_response['gender_idgender'] = $fila->gender_idgender;
			}
		}elseif ($querystudent->num_rows() != 0){
			//se almacena la respuesta 
			foreach ($querystudent->result() as $fila) {
				$data_response['idstudent'] = $fila->idstudent;
				$data_response['username'] = $fila->username;
				$data_response['name'] = $fila->name;
				$data_response['lastname'] = $fila->lastname;
				$data_response['idnumber'] = $fila->idnumber;
				$data_response['email'] = $fila->email;
				$data_response['role_idrole'] = $fila->role_idrole;
                $data_response['gender_idgender'] = $fila->gender_idgender;
			}
		}elseif($querycoordinator->num_rows() != 0){
                    //se almacena la respuesta 
			foreach ($querycoordinator->result() as $fila) {
				$data_response['idcoordinator'] = $fila->idcoordinator;
				$data_response['username'] = $fila->username;
				$data_response['name'] = $fila->name;
				$data_response['lastname'] = $fila->lastname;
				$data_response['idnumber'] = $fila->idnumber;
				$data_response['email'] = $fila->email;
				$data_response['role_idrole'] = $fila->role_idrole;
                $data_response['gender_idgender'] = $fila->gender_idgender;
			}
        }else{
        	        //se almacena la respuesta 
			foreach ($queryadministrator->result() as $fila) {
				$data_response['idadministrator'] = $fila->idadministrator;
				$data_response['username'] = $fila->username;
				$data_response['name'] = $fila->name;
				$data_response['lastname'] = $fila->lastname;
				$data_response['idnumber'] = $fila->idnumber;
				$data_response['email'] = $fila->email;
				$data_response['role_idrole'] = $fila->role_idrole;
                $data_response['gender_idgender'] = $fila->gender_idgender;
			}
        }
                
		//devuelve el arreglo
		return $data_response;}
		function savelogstart($fecha,$username,$role_idrole){
			$addlog = array(
				'start' => $fecha,
				'end' => null,
				'username' => $username,
				'role_idrole' => $role_idrole
			);
			$this->db->insert('log',$addlog);
			$insert_id = $this->db->insert_id();

   			return  $insert_id;
		}
		function savelogend($idlog,$fecha,$username,$role_idrole){
			$addlog = array(
				'end' => $fecha,
				'username' => $username,
				'role_idrole' => $role_idrole
			);
			$this->db->where('idlog', $idlog);
			$this->db->update('log',$addlog);

   			return  true;
		}
		function savestudenthaslog($student_idstudent, $role_idrole, $idlog){
			$addstudenthaslog = array(
				'student_idstudent' => $student_idstudent,
				'student_role_idrole' => $role_idrole,
				'log_idlog' => $idlog
			);
			$this->db->insert('student_has_log', $addstudenthaslog);
		}
		function saveteacherhaslog($teacher_idteacher, $role_idrole, $idlog){
			$addteacherhaslog = array(
				'teacher_idteacher' => $teacher_idteacher,
				'teacher_role_idrole' => $role_idrole,
				'log_idlog' => $idlog
			);
			$this->db->insert('teacher_has_log', $addteacherhaslog);
		}
	function role($idrole){
		$this->db->select('*');
		$this->db->where('idrole', $idrole);
		$res = $this->db->get('role');

		$rolename = "";
		foreach ($res->result() as $fila) {
			$rolename = $fila->rolename;
		}
		return $rolename;
	}

	function roleid($rolename){
		$this->db->select('*');
		$this->db->where('rolename', $rolename);
		$res = $this->db->get('role');

		$idrole = "";
		foreach ($res->result() as $file) {
			$idrole = $file->idrole;
		}
		return $idrole;
	}
                
	function confirm_delete($user_name, $password){
		$this->db->select('name');
		$this->db->where('username', $user_name);
		$this->db->where('password', $password);
		$res = $this->db->get('administrator');

		if ($res->num_rows() != 0) {
			return true;
			}else{
			return false;
		}
	}

	function confirm_user($user_name){
	//Consulta nombre de usuario devuelve un booleano
		$this->db->select('name_user');
		$this->db->where('name_user', $user_name);
		$res = $this->db->get('user');

		if ($res->num_rows() != 0) {
			return true;
		} else {
			return false;
		}}
    function gendername($idgender){
            $this->db->select('*');
            $this->db->where('idgender', $idgender);
            $this->db->limit(1);
            $query = $this->db->get('gender');
            
            $data_response['name'] = "";
            
            foreach ($query->result() as $fila) {
                $data_response['name'] = $fila->name;
            }
            
            return $data_response;
        }

        function activityunity($idactivity){
        	$this->db->select('*');
        	$this->db->where('idactivity', $idactivity);
                $this->db->limit(1);
        	$res = $this->db->get('activity');
                
                $idunity = "";
                
                foreach ($res->result() as $fila){
                    $idunity = $fila->unity_idunity;
                }
                return $idunity;
        }

        function unityclass($unity_idunity){
        	$this->db->select('*');
        	$this->db->where('idunity', $unity_idunity);
                $this->db->limit(1);
        	$res = $this->db->get('unity');
                
                $idclass = "";
                
                foreach ($res->result() as $fila){
                    $idclass = $fila->class_idclass;
                }
                return $idclass;
        }

        function materialtyṕe($material_idmaterial){
        	$this->db->select('*');
        	$this->db->where('idmaterial', $material_idmaterial);
                $this->db->limit(1);
        	$query = $this->db->get('material');
                
                $idmaterialtype = "";
                
                foreach ($query->result() as $fila){
                    $idmaterialtype = $fila->materialtype_idmaterialtype;
                }
            return $idmaterialtype;
        }
        function buscamaterialxid($idmaterial){
        	$this->db->select('*');
        	$this->db->where('idmaterial', $idmaterial);
        	$res = $this->db->get('material');

        	$result = "";

        	foreach ($res->result() as $fila) {
        		$result = $fila->route;
        	}

        	return $result;
        }
	function studentexist($idnumber){
	//valida si existe el rut que se intenta ingresar
		$this->db->select('*');
		$this->db->where('idnumber', $idnumber);
		$res = $this->db->get('student');
		if ($res->num_rows() != 0) {return true;} else {return false;}}
        function existunity($unityname){
            //valida si existe el nombre de la unidad
            $this->db->select('*');
            $this->db->where('unityname',$unityname);
            $res = $this->db->get('unity');
            if ($res->num_rows() != '') {return false;} else {return true;}
        }

	function saveteacher($idnumber,$name,$lastname,$username,$email,$password,$role_idrole,$gender_idgender){
		//Guarda el docente en la base de datos
		$insert_teacher = array(
			'idnumber' => $idnumber,
			'name' => $name,
			'lastname' => $lastname,
			'username' => $username,
			'password' => $password,
			'email' => $email,
			'role_idrole' => $role_idrole,
			'gender_idgender' => $gender_idgender
		);

		$this->db->insert('teacher', $insert_teacher);

		return true;
	}
		
	function savestudent($idnumber,$name,$lastname,$username,$password,$email,$role_idrole,$gender_idgender){
		//Guarda el docente en la base de datos
		$insert_student = array(
			'idnumber' => $idnumber,
			'name' => $name,
			'lastname' => $lastname,
			'username' => $username,
			'password' => $password,
			'email' => $email,
			'role_idrole' => $role_idrole,
			'gender_idgender' => $gender_idgender
		);

		$this->db->insert('student', $insert_student);

		return true;
	}
        function studentsaveclass($idclass,$idstudent,$idteacher){
        	$this->db->select('*');
        	$this->db->where('student_idstudent', $idstudent);
        	$this->db->where('class_idclass', $idclass);
        	$this->db->where('class_teacher_idteacher', $idteacher);
        	$res = $this->db->get('student_has_class');

        	if ($res->num_rows() != 0){
        		return false;
        	}else{
        		$insert_sc = array(
	                'student_idstudent' => $idstudent,
	                'class_idclass' => $idclass,
	                'class_teacher_idteacher' => $idteacher
	            	);
            	$this->db->insert('student_has_class',$insert_sc);
            	return true;
        	}
        }
        function teachersavesection($teacher_idteacher,$section_idsection){
        	$this->db->select('*');
        	$this->db->where('teacher_idteacher', $teacher_idteacher);
        	$this->db->where('section_idsection', $section_idsection);
        	$res = $this->db->get('teacher_has_section');

        	if ($res->num_rows() != 0) {
        		return false;
        	}else{
        		$insert_ths = array(
        			'teacher_idteacher' => $teacher_idteacher,
        			'section_idsection' => $section_idsection
        		);
        		$this->db->insert('teacher_has_section', $insert_ths);
        		return true;
        	}

        }
        function unitysavesection($unity_idunity,$section_idsection){
        	$this->db->select('*');
        	$this->db->where('unity_idunity',$unity_idunity);
        	$this->db->where('section_idsection', $section_idsection);
        	$res = $this->db->get('unity_has_section');

        	if ($res->num_rows() != 0) {
        	 return false;
        	}else{
        		$insert_uhs = array(
        			'unity_idunity' => $unity_idunity,
        			'section_idsection' => $section_idsection
        		);
        	$this->db->insert('unity_has_section', $insert_uhs);
        	return true;
        	}
        }
        function activitysaveunity($unity_idunity, $activity_idactivity){
        	$this->db->select('*');
        	$this->db->where('unity_idunity',$unity_idunity);
        	$this->db->where('activity_idactivity',$activity_idactivity);
        	$res = $this->db->get('activity_has_unity');

        	if ($res->num_rows() != 0) {
        		return false;
        	}else{
        		$insert_ahu = array(
        			'unity_idunity' => $unity_idunity,
        			'activity_idactivity' => $activity_idactivity
        		);
        	$this->db->insert('activity_has_unity', $insert_ahu);
        	return true;
        	}
        }
        function materialhasclass($class_idclass, $material_idmaterial){
        	$this->db->select('*');
        	$this->db->where('class_idclass',$class_idclass);
        	$this->db->where('material_idmaterial',$material_idmaterial);
        	$res = $this->db->get('material_has_class');

        	if ($res->num_rows() != 0) {
        		return false;
        	}else{
        		$insert_mhc = array(
        			'class_idclass' => $class_idclass,
        			'material_idmaterial' => $material_idmaterial
        		);
        	$this->db->insert('material_has_class', $insert_mhc);
        	return true;
        	}
        }
        function studentsavesection($student_idstudent,$section_idsection){
        	$this->db->select('*');
        	$this->db->where('student_idstudent', $student_idstudent);
        	$this->db->where('section_idsection', $section_idsection);
        	$res = $this->db->get('student_has_section');

        	if ($res->num_rows() != 0) {
        		return false;
        	}else{
        			$insert_shs = array(
        			'student_idstudent' => $student_idstudent,
        			'section_idsection' => $section_idsection
        		);
        		$this->db->insert('student_has_section', $insert_shs);
        		return true;
        	}
        }
        function questionsaveactivity($activity_idactivity,$question_idquestion){
        	$this->db->select('*');
        	$this->db->where('activity_idactivity', $activity_idactivity);
        	$this->db->where('question_idquestion', $question_idquestion);
        	$res = $this->db->get('question_has_activity');

        	if ($res->num_rows() != 0) {
        		return false;
        	}else{
        		$this->db->select('*');
        		$this->db->where('idquestion', $question_idquestion);
        		$res2 = $this->db->get('question');
        		$idquestiontype = "";
        		foreach ($res2->result() as $fila) {
        			$idquestiontype = $fila->questiontype_idquestiontype;
        		}
        		$insert_qha = array(
        			'question_idquestion' => $question_idquestion,
        			'question_questiontype_idquestiontype' => $idquestiontype,
        			'activity_idactivity' => $activity_idactivity
        		);
        		$this->db->insert('question_has_activity', $insert_qha);
        		return true;
        	}
        }
        function sectionhasclass($idclass,$idsection){
        	$this->db->select('*');
        	$this->db->where('section_idsection', $idsection);
        	$this->db->where('class_idclass', $idclass);
        	$res = $this->db->get('section_has_class');

        	if ($res->num_rows() != 0) {
        		return false;
        	}else{
        		$isert_sc = array(
        			'section_idsection' => $idsection,
        			'class_idclass' => $idclass
        		);
        		$this->db->insert('section_has_class', $isert_sc);
        		return true;
        	}
        }

        function deleterelsectionclass($section_idsection,$class_idclass){
        	$this->db->select('*');
        	$this->db->where('section_idsection',$section_idsection);
        	$resstudent = $this->db->get('student_has_section');

        	$this->db->select('*');
        	$this->db->where('section_idsection',$section_idsection);
        	$resteacher = $this->db->get('teacher_has_section');

        	if($resstudent->num_rows() == 0 & $resteacher->num_rows() == 0){
        		$this->db->where('section_idsection', $section_idsection);
	        	$this->db->where('class_idclass', $class_idclass);
	        	$this->db->delete('section_has_class');
	        	return true;
        	}else{
        		return false;
        	}
        }
        function deleterelmaterialclass($material_idmaterial,$class_idclass){
        	
        		$this->db->where('material_idmaterial', $material_idmaterial);
        		$this->db->where('class_idclass', $class_idclass);
        		$this->db->delete('material_has_class');
        		return true;
        	
        }

        function deletematerial($idmaterial){
        	$this->db->select('*');
        	$this->db->where('material_idmaterial', $idmaterial);
        	$res = $this->db->get('material_has_class');

        	if($res->num_rows() == 0){
        		$this->db->where('idmaterial', $idmaterial);
        		$this->db->delete('material');
        		return true;
        	}else{
        		return false;
        	}
        }
        function deleterelactivityunity($activity_idactivity,$unity_idunity){
        	$this->db->select('*');
        	$this->db->where('activity_idactivity',$activity_idactivity);
        	$res = $this->db->get('question_has_activity');

        	if ($res->num_rows() != 0) {
        		return false;
        	}else{
        		$this->db->where('activity_idactivity', $activity_idactivity);
	        	$this->db->where('unity_idunity', $unity_idunity);
	        	$this->db->delete('activity_has_unity');
	        	return true;
        	}
        }
        function deletereltechersection($section_idsection, $teacher_idteacher){
        	$this->db->select('*');
        	$this->db->where('section_idsection',$section_idsection);
        	$res = $this->db->get('student_has_section');

        	if ($res->num_rows() != 0) {
        		return false;
        	}else{
        		$this->db->where('section_idsection',$section_idsection);
        		$this->db->where('teacher_idteacher', $teacher_idteacher);
        		$this->db->delete('teacher_has_section');
        		return true;
        	}
        }
        function deleterelstudentsection($student_idstudent,$section_idsection ){
        	$this->db->select('*');
        	$this->db->where('section_idsection', $section_idsection);
        	$res = $this->db->get('unity_has_section');

        	if($res->num_rows() != 0){
        		return false;
        	}else{
        		$this->db->query("DELETE FROM `student_has_section` WHERE `student_idstudent`= $student_idstudent and `section_idsection` = $section_idsection ");
        		return true;
        	}
        }
        function deleterelunitysection($section_idsection, $unity_idunity){
        	$this->db->select('*');
        	$this->db->where('unity_idunity', $unity_idunity);
        	$res = $this->db->get('activity_has_unity');

        	if ($res->num_rows() != 0) {
        		return false;
        	}else{
        		$this->db->query("DELETE FROM `unity_has_section` WHERE `unity_idunity`= $unity_idunity and `section_idsection` = $section_idsection ");
        		return true;
        	}
        }
	function saveyoutubelink($materialname, $descriptionleft,$descriptionright,$link,$idmaterialtype){
		//Guarda el link en la base de datos
		$insert_material = array(
			'materialname' => $materialname,
			'descriptionleft' => $descriptionleft,
			'descriptionright' => $descriptionright,
			'link' => $link,
			'route' => '',
			'url' => '',
			'materialtype_idmaterialtype' => $idmaterialtype
		);

		$this->db->insert('material', $insert_material);

		return true;
	}

	function classname($classname){
		$this->db->select('*');
		$this->db->where('classname', $classname);
		return $this->db->get('class');
	}

	function savesection($name,$description){
		$insertsection = array(
			'sectionname' => $name,
			'description' => $description
		);
		$this->db->insert('section', $insertsection);
		return true;
	}

	function saveclass($classname,$descriptionclasscenter,$descriptionclassleft,$descriptionclassright){
		$insertclass = array(
			'classname' => $classname,
			'descriptioncenter' => $descriptionclasscenter,
			'descriptionleft' => $descriptionclassleft,
			'descriptionright' => $descriptionclassright
		);
		
		$this->db->insert('class', $insertclass);
		return true;
	}

	function saveunity($unityname,$descriptioncenter,$descriptionleft,$descriptionright){
		$insertunity = array(
			'unityname' => $unityname,
			'descriptioncenter' =>$descriptioncenter,
			'descriptionleft' =>$descriptionleft,
			'descriptionright' =>$descriptionright
		);
		
		$this->db->insert('unity', $insertunity);
		return true;
	}
        
        function saveactivity($activityname,$descriptionleft,$descriptionright){
            $insertactivity = array(
                'activityname' => $activityname,
                'descriptionleft' => $descriptionleft,
                'descriptionright' => $descriptionright
            );
            
            $this->db->insert('activity', $insertactivity);
            return true;
        }
        
        function savequestion($questionname,$description,$idquestiontype,$idmode){
            $insertquestion = array(
                'questionname' => $questionname,
                'description' => $description,
                'questiontype_idquestiontype' => $idquestiontype,
                'mode_idmode' => $idmode
            );
            $this->db->insert('question', $insertquestion);
            return true;
        }
        function saveanswer($answerename,$description,$value_idvalue,$question_idquestion){
            $insertanswere = array(
                'answername' => $answerename,
                'description' => $description,
                'value_idvalue' => $value_idvalue,
                'question_idquestion' => $question_idquestion
            );
            $this->db->insert('answer', $insertanswere);
            return true;
        }
        
        function saveword($wordname,$description,$aditionaldescription){
            $insertword = array(
                'wordname' => $wordname,
                'description' => $description,
                'aditionaldescription' => $aditionaldescription
            );
            
            $this->db->insert('glosary', $insertword);
            return true;
        }

	function teacherlist(){
		//Lista de profesores
		$this->db->select("*");
		return $this->db->get('teacher');
	}
	function sectionlist(){
		$this->db->select("*");
		return $this->db->get('section');
	}
	function section_has_class(){
       	$this->db->select('*');
       	return $this->db->get('section_has_class');
    }
    function unity_has_section(){
    	$this->db->select('*');
    	return $this->db->get('unity_has_section');
    }
    function activity_has_unity(){
    	$this->db->select('*');
    	return $this->db->get('activity_has_unity');
    }
    function exam_has_unity(){
    	$this->db->select('*');
    	return $this->db->get('exam_has_unity');
    }
	function studentlist(){
		$this->db->select("*");
		$student = $this->db->get('student');
		return $student;
	}
	function rolelist(){
		$this->db->select("*");
		$role = $this->db->get('role');
		return $role;
	}
	function genderlist(){
		$this->db->select("*");
		$gender = $this->db->get('gender');
		return $gender;
	}

	function classlist(){
		$this->db->select("*");	
		return $this->db->get('class');
	}
	function unitylist(){
		$this->db->select("*");
		return $this->db->get('unity');
	}
	function activitylist(){
		$this->db->select("*");
		return $this->db->get('activity');
	}
        function questionlist(){
            $this->db->select("*");
            return $this->db->get('question');
        }
        function questiontype(){
        	$this->db->select('*');
        	return $this->db->get('questiontype');
        }
        function mode(){
        	$this->db->select('*');
        	return $this->db->get('mode');
        }
        function question_has_activity(){
        	$this->db->select('*');
        	return $this->db->get('question_has_activity');
        }
        function question_has_exam(){
        	$this->db->select('*');
        	return $this->db->get('question_has_exam');
        }
        function examlist(){
        	$this->db->select('*');
        	return $this->db->get('exam');
        }
        function answerlist(){
            $this->db->select("*");
            return $this->db->get('answer');
        }
        function valuelist(){
            $this->db->select("*");
            return $this->db->get('value');
        }
	function materiallist(){
		$this->db->select('*');
		return $this->db->get('material');
	}
	function materialtypelist(){
		$this->db->select('*');
		return $this->db->get('materialtype');
	}
function glosarylist(){
            $this->db->select('*');
            return $this->db->get('glosary');
        }

function loglist(){
	$this->db->select('*');
	return $this->db->get('log');}
function student_has_log(){
	$this->db->select('*');
	return $this->db->get('student_has_log');}
function teacher_has_log(){
	$this->db->select('*');
	return $this->db->get('teacher_has_log');}
function studenthassection(){
	//busca la lista con la relación entre las clases con los estudiantes
	$this->db->select('*');
	return $this->db->get('student_has_section');
}
function teacher_has_section(){
    	$this->db->select('*');
    	return $this->db->get('teacher_has_section');
    }
function material_has_class(){
	$this->db->select('*');
	return $this->db->get('material_has_class');
}
	//*faltan datos para el update
	function updateclass($idclass,$classname,$descriptionclasscenter,$descriptionclassleft,$descriptionclassright){
		//Realiza un update a la tabla usuario
		$this->db->where('idclass', $idclass);
		$query = array(
			'idclass' => $idclass,
			'classname' => $classname,
			'descriptioncenter' => $descriptionclasscenter,
			'descriptionleft' => $descriptionclassleft,
			'descriptionright' => $descriptionclassright
		);
		$this->db->update('class', $query);

		return true;
	}
	function updateword($idglosary,$wordname,$description,$aditionaldescription){
		$this->db->where('idglosary', $idglosary);
		$query = array(
			'idglosary' => $idglosary,
			'wordname' => $wordname,
			'description' => $description,
			'aditionaldescription' => $aditionaldescription
		);
		$this->db->update('glosary', $query);
		return true;
	}
	function updatesection($idsection,$sectionname,$description){
		
		$this->db->where('idsection', $idsection);
		$update = array('sectionname' => $sectionname,'description' => $description);
		$this->db->update('section',$update);
		return true;
	}
	function updatestudent($idstudent,$idnumber,$name,$lastname,$username,$email,$gender_idgender){

		$this->db->where('idstudent', $idstudent);
		$query = array(
			'idnumber' => $idnumber,
			'name' => $name,
			'lastname' => $lastname,
			'username' => $username,
			'email' => $email,
			'gender_idgender' => $gender_idgender
		);

		$this->db->update('student', $query);

		return true;

	}
        
        function updateunit($idunity,$unityname,$descriptioncenter,$descriptionleft,$descriptionright){
            $this->db->where('idunity', $idunity);
            $query = array(
                'unityname' => $unityname,
                'descriptioncenter' => $descriptioncenter,
                'descriptionleft' => $descriptionleft,
                'descriptionright' => $descriptionright
            );
            $this->db->update('unity', $query);
            return true;
        }
        function updateactivity($idactivity,$activityname,$descriptionleft,$descriptionright){
        	
        	$queryactivity = array(
                'activityname' => $activityname,
                'descriptionleft' => $descriptionleft, 
                'descriptionright' => $descriptionright);

            $this->db->where('idactivity',$idactivity);
            $this->db->update('activity', $queryactivity);
            return true;
        }
        function updatequestion($idquestion,$questionname,$description,$idquestiontype,$idmode){
        	$queryquestion = array(
        		'questionname' => $questionname,
        		'description' => $description,
        		'questiontype_idquestiontype' => $idquestiontype,
        		'mode_idmode' => $idmode
        	);
        	$this->db->where('idquestion', $idquestion);
        	$this->db->update('question', $queryquestion);
        	return true;
        }
        function updateanswer($idanswer,$answername,$description,$value_idvalue,$question_idquestion){
        	$queryanswer = array(
        		'answername' => $answername,
        		'description' => $description,
        		'value_idvalue' => $value_idvalue,
        		'question_idquestion' => $question_idquestion
        	);
        	$this->db->where('idanswer', $idanswer);
        	$this->db->update('answer',$queryanswer);
        	return true;
        }
	function deleteteacher($idteacher){
		##validar si el docente está asociado a alguna sección antes de intentar eliminar.
		$this->db->select('*');
		$this->db->where('teacher_idteacher',$idteacher);
		$res = $this->db->get('teacher_has_section');

		$this->db->select('*');
		$this->db->where('teacher_idteacher',$idteacher);
		$res2 = $this->db->get('teacher_has_log');

		if($res->num_rows() == 0 & $res2->num_rows() == 0 ){
			$this->db->query("DELETE FROM `teacher` WHERE `idteacher` = $idteacher");
			return true;
		}else{
			return false;
		}
		return false;
	}
        
    function deleteclass($idclass){
    	// consultar si existe una actividad
    	$this->db->select('*');
    	$this->db->where('class_idclass', $idclass);
    	$resSC = $this->db->get('section_has_class');

    	if ($resSC->num_rows() === 0 ) {

    		$this->db->select('1');
    		$this->db->where('class_idclass', $idclass);
    		$resMC = $this->db->get('material_has_class');

    		if ($resMC->num_rows() === 0) {
    			$this->db->query("DELETE FROM `class` WHERE `class`.`idclass` = $idclass");
    		return true;	
    		}else{
    			return false;
    		}
    	}else{
    		return false;
    	}
    }
    function deleteactivity($idactivity){
    	$this->db->select('*');
    	$this->db->where('activity_idactivity',$idactivity);
    	$res = $this->db->get('question_has_activity');

    	if ($res->num_rows() == 0) {
    		$this->db->select('*');
	    	$this->db->where('activity_idactivity',$idactivity);
	    	$res2 = $this->db->get('activity_has_unity');

	    	if($res2->num_rows() == 0){
	    		$this->db->query("DELETE FROM `activity` WHERE `idactivity` = '$idactivity' ");
	    		return true;
	    	}else{
	    		return false;	
	    	}
    	}else{
    		return false;
    	}
    	
    }
    function deletesection($idsection){
    	$this->db->select('*');
    	$this->db->where('section_idsection',$idsection);
    	$resteacher = $this->db->get('teacher_has_section');

    	$this->db->select('*');
    	$this->db->where('section_idsection',$idsection);
    	$resstudent = $this->db->get('student_has_section');

    	$this->db->select('*');
    	$this->db->where('section_idsection',$idsection);
    	$resclass = $this->db->get('section_has_class');

    	if ($resteacher->num_rows() == 0 & $resstudent->num_rows() == 0 & $resclass->num_rows() == 0) {
    		$this->db->query("DELETE FROM `section` WHERE `idsection` = '$idsection'");
    		return true;
    	}else{
    		return false;
    	}

    }
    function deletequestion($idquestion){
		#Preguntar si tiene respuestas asociadas a sus preguntas 
    	#si no tiene nada relacionado con el estudiante, debería permitir eliminar.

    	#de momento elimina sin preguntar porque el modulo alumno no está relacionado.
    	$this->db->query("DELETE FROM question_has_activity WHERE question_idquestion = $idquestion");
    	$this->db->query("DELETE FROM `answer` WHERE `question_idquestion` = $idquestion");
    	$this->db->query("DELETE FROM `question` WHERE `idquestion` = $idquestion");

    		return true;

    }
    function deleteStudent($idstudent){

    	// consultar si existe una actividad
    	$this->db->select('*');
    	$this->db->where('student_idstudent', $idstudent);
    	$res = $this->db->get('student_has_section');

    	if ($res->num_rows() == 0 ) {
    		$this->db->query("DELETE FROM `student` WHERE `idstudent` = '$idstudent'");
    		return true;
    	}else{
    		return false;
    	}
    }
    function deleteunity($idunity){
        $this->db->select('*');
        $this->db->where('unity_idunity',$idunity);
        $res = $this->db->get('activity_has_unity');
        
        if($res->num_rows() == 0){
			$this->db->select('*');
	        $this->db->where('unity_idunity',$idunity);
	        $res2 = $this->db->get('unity_has_section');
	        if($res2->num_rows() == 0){
	            $this->db->query("DELETE FROM `unity` WHERE `idunity` = '$idunity'");
	    		return true;
	    	}else{
	    		return false;
	    	}
        }else{
            return false;
        }
    }
    function deleteword($idglosary){
    	$this->db->where('idglosary', $idglosary);
    	$this->db->delete('glosary');
    	return true;
    }
    function materialsaveactivity($idmaterial,$materialidtype,$idactivity,$idunity,$idclass,$idteacher){
    	$result = $this->db->query(
    		"SELECT * 
    			FROM `material_has_activity` 
    			WHERE `material_idmaterial` = $idmaterial 
    			AND `material_idtype` = $materialidtype 
    			AND `activity_idactivity` = $idactivity 
    			AND `activity_idunity` = $idunity 
    			AND `activity_idclass` = $idclass 
    			AND `activity_idteacher` = $idteacher");
    	if ($result->num_rows() === 0) {
    		$query = array(
    		'material_idmaterial' => $idmaterial,
    		'material_idtype' => $materialidtype,
    		'activity_idactivity' => $idactivity,
    		'activity_idunity' => $idunity,
    		'activity_idclass' => $idclass,
    		'activity_idteacher' =>  $idteacher);
    		$this->db->insert('material_has_activity', $query);
    		return true;
    	}else{
    		return false;	
    	}
    }
    function savevideo($video,$type){
    	$query = array(
    		'materialname' => $video,
    		'descriptionleft' => "",
    		'descriptionright' => "",
    		'link' => "",
    		'route' => $video,
    		'url' => "",
    		'materialtype_idmaterialtype' => $type
    	);
    	$this->db->insert('material', $query);
    	return true;
    }

//Student
    function studentsection($idstudent){
    	$this->db->select('*');
    	$this->db->where('student_idstudent',$idstudent);
    	$query = $this->db->get('student_has_section');

    	$idsection = "";

		foreach ($query->result() as $fila) {
                $idsection = $fila->section_idsection;
            }

    	$this->db->select('*');
    	$this->db->where('idsection',$idsection);
        $section = $this->db->get('section');

        return $section;
    }

    function unity_activities($idunity){
    	$this->db->select('*');
    	$this->db->where('activity_idunity', $idunity);
    	$query = $this->db->get('material_has_activity');

    	return $query;
    }
    function activitybyunity($idunity){
    	$this->db->select('*');
    	$this->db->where('unity_idunity', $idunity);
    	$query = $this->db->get('activity');
    	return $query;
    }
    function teacherbyidunity($idunity){
    	$this->db->select('*');
    	$this->db->where('idunity', $idunity);
    	$this->db->limit(1);
    	$res = $this->db->get('unity');

    	$idteacher = 0;
    	foreach ($res->result()  as $fil) {
    		$idteacher = $fil->class_teacher_idteacher;
    	}
    	return $idteacher;
    }
    function unitybyidsection($idsection){
    	$this->db->select('unity_idunity');
    	$this->db->where('section_idsection', $idsection);
    	$list = $this->db->get('unity_has_section');

    	return $list;
    }


}

?>