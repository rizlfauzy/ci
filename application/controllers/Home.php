<?php 

class Home extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
  }

  public function index(){
    $data['title'] = "Home | Index";
    $data['home'] = true;

    $this->load->view('templates/header',$data);
    $this->load->view('modals/modal_insert',$data);
    $this->load->view('home/index',$data);
    $this->load->view('templates/footer',$data);
  }
}

?>