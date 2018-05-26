<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenisperusahaan_model extends CI_Model {
    public function list()
    { 
        return $this->db->get('jenisperusahaan')->result(); 
    }
        
    public function insert($data = [])
    { 
        return $this->db->insert('jenisperusahaan', $data); 
    }
        
    public function show($kode)
    {
        $this->db->where('kode', $kode);
        return $this->db->get('jenisperusahaan')->row();
    }
    
    public function update($kode, $data = [])
    {
        // TODO: set data yang akan di update
        // https://www.codeigniter.com/userguide3/database/query_builder.html#updating-data
        $this->db->where('kode', $kode);
        $this->db->update('jenisperusahaan', $data);
        return result;
    }
   
    public function delete($kode)
    {
        // TODO: tambahkan logic penghapusan data
        $this->db->where('kode', $kode);
        $this->db->delete('jenisperusahaan');
    }
}

/* End of file Jenisperusahaan_model.php */