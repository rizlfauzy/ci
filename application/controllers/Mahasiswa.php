<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Mahasiswa
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Mahasiswa extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Mahasiswa_model");
  }

  public function index()
  {
    $data['title'] = "Mahasiswa | Index";
    $data['mahasiswa'] = true;
    $data['list_mahasiswa'] = $this->Mahasiswa_model->getListMahasiswa();
    $this->load->view("templates/header", $data);
    $this->load->view("modals/modal_insert");
    $this->load->view("mahasiswa/index", $data);
    $this->load->view("templates/footer");
  }

  public function detail($id = "")
  {
    $data['title'] = "Mahasiswa | Detail";
    $data['mahasiswa'] = true;
    if ($id == "") return show_404();
    $data['mhs'] = $this->Mahasiswa_model->getMahasiswa($id);
    if ($data['mhs'] == null) return show_404();
    $this->load->view("templates/header", $data);
    $this->load->view("mahasiswa/detail", $data);
    $this->load->view("templates/footer");
  }

  public function get_list_jurusan()
  {
    try {
      echo json_encode([
        "error" => false,
        "message" => "Data jurusan berhasil didapatkan",
        "data" => $this->Mahasiswa_model->getListJurusan()
      ]);
    } catch (\Exception $e) {
      echo json_encode(["error" => true, "message" => $e->getMessage()]);
    }
  }

  public function get_jurusan_by_name($name = "")
  {
    try {
      $jurusan = str_replace('%20', ' ', $name);
      echo json_encode([
        "error" => false,
        "message" => "Data jurusan berhasil didapatkan",
        "data" => $this->Mahasiswa_model->getJurusanByName($jurusan)
      ]);
    } catch (\Exception $e) {
      echo json_encode(["error" => true, "message" => $e->getMessage()]);
    }
  }

  public function insert()
  {
    try {
      $body = $this->input->post();
      if (!filter_var($body['email'], FILTER_VALIDATE_EMAIL)) throw new Exception("Email Tidak Valid !!!");
      $isNrpReady = $this->Mahasiswa_model->isNrpReady($body['nrp']);
      if ($isNrpReady) throw new Exception("NRP sudah digunakan !!!");
      if (!is_numeric($body['nrp'])) throw new Exception("NRP harus berupa angka");
      if (strlen($body['nrp']) < 12) throw new Exception("NRP kurang dari 12 angka !!!");
      $isEmailReady = $this->Mahasiswa_model->isEmailReady($body['email']);
      if ($isEmailReady) throw new Exception("Email sudah digunakan !!!");
      $insert_mahasiswa = $this->Mahasiswa_model->insertMahasiswa($body);
      if ($insert_mahasiswa != 1) throw new Exception("Mahasiswa gagal di input");
      echo json_encode([
        "error" => false,
        "message" => "Mahasiswa berhasil ditambahkan",
        "data" => $this->Mahasiswa_model->getListMahasiswa()
      ]);
    } catch (\Exception $e) {
      echo json_encode(["error" => true, "message" => $e->getMessage()]);
    }
  }
}


/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */