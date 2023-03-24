<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Libraries Template
 *
 * This Libraries for ...
 * 
 * @package		CodeIgniter
 * @category	Libraries
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Template
{
  protected $CI;

  public function __construct()
  {
    $this->CI =& get_instance();
  }

  public function view($directory, $data = null)
  {
    $viewdata = (empty($data)) ? $data : $data;
    $this->CI->load->view("templates/header", $viewdata);
    $this->CI->load->view($directory, $viewdata);
    $this->CI->load->view("templates/footer",$viewdata);
  }
}

/* End of file Template.php */
/* Location: ./application/libraries/Template.php */