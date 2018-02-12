<?php
class Liquor_inventory_model extends CI_Model
{
  function new_stock_insert($data)
  {
    $this->db->insert("liquor_inventory",$data);
  }

  function brand_insert($data)
  {
    $this->db->insert("liquor_inventory_brands",$data);
  }

  function liquor_inventory_history($data)
  {
    $this->db->insert("liquor_inventory_history",$data);
  }

  function insert_liquor_inventory_brands($data)
  {
    $this->db->insert("liquor_inventory_brands",$data);
  }
//set month table null
  function insert_month_null($data)
  {
    $this->db->insert("liquor_month_usage",$data);
  }
  //set day table null
  function insert_day_null($data)
  {
    $this->db->insert("liquor_day_usage",$data);
  }

  function update_liquor_inventory($data_array,$code)
  {
    $this->db->where("item_code",$code);
    $this->db->update("liquor_inventory",$data_array);
  }

  function update_month_inventory($data_array,$code)
  {
    $this->db->where("item_code",$code);
    $this->db->update("liquor_month_usage",$data_array);
  }

  function update_day_inventory($data_array,$code)
  {
    $this->db->where("item_code",$code);
    $this->db->update("liquor_day_usage",$data_array);
  }

  //for available stock

  function get_q_half_pint($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("half_pint");
    $query=$this->db->get("liquor_inventory");
    $query=$query->row();
    $query =$query->half_pint;

    return $query;
  }

  function get_q_pint($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("pint");
    $query=$this->db->get("liquor_inventory");
    $query=$query->row();
    $query =$query->pint;

    return $query;
  }

  function get_q_fifth($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("fifth");
    $query=$this->db->get("liquor_inventory");
    $query=$query->row();
    $query =$query->fifth;

    return $query;
  }

  function get_q_litre($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("litre");
    $query=$this->db->get("liquor_inventory");
    $query=$query->row();
    $query =$query->litre;

    return $query;
  }
// for month out stock
  function month_half_pint($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("half_pint");
    $query=$this->db->get("liquor_month_usage");
    $query=$query->row();
    $query =$query->half_pint;

    return $query;
  }

  function month_pint($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("pint");
    $query=$this->db->get("liquor_month_usage");
    $query=$query->row();
    $query =$query->pint;

    return $query;
  }

  function month_fifth($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("fifth");
    $query=$this->db->get("liquor_month_usage");
    $query=$query->row();
    $query =$query->fifth;

    return $query;
  }

  function month_litre($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("litre");
    $query=$this->db->get("liquor_month_usage");
    $query=$query->row();
    $query =$query->litre;

    return $query;
  }

  //for day out stock
  function day_half_pint($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("half_pint");
    $query=$this->db->get("liquor_day_usage");
    $query=$query->row();
    $query =$query->half_pint;

    return $query;
  }

  function day_pint($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("pint");
    $query=$this->db->get("liquor_day_usage");
    $query=$query->row();
    $query =$query->pint;

    return $query;
  }

  function day_fifth($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("fifth");
    $query=$this->db->get("liquor_day_usage");
    $query=$query->row();
    $query =$query->fifth;

    return $query;
  }

  function day_litre($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("litre");
    $query=$this->db->get("liquor_day_usage");
    $query=$query->row();
    $query =$query->litre;

    return $query;
  }

  //tables
  function tableAvailableStock()
  {
  $this->db->select("*");
  $query = $this->db->get("liquor_inventory");
  return $query->result();
  }

  function tableMonthStock()
  {
  $this->db->distinct();
  $this->db->select("*");
  $query = $this->db->get("liquor_month_usage");
  return $query->result();
  }
  function tableDayStock()
  {
  $this->db->distinct();
  $this->db->select("*");
  $query = $this->db->get("liquor_day_usage");
  return $query->result();
  }

  function get_day_usage($code)
  {
    $this->db->where("item_code",$code);
    $this->db->select("*");
    $query = $this->db->get("liquor_day_usage");
    return $query->result();
  }

    function get_month_usage($code)
    {
      $this->db->where("item_code",$code);
      $this->db->select("*");
      $query = $this->db->get("liquor_month_usage");
      return $query->result();
    }
////////////////////////////////////////////////////////////
  // new day
  function new_day_select()
  {
  $this->db->select("*");
  $query = $this->db->get("liquor_day_usage");
  return $query->result();
  }

  function new_day($code,$data)
  {
  $this->db->where("item_code",$code);
  $this->db->update("liquor_day_usage",$data);
  }


  //To be modified

  function table_liquor_stock_in_day($code)
  {
  $this->db->where($code);
  $this->db->select("item_code,item_name,half_pint,pint,fifth,litre");
  $query = $this->db->get("liquor_inventory_history");
  return $query->result();
  }
  //
  function day_id()
  {
    $this->db->select("item_code");
    $query = $this->db->get("liquor_day_usage");
  }

    function tableFilterStock($name,$sdate,$ldate)
  {
      $this->db->where("item_name",$name);
      $this->db->where("date BETWEEN '$sdate' AND '$ldate'");
      //$this->db->where("DATE_FORMAT(date, '%Y-%m-%d') >= ","'$sdate'");
      //$this->db->where("DATE_FORMAT(date, '%Y-%m-%d') <  ","'$ldate' + INTERVAL 1 DAY");
      $query = $this->db->get("liquor_day_usage");
      return $query->result();
  }

}

 ?>
