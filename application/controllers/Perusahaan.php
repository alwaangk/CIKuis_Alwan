<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class perusahaan extends CI_Controller {
    public function __construct()
    { parent::__construct(); }
    public function index()
    {

        if($this->uri->segment(3))
        { $search=$this->uri->segment(3); }
        else
        {
            if($this->input->post("search"))
            { $search = $this->input->post("search"); }
            else
            { $search = 'null'; }
        }
        $data = [];
        $total = $this->Perusahaan_model->getTotal($search);
        if ($total > 0)
        {
            $limit = 4;
            $start = $this->uri->segment(4,0);
            $config = [
                'base_url' => base_url().'perusahaan/index/'.$search,
                'total_rows' => $total,
                'per_page' => $limit,
                'uri_segment' => 4,
                // Bootstrap 3 Pagination
                'first_link' => '&laquo;',
                'last_link' => '&raquo;',
                'next_link' => 'Next',
                'prev_link' => 'Prev',
                'full_tag_open' => '<ul class="pagination">',
                'full_tag_close' => '</ul>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>',
                'cur_tag_open' => '<li class="active"><span>',
                'cur_tag_close' => '<span class="sr-only">(current)</span></span></li>',
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'first_tag_open' => '<li>',
                'first_tag_close' => '</li>',
                'last_tag_open' => '<li>',
                'last_tag_close' => '</li>',
            ];
            $this->pagination->initialize($config);
            $data = [
                'perusahaan' => $this->Perusahaan_model->list($limit, $start, $search),
                'start' => $start,
                'links' => $this->pagination->create_links()
            ];
        }
        $this->load->view('perusahaan/index', $data);
    }
    public function create($error='')
    {
        $data = [
            'error' => $error,
            'data' => $this->Jenisperusahaan_model->list()
        ];
        $this->load->view('perusahaan/create', $data);
    }
    
    public function store()
    {
        // Ambil value 
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $kode = $this->input->post('jenis');
        // Validasi
        $dataval = [
            'nama' => $nama,
            'alamat' => $alamat
        ];
        $errorval = $this->validate($dataval);
        // Pesan Error atau Upload
        if ($errorval==false)
        {
            
            // Insert data
            $data = [
                'nama' => $nama,
                'alamat' => $alamat,
                'kode' => $kode
                ];
            $result = $this->Perusahaan_model->insert($data);
            
            if ($result)
            {
                redirect('perusahaan');
            }
            else
            {
                $error = array('error' => 'Gagal');
                $this->load->view('perusahaan/create', $error);
            }
            
        }
        else
        {
            $error = validation_errors();
            $this->create($error);
        }
    }
    public function edit($id,$error='')
    {
      // TODO: tampilkan view edit data
        $data = [
            'perusahaan' => $this->Perusahaan_model->show($id),
            'jenis' => $this->Jenisperusahaan_model->list(),
            'error' => $error
        ];
        $this->load->view('perusahaan/edit', $data);
      
    }
    public function update($id)
    {
        //Ambil Value
        $id=$this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $kode = $this->input->post('jenis');
        // Validasi Nama dan perusahaan
        $dataval = [
            'nama' => $nama,
            'alamat' => $alamat
            ];
        $errorval = $this->validate($dataval);
        if ($errorval==false)
        {
           
            $data = [
                'nama' => $nama,
                'alamat' => $alamat,
                'kode' => $kode
                ];
            $result = $this->Perusahaan_model->update($id,$data);
            if ($result)
            {
                redirect('perusahaan');
            }
            else
            {
                $data = array('error' => 'Gagal');
                $this->load->view('perusahaan/edit', $data);
            }
        }
        else
        {
            $error = validation_errors();
            $this->edit($id,$error);
        }
    }
    public function destroy($id)
    {
        $this->Perusahaan_model->delete($id);
        redirect('perusahaan');
    }
    public function validate($dataval)
    {
        $this->form_validation->set_rules('nama','Nama','trim|required');
        $this->form_validation->set_rules('alamat','Tahun','trim|required');
        if (! $this->form_validation->run())
        { return true; }
        else
        { return false; }
    }
}
/* End of file Controllername.php */