<?php 
// ini untuk menyembunyikan error
error_reporting(0);

// ini untuk mengkoneksikan database
include "config/koneksi.php";

// ini sintaks mengubah simpan menjadi update
if (isset($_GET['edit'])) {
  $result = mysqli_query($con,"SELECT * FROM tbl_rpp WHERE id_rpp ='$_GET[id]' ");
  // index id adalah variable yang dibuat button edit dibawah bisa diganti apa saja
   $isi = mysqli_fetch_array($result);
}

// sintaks ini untuk mengedit data
if(isset($_POST['update'])){
  $update = "UPDATE tbl_rpp SET nama_guru='$_POST[nama_guru]',keterangan='$_POST[keterangan]',tanggal='$_POST[tanggal]',filerpp='$_POST[filerpp]' WHERE id_rpp = '$_GET[id]'";
  $sql = mysqli_query($con,$update);
  if ($sql) {
    echo "<script>alert('Data rpp Telah Berhasil Di Update');document.location.href='?menu=validasiRpp'</script>";
  }else{
    echo "<script>alert('Data rpp Gagal Di Update');document.location.href='?menu=validasiRpp'</script>";
  }
}

// sintaks untuk tombol clear
if (isset($_POST['clear'])) {
  echo "<script>alert('Data Dibersihkan');document.location.href='?menu=validasiRpp'</script>";
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
                    <input type="text" name="nama_guru" class="form-control" placeholder="Nama Guru" value="<?php echo $isi['nama_guru']; ?>" readonly>
                    </div>

                    <div class="col">
                    <input type="text" name="filerpp" class="form-control" placeholder="Link GD File RPP" value="<?php echo $isi['filerpp']; ?> " readonly>
                    </div>
                    
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col">
                      <select name="keterangan" class="form-control">
                        <option value="belum dikonfirmasi">belum dikonfirmasi</option>
                        <option value="perlu perbaikan">perlu perbaikan</option>
                        <option value="sudah dikonfirmasi">sudah dikonfirmasi</option>
                      </select>
                    </div>
                    <div class="col">
                    <input type="date" name="tanggal" class="form-control" placeholder="tanggal" value="<?php echo $isi['tanggal']; ?>" readonly>
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
                      <th>ID RPP</th>
                      <th>Nama Guru</th>
                      <th>keterangan</th>
                      <th>Tanggal</th>
                      <th>File RPP</th>
                      <th style="text-align: center;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $sql = mysqli_query($con,"SELECT * FROM tbl_rpp");
                      while($r=mysqli_fetch_array($sql)) :
                     ?>
                    <tr>
                      <td><?= $r['id_rpp'] ?></td>
                      <td><?= $r['nama_guru'] ?></td>
                      <td><?= $r['keterangan'] ?></td>
                      <td><?= $r['tanggal'] ?></td>
                      <td><?= $r['filerpp'] ?></td>
                     <td><a class="btn btn-success" href="?menu=validasiRpp&edit&id=<?= $r['id_rpp'] ?>">Edit</a></td>
                    </tr>
                  <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>



  
