<?php
   $koneksi    = new Mongo();
   $database   = $koneksi->selectDB('anggota');
   $member   = $database->selectCollection('member');

   $query = $member->find();
   $nomor = 1;
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
</head>
<body>
    <div class="container-fluid">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
            <table class="table table-hover">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>NIM</th>
                     <th>Nama Mahasiswa</th>
                     <th>Jurusan</th>
                     <th>Nomor Handphone</th>
                     <th>Tanggal Daftar</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($query as $key => $value): ?>
                     <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $value['nim']; ?></td>
                        <td><?php echo $value['nama']; ?></td>
                        <td><?php echo $value['jurusan']; ?></td>
                        <td><?php echo $value['nomor_handphone']; ?></td>
                        <td><?php echo $value['tgl_daftar']; ?></td>
                        <td>
                           <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $value['_id']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>

                           <a class="btn btn-danger btn-sm" onclick="deletedata('<?php echo $value['_id']; ?>')"  ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                        </td>

                    <div class="modal fade" id="myModal<?php echo $value['_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $value['_id']; ?>" aria-hidden="true">
                          <div class="modal-dialog">
                             <div class="modal-content">
                                <div class="modal-header">
                                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                   <h4 class="modal-title" id="myModalLabel<?php echo $value['_id']; ?>">Edit Data</h4>
                                </div>
                                <div class="modal-body">
                                   <form>
                                      <div class="form-group">
                                         <label >NIM</label>
                                         <input type="text" class="form-control" id="ni<?php echo $value['_id']; ?>" value="<?php echo $value['nim']; ?>">
                                      </div>
                                      <div class="form-group">
                                         <label >Nama</label>
                                         <input type="text" class="form-control" id="nm<?php echo $value['_id']; ?>" value="<?php echo $value['nama']; ?>">
                                      </div>

                                      <div class="form-group">
                                         <label >Nomor Telepon</label>
                                         <input type="text" class="form-control" id="nt<?php echo $value['_id']; ?>" value="<?php echo $value['nomor_handphone']; ?>">
                                      </div>
                                      <div class="form-group">
                                          <label >Jurusan</label>
                                          <select name="" id="jr<?php echo $value['_id']; ?>" class="form-control">
                                             <option value="Teknik Informatika">Teknik Informatika</option>
                                             <option value="Sistem Informasi">Sistem Informasi</option>
                                             <option value="Komputer Akutansi">Komputer Akutansi</option>
                                             <option value="Menejemen Informatika">Menajemen Informatika</option>
                                          </select>
                                       </div>
                                   </form>
                                </div>
                                <div class="modal-footer">
                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                   <button type="button" onclick="updatedata('<?php echo $value['_id']; ?>')" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                                </div>
                             </div>
                          </div>
                       </div> <!-- end bagian modal add data -->


                     </tr> <!-- end tr bagian atas -->
                  <?php endforeach ?>
               </tbody>
            </table>
         </div>
        </div>
    </div>
</body>
</html>
