<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payroll_Controller extends CI_Controller {
    
    public function __construct()
     {
      parent::__construct(); 
      $this->load->helper('url'); 
      $this->load->database();
     }

	public function index()
	{
		$this->load->model("Payroll_Model");
		$data['pay_details'] = $this->Payroll_Model->getData();
		$this->load->view("Payroll_View",$data);
		
	}

	public function form_validation()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("emp_id","Employee ID",'required');
		$this->form_validation->set_rules("over_r","Overtime Rate",'required');

		if($this->form_validation->run())
		{
		    $this->load->model("Payroll_Model");
		    $id = $this->input->post("emp_id");
		    $tmp = array(
		            "overtime_r"  => $this->input->post("over_r")
		        );
		    $this->Payroll_Model->updateOvertime($id,$tmp);
		    redirect(base_url()."Payroll_Controller");
		}
		else
		{
		    echo "asdasdf";
		    //redirect(base_url()."Payroll_Controller");
		}
	}
}
?>
