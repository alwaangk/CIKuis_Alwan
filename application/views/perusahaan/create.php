<?php $this->load->view('layouts/base_start') ?>

<div class="container">
    <legend>Tambah Data Perusahaan</legend>
    <div class="col-xs-12 col-sm-12 col-md-12">
    <?php echo form_open('perusahaan/store'); ?>

    <div class="form-group">
        <label for="Nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama"
        pattern="[A-Za-z ]{1,50}" title="Harap diisi dengan huruf"
	        value="<?php echo set_value('nama'); ?>">  
    </div>

    <div class="form-group">
        <label for="Alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat"
    		value="<?php echo set_value('alamat'); ?>">  
    </div>
   
    <div class="form-group">
        <label for="Jenis">Jenis Perusahaan</label>
        <select class="form-control" id="jenis" name="jenis">
      
        <?php foreach($data as $row) { ?>
        <option value="<?php echo $row->kode ?>"><?php echo $row->jenis ?></option>
        <?php } ?>
      
    </select>
    </div>

	<?php echo $error; ?>    

        <a class="btn btn-info" href="<?php echo site_url('perusahaan/') ?>">Kembali</a>
        <button type="submit" class="btn btn-primary">OK</button>
        <?php echo form_close() ?>
    </div>
</div>

<?php $this->load->view('layouts/base_end') ?>