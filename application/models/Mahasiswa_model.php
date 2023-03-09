<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Mahasiswa_model
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

class Mahasiswa_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function getListMahasiswa()
  {
    try {
      return $this->db->query('SELECT  "id", "name", "email", "nrp", "jurusan" FROM mahasiswa ORDER BY name asc;')->result();
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  public function getMahasiswa($id){
    try {
      $this->db->where("id",$id);
      return $this->db->get("mahasiswa")->row();
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  public function getListJurusan(){
    try{
      return $this->db->query("SELECT id, jurusan FROM jurusan ORDER BY jurusan asc")->result();
    } catch(\Exception $e){
      die($e->getMessage());
    }
  }

  public function getJurusanByName($jurusan){
    try {
      $this->db->where("jurusan ILIKE","%$jurusan%");
      $this->db->order_by("jurusan", "asc");
      return $this->db->get("jurusan")->result();
    } catch(\Exception $e){
      die($e->getMessage());
    }
  }

  // ------------------------------------------------------------------------

}

/* End of file Mahasiswa_model.php */
/* Location: ./application/models/Mahasiswa_model.php */