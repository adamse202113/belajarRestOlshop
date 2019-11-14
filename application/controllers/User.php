<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class User extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_post() { 
        $data = array(
                    'username'    => $this->post('username'),
                    'password'    => $this->post('password'));

        $this->db->where($data);
        $get = $this->db->get('user');

        if ($get->num_rows()>0) {
            $this->response(array("result"=>$get->result(),'status' => 200, 'message' => 'Login Berhasil'));
        } else {
            $this->response(array('status' => 401, 'message' => 'Login Gagal!!!', ));   
        }

    }

    function regist_post() {
                    
                    $id_user       = $this->post('id_user');
                    $nama          = $this->post('nama');
                    $telepon       = $this->post('telepon');
                    $username      = $this->post('username');
                    $password      = md5($this->post('password'));
                

        $sqlu = $this->db->query("SELECT username FROM user WHERE username = '$username' AND telepon = '$telepon'");
        $cek = $sqlu->num_rows();

        if (!empty($nama) && !empty($telepon) && !empty($username) && !empty($password)) {
                    $data = array(
                    'nama' => $nama,
                    'password' => $password,
                    'username' => $username,
                    'telepon' => $telepon,
                );

        
        if ($cek > 0) {
                $this->response(array('status' => FALSE, 'message' => 'Akun sudah terdaftar'));
        } else {
                        $insert = $this->db->insert('user', $data);
            if ($insert) {

                $this->response(array('status' => TRUE, 'message' => 'Berhasil Daftar', ));
            }
        
        }

    }




    }

}
?>