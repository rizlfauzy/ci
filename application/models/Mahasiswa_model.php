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

  public function isNrpReady($nrp = "", $id = "")
  {
    try {
      if (empty($nrp)) throw new Exception("NRP tidak ada");
      if (empty($id)) return $this->db->query("SELECT nrp FROM mahasiswa WHERE nrp='$nrp';")->row();
      return $this->db->query("SELECT nrp FROM mahasiswa WHERE id <> '$id' AND nrp= '$nrp';")->row();
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  public function isEmailReady($email = "", $id = "")
  {
    try {
      if (empty($email)) throw new Exception("Email tidak ada");
      if (empty($id)) return $this->db->query("SELECT email FROM mahasiswa WHERE email='$email';")->row();
      return $this->db->query("SELECT email FROM mahasiswa WHERE id <> '$id' AND email= '$email';")->row();
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  public function insertMahasiswa($data)
  {
    try {
      if (empty($data)) throw new Exception("Data tidak ada");
      list('nama' => $nama, 'email' => $email, 'nrp'=>$nrp,'jurusan'=>$jurusan) = $data;
      $this->db->query("INSERT INTO mahasiswa (name,email,nrp,jurusan) VALUES ('$nama','$email','$nrp','$jurusan')");
      return $this->db->affected_rows();
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  // public function updateMahasiswa($data)
  // {
  //   try {
  //     if (empty($data)) throw new Exception("Data tidak ada");
  //     $this->db->query('UPDATE ' . $this->table . ' SET name = :nama, email = :email, nrp = :nrp, jurusan = :jurusan WHERE id = :id');
  //     $this->db->bind("id", $data['id']);
  //     $this->db->bind("nama", $data['nama']);
  //     $this->db->bind("email", $data['email']);
  //     $this->db->bind("nrp", $data['nrp']);
  //     $this->db->bind("jurusan", $data['jurusan']);
  //     $this->db->execute();
  //     return $this->db->rowCount();
  //   } catch (\Exception $e) {
  //     die($e->getMessage());
  //   }
  // }

  // public function deleteMahasiswa($id = "")
  // {
  //   try {
  //     if (empty($id)) throw new Exception("id tidak ada");
  //     $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id;');
  //     $this->db->bind("id", $id);
  //     $this->db->execute();
  //     return $this->db->rowCount();
  //   } catch (\Exception $e) {
  //     die($e->getMessage());
  //   }
  // }

  // ------------------------------------------------------------------------

}

/* End of file Mahasiswa_model.php */
/* Location: ./application/models/Mahasiswa_model.php */