<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotelstock extends CI_Controller {


	public function index()
	{
	    if($this->session->userdata('logged') == 1){
		redirect(base_url()."Hotel");
	}
        else{
            redirect(base_url().'main/login'); 
        }
	}

  public function form_validation()
	{
		$this->load->library('form_validation');
    $this->form_validation->set_rules("item_code","Item Code",'required');
    $this->form_validation->set_rules("item_quantity","Quantity",'required');
		$this->form_validation->set_rules("date","Date",'required');

    if($this->form_validation->run())
     {

  			$this->load->model("Hotel_mo");
  			$tmp = $this->input->post("item_quantity");
  			$ava = (int)$tmp;
  			$id = $this->input->post("item_code");

  			$new  = $this->Hotel_mo->get_data($id);
  			$new_ava = $ava + (int)$new;
  			$dt = array(
  				"quantity"   =>$new_ava,
  				"date" =>$this->input->post("date")
  			);
				
			
  			$this->Hotel_mo->insertMain($dt,$id);
  			redirect(base_url()."Hotel");
  			
  		}
  		else
  		{
  			$this->index();
  		}
  	}

  	public function inserted()
  	{
  		$this->index();
  	}
  }