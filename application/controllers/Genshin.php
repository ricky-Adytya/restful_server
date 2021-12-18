<?php



defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;

class Genshin extends RestController {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('m_genshin');
        
    }

    public function index_get()
    {
        $id = $this->get('Nama');
        if ($id === null){
            $p = $this->get('page');
            $p = (empty($p)? 1 : $p);
            $total_data=$this->m_genshin->count();
            $total_page = ceil($total_data /5);
            $start = ($p - 1)*5;
            $list = $this->m_genshin->get(null,5,$start);
            if ($list) {
            $data = [
                'status'=> true,
                'page'=>$p,
                'total_data'=>$total_data,
                'total_page'=>$total_page,
                'data' => $list
            ];
            } else{
             $data = [
                'status' => false,
                'msg' => 'Data tidak ditemukan'
              ];
            }
            $this->response( $data,RestController::HTTP_OK);
        } else {
            $data = $this->m_genshin->get($id);
            if($data){
                $this->response(['status'=>true,'data'=> $data],RestController::HTTP_OK);
            } else {
                $this->response(['status'=>false,'data'=>$id .'Data tidak ada'],RestController::HTTP_NOT_FOUND);
            }
            
        }
    }
    public function index_post()
    {
      $data = [
        'id' => $this->post('id', true),
        'Nama' => $this->post('Nama', true),
        'Kelangkaan' => $this->post('Kelangkaan', true),
        'Elemen' => $this->post('Elemen', true),
        'Senjata' => $this->post('Senjata', true),
        'Wilayah' => $this->post('Wilayah', true),
        'Gender' => $this->post('Gender', true),
        'url_char' => $this->post('url_char', true)
      ];
      $simpan = $this->m_genshin->add($data);
      if ($simpan['status']) {
        $this->response(['status' => true, 'msg' => $simpan['data'] . ' Data telah ditambahkan'], RestController::HTTP_CREATED);
      } else {
        $this->response(['status' => false, 'msg' => $simpan['msg']], RestController::HTTP_INTERNAL_ERROR);
      }
    }

    public function index_put()
    {
        $data = [
            'id' => $this->put('id', true),
            'Nama' => $this->put('Nama', true),
            'Kelangkaan' => $this->put('Kelangkaan', true),
            'Elemen' => $this->put('Elemen', true),
            'Senjata' => $this->put('Senjata', true),
            'Wilayah' => $this->put('Wilayah', true),
            'Gender' => $this->put('Gender', true),
            'url_char' => $this->put('url_char', true)
          ];
      $id = $this->put('id', true);
      if ($id === null) {
        $this->response(['status' => false, 'msg' => 'Masukkan id yang akan dirubah'], RestController::HTTP_BAD_REQUEST);
      }
      $simpan = $this->m_genshin->update($id, $data);
      if ($simpan['status']) {
        $status = (int)$simpan['data'];
        if ($status > 0)
          $this->response(['status' => true, 'msg' => $simpan['data'] . ' Data telah dirubah'], RestController::HTTP_OK);
        else
          $this->response(['status' => false, 'msg' => 'Tidak ada data yang dirubah'], RestController::HTTP_BAD_REQUEST);
      } else {
        $this->response(['status' => false, 'msg' => $simpan['msg']], RestController::HTTP_INTERNAL_ERROR);
      }
    }

    public function index_delete()
  {
    $id = $this->delete('id', true);
    if ($id === null) {
      $this->response(['status' => false, 'msg' => 'Masukkan NIM yang akan dihapus'], RestController::HTTP_BAD_REQUEST);
    }
    $delete = $this->m_genshin->delete($id);
    if ($delete['status']) {
      $status = (int)$delete['data'];
      if ($status > 0)
        $this->response(['status' => true, 'msg' => $id . ' data telah dihapus'], RestController::HTTP_OK);
      else
        $this->response(['status' => false, 'msg' => 'Tidak ada data yang dihapus'], RestController::HTTP_BAD_REQUEST);
    } else {
      $this->response(['status' => false, 'msg' => $delete['msg']], RestController::HTTP_INTERNAL_ERROR);
    }
  }

    
}
