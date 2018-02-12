<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addhotel extends CI_Controller {
public function __construct()
 {
  parent::__construct(); 
  $this->load->helper('url'); 
  $this->load->database();
 }    
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
        $this->form_validation->set_rules("item_name","Name",'required');
        $this->form_validation->set_rules("item_quantity","Quantity",'required');
		$this->form_validation->set_rules("date","Date",'required');
		$this->form_validation->set_rules("item_exp","Item Expenditures",'required');

    if($this->form_validation->run())
     {

  			$this->load->model("Hotel_mo");
			$tmp = 0;
      			$data = array(
                      "hotel_item_id"  =>$this->input->post("item_code"),
                      "hotel_item_name" =>$this->input->post("item_name"),
                      "quantity"  =>$this->input->post("item_quantity"),
                      "date"   =>$this->input->post("date")
                    );
			    $tdata = array(
					"hotel_item_id" =>$this->input->post("item_code"),
					"hotel_item_name" =>$this->input->post("item_name"),
					"quantity" =>$tmp
				);
				$andata = array(
					"hotel_item_id" =>$this->input->post("item_code"),
					"hotel_item_name" =>$this->input->post("item_name"),
					"cost" =>$this->input->post("item_exp"),
					"date" =>$this->input->post("date")
				);

            $this->Hotel_mo->insertMainStock2($data);
			$this->Hotel_mo->monthlyInsert($tdata);
			$this->Hotel_mo->itemExpenditures2($andata);
  			redirect(base_url()."Hotel");
  		}
  		else
  		{
  			$this->index();
  		}
  	}

  }
 ?>
