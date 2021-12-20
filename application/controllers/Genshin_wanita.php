<?php



defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;

class Genshin_wanita extends RestController {

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
            $list = $this->m_genshin->get_wanita(null,5,$start);
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
            $data = $this->m_genshin->get_wanita($id);
            if($data){
                $this->response(['status'=>true,'data'=> $data],RestController::HTTP_OK);
            } else {
                $this->response(['status'=>false,'data'=>$id .'Data tidak ada'],RestController::HTTP_NOT_FOUND);
            }
            
        }
    }
}