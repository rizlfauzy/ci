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
    $this->load->library('form_validation');
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
      return $this->output->set_status_header(200)->set_output(
        json_encode([
          "error" => false,
          "message" => "Data jurusan berhasil didapatkan",
          "data" => $this->Mahasiswa_model->getListJurusan()
        ])
      );
    } catch (\Exception $e) {
      return $this->output->set_status_header(500)->set_output(
        json_encode(["error" => true, "message" => $e->getMessage()])
      );
    }
  }

  public function get_jurusan_by_name($name = "")
  {
    try {
      $jurusan = str_replace('%20', ' ', $name);
      return $this->output->set_status_header(200)->set_output(
        json_encode([
          "error" => false,
          "message" => "Data jurusan berhasil didapatkan",
          "data" => $this->Mahasiswa_model->getJurusanByName($jurusan)
        ])
        );
    } catch (\Exception $e) {
      return $this->output->set_status_header(500)->set_output(
        json_encode(["error" => true, "message" => $e->getMessage()])
      );
    }
  }

  public function insert()
  {
    try {
      function body($post = null){
        $ci =& get_instance();
        return $ci->input->post($post,true);
      }
      $this->form_validation->set_rules([
        [
          'field' => 'nama',
          'label' => 'Nama',
          'rules' => 'required|trim',
          'errors' => [
            'required' => '%s harus diisi !!!'
          ]
        ],
        [
          'field' => 'nrp',
          'label' => 'NRP',
          'rules' => 'required|numeric|trim',
          'errors' => [
            'required' => '%s harus diisi !!!',
            'numeric'=>"%s harus berupa angka"
          ]
        ],
        [
          'field' => 'email',
          'label' => 'Email',
          'rules' => 'required|valid_email|trim',
          'errors' => [
            'required' => '%s harus diisi !!!',
            'valid_email' => 'Email tidak valid !!!'
          ]
          ],
          [
            'field' => 'jurusan',
            'label' => 'Jurusan',
            'rules' => 'required|trim',
            'errors' => [
              'required' => '%s harus diisi !!!'
            ]
          ]
      ]);
      if (!$this->form_validation->run()) throw new Exception("<div class='flex flex-col items-start ml-3'>".validation_errors()."</div>");
      if (strlen(body('nrp')) < 12) throw new Exception("NRP kurang dari 12 angka !!!");
      $isNrpReady = $this->Mahasiswa_model->isNrpReady(body('nrp'));
      if ($isNrpReady) throw new Exception("NRP sudah digunakan !!!");
      $isEmailReady = $this->Mahasiswa_model->isEmailReady(body('email'));
      if ($isEmailReady) throw new Exception("Email sudah digunakan !!!");
      $insert_mahasiswa = $this->Mahasiswa_model->insertMahasiswa(body());
      if ($insert_mahasiswa != 1) throw new Exception("Mahasiswa gagal diinput");
      return $this->output->set_status_header(200)->set_output(
        json_encode([
          "error" => false,
          "message" => "Mahasiswa berhasil ditambahkan",
          "data" => $this->Mahasiswa_model->getListMahasiswa()
        ])
      );
    } catch (\Exception $e) {
      return $this->output->set_status_header(500)->set_output(
        json_encode(["error" => true, "message" => $e->getMessage()])
      );
    }
  }

  public function delete($id){
    try {
      if (empty($id)) throw new Exception("Id tidak boleh kosong");
      $delete_mhs = $this->Mahasiswa_model->deleteMahasiswa($id);
      if ($delete_mhs != 1) throw new Exception("Mahasiswa gagal dihapus");
      return $this->output->set_status_header(200)->set_output(
        json_encode([
          "error" => false,
          "message" => "Mahasiswa berhasil dihapus",
          "data" => $this->Mahasiswa_model->getListMahasiswa()
        ])
      );
    } catch (\Exception $e) {
      return $this->output->set_status_header(500)->set_output(
        json_encode(["error" => true, "message" => $e->getMessage()])
      );
    }
  }

  public function get_mahasiswa_by_id($id)
  {
    try {
      if (empty($id)) throw new Exception("Id tidak boleh kosong");
      $mhs = $this->Mahasiswa_model->getMahasiswa($id);
      if (!$mhs) throw new Exception(("Mahasiswa dengan id tersebut tidak tersedia !!!"));
      return $this->output->set_status_header(200)->set_output(
        json_encode([
          "error" => false,
          "message" => "data mahasiswa berhasil didapatkan",
          "data" => $mhs
        ])
      );
    } catch (\Exception $e) {
      return $this->output->set_status_header(500)->set_output(
        json_encode(["error" => true, "message" => $e->getMessage()])
      );
    }
  }

  public function update()
  {
    try {
      $body = $this->input->post(null,true);
      $this->form_validation->set_rules([
        [
          'field' => 'nama',
          'label' => 'Nama',
          'rules' => 'required|trim',
          'errors' => [
            'required' => '%s harus diisi !!!'
          ]
        ],
        [
          'field' => 'nrp',
          'label' => 'NRP',
          'rules' => 'required|numeric|trim',
          'errors' => [
            'required' => '%s harus diisi !!!',
            'numeric'=>"%s harus berupa angka"
          ]
        ],
        [
          'field' => 'email',
          'label' => 'Email',
          'rules' => 'required|valid_email|trim',
          'errors' => [
            'required' => '%s harus diisi !!!',
            'valid_email' => 'Email tidak valid !!!'
          ]
          ],
          [
            'field' => 'jurusan',
            'label' => 'Jurusan',
            'rules' => 'required|trim',
            'errors' => [
              'required' => '%s harus diisi !!!'
            ]
          ]
      ]);
      if (!$this->form_validation->run()) throw new Exception("<div class='flex flex-col items-start ml-3'>".validation_errors()."</div>");
      if (strlen($body['nrp']) < 12) throw new Exception("NRP kurang dari 12 angka !!!");
      $isNrpReady = $this->Mahasiswa_model->isNrpReady($body['nrp'],$body['id']);
      if ($isNrpReady) throw new Exception("NRP sudah digunakan !!!");
      $isEmailReady = $this->Mahasiswa_model->isEmailReady($body['email'],$body['id']);
      if ($isEmailReady) throw new Exception("Email sudah digunakan !!!");
      $updateMahasiswa = $this->Mahasiswa_model->updateMahasiswa($body);
      if ($updateMahasiswa < 1) throw new Exception("Data gagal terinput");
      return $this->output->set_status_header(200)->set_output(
        json_encode([
          "error" => false,
          "message" => "Mahasiswa berhasil diubah",
          "data" => $this->Mahasiswa_model->getListMahasiswa()
        ])
      );
    } catch (\Exception $e) {
      return $this->output->set_status_header(500)->set_output(
        json_encode(["error" => true, "message" => $e->getMessage()])
      );
    }
  }

  public function search(){
    try {
      $body = $this->input->post(null,true);
      return $this->output->set_status_header(200)->set_output(
        json_encode([
          "error" => false,
          "message" => "Mahasiswa berhasil dicari",
          "data" => $this->Mahasiswa_model->searchMahasiswa($body)
        ])
      );
    } catch (\Exception $e) {
      return $this->output->set_status_header(500)->set_output(
        json_encode(["error" => true, "message" => $e->getMessage()])
      );
    }
  }
}


/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */