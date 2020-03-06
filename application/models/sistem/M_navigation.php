<?php

class M_navigation extends Artdev_Model {

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
        $this->db->select('*');
        $this->db->from('com_menu');
        $this->db->order_by('nav_id', 'ASC');
        $this->db->order_by('parent_id', 'ASC');
        $this->db->order_by('nav_no', 'ASC');
        if (!empty($limit[2])) {
          $this->db->where($limit[2]);
        }
        $this->db->limit($limit[0], $limit[1]);
        $query = $this->db->get();
        // echo "<pre>"; echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
          $result = $query->result_array();
          $query->free_result();
          return $result;
        }
        return array();
    }

        //get all menu
        public function get_all_menu()
        {
            $this->db->select('*');
            $this->db->from('com_menu');
            $this->db->order_by('nav_id', 'ASC');
            $this->db->order_by('nav_no', 'ASC');
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
              $result = $query->result_array();
              $query->free_result();
              return $result;
            }
            return array();
        }


    //get by id
    public function get_by_id($nav_id)
    {
        $this->db->select('*');
        $this->db->from('com_menu');
        $this->db->where('nav_id', $nav_id);
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
        $this->db->from('com_menu');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          $result = $query->num_rows();
          return $result;
        }
        return 0;
    }
  
    
}