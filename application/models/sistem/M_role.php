<?php

class M_role extends Artdev_Model {

  //generate id terakhir
  public function get_last_id()
  {
      $sql = "SELECT role_id
              FROM com_role
              ORDER BY role_id DESC
              LIMIT 1";
      $query = $this->db->query($sql);
      if ($query->num_rows() > 0) {
          $result = $query->row_array();
          $query->free_result();
          // create next number
          $number = intval($result['role_id']) + 1;
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
        $this->db->select('com_role.*, com_group.group_name');
        $this->db->from('com_role');
        $this->db->join('com_group', 'com_role.group_id = com_group.group_id', 'inner');
        if (!empty($params)) {
          $this->db->where($params);
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

    //all role
    public function get_all_group()
    {
        $this->db->select('*');
        $this->db->from('com_group');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          $result = $query->result_array();
          $query->free_result();
          return $result;
        }
        return array();
    }


    //get by id
    public function get_by_id($role_id)
    {
        $this->db->select('com_role.*, com_group.group_name');
        $this->db->from('com_role');
        $this->db->join('com_group', 'com_role.group_id = com_group.group_id', 'inner');
        $this->db->where('com_role.role_id', $role_id);
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
        $this->db->from('com_user');
        $this->db->join('user', 'user.user_id = com_user.user_id', 'left');
        $this->db->join('com_role_user', 'com_role_user.user_id = user.user_id', 'left');
        $this->db->join('com_role', 'com_role_user.role_id = com_role.role_id', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          $result = $query->num_rows();
          return $result;
        }
        return 0;
    }  
    
}