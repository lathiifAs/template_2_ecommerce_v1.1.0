<?php

class M_dashboard extends Artdev_Model {

    public function total_user()
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

    public function total_anggota_bisnis()
      {
        $this->db->select('a.*');
        $this->db->from('transaksi_bisnis as a');
        $this->db->join('user as b', 'a.user_id = b.user_id', 'left');
        $this->db->where('a.status_transfer', 'diverifikasi');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          $result = $query->num_rows();
          return $result;
        }
        return 0;
    }

    public function total_transaksi()
    {
      $this->db->select('a.*');
      $this->db->from('transaksi as a');
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        $result = $query->num_rows();
        return $result;
      }
      return 0;
  }

  public function total_transaksi_selesai()
  {
    $this->db->select('a.*');
    $this->db->from('transaksi as a');
    $this->db->where('a.transaksi_st', 'dikirim');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      $result = $query->num_rows();
      return $result;
    }
    return 0;
  }

  public function c_pendaftar_bisnis()
  {
    $this->db->select('COUNT(*) as total, MONTH(a.verifikasi_date) as bulan');
    $this->db->from('transaksi_bisnis as a');
    $this->db->join('user as b', 'a.user_id = b.user_id', 'left');
    $this->db->where('a.status_transfer', 'diverifikasi');
    $this->db->group_by('MONTH(a.verifikasi_date)');
    $query = $this->db->get();
    // echo "<pre>";echo $this->db->last_query();exit;
    if ($query->num_rows() > 0) {
      $result = $query->result_array();
      $query->free_result();
      return $result;
    }
    return 0;
  }

  public function c_pembelian_berhasil()
  {
    $this->db->select('COUNT(*) as total, MONTH(a.mdd) as bulan');
    $this->db->from('transaksi as a');
    $this->db->where('a.transaksi_st', 'dikirim');
    $this->db->group_by('MONTH(a.mdd)');
    $query = $this->db->get();
    // echo "<pre>";echo $this->db->last_query();exit;
    if ($query->num_rows() > 0) {
      $result = $query->result_array();
      $query->free_result();
      return $result;
    }
    return 0;
  }
  
    
}