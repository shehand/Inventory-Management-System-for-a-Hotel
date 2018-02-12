<?php
class Beer_inventory_model extends CI_Model
{

function new_stock_insert($data)
{
  $this->db->insert("beer_inventory",$data);
}

function brands_insert($data)
{
  $this->db->insert("beer_inventory_brands",$data);
}

function beer_inventory_history($data)
{
  $this->db->insert("beer_inventory_history",$data);
}

function insert_beer_inventory_brands($data)
{
  $this->db->insert("beer_inventory_brands",$data);
}

function insert_month_null($data)
{
  $this->db->insert("beer_month_usage",$data);
}
function insert_day_null($data)
{
  $this->db->insert("beer_day_usage",$data);
}

function update_beer_inventory($data_array,$code)
{
  $this->db->where("item_code",$code);
  $this->db->update("beer_inventory",$data_array);
}

function update_month_inventory($data_array,$code)
{
  $this->db->where("item_code",$code);
  $this->db->update("beer_month_usage",$data_array);
}

function update_day_inventory($data_array,$code)
{
  $this->db->where("item_code",$code);
  $this->db->update("beer_day_usage",$data_array);
}
function get_quantity($code)
{
  $this->db->where("item_code",$code);
  $this->db->select("quantity");
  $query=$this->db->get("beer_inventory");
  $query=$query->row();
  $query =$query->quantity;

  return $query;
}

function month_quantity($code)
{
  $this->db->where("item_code",$code);
  $this->db->select("quantity");
  $query=$this->db->get("beer_month_usage");
  $query=$query->row();
  $query =$query->quantity;

  return $query;
}
function day_quantity($code)
{
  $this->db->where("item_code",$code);
  $this->db->select("quantity");
  $query=$this->db->get("beer_day_usage");
  $query=$query->row();
  $query =$query->quantity;

  return $query;
}

function tableMonthStock()
{
$this->db->distinct();
$this->db->select("*");
$query = $this->db->get("beer_month_usage");
return $query->result();
}
function tableAvailableStock()
{
$this->db->select ("*");
$query = $this->db->get("beer_inventory");
return $query->result();
}
function tableDayStock()
{
$this->db->distinct();
$this->db->select ("*");
$query = $this->db->get("beer_day_usage");
return $query->result();
}

function get_day_usage($code)
{
  $this->db->where("item_code",$code);
  $this->db->select("*");
  $query = $this->db->get("beer_day_usage");
  return $query->result();
}

function get_month_usage($code)
{
  $this->db->where("item_code",$code);
  $this->db->select("*");
  $query = $this->db->get("beer_month_usage");
  return $query->result();
}


}
?>
