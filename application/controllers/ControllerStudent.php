<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerStudent extends CI_Controller {

	    function __construct(){
        parent::__construct();
        $this->load->model("modelo");
        $this->load->helper(array('download', 'file', 'url', 'html', 'form'));
        $this->load->library('session');
        //divicion de pagina

	function unity_activities{
		$idunity = $this->input->post('idunity');

		$data['activity'] = $this->modelo->unity_activities($idunity)->result();
		$data['material'] = $this->modelo->materiallist()->result();
        $data['materialtype'] = $this->modelo->materialtypelist()->result();
        $data['teacher'] = $this->modelo->teacherlist()->result();
        $data['gender'] = $this->modelo->genderlist()->result();

		$this->load->view('student/activity',$data);
	}
}