<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	// '''''''''''''''''''''''''eot''''''''''''''''''''''''''''''
	public function eot_crane(){
		$data['title']="EOT Crane & Semi EOT Crane";
		$data['datatable'] = true;
		$data['list']= $this->Admin_model->get_eotlist();
		// echo '<pre>';
		// print_r($data);die;
		$this->template->load('pages/admin','eot_crane',$data);
	}

	public function sendquotation(){
		$data = $this->input->post();
		if($_FILES['image']['size']>0){
		    $this->load->helper('upload');
	        $upload_path = './assets/uploads';
	        $allowed_types = 'gif|jpg|jpeg|png';
	        $result = upload_file("image", $upload_path, $allowed_types, time());
			$src=$result['path'];
	        $data['image'] = $src;
        }
        $data['added_on']=date('Y-m-d H:i:s');

        $result = $this->Admin_model->sendQuotation($data);
        if($result===true){
        	redirect("admin/eot_crane");
        	$this->session->set_flashdata("msg","Add Quotation Successfully!");
	    }
	    else{
	        $this->session->set_flashdata("Something Error");
	        redirect("admin/eot_crane");
	    }
    	
    }
    // ''''''''''''''''''''''''''''gantry''''''''''''''''''''''''''''''''''''''''''''''''
    public function gantry_crane(){
		$data['title']="Gantry Crane & Semi Gantry Crane";
		$data['datatable'] = true;
		$data['list']= $this->Admin_model->get_gantrylist();
		// echo '<pre>';
		// print_r($data);die;
		$this->template->load('pages/admin','gantry',$data);
	}

	// ''''''''''''''''''''''''''''JIB''''''''''''''''''''''''''''''''''''''''''''''''
    public function jib_crane(){
		$data['title']="JIB Crane";
		$data['datatable'] = true;
		$data['list']= $this->Admin_model->get_jiblist();
		$this->template->load('pages/admin','jib_crane',$data);
	}
	//'''''''''''''''''''''''''''''''''''MONORAIL'''''''''''''''''''''''''''''''''''''''
	public function monorail(){
		$data['title']="Monorail With Electric Wire Rope Hoist";
		$data['datatable'] = true;
		$data['list']= $this->Admin_model->get_monorail();
		// echo '<pre>';
		// print_r($data);die;
		$this->template->load('pages/admin','monorail',$data);
	}
	//'''''''''''''''''''''''''''''''''''ELECTRIC WIRE'''''''''''''''''''''''''''''''''''''''
	public function electric(){
		$data['title']="Electric Wire Rope Hoist";
		$data['datatable'] = true;
		$data['list']= $this->Admin_model->get_electricwire();
		// echo '<pre>';
		// print_r($data);die;
		$this->template->load('pages/admin','electric_wire',$data);
	}

}
?>
