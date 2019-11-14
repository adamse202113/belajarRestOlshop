<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Barang extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    //Menampilkan data kontak
    function index_get($id="") {
        if ($id == "") {
            $cart = $this->db->get('barang')->result();
        } else {
            $this->db->where('id', $id);
            $barang = $this->db->get('barang')->result();
        }
        $this->response(array("result"=>$barang,'status' => 200, 'message' => 'Data Terambil'));
    }

       function index_post() {
        $datacart = array(
                    'id'                => $this->post('id'),
                    'id_barang'         => $this->post('nama'),
                    'nama'              => $this->post('nomor'),
                    'harga'             =>
                    );
        $insert = $this->db->insert('cart', $datacart);
        if ($insert) {
            $this->response(array('status' => 200, 'message' => 'Cart Berhasil Disimpan'));
        } else {
            $this->response(array('status' => 502, 'message' => 'Cart Gagal Disimpan!!!', ));
        }
    }
 


}

?>