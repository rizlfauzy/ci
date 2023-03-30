<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Peoples
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

class Peoples extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('template');
    $this->load->model("Peoples_model", "peoples");

    // load pagination
    $this->load->library('pagination');
  }

  public function index()
  {
    $data['title'] = "Peoples | Index";
    $data['peoples'] = true;
    $this->template->view("peoples/index", $data);
  }

  public function get_list_peoples($rows = "")
  {
    try {
      // config
      $config['base_url'] = 'http://localhost/ci/peoples/get_list_peoples';
      $config['total_rows'] = $this->peoples->countAllPeoples();
      $config['per_page'] = '5';

      // initialize
      $this->pagination->initialize($config);

      return $this->output->set_status_header(200)->set_output(
        json_encode([
          "error" => false,
          "message" => "Data peoples berhasil didapatkan",
          "data" => $this->peoples->getPeoples($config['per_page'], $rows),
          "html" => $this->pagination->create_links(),
          "rows" => $rows
        ])
      );
    } catch (\Exception $e) {
      return $this->output->set_status_header(500)->set_output(
        json_encode(["error" => true, "message" => $e->getMessage()])
      );
    }
  }

  public function search($rows = ""){
    try {
      $body = $this->input->post(null,true);
      // config
      $config['base_url'] = 'http://localhost/ci/peoples/search';
      $this->db->where("email ILIKE ","%".$body["search"]."%")->or_where(["name ILIKE "=>"%".$body["search"]."%"])->from('people');
      $config['total_rows'] = $this->db->count_all_results();
      $config['per_page'] = '5';

      // initialize
      $this->pagination->initialize($config);
      return $this->output->set_status_header(200)->set_output(
        json_encode([
          "error" => false,
          "message" => "Peoples berhasil dicari",
          "data" => $this->peoples->searchPeoples($body,$config['per_page'],$rows),
          "html" => $this->pagination->create_links(),
          "rows" => $rows
        ])
      );
    } catch (\Exception $e) {
      return $this->output->set_status_header(500)->set_output(
        json_encode(["error" => true, "message" => $e->getMessage()])
      );
    }
  }
}


/* End of file Peoples.php */
/* Location: ./application/controllers/Peoples.php */