<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {
//carga librerias 
    function __construct(){
        parent::__construct();
        $this->load->model("modelo");
        $this->load->helper(array('download', 'file', 'url', 'html', 'form'));
        $this->load->library('session');
        $this->load->library('form_validation');
    }
    //divicion de pagina
    public function index()
    {
        $this->load->view('head');
        $this->load->view('body');
        $this->load->view('footer');
    }

    public function upload_audio()
    {
        $config['upload_path']          = './media';
        $config['allowed_types']        = 'mp3|ogg|mp4|';
        $config['max_size']             = 10000000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            //error
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            redirect(base_url());
        }
    }

    public function upload_video()
    {
        $config['upload_path']          = './media';
        $config['allowed_types']        = 'mp4';
        $config['max_size']             = 10000000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            //error
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            redirect(base_url());
        }
    }

//carga sistema según usuario
    function charger(){
        //primero consulta si existe un usuario logeado
        if ($this->session->userdata('logged')) {
            //si lo esta consulta por el tipo
            switch($this->session->userdata('role_idrole')){
                case 3:
                    $data['name'] = $this->session->userdata('name');
                    $data['lastname'] = $this->session->userdata('lastname');
                    $data['email'] = $this->session->userdata('email');
                    //si es coordinador pasa se carga su vista y nombre de usuario
                    $this->load->view('coordinator/home-coordinator', $data);
                    break;
                case 2:
                    $data['name'] = $this->session->userdata('name');
                    $data['lastname'] = $this->session->userdata('lastname');
                    $data['email'] = $this->session->userdata('email');
                    //si es profesor pasa se carga su vista y nombre de usuario
                    $this->load->view('teacher/home-teacher', $data);
                    break;
                case 1:
                    $data['name'] = $this->session->userdata('name');
                    $data['lastname'] = $this->session->userdata('lastname');
                    $data['email'] = $this->session->userdata('email');
                    //si es alumno pasa se carga su vista y nombre de usuario
                    $this->load->view('student/home-student', $data);
                    break;
            }
        } else {
            //de no existir un usuario loggeado se envia al login
            $this->load->view('login');
        }}

    //Carga Sesión de Usuario

    //se extrae los valores de los campos de login
    function load_user(){
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        //se declaran los mensajes
        $msjs = '';
        $msje = '';
        $msjw = '';
        //se declara las variables
        $cookies = '';
        //se validan los campos para que no sean vacios
        if ($this->c_valide_field($username) & $this->c_valide_field($password)) {
            //se consulta al modelo por usuario y su pass
            $datos = $this->modelo->login($username, $password);
            //la respuesta se almacena en un arreglo
            $cookies = array(
                "username" => $datos['username'],
                "name" => $datos['name'],
                "lastname" => $datos['lastname'],
                "role_idrole" => $datos['role_idrole'],
                "idnumber" => $datos['idnumber'],
                "idteacher" => $datos['idteacher'],
                "email" => $datos['email']);
            //se consulta si la respuesta es vacia para continuar
            if($datos['role_idrole'] != '') {
                $cookies['logged'] = true;
                //se caga la session
                $this->session->set_userdata($cookies);
                //se almacena un mensaje
                $msjs = "<strong class='black-text'>Welcome!</strong>";
            } else {
                $cookies['logged'] = false;
                //se carga la sesion vacia
                $this->session->set_userdata($cookies);
                //se indica el mensaje
                $msje = "<strong class='black-text'>User don't exist!</strong>";
            }
        } else {
            //se carga el mensaje de que los campos son vacios
            $msjw = "<strong class='black-text'>The fields are empty!</strong>";
        }
        //se envia mediante json los mensajes de respuesta
        echo json_encode(array(
            "message_load_user_s" => $msjs,
            "message_load_user_e" => $msje,
            "message_load_user_w" => $msjw
        ));}
    //Cierra Sesión
    function close_session(){
        $this->session->sess_destroy();
        $msjclose= "<strong class='black-text'>Log Out!</strong>";
        echo json_encode(array('message_close' => $msjclose));}

//carga los menus de los usuarios en la vista general
    function teacher_menu(){$this->load->view('coordinator/menu-teacher');}
    function new_teacher(){$this->load->view('coordinator/new-teacher');}
    function student_menu(){$this->load->view('teacher/class/menu-student');}

    function savestudent(){
//se extrae los datos de la vista 
        $idnumber = $this->input->post('idnumber');
        $name = $this->input->post('name');
        $lastname = $this->input->post('lastname');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $password_confirm = $this->input->post('passwordconfirm');
        $role_idrole = $this->input->post('role_idrole');
        $gender_idgender = $this->input->post('gender_idgender');
        //declarando
        $msj_load_student = array();
        $m = array();
        $si = 0;
        $no = 0;
        //si campos son Vacios
        if ($this->c_valide_field($idnumber)) {
            $si += 1;}else{$no += 1;}
        if (!$this->validate_rut($idnumber)) {
            $m = array('msje' => "<strong class='black-text'>The field rut Incorrect!</strong>");
            array_push($msj_load_student, $m);
        }else{$si += 1;}
        if ($this->modelo->exist($idnumber)) {
            $m = array('msje' => "<strong class='black-text'>The Rut exist in System!</strong>");
            array_push($msj_load_student, $m);
        }else{$no += 1;}
        if ($this->c_valide_field($name)) {
            $si += 1;}else{$no += 1;}
        if ($this->c_valide_field($lastname)) {
            $si += 1;}else{$no += 1;}
        if ($this->c_valide_field($username)) {
            $si += 1;}else{$no += 1;}
        if ($this->c_valide_field($role_idrole)) {
            $si += 1;}else{$no += 1;}
        if ($this->c_valide_field($gender_idgender)) {
            $si += 1;}else{$no += 1;}
        if ($this->c_valide_field($password)) {
            $si += 1;}else{$no += 1;}
        if ($this->c_valide_field($password_confirm)) {
            $si += 1;}else{$no += 1;}
        if($password != $password_confirm){
            $m = array('msje' => "<strong class='black-text'>The pass does not match</strong>");
            array_push($msj_load_student, $m);
            $no += 1;}else{$si += 1;}
        echo "SI :";
        echo $si;
        echo " ";
        echo "NO :";
        echo $no;
        //valida coexion
        // if ($si === 10) {
        // 	$pass = md5($password);
        // 	if ($this->modelo->savestudent($idnumber,$name,$lastname,$username,$password,$email,$role_idrole,$gender_idgender)) {
        // 		$m = array('msjs' => "<strong class='black-text'>Save Teacher!!</strong>");
        // 		array_push($msj_load_student, $m);
        // 	}else{
        // 		$m = array('msje' => "<strong class='black-text'>Error!, Teacher don't save!!</strong>");
        // 		array_push($msj_load_student, $m);
        // 	}
        // }else{
        // 	if ($no >= 1) {
        // 		$m = array('msjw' => "<strong class='black-text'>Some fields are empty or the fields have less than 3 characters!</strong>");
        // 		array_push($msj_load_student, $m);
        // 	}
        // }
        echo json_encode($msj_load_student);
    }


    //oders
    //Lista de Profesores Vista Coordinador
    function saveclass(){
        //se extrae los datos de la vista
        $classname = $this->input->post('classname');
        $descriptionclasscenter = $this->input->post('descriptionclasscenter');
        $descriptionclassleft = $this->input->post('descriptionclassleft');
        $descriptionclassright = $this->input->post('descriptionclassright');
        $idteacher = $this->session->userdata('idteacher');
        //declaracion de variables mensajes y
        $classmsj = array();
        $m = array();
        $si = 0;
        $no = 0;
        $nconfirm = false;
        //consulta si el nombre de la clase ya existe
        $date = $this->modelo->classlist()->result();
        foreach ($date as $fila) {
            if($classname == $fila->classname){
                $nconfirm = false;
            }else{
                $nconfirm = true;
            }
        }
        //valida campos vacios
        if ($this->c_valide_field($classname)){
            $si += 1;
        }else{
            $no += 1;
        }
        if ($this->c_valide_field($descriptionclasscenter)){
            $si += 1;
        }else{
            $no += 1;
        }
        //valida si existe el nombre
        if ($nconfirm){
            $si += 1;
        }else{
            $m = array('msjw' => "<strong class='black-text'>Class exit in sistem, pleace change name!</strong>");
            array_push($classmsj, $m);
            $no += 1;
        }
        if($si === 3){
            if($this->modelo->saveclass($classname,$descriptionclasscenter,$descriptionclassleft,$descriptionclassright,$idteacher)){
                $m = array('msjs' => "<strong class='black-text'>Save class!</strong>");
                array_push($classmsj, $m);
            }else{
                $m = array('msje' => "<strong class='black-text'>Error, Don't save the class!</strong>");
                array_push($classmsj, $m);
            }
        }else{if($no > 1){
            $m = array('msjw' => "<strong class='black-text'>Some field are empy!</strong>");
            array_push($classmsj, $m);}
        }
        echo json_encode($classmsj);
    }

    function updateclass(){
        //se extrae los datos de la vista
        $idclassedit = $this->input->post('idclassedit');
        $classnameedit = $this->input->post('classnameedit');
        $descriptionclasscenteredit = $this->input->post('descriptionclasscenteredit');
        $descriptionclassleftedit = $this->input->post('descriptionclassleftedit');
        $descriptionclassrightedit = $this->input->post('descriptionclassrightedit');
        $idteacher = $this->session->userdata('idteacher');
        //declaracion de variables mensajes y
        $classmsj = array();
        $m = array();
        $si = 0;
        $no = 0;
        //valida campos vacios
        if (!$this->c_valide_field($classnameedit)){$si += 1;}else{$no += 1;}
        if (!$this->c_valide_field($descriptionclasscenteredit)){$si += 1;}else{$no += 1;}
        if($si === 2){
            if($this->modelo->updateclass($idclassedit,$classnameedit,$descriptionclasscenteredit,$descriptionclassleftedit,$descriptionclassrightedit,$idteacher)){
                $m = array('msjs' => "<strong class='black-text'>Save class!</strong>");
                array_push($classmsj, $m);
            }else{
                $m = array('msje' => "<strong class='black-text'>Error, Don't save the class!</strong>");
                array_push($classmsj, $m);
            }
        }else{if($no > 1){
            $m = array('msjw' => "<strong class='black-text'>Some field are empy!</strong>");
            array_push($classmsj, $m);}
        }
        echo json_encode($classmsj);
    }

    function updatestudent(){
        $idstudent = $this->input->post('idstudent');
        $idnumber = $this->input->post('idstudent');
        $name = $this->input->post('idstudent');
        $lastname = $this->input->post('idstudent');
        $username = $this->input->post('idstudent');
        $password = $this->input->post('idstudent');
        $email = $this->input->post('idstudent');
        $role_idrole = $this->input->post('idstudent');
        $gender_idgender = $this->input->post('idstudent');
        //declaracion de variables mensajes y
        $msjsupdatestudent = array();
        $m = array();
        $si = 0;
        $no = 0;

        if (!$this->c_valide_field($idstudent)){$si += 1;}else{$no += 1;}
        if (!$this->c_valide_field($idnumber)){$si += 1;}else{$no += 1;}
        if (!$this->c_valide_field($name)){$si += 1;}else{$no += 1;}
        if (!$this->c_valide_field($lastname)){$si += 1;}else{$no += 1;}
        if (!$this->c_valide_field($username)){$si += 1;}else{$no += 1;}
        if (!$this->c_valide_field($email)){$si += 1;}else{$no += 1;}

        if($si === 6){
            if($this->modelo->updatestudent($idstudent,$idnumber,$name,$lastname,$username,$password,$email,$role_idrole,$gender_idgender)){
                $m = array('msjs' => "<strong class='black-text'>Save class!</strong>");
                array_push($msjsupdatestudent, $m);
            }else{
                $m = array('msje' => "<strong class='black-text'>Error, Don't save the class!</strong>");
                array_push($msjsupdatestudent, $m);
            }
        }else{if($no > 1){
            $m = array('msjw' => "<strong class='black-text'>Some field are empy!</strong>");
            array_push($msjsupdatestudent, $m);}
        }
        echo json_encode($msjsupdatestudent);
    }

    function saveyoutubelink(){
        $materialname = $this->input->post('materialname');
        $descriptionleft = $this->input->post('descriptionleft');
        $descriptionright = $this->input->post('descriptionright');
        $link = $this->input->post('link');
        $idmaterialtype = 4;

        $this->modelo->saveyoutubelink($materialname, $descriptionleft,$descriptionright,$link,$idmaterialtype);


    }
//---------Listas---------
    // function teacher_list(){
    // 	$list['datos'] = $this->modelo->user_list_teacher()->result();
    // 	$this->load->view('coordinator/list-teacher', $list);}
    function studentlist(){
        $list['student'] = $this->modelo->studentlist()->result();
        $list['role'] = $this->modelo->rolelist()->result();
        $list['gender'] = $this->modelo->genderlist()->result();
        $this->load->view('teacher/class/studentlist',$list);}
    function classlist(){
        $list['class'] = $this->modelo->classlist()->result();
        $list['teacher'] = $this->modelo->teacherlist()->result();
        $list['gender'] = $this->modelo->genderlist()->result();
        $this->load->view('teacher/class/classlist',$list);}
    function unitylist(){
        $list['unity'] = $this->modelo->unitylist()->result();
        $list['class'] = $this->modelo->classlist()->result();
        $list['teacher'] = $this->modelo->teacherlist()->result();
        $this->load->view('teacher/unity/unitylist',$list);}
    function materiallist(){
        $list['material'] = $this->modelo->materiallist()->result();
        $list['materialtype'] = $this->modelo->materialtypelist()->result();
        $this->load->view('teacher/material/materiallist',$list);}
//---------Cargas---------
    function load_teacher(){$list = $this->modelo->user_list_teacher();	echo json_encode($list);}
    function load_student(){$list = $this->modelo->user_list_student();	echo json_encode($list);}
    function student_load_menu(){$this->load->view('teacher/class/menu-students');}
    function learning_load(){$this->load->view('teacher/class/menu-learning');}
    function newclass(){$this->load->view('teacher/class/newclass');}

//-------------------------validaciones-----------------------------

    //valida que los camposs no esten vacios y que no sean menores de 3 caracteres
    function c_valide_field($field){
        //compruebo que el tamaño del string sea válido.
        if (strlen($field)<3 || strlen($field)>200){
            return false;
        }
        //compruebo que los caracteres sean los permitidos
        $permitidos = "áéíóúabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚ0123456789-_'?";
        for ($i=0; $i<strlen($field); $i++){
            if (strpos($permitidos, substr($field,$i,1))===false){
                return false;
            }
        }
        return true;}

    /**
     * Comprueba si el rut ingresado es valido
     * @param string $rut RUT
     * @return boolean
     */

    public function validate_rut($rut){
        if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut)) {return false;}
        $rut = preg_replace('/[\.\-]/i', '', $rut);
        $dv = substr($rut, -1);
        $numero = substr($rut, 0, strlen($rut) - 1);
        $i = 2;
        $suma = 0;
        foreach (array_reverse(str_split($numero)) as $v) {
            if ($i == 8)
                $i = 2;
            $suma += $v * $i;
            ++$i;
        }
        $dvr = 11 - ($suma % 11);
        if ($dvr == 11){
            $dvr = 0;
        }
        if ($dvr == 10){
            $dvr = 'K';
        }
        if ($dvr == strtoupper($dv)){
            return true;
        }
        else{
            return false;
        }}

}



