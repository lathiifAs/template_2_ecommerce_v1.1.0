<?php

class M_group extends Artdev_Model {

  //generate id terakhir
  public function get_last_id()
  {
      $sql = "SELECT group_id
              FROM com_group
              ORDER BY group_id DESC
              LIMIT 1";
      $query = $this->db->query($sql);
      if ($query->num_rows() > 0) {
          $result = $query->row_array();
          $query->free_result();
          // create next number
          $number = intval($result['group_id']) + 1;
          if ($number > 9999) {
              return false;
          }
          return $number;
      } else {
          // create new number
          return '1';
      }
  }

    //get all
    public function get_all($number,$offset, $params)
    {
        $this->db->select('*');
        $this->db->from('com_group');
        if (!empty($params)) {
          $this->db->like($params);
        }
        $this->db->limit($number, $offset); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          $result = $query->result_array();
          $query->free_result();
          return $result;
        }
        return array();
    }

    //get by id
    public function get_by_id($group_id)
    {
        $this->db->select('*');
        $this->db->from('com_group');
        $this->db->where('com_group.group_id', $group_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          $result = $query->row_array();
          $query->free_result();
          return $result;
        }
        return array();
    }

    //count all
    public function count_all()
    {
        $this->db->select('*');
        $this->db->from('com_group');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          $result = $query->num_rows();
          return $result;
        }
        return 0;
    }  
    
}