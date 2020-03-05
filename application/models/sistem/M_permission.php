<?php

class M_permission extends Artdev_Model {

//generate id terakhir
  public function get_last_id()
  {
      $sql = "SELECT nav_id
              FROM com_menu
              ORDER BY nav_id DESC
              LIMIT 1";
      $query = $this->db->query($sql);
      if ($query->num_rows() > 0) {
          $result = $query->row_array();
          $query->free_result();
          // create next number
          $number = intval($result['nav_id']) + 1;
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
    public function get_all($limit = array())
    {
        $this->db->select('com_group.group_name, com_role.role_id, com_role.role_nm, com_role.role_desc');
        $this->db->from('com_role');
        $this->db->join('com_group', 'com_group.group_id = com_role.group_id', 'inner join');
        $this->db->limit($limit[0], $limit[1]);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          $result = $query->result_array();
          $query->free_result();
          return $result;
        }
        return array();
    }

    // get detail role by id
    function get_detail_role_by_id($id_role) {
        $sql = "SELECT b.group_name, a.* 
                FROM com_role a
                INNER JOIN com_group b ON a.group_id = b.group_id
                WHERE role_id = ?";
        $query = $this->db->query($sql, $id_role);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // get all menu by parent
    function get_all_menu_selected_by_parent($params) {
      $sql = "SELECT a.*, b.role_id, b.role_tp
              FROM com_menu a
              LEFT JOIN (SELECT * FROM com_role_menu WHERE role_id = ?) b ON a.nav_id = b.nav_id
              WHERE parent_id = ? AND a.client_st = '0'
              ORDER BY nav_no ASC";
      $query = $this->db->query($sql, $params);
      if ($query->num_rows() > 0) {
          $result = $query->result_array();
          $query->free_result();
          return $result;
      } else {
          return array();
      }
    }

    // delete role menu
    function delete_role_menu($params) {
        $sql = "DELETE a.* FROM com_role_menu a
                INNER JOIN com_menu b ON a.nav_id = b.nav_id
                WHERE role_id = ? AND b.client_st = '0'";
        return $this->db->query($sql, $params);
    }

      // insert role menu
    function insert_role_menu($params) {
        $sql = "INSERT INTO com_role_menu (role_id, nav_id, role_tp) VALUES (?, ?, ?)";
        return $this->db->query($sql, $params);
    }

    //count all
    public function count_all()
    {
        $this->db->select('*');
        $this->db->from('com_role_menu');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          $result = $query->num_rows();
          return $result;
        }
        return 0;
    }
    

}