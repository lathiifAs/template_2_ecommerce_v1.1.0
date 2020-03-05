<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    class Artdev_Model extends CI_Model {

        //update
        public function update($table, $params, $where)
        {
            $this->db->set($params);
            $this->db->where($where);
            return $this->db->update($table);
        }
            
        //insert
        public function insert($table ,$params)
        {
            return $this->db->insert($table, $params);
        }

        //delete
        public function delete($table ,$where)
        {
            $this->db->where($where);
            return $this->db->delete($table);
        }

        
    }

