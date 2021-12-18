<?php
defined('BASEPATH') or exit('No direct script access allowed');


class m_genshin extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function get($id = null, $limit = 5, $offset =0)
  {
    if ($id === null){
      return $this->db->get('char_genshin', $limit,$offset)->result();
    }
    else{
      return $this->db->get_where('char_genshin',['Nama' => $id])->result_array();
    }
  }

  public function count()
  {
      return $this->db->get('char_genshin')->num_rows();
    
  }

  public function add($data)
  {
      try {
        $this->db->insert('char_genshin', $data);
        $error = $this->db->error();
        if (!empty($error['code'])) {
          throw new Exception('Terjadi kesalahan: ' . $error['message']);
          return false;
        }
        return ['status' => true, 'data' => $this->db->affected_rows()];
      } catch (Exception $ex) {
        return ['status' => false, 'msg' => $ex->getMessage()];
      }
  }

  public function update($id, $data)
  {
    try {
      $this->db->update('char_genshin', $data, ['id' => $id]);
      $error = $this->db->error();
      if (!empty($error['code'])) {
        throw new Exception('Terjadi kesalahan: ' . $error['message']);
        return false;
      }
      return ['status' => true, 'data' => $this->db->affected_rows()];
    } catch (Exception $ex) {
      return ['status' => false, 'msg' => $ex->getMessage()];
    }
  }

  public function delete($id)
  {
    try {
      $this->db->delete('char_genshin', ['id' => $id]);
      $error = $this->db->error();
      if (!empty($error['code'])) {
        throw new Exception('Terjadi kesalahan: ' . $error['message']);
        return false;
      }
      return ['status' => true, 'data' => $this->db->affected_rows()];
    } catch (Exception $ex) {
      return ['status' => false, 'msg' => $ex->getMessage()];
    }
  }
     
}

/* End of file Mahasiswa_model.php */
/* Location: ./application/models/Mahasiswa_model.php */