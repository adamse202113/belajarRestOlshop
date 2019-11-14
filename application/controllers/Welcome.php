<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function abc($nama="",$kelas=""){
		$this->load->database();
		echo '{
    "result": [
        {
            "id": "1",
            "nama": "Orion",
            "nomor": "08576666762"
        },
        {
            "id": "2",
            "nama": "Mars",
            "nomor": "08576666770"
        },
        {
            "id": "7",
            "nama": "Alpha",
            "nomor": "08576666765"
        },
        {
            "id": "8",
            "nama": "hhh",
            "nomor": "88888"
        },
        {
            "id": "10",
            "nama": "jaja",
            "nomor": "087777"
        },
        {
            "id": "11",
            "nama": "jaja",
            "nomor": "087777"
        },
        {
            "id": "12",
            "nama": "jaja",
            "nomor": "087777"
        },
        {
            "id": "13",
            "nama": "jaja",
            "nomor": "087777"
        },
        {
            "id": "14",
            "nama": "jaja",
            "nomor": "087777"
        },
        {
            "id": "15",
            "nama": "jaja",
            "nomor": "087777"
        },
        {
            "id": "16",
            "nama": "jaja",
            "nomor": "087777"
        },
        {
            "id": "17",
            "nama": "jaja",
            "nomor": "087777"
        },
        {
            "id": "18",
            "nama": "Izan",
            "nomor": "82828288"
        },
        {
            "id": "19",
            "nama": "jajahh",
            "nomor": "087777"
        },
        {
            "id": "20",
            "nama": "jajahh",
            "nomor": "087777"
        },
        {
            "id": "21",
            "nama": "uuu",
            "nomor": "7777"
        },
        {
            "id": "22",
            "nama": "IzanAaaa",
            "nomor": "8282828899"
        },
        {
            "id": "23",
            "nama": "uuuhhh",
            "nomor": "7777666"
        },
        {
            "id": "24",
            "nama": "uuuhhhjjj",
            "nomor": "7777666"
        },
        {
            "id": "25",
            "nama": "frggfg",
            "nomor": "544444"
        },
        {
            "id": "26",
            "nama": "kokoo",
            "nomor": "717171717"
        },
        {
            "id": "27",
            "nama": "hkgjmhh",
            "nomor": "5757756"
        },
        {
            "id": "28",
            "nama": "bgvjghh",
            "nomor": "6577888"
        }
    ],
    "status": 200,
    "message": "Data Terambil"
}';
		$data['ok'] = $nama;
		$data['wikwik'] = $kelas;

		// $this->db->where('id', '2');
		// $ok = $this->db->get("telepon")->result();

		$ok = $this->db->query("SELECT * FROM telepon");

		foreach ($ok->result() as $key => $val) {
			//echo $ok->num_rows();
			//echo $val->nama."<br>";
		}

		// $this->load->view('test', $data);
	}
}
