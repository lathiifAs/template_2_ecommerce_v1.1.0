<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_site extends Artdev_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }


    // get current page
    function get_current_page($params) {
        $sql = "SELECT * FROM com_menu 
                WHERE nav_url = ?
                ORDER BY nav_no DESC 
                LIMIT 0, 1";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return false;
        }
    }

    // get user authority by navigation
    function get_user_authority_by_nav($params) {
        $sql = "SELECT DISTINCT b.* FROM com_menu a
                INNER JOIN com_role_menu b ON a.nav_id = b.nav_id
                INNER JOIN com_role c ON b.role_id = c.role_id
                INNER JOIN com_role_user d ON c.role_id = d.role_id
                WHERE d.user_id = ? AND b.nav_id = ? AND active_st = '1'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result['role_tp'];
        } else {
            return false;
        }
    }

    // get navigation by user and parent nav
    function get_navigation_user_by_parent($params) {
        $sql = "SELECT a.* 
                FROM com_menu a
                INNER JOIN com_role_menu b ON a.nav_id = b.nav_id
                INNER JOIN com_role_user c ON b.role_id = c.role_id
                WHERE c.user_id = ? AND parent_id = ?
                AND active_st = '1' AND display_st = '1' AND c.role_display = '1' AND client_st != '1'
                GROUP BY a.nav_id
                ORDER BY nav_no ASC";
        $query = $this->db->query($sql, $params);
        $this->db->last_query();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // get navigation by user and parent nav
    function get_navigation_user_by_parent_client($params) {
        $sql = "SELECT a.* 
                FROM com_menu a
                WHERE parent_id = ? AND active_st = '1' AND display_st = '1' AND a.client_st = '1'
                GROUP BY a.nav_id
                ORDER BY nav_no ASC";
        $query = $this->db->query($sql, $params);
        $this->db->last_query();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_menu_by_id($params) {
        $sql = "SELECT * FROM com_menu WHERE nav_id = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return false;
        }
    }
    

}
