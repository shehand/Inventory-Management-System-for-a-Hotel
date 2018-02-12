<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_menu extends CI_Controller {

	public function index()
	{
	    if($this->session->userdata('logged') == 1){
		redirect(base_url()."Menu_management");
	    }
	   else{
      redirect(base_url().'main/login'); 
    }
	}

	public function form_validation()
	{
		$this->load->library('form_validation');
        $this->form_validation->set_rules("item_name","Item Name",'required');
        $this->form_validation->set_rules("item_quantity","Quantity",'required');
		$this->form_validation->set_rules("date","Date",'required');

        if($this->form_validation->run())
        {
         $this->load->model("Menu_model"); 
         $id = $this->input->post("item_code");
         
         $ava_quan = $this->Menu_model->get_data($id);
         $tmp = $this->input->post("item_quantity");
         $new = (int)$tmp;
         
         $up = $new + (int)$ava_quan;
         
         $data = array(
             "item_quantity"  => $up
             );
         $this->Menu_model->update_data($data,$id);
         
         redirect(base_url()."Menu_management");
        }
        else
        {
            redirect(base_url()."Menu_management");
        }
	}
}

?>