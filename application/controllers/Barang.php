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
            $barang = $this->db->get('barang')->result();
        } else {
            $this->db->where('id', $id);
            $barang = $this->db->get('barang')->result();
        }
        $this->response(array("result"=>$barang,'status' => 200, 'message' => 'Data Terambil'));
    }


}

?>