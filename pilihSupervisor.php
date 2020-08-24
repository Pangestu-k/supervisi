<?php 

// ini untuk menyembunyikan error
error_reporting(0);

// ini untuk mengkoneksikan database
include "config/koneksi.php";

// ini sintaks mengubah simpan menjadi update
if (isset($_GET['edit'])) {
  $result = mysqli_query($con,"SELECT * FROM tb_user WHERE id_user ='$_GET[id]' ");
  // index id adalah variable yang dibuat button edit dibawah bisa diganti apa saja
   $isi = mysqli_fetch_array($result);
}

// sintaks ini untuk mengedit data
if(isset($_POST['update'])){
  $update = "UPDATE tb_user SET username='$_POST[username]',akses='$_POST[akses]' WHERE id_user = '$_GET[id]'";
  $sql = mysqli_query($con,$update);
  if ($sql) {
    echo "<script>alert('Data supervisor Telah Berhasil Di Update');document.location.href='?menu=pilihSupervisor'</script>";
  }else{
    echo "<script>alert('Data supervisor Gagal Di Update');document.location.href='?menu=pilihSupervisor'</script>";
  }
}


// sintaks untuk tombol clear
if (isset($_POST['clear'])) {
  echo "<script>alert('Data Dibersihkan');document.location.href='?menu=inputRpp'</script>";
}else{
  mysqli_error($con);
}

 ?>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form RPP</h6>
            </div> 

            <div class="card-body">

            <form method="post">

           <div class="form-group">
                <div class="row">
                  <div class="col">
                    <input type="text" name="username" class="form-control" placeholder="Nama Guru" value="<?php echo $isi['username']; ?>" readonly>
                    </div>
                    <div class="col">
                    <input type="text" name="akses" class="form-control" placeholder="akses" value="<?php echo "supervisor" ?>" readonly>
                    </div>
                </div>
            </div>

              <td><input type="submit" class="btn btn-warning" name="update" value="UPDATE"></td>


              <button class="btn btn-secondary" name="clear">Clear</button>
            </form>
            
            <br><br>
              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Guru</th>
                      <th>Nama Guru</th>
                      <th>akses</th>
                      <th style="text-align: center;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $sql = mysqli_query($con,"SELECT * FROM tb_user WHERE akses= 'guru'");
                      while($r=mysqli_fetch_array($sql)) :
                     ?>
                    <tr>
                      <td><?= $r['id_user'] ?></td>
                      <td><?= $r['username'] ?></td>
                      <td><?= $r['akses'] ?></td>
                     <td><a class="btn btn-success" href="?menu=pilihSupervisor&edit&id=<?= $r['id_user'] ?>">Edit</a></td>
                    </tr>
                  <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>



  
