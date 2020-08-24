<?php 

// ini untuk menyembunyikan error
error_reporting(0);

// ini untuk mengkoneksikan database
include "config/koneksi.php";

$nama_guru = $_POST['nama_guru'];
$keterangan = $_POST['keterangan'];
$tanggal = $_POST['tanggal'];
$filerpp = $_POST['filerpp'];

// ini sintaks simpan
  if(isset($_POST['simpan'])){
  $simpan = "INSERT INTO `tbl_rpp` (`id_rpp`, `nama_guru`, `keterangan`, `tanggal`, `filerpp`) VALUES (NULL, '$nama_guru', '$keterangan', '$tanggal', '$filerpp')";
    
      $sql = mysqli_query($con,$simpan);
      if ($sql) {
         echo "<script>alert('Data RPP Telah Berhasil Disimpan');document.location.href='?menu=inputRpp'</script>";
      }else{
        echo "<script>alert('Data RPP Gagal Disimpan');document.location.href='?menu=inputRpp'</script>";
      }
}

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
    echo "<script>alert('Data rpp Telah Berhasil Di Update');document.location.href='?menu=inputRpp'</script>";
  }else{
    echo "<script>alert('Data rpp Gagal Di Update');document.location.href='?menu=inputRpp'</script>";
  }
}

// sintaks ini untuk menghapus
if (isset($_GET['hapus'])) {
  $hapus = "DELETE FROM tbl_rpp WHERE id_rpp = '$_GET[id]'";
  $sql = mysqli_query($con,$hapus);
  if ($sql) {
    echo "<script>alert('Data rpp Telah Berhasil Dihapus');document.location.href='?menu=inputRpp'</script>";
  }else{
    echo "<script>alert('Data rpp Gagal Dihapus');document.location.href='?menu=inputRpp'</script>";
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
                    <input type="text" name="nama_guru" class="form-control" placeholder="Nama Guru" value="<?php echo $_SESSION['username']; ?>" readonly>
                    </div>

                    <div class="col">
                    <input type="text" name="filerpp" class="form-control" placeholder="Link GD File RPP" value="<?php echo $isi['filerpp']; ?>" required>
                    </div>
                    
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col">
                      <select name="keterangan" class="form-control" readonly>
                        <option value="belum dikonfirmasi">belum dikonfirmasi</option>
                      </select>
                    </div>
                    <div class="col">
                    <input type="date" name="tanggal" class="form-control" placeholder="tanggal" value="<?php echo $isi['tanggal']; ?>">
                    </div>
                </div>
            </div>

             <!-- ini sintaks untuk mengubah button simpan menjadi update -->
          <?php if(isset($_GET['edit'])){ ?>
              <td><input type="submit" class="btn btn-warning" name="update" value="UPDATE"></td>
          <?php }else{ ?>
              <td><input type="submit" class="btn btn-warning" name="simpan" value="Simpan"></td>
          <?php } ?>              
          <!-- sampai sini -->


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
                      <th colspan="2" style="text-align: center;">Aksi</th>
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
                     <td><a class="btn btn-success" href="?menu=inputRpp&edit&id=<?= $r['id_rpp'] ?>">Edit</a></td>
                      <td><a class="btn btn-danger" href="?menu=inputRpp&hapus&id=<?= $r['id_rpp'] ?>" onclick="return confirm('Yakin Hapus?')">Hapus</a></td>
                    </tr>
                  <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>



  
