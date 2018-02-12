<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddStock extends CI_Controller {
public function __construct()
 {
  parent::__construct(); 
  $this->load->helper('url'); 
  $this->load->database();
 }    
	public function index()
	{
	     if($this->session->userdata('logged') == 1){
		redirect(base_url()."Kitchen");
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

  			$this->load->model("Kitchen_model");
			$tmp = 0;
      			$data = array(
                      "kitchen_item_id"  =>$this->input->post("item_code"),
                      "kitchen_item_name" =>$this->input->post("item_name"),
                      "item_quantity"  =>$this->input->post("item_quantity"),
                      "date_inserted"   =>$this->input->post("date")
                    );
			    $tdata = array(
					"kitchen_item_id" =>$this->input->post("item_code"),
					"kitchen_item_name" =>$this->input->post("item_name"),
					"available_stock" =>$tmp,
					"date_inserted" =>$this->input->post("date")
				);
				$andata = array(
					"kitchen_item_id" =>$this->input->post("item_code"),
					"kitchen_item_name" =>$this->input->post("item_name"),
					"item_outcome" =>$this->input->post("item_exp"),
					"date_inserted" =>$this->input->post("date")
				);

            $this->Kitchen_model->insertMainStock($data);
			$this->Kitchen_model->monthlyInsert($tdata);
			$this->Kitchen_model->itemExpenditures($andata);
  			redirect(base_url()."Kitchen");
  		}
  		else
  		{
  			$this->index();
  		}
  	}

  }
 ?>
