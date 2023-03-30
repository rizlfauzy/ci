<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Peoples_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Peoples_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function getListPeoples()
  {
    try {
      return $this->db->get('people')->result();
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  public function getPeoples($limit, $start)
  {
    try {
      return $this->db->get('people', $limit, $start)->result();
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  public function countAllPeoples()
  {
    try {
      return $this->db->count_all_results('people');
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  public function searchPeoples($data, $limit, $start){
    try {
      return $this->db->where("email ILIKE ","%".$data["search"]."%")->or_where(["name ILIKE "=>"%".$data["search"]."%"])->get("people", $limit, $start)->result();
    }catch(\Exception $e){
      die($e->getMessage());
    }
  }
}

/* End of file Peoples_model.php */
/* Location: ./application/models/Peoples_model.php */