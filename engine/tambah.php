<?php
   $koneksi    = new Mongo();
   $database   = $koneksi->selectDB('anggota');
   $member   = $database->selectCollection('member');
   // generate tanggal daftar
      $tgl_daftar = date('d / M / Y');

   // terima data
   $ni = $_POST['ni'];
   $nm = $_POST['nm'];
   $nt = $_POST['nt'];
   $jr = $_POST['jr'];

               $data_member = array (
                    "nim"              => $ni,
                    "nama"             => $nm,
                    "jurusan"          => $jr,
                    "nomor_handphone"  => $nt,
                    "tgl_daftar"       => $tgl_daftar
               );
   $insert = $member->insert($data_member);
 ?>

<?php if ($insert == true): ?>
   <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> Anda berhasil menambah data.
</div>
<?php else: ?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Maaf terjadi kesalahan, data error.
</div>
<?php endif ?>
