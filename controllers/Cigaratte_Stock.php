<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Cigaratte_stock extends CI_Controller{

  public function index()
  {
      if($this->session->userdata('logged') == 1){
    redirect(base_url()."Cigaratte");
      }
        else{
            redirect(base_url().'main/login'); 
        }
  }
public function New_Stock_form_validation()
{
  $this->load->library('form_validation');
  $this->form_validation->set_rules("product_code","Product Code",'required');
  $this->form_validation->set_rules("product_name","Product Name",'required');
  $this->form_validation->set_rules("qty","qty",'required');
  $this->form_validation->set_rules("date","Date",'required');
  $this->form_validation->set_rules("o_price","Original Price",'required');
  $this->form_validation->set_rules("price","selling Price",'required');

  if ($this->form_validation->run())
  {
    $o_price=$this->input->post("o_price");
    $price=$this->input->post("price");
    $profit=(int)$price-(int)$o_price;

    $this->load->model("Res_inventory_model");
    $this->load->model("Res_inventory_model");
    $tmp_id=$this->Res_inventory_model->max_product_id();
    $pr_id=$tmp_id+1;
    $data=array(
      "product_id" => $pr_id,
      "product_code" => $this->input->post("product_code"),
      "product_name" => $this->input->post("product_name"),
      "gen_name" =>"cigaratte",
      "qty" => $this->input->post("qty"),
      "o_price" => $this->input->post("o_price"),
      "price" => $this->input->post("price"),
      "profit" => $profit,
      "date_arrival" => $this->input->post("date")

    );

    $history=array(
      "date" => $this->input->post("date"),
      "product_code" => $this->input->post("product_code"),
      "product_name" => $this->input->post("product_name"),
      "status"=>"Stock in",
      "gen_name" =>"cigaratte",
      "qty" => $this->input->post("qty")

    );

    $this->Res_inventory_model->new_stock_insert($data);
    $this->Res_inventory_model->history($history);
//    $this->Res_inventory_model->insert_month_null($month_usage);
//    $this->Res_inventory_model->insert_day_null($month_usage);
    redirect(base_url()."Cigaratte");
  }
  else
  {
    $this->index();
  }

}
public function Stock_out_form_validation()
{
  $this->load->library('form_validation');
  $this->form_validation->set_rules("product_code","Product Code",'required');
  $this->form_validation->set_rules("product_name","Product Name",'required');
  $this->form_validation->set_rules("qty","qty",'required');
  $this->form_validation->set_rules("date","Date",'required');


    if ($this->form_validation->run())
    {
      $this->load->model("Res_inventory_model");
      $cd=$this->input->post("product_code");
      $product_name_form=$this->input->post("product_name");
      $product_name_db=$this->Res_inventory_model->get_product_name($cd);
      if ($product_name_db==$product_name_form)
      {
        $code=$this->input->post("product_code");
        $qty_in_stock=$this->Res_inventory_model->get_qty($code);
        $qty_in_form_k=$this->input->post("qty");
        $qty_in_form=(int)$qty_in_form_k;
        if($qty_in_form<$qty_in_stock)
        {
          $this->load->model("Res_inventory_model");
          $history=array(
            "date" => $this->input->post("date"),
            "product_code" => $this->input->post("product_code"),
            "product_name" => $this->input->post("product_name"),
            "status"=>"Stock out",
            "gen_name" =>"cigaratte",
            "qty" => $this->input->post("qty")
          );

          $this->Res_inventory_model->history($history);

          $code=$this->input->post("product_code");
          $cur_qty=$this->input->post("qty");

          $tmp_qty=$this->Res_inventory_model->get_qty($code);
          $new_qty=(int)$tmp_qty-(int)$cur_qty;

          $data_array=array(

            "qty" =>$new_qty,
            "date_arrival" => $this->input->post("date")
          );
          $this->Res_inventory_model->update_inventory($data_array,$code);

          redirect(base_url()."Cigaratte");
        }
    else {
      echo "Insufficient of the stock to perform your task..";
    }
  }
    else {
        echo "Invalid Product Code or Product Name";
    }
  }
    else
    {
      echo "Invalid form completion";
    }
  }

public function Stock_in_form_validation()
{
  $this->load->library('form_validation');
  $this->form_validation->set_rules("product_code","Product Code",'required');
  $this->form_validation->set_rules("product_name","Product Name",'required');
  $this->form_validation->set_rules("qty","qty",'required');
  $this->form_validation->set_rules("date","Date",'required');

  if ($this->form_validation->run())
  {
    $this->load->model("Res_inventory_model");
    $cd=$this->input->post("product_code");
    $product_name_form=$this->input->post("product_name");
    $product_name_db=$this->Res_inventory_model->get_product_name($cd);
    if ($product_name_db==$product_name_form)
    {
      $this->load->model("Res_inventory_model");
      $history=array(
        "date" => $this->input->post("date"),
        "product_code" => $this->input->post("product_code"),
        "product_name" => $this->input->post("product_name"),
        "status"=>"Stock in",
        "gen_name" =>"cigaratte",
        "qty" => $this->input->post("qty")
      );
      $this->Res_inventory_model->history($history);

      $code=$this->input->post("product_code");
      $cur_qty=$this->input->post("qty");

      $tmp_qty=$this->Res_inventory_model->get_qty($code);
      $new_qty=(int)$tmp_qty+(int)$cur_qty;

      $data_array=array(

        "product_name" => $this->input->post("product_name"),
        "qty" =>$new_qty,
        "date_arrival" => $this->input->post("date")


      );
      $this->Res_inventory_model->update_inventory($data_array,$code);


      redirect(base_url()."Cigaratte");
    }
    else {
      echo "Invalid Product Code or Product Name";
    }
  }
  else
  {
    echo "Invalid form completion";
  }

}

public function updatePrice()
{
  $this->load->library('form_validation');
  $this->form_validation->set_rules("product_code","Product Code",'required');
  $this->form_validation->set_rules("product_name","Product Name",'required');
  $this->form_validation->set_rules("date","Date",'required');
  $this->form_validation->set_rules("o_price","Original Price",'required');
  $this->form_validation->set_rules("price","selling Price",'required');

  if ($this->form_validation->run())
  {
    $this->load->model("Res_inventory_model");
    $cd=$this->input->post("product_code");
    $product_name_form=$this->input->post("product_name");
    $product_name_db=$this->Res_inventory_model->get_product_name($cd);
    if ($product_name_db==$product_name_form)
    {
      $code=$this->input->post("product_code");
      $o_price=$this->input->post("o_price");
      $price=$this->input->post("price");
      $profit=(int)$price-(int)$o_price;

      $this->load->model("Res_inventory_model");
      $data_array=array(
        "product_code" => $this->input->post("product_code"),
        "product_name" => $this->input->post("product_name"),
        "gen_name" =>"cigaratte",
        "o_price" => $this->input->post("o_price"),
        "price" => $this->input->post("price"),
        "profit" => $profit,
        "date_arrival" => $this->input->post("date")

      );

      $history=array(
        "date" => $this->input->post("date"),
        "product_code" => $this->input->post("product_code"),
        "product_name" => $this->input->post("product_name"),
        "status"=>"Stock in",
        "gen_name" =>"cigaratte",
        "qty" =>0

      );
      $this->Res_inventory_model->update_inventory($data_array,$code);
      $this->Res_inventory_model->history($history);
  //    $this->Res_inventory_model->insert_month_null($month_usage);
  //    $this->Res_inventory_model->insert_day_null($month_usage);
      redirect(base_url()."Cigaratte");
    }
    else {
      echo "Invalid Product Code or Product Name";
    }

  }
  else
  {
    echo "Invalid form completion";
  }

}





/*public function newday()
{
  $this->load->model("Res_inventory_model");

//  $datai=$this->Res_inventory_model->get_day_usage();
  $this->Res_inventory_model->delete_day();
  if((sizeof($datai))>0){
  foreach ($datai as $info){
    $data=array(
      "product_code"=>$info->product_code,
      "product_name"=>$info->product_name,
      "qty" =>0
    );
    $this->Res_inventory_model->newday_insert($data);
  }
}
*/
//  redirect(base_url()."Cigaratte");


}


?>
