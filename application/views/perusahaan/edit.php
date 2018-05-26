<?php $this->load->view('layouts/base_start') ?>

<div class="container">
    <legend>Edit Perusahaan </legend>
    <div class="col-xs-12 col-sm-12 col-md-12">
    <?php echo form_open('perusahaan/update/'.$perusahaan->id); ?>

    <?php echo form_hidden('id', $perusahaan->id) ?>

    <div class="form-group">
        <label for="Nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama"
        pattern="[A-Za-z ]{1,50}" title="Harap diisi dengan huruf"
        value="<?php echo $perusahaan->nama ?>">
    </div>

    <div class="form-group">
        <label for="Alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat"
		    value="<?php echo $perusahaan->alamat ?>">  
    </div>

  	<div class="form-group">
        <label for="Jenis">Jenis Perusahaan</label>
        <select class="form-control" id="jenis" name="jenis">
      
        <?php
        foreach($jenis as $rowjenis) {
          $s='';
            if($perusahaan->kode == $rowjenis->kode)
            { $s='selected'; }
        ?>

        <option value="<?php echo $rowjenis->kode ?>" <?php echo $s ?>>
          <?php echo $rowjenis->jenis ?>
        </option>

        <?php } ?>
      
      </select>
    </div>

    <?php echo $error;?>

    <a class="btn btn-info" href="<?php echo site_url('/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>

  <?php echo form_close(); ?>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>