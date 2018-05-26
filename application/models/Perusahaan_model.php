<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Perusahaan_model extends CI_Model {
    public function getTotal($search='')
    {
        $this->db->select('*');
        $this->db->join('jenisperusahaan', 'jenisperusahaan.kode=perusahaan.kode');
        
        if ($search != 'null')
        { 
            $this->db->like('nama',$search); 
            $this->db->or_like('alamat',$search);
            $this->db->or_like('jenis',$search);

        }
        return $this->db->count_all_results('perusahaan');
    }
    
    public function list($limit, $start, $search='')
    {
        $this->db->select('*');
        $this->db->join('jenisperusahaan', 'jenisperusahaan.kode=perusahaan.kode');
        
        if ($search != 'null')
        { 
            $this->db->like('nama',$search);
            $this->db->or_like('alamat',$search);
            $this->db->or_like('jenis',$search);
        }
        
        $query = $this->db->get('perusahaan', $limit, $start);
        return ($query->num_rows() > 0) ? $query->result() : false;
    }
    
    public function insert($data = [])
    { 
        return $this->db->insert('perusahaan', $data); 
    }
    
    public function show($id)
    {
        $this->db->select('*');
        $this->db->from('perusahaan'); 
        $this->db->join('jenisperusahaan', 'perusahaan.kode=jenisperusahaan.kode');
        $this->db->where('id',$id);     
        return $this->db->get()->row();
    }
    
    public function update($id, $data = [])
    {
        // TODO: set data yang akan di update
        // https://www.codeigniter.com/userguide3/database/query_builder.html#updating-data
        $this->db->where('id', $id);
        $this->db->update('perusahaan', $data);
        return result;
    }
    
    public function delete($id)
    {
        // TODO: tambahkan logic penghapusan data
        $this->db->where('id', $id);
        $this->db->delete('perusahaan');
    }
}
/* End of file ModelName.php */