<?php
class Cigaratte_inventory_model extends CI_Model
{
  function new_stock_insert($data)
  {
    $this->db->insert("cigaratte_inventory",$data);
  }

  function brand_insert($data)
  {
    $this->db->insert("cigaratte_inventory_brands",$data);
  }

  function cigaratte_inventory_history($data)
  {
    $this->db->insert("cigaratte_inventory_history",$data);
  }

  function insert_cigaratte_inventory_brands($data)
  {
    $this->db->insert("cigaratte_inventory_brands",$data);
  }

  function insert_month_null($data)
  {
    $this->db->insert("cigaratte_month_usage",$data);
  }
  function insert_day_null($data)
  {
    $this->db->insert("cigaratte_day_usage",$data);
  }

  function update_cigaratte_inventory($data_array,$code)
  {
    $this->db->where("item_code",$code);
    $this->db->update("cigaratte_inventory",$data_array);
  }

  function update_month_inventory($data_array,$code)
  {
    $this->db->where("item_code",$code);
    $this->db->update("cigaratte_month_usage",$data_array);
  }
  function update_day_inventory($data_array,$code)
  {
    $this->db->where("item_code",$code);
    $this->db->update("cigaratte_day_usage",$data_array);
  }

  function get_quantity($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("quantity");
    $query=$this->db->get("cigaratte_inventory");
    $query=$query->row();
    $query =$query->quantity;

    return $query;
  }
//month
  function month_quantity($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("quantity");
    $query=$this->db->get("cigaratte_month_usage");
    $query=$query->row();
    $query =$query->quantity;

    return $query;
  }
// day

  function day_quantity($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("quantity");
    $query=$this->db->get("cigaratte_day_usage");
    $query=$query->row();
    $query =$query->quantity;

    return $query;
  }

  function tableMonthStock()
  {
  $this->db->distinct();
  $this->db->select("*");
  $query = $this->db->get("cigaratte_month_usage");
  return $query->result();
  }

  function tableAvailableStock()
  {
  $this->db->select("*");
  $query = $this->db->get("cigaratte_inventory");
  return $query->result();
  }
  function tableDayStock()
  {
  $this->db->distinct();
  $this->db->select("*");
  $query = $this->db->get("cigaratte_day_usage");
  return $query->result();
  }

  function get_day_usage()
  {
    $this->db->where("item_code",$code);
    $this->db->select("*");
    $query = $this->db->get("cigaratte_day_usage");
    return $query->result();
  }
  function get_month_usage()
  {
    $this->db->where("item_code",$code);
    $this->db->select("*");
    $query = $this->db->get("cigaratte_month_usage");
    return $query->result();
  }

  function newday_insert($data)
  {
    $this->db->insert("cigaratte_day_usage",$data);
  }

}

 ?>
