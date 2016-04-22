<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title></title>
   <link rel="stylesheet" type="text/css" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

   <!-- Optional theme -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
   <!-- Latest compiled and minified JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>
<body>
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3>Simple CRUD Bootstrap Modal On PHP MongoDB Using AJAX</h3>
            <button type="button" class="btn btn-large btn-primary" data-toggle="modal" data-target="#call_modal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Data</button>
         </div>

         <div class="modal fade" id="call_modal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title">Tambah Data</h4>
                  </div>
                  <div class="modal-body">
                     <form>
                        <div class="form-group">
                           <label >NIM</label>
                           <input type="text" class="form-control" id="ni">
                        </div>
                        <div class="form-group">
                           <label >Nama</label>
                           <input type="text" class="form-control" id="nm">
                        </div>
                        <div class="form-group">
                           <label >Nomor Telepon</label>
                           <input type="text" class="form-control" id="nt">
                        </div>
                        <div class="form-group">
                           <label >Jurusan</label>
                           <select name="" id="jr" class="form-control">
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
                     <button type="button" id="save" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <br>
            <br>
            <!-- bagian info -->
            <div id="info"></div>
         </div>
         <!-- view_data -->
         <div id="view_data"></div>
      </div
   </div>
</body>
</html>

<script type="text/javascript">
   view();

   function view() {
      $.get( "engine/tampil_data.php" , function( data ) {
         $( "#view_data" ).html( data );
      });
   }

   $('button#save').click(function(){
      var ni = $('#ni').val();
      var nm = $('#nm').val();
      var nt = $('#nt').val();
      var jr = $('#jr').val();
      var tampung="ni="+ni+"&nm="+nm+"&nt="+nt+"&jr="+jr;
         $.ajax({
            type: "POST",
            url: "engine/tambah.php",
            data: tampung,
         }).done(function ( data ) {
         $('info').html(data);
         view();
      });
   });

   function updatedata(id_data) {
         var id = id_data;
         var ni = $('#ni'+id_data).val();
         var nm = $('#nm'+id_data).val();
         var nt = $('#nt'+id_data).val();
         var jr = $('#jr'+id_data).val();
         var tampung="ni="+ni+"&nm="+nm+"&nt="+nt+"&jr="+jr;
         $.ajax({
            type: "POST",
            url: "engine/edit_data.php?id="+id,
            data: tampung
         }).done(function( data ) {
            $('#info').html(data);
            view();
         });
      }

   function deletedata(id_data) {
      var id = id_data;
      $.ajax({
         type: "GET",
         url: "engine/delete_data.php?id="+id
      }).done(function ( data ) {
         $('#info').html(data);
         view();
      });
   }
</script>
