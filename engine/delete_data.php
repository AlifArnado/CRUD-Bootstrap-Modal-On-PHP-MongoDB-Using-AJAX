<?php
    $koneksi    = new Mongo();
    $database   = $koneksi->selectDB('anggota');
    $member     = $database->selectCollection('member');

   $id    = $_GET['id'];
   $delete = $member->remove(array('_id' => new MongoId($id)));
 ?>

 <?php if ($delete == true): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> Anda berhasil menghapus data.
</div>
<?php else: ?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Maaf terjadi kesalahan, data error.
</div>
<?php endif ?>
