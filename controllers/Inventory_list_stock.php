<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Inventory_list_stock extends CI_Controller{

  public function index()
  {
      if($this->session->userdata('logged') == 1){
    redirect(base_url()."Inventory_list");
  }
        else{
            redirect(base_url().'main/login'); 
        }
  }

  public function New_Stock_form_validation()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules("item_code","Item Code",'required');
    $this->form_validation->set_rules("item_name","Item Name",'required');
    $this->form_validation->set_rules("quantity","Quantity",'required');
    $this->form_validation->set_rules("date","Date",'required');

    if ($this->form_validation->run())
    {
      $this->load->model("Inventory_list_model");
      $data=array(
        "item_code" => $this->input->post("item_code"),
        "item_name" => $this->input->post("item_name"),
        "quantity" => $this->input->post("quantity")

      );

      $items=array(
        "item_code" => $this->input->post("item_code"),
        "item_name" => $this->input->post("item_name")
      );
      $history=array(
        "date" => $this->input->post("date"),
        "status"=>"Stock in",
        "item_code" => $this->input->post("item_code"),
        "item_name" => $this->input->post("item_name"),
        "quantity" => $this->input->post("quantity")

      );



      $this->Inventory_list_model->new_stock_insert($data);
      $this->Inventory_list_model->items_insert($items);
      $this->Inventory_list_model->inventory_list_history($history);
      redirect(base_url()."Inventory_list");
    }
    else
    {
      $this->index();
    }

  }
  public function Stock_out_form_validation()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules("item_code","Item Code",'required');
    $this->form_validation->set_rules("item_name","Item Name",'required');
    $this->form_validation->set_rules("quantity","Quantity",'required');
    $this->form_validation->set_rules("date","Date",'required');


    if ($this->form_validation->run())
    {
      $this->load->model("Inventory_list_model");
      $history=array(
        "date" => $this->input->post("date"),
        "status"=>"Stock out",
        "item_code" => $this->input->post("item_code"),
        "item_name" => $this->input->post("item_name")
      );

      $this->Inventory_list_model->inventory_list_history($history);

      $code=$this->input->post("item_code");
      $cur_quantity=$this->input->post("quantity");

      $day_usage_array=array(
        "item_code" => $this->input->post("item_code"),
        "item_name" => $this->input->post("item_name"),
        "quantity" => 0
      );
      $month_usage_array=array(
        "item_code" => $this->input->post("item_code"),
        "item_name" => $this->input->post("item_name"),
        "quantity" => 0
      );

      $day_data=$this->Inventory_list_model->get_day_usage($code);
      if((sizeof($day_data))==0){
        $this->Inventory_list_model->insert_day_null($day_usage_array);
      }

      $month_data=$this->Inventory_list_model->get_month_usage($code);
      if((sizeof($month_data))==0){
        $this->Inventory_list_model->insert_month_null($month_usage_array);
      }

      $tmp_quantity=$this->Inventory_list_model->get_quantity($code);
      $new_quantity=(int)$tmp_quantity-(int)$cur_quantity;

      $data_array=array(

        "quantity" =>$new_quantity,

      );

      $this->Inventory_list_model->update_inventory_list($data_array,$code);
      //month usage
      $tp_quantity=$this->Inventory_list_model->month_quantity($code);
      $nw_quantity=(int)$tp_quantity+(int)$cur_quantity;

      $data_month=array(

        "quantity" =>$nw_quantity
      );
      $this->Inventory_list_model->update_month_inventory($data_month,$code);
      //day
      $t_quantity=$this->Inventory_list_model->day_quantity($code);
      $n_quantity=(int)$t_quantity+(int)$cur_quantity;

      $data_day=array(
        "quantity" =>$n_quantity,

      );
      $this->Inventory_list_model->update_day_inventory($data_day,$code);

      redirect(base_url()."Inventory_list");
    }
    else
    {
      $this->index();
    }

  }


  public function Stock_in_form_validation()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules("item_code","Item Code",'required');
    $this->form_validation->set_rules("item_name","Item Name",'required');
    $this->form_validation->set_rules("quantity","Quantity",'required');

    if ($this->form_validation->run())
    {
      $this->load->model("Inventory_list_model");
      $history=array(
        "date" => $this->input->post("date"),
        "status"=>"Stock in",
        "item_code" => $this->input->post("item_code"),
        "item_name" => $this->input->post("item_name"),
        "quantity" => $this->input->post("quantity")
      );
      $this->Inventory_list_model->inventory_list_history($history);

      $code=$this->input->post("item_code");
      $cur_quantity=$this->input->post("quantity");

      $tmp_quantity=$this->Inventory_list_model->get_quantity($code);
      $new_quantity=(int)$tmp_quantity+(int)$cur_quantity;

      $data_array=array(

        "item_name" => $this->input->post("item_name"),
        "quantity" =>$new_quantity

      );
      $this->Inventory_list_model->update_inventory_list($data_array,$code);


      redirect(base_url()."Inventory_list");
    }
    else
    {
      $this->index();
    }

  }

}


 ?>
