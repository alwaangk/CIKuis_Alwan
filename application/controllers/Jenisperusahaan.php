<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jenisperusahaan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data = [ 'jenisperusahaan' => $this->Jenisperusahaan_model->list() ];
        $this->load->view('jenisperusahaan/index', $data);
    }
    public function create()
    {
        $error = array('error' => ' ' );
        $this->load->view('jenisperusahaan/create', $error);
    }
    public function store()
    {
        // Ambil value 
        $jenis = $this->input->post('jenis');
        // Validasi jenis
        $errorval = $this->validate($jenis);
        // Pesan Error atau Upload
        if ($errorval==false)
        {
            
            // Insert data
            $data = [ 'jenis' => $jenis ];
            $result = $this->Jenisperusahaan_model->insert($data);
            
            if ($result)
            {
                redirect(jenisperusahaan);
            }
            else
            {
                $error = array('error' => 'Gagal');
                $this->load->view('jenisperusahaan/create', $error);
            }
        }
        else
        {
            $error = ['error' => validation_errors()];
            $this->load->view('jenisperusahaan/create', $error);
        }
    }
    
    public function edit($kode,$error='')
    {
      // TODO: tampilkan view edit data
        $data = [
            'data' => $this->Jenisperusahaan_model->show($kode),
            'error' => $error
        ];
        $this->load->view('jenisperusahaan/edit', $data);
      
    }
    public function update($id)
    {
        //Ambil Value
        $kode = $this->input->post('kode');
        $jenis = $this->input->post('jenis');
        // Validasi
        $errorval = $this->validate($jenis);
        if ($errorval==false)
        {
            $data = [ 'jenis' => $jenis ];
            $result = $this->Jenisperusahaan_model->update($kode,$data);
            if ($result)
            {
                redirect(jenisperusahaan);
            }
            else
            {
                $data = array('error' => 'Gagal');
                $this->load->view('jenisperusahaan/edit', $data);
            }
        }
        else
        {
            $error = validation_errors();
            $this->edit($kode,$error=' ');
        }
        
    }
    public function destroy($kode)
    {
        $this->Jenisperusahaan_model->delete($kode);
        redirect(jenisperusahaan);
    }
    public function validate($dataval)
    {
        // Validasi Nama dan Jabatan
        $this->form_validation->set_rules('jenis','Jenis','trim|required');
        if (! $this->form_validation->run())
        { return true; }
        else
        { return false; }
    } 
}