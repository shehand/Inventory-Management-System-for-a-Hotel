<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_management extends CI_Controller {

	public function index()
	{
	    if($this->session->userdata('logged') == 1){
    		$this->load->model("Menu_model");
    		$data['infos'] = $this->Menu_model->tableMenu();
    		$data['updt'] = $this->Menu_model->tableMenuUp();
    		$this->load->view('menu_view',$data);
	    }
        else{
            redirect(base_url().'main/login'); 
        }
	}

	public function form_validation()
	{
		$this->load->library('form_validation');
        $this->form_validation->set_rules("item_name","Item Code",'required');
        $this->form_validation->set_rules("item_cat","Category",'required');
		$this->form_validation->set_rules("item_description","Description",'required');
		$this->form_validation->set_rules("item_price","Price",'required');

        if($this->form_validation->run())
        {
         $this->load->model("Menu_model"); 
         
         $data = array(
             "product_code" => $this->input->post("item_name"),
             "gen_name"  =>  $this->input->post("item_cat"),
             "product_name" =>  $this->input->post("item_description"),
             "price" =>  $this->input->post("item_price")
             );
         $this->Menu_model->insert_data($data);
         
         redirect(base_url()."Menu_management");
        }
        else
        {
            redirect(base_url()."Menu_management");
        }
	}
}

?>