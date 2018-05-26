<?php $this->load->view('layouts/base_start') ?>

<div class="container">
    <legend>Edit Data Jenis Perusahaan</legend>
    <div class="col-xs-12 col-sm-12 col-md-12">
    <?php echo form_open('jenisperusahaan/update/'.$data->kode); ?>

    <?php echo form_hidden('kode', $data->kode) ?>
    
    <div class="form-group">
        <label for="Jenis">Jenis </label>
        <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Masukkan Jenis Perusahaan"
        pattern="[A-Za-z]{1,11}" title="Harap diisi dengan huruf"
        value="<?php echo $data->jenis ?>">
    </div>

    <?php echo $error;?>

    <a class="btn btn-info" href="<?php echo site_url('jenisperusahaan/') ?>">Kembali</a>
     <button type="submit" class="btn btn-primary">OK</button>

     <?php echo form_close(); ?>
    </div>
</div>

<?php $this->load->view('layouts/base_end') ?>