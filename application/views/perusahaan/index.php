<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Daftar Perusahaan</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">

    <form class="form-inline" action="<?php echo site_url('perusahaan/index/') ?>" method="post">
      <input class="form-control" type="text" name="search" value="" placeholder="Search...">
      <input class="btn btn-default" type="submit" name="filter" value="Cari">
    </form>

    <table class="table table-striped">
      <thead>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Jenis Perusahaan</th>
        <th>
          <a class="btn btn-primary" href="<?php echo site_url('perusahaan/create/') ?>">
            Tambah
          </a>
        </th>
      </thead>
      <?php if(isset($perusahaan)) { ?>
      <tbody>
        <?php foreach($perusahaan as $row) { ?>
        <tr>
          <td><?php echo $start+=1 ?></td>
          <td><?php echo $row->nama ?></td>
          <td><?php echo $row->alamat ?></td>
          <td><?php echo $row->jenis ?></td>
          <td>
            <?php echo form_open('perusahaan/destroy/'.$row->id); ?>
            <a class="btn btn-info" href="<?php echo site_url('perusahaan/edit/'.$row->id) ?>">
              Ubah
            </a>
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ?')">Hapus</button>
            <?php echo form_close() ?>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
<?php echo $links; }else{echo "Tidak Ada Data";} ?>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>
