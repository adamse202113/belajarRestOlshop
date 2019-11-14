<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Kontak extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    //Menampilkan data kontak
    function index_get($id="") {
        if ($id == "") {
            $kontak = $this->db->get('telepon')->result();
        } else {
            $this->db->where('id', $id);
            $kontak = $this->db->get('telepon')->result();
        }
        $this->response(array("result"=>$kontak,'status' => 200, 'message' => 'Data Terambil'));
    }

    //Mengirim atau menambah data kontak baru
    function index_post() {
        $data = array(
                    'id' => $this->post('id'),
                    'nama'          => $this->post('nama'),
                    'nomor'    => $this->post('nomor'));
        $insert = $this->db->insert('telepon', $data);
        if ($insert) {
            $this->response(array('status' => 200, 'message' => 'Kontak Berhasil Disimpan'));
        } else {
            $this->response(array('status' => 502, 'message' => 'Kontak Gagal Disimpan!!!', ));
        }
    }

    //Memperbarui data kontak yang telah ada
    function index_put() {
        $id = $this->put('id');
        $data = array(
                    'id'       => $this->put('id'),
                    'nama'          => $this->put('nama'),
                    'nomor'    => $this->put('nomor'));
        $this->db->where('id', $id);
        $update = $this->db->update('telepon', $data);
        if ($update) {
            $this->response(array('status' => 200, 'message' => 'Kontak Berhasil Diubah'));
        } else {
            $this->response(array('status' => 502, 'message' => 'Kontak Gagal Diubah!!!'));
        }
    }

    //Menghapus salah satu data kontak
    function index_delete() {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('telepon');
        if ($delete) {
            $this->response(array('status' => 200, 'message' => 'Kontak Berhasil Dihapus'));
        } else {
            $this->response(array('status' => 502, 'message' => 'Kontak Gagal Dihapus!!!'));
        }
    }

}
?>