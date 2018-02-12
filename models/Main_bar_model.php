<?php
class Main_bar_model extends CI_Model
{
  function new_stock_insert($data)
  {
    $this->db->insert("inventory_list",$data);
  }

  function delete()
  {
    $this->db->empty_table('inventory_list');
    $this->db->empty_table('res_products');
    $this->db->empty_table('res_sales');
    $this->db->empty_table('res_history');
    $this->db->empty_table('res_sales_order');
  }

  function newday()
  {
    $this->db->empty_table('beer_day_usage');
    $this->db->empty_table('cigaratte_day_usage');
    $this->db->empty_table('inventory_list_day_usage');
    $this->db->empty_table('liquor_day_usage');
    $this->db->empty_table('soft_drink_day_usage');
 }
  function newmonth()
  {
    $this->db->empty_table('beer_month_usage');
    $this->db->empty_table('cigaratte_month_usage');
    $this->db->empty_table('inventory_list_month_usage');
    $this->db->empty_table('liquor_month_usage');
    $this->db->empty_table('soft_drink_month_usage');

    $this->db->empty_table('beer_day_usage');
    $this->db->empty_table('cigaratte_day_usage');
    $this->db->empty_table('inventory_list_day_usage');
    $this->db->empty_table('liquor_day_usage');
    $this->db->empty_table('soft_drink_day_usage');
  }

}

 ?>
