<?php
class Res_inventory_model extends CI_Model
{

function new_stock_insert($data)
{
  $this->db->insert("res_products",$data);
}

function history($data)
{
  $this->db->insert("res_history",$data);
}

function update_inventory($data_array,$code)
{
  $this->db->where("product_code",$code);
  $this->db->update("res_products",$data_array);
}

function get_qty($code)
{
  $this->db->where("product_code",$code);
  $this->db->select("qty");
  $query=$this->db->get("res_products");
  $query=$query->row();
  $query =$query->qty;
  return $query;
}

function tableAvailableStock($tp)
{
$this->db->where("gen_name",$tp);
$this->db->select ("product_code,product_name,qty,o_price,price,profit,date_arrival");
$query = $this->db->get("res_products");
return $query->result();
}

function get_product_name($cd)
{
  $this->db->where("product_code",$cd);
  $this->db->select("product_name");
  $query=$this->db->get("res_products");
  $query=$query->row();
  $query =$query->product_name;
  return $query;
}

function max_product_id()
{
  $this->db->select_max("product_id");
  $query = $this->db->get("res_products");
  $query=$query->row();
  $query =$query->product_id;
  return $query;

}

function tableFilterStock($name,$sdate,$ldate)
  {
      $this->db->where("kitchen_item_name",$name);
      $this->db->where("date BETWEEN '$sdate' AND '$ldate'");
      //$this->db->where("DATE_FORMAT(date, '%Y-%m-%d') >= ","'$sdate'");
      //$this->db->where("DATE_FORMAT(date, '%Y-%m-%d') <  ","'$ldate' + INTERVAL 1 DAY");
      $query = $this->db->get("daily_consumptions");
      return $query->result();
  }

}
?>
