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
    $this->load->model("Peoples_model");
  }

  public function index()
  {
    $data['title'] = "Peoples | Index";
    $data['peoples'] = true;
    $this->template->view("peoples/index",$data);
  }

}


/* End of file Peoples.php */
/* Location: ./application/controllers/Peoples.php */