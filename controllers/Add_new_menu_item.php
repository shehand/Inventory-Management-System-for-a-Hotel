<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_new_menu_item extends CI_Controller {

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
        $this->form_validation->set_rules("item_code","Item Code",'required');
        $this->form_validation->set_rules("item_name","Quantity",'required');
        $this->form_validation->set_rules("item_description","Item Code",'required');
		$this->form_validation->set_rules("date","Date",'required');

        if($this->form_validation->run())
        {
         $this->load->model("Menu_model"); 
         $tmp = 0;
      	 $data = array(
                "menu_item_id"  =>$this->input->post("item_code"),
                "menu_item_name" =>$this->input->post("item_name"),
                "item_description"  =>$this->input->post("item_description"),
                "item_quantity"   => $tmp,
                "updated_date"  =>$this->input->post("date")
            );
         
         $this->Menu_model->insert_data($data);
         redirect(base_url()."Menu_management");
        }
        else
        {
            $this->index();
        }
	}
}

?>