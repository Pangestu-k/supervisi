<?php 

// ini untuk menyembunyikan error
error_reporting(0);

// ini untuk mengkoneksikan database
include "config/koneksi.php";

$nama_kepsek = $_SESSION['username'];
$tanggal = date('Y-m-d');
$keterangan = $_POST['keterangan'];

// ini sintaks simpan
  if(isset($_POST['simpan'])){
  $simpan = "INSERT INTO `tbl_supervisi` (`id_supervisi`, `nama_kepsek`, `keterangan`, `tanggal`) VALUES (NULL, '$nama_kepsek', '$keterangan', '$tanggal')";
    
      $sql = mysqli_query($con,$simpan);
      if ($sql) {
         echo "<script>alert('Data supervisi Telah Berhasil Disimpan');document.location.href='?menu=supervisi'</script>";
      }else{
        echo "<script>alert('Data supervisi Gagal Disimpan');document.location.href='?menu=supervisi'</script>";
      }
}


// sintaks ini untuk menghapus
if (isset($_GET['hapus'])) {
  $hapus = "DELETE FROM tbl_supervisi WHERE id_supervisi = '$_GET[id]'";
  $sql = mysqli_query($con,$hapus);
  if ($sql) {
    echo "<script>alert('Data supervisi Telah Berhasil Dihapus');document.location.href='?menu=supervisi'</script>";
  }else{
    echo "<script>alert('Data supervisi Gagal Dihapus');document.location.href='?menu=supervisi'</script>";
  }
}

// sintaks untuk tombol clear
if (isset($_POST['clear'])) {
  echo "<script>alert('Data Dibersihkan');document.location.href='?menu=supervisi'</script>";
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
                      <textarea name="keterangan" class="form-control" placeholder="keterangan"></textarea>
                    </div>
                    
                </div>
            </div>

              <td><input type="submit" class="btn btn-warning" name="simpan" value="Simpan"></td>

              <button class="btn btn-secondary" name="clear">Clear</button>
            </form>
            
            <br><br>
              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Supervisi</th>
                      <th>Nama Kepala Sekolah</th>
                      <th>Tanggal</th>
                      <th>Keterangan</th>
                      <th style="text-align: center;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $sql = mysqli_query($con,"SELECT * FROM tbl_supervisi");
                      while($r=mysqli_fetch_array($sql)) :
                     ?>
                    <tr>
                      <td><?= $r['id_supervisi'] ?></td>
                      <td><?= $r['nama_kepsek'] ?></td>
                      <td><?= $r['tanggal'] ?></td>
                      <td><?= $r['keterangan'] ?></td>
                      <td><a class="btn btn-danger" href="?menu=supervisi&hapus&id=<?= $r['id_supervisi'] ?>" onclick="return confirm('Yakin Hapus?')">Hapus</a></td>
                    </tr>
                  <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>



  
