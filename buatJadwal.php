<?php 
// ini untuk menyembunyikan error
error_reporting(0);

// ini untuk mengkoneksikan database
include "config/koneksi.php";

$tanggal = $_POST['tanggal'];
$acara = $_POST['acara'];
$keterangan = $_POST['keterangan'];

// ini sintaks simpan
  if(isset($_POST['simpan'])){
  $simpan = "INSERT INTO `tbl_jadwal` (`id_jadwal`, `tanggal`, `acara`, `keterangan`) VALUES (NULL, '$tanggal', '$acara','$keterangan')";
    
      $sql = mysqli_query($con,$simpan);
      if ($sql) {
         echo "<script>alert('Data jadwal Telah Berhasil Disimpan');document.location.href='?menu=buatJadwal'</script>";
      }else{
        echo "<script>alert('Data jadwal Gagal Disimpan');document.location.href='?menu=buatJadwal'</script>";
      }
}

// ini sintaks mengubah simpan menjadi update
if (isset($_GET['edit'])) {
  $result = mysqli_query($con,"SELECT * FROM tbl_jadwal WHERE id_jadwal ='$_GET[id]' ");
  // index id adalah variable yang dibuat button edit dibawah bisa diganti apa saja
   $isi = mysqli_fetch_array($result);
}

// sintaks ini untuk mengedit data
if(isset($_POST['update'])){
  $update = "UPDATE tbl_jadwal SET tanggal='$_POST[tanggal]',acara='$_POST[acara]',keterangan='$_POST[keterangan]' WHERE id_jadwal = '$_GET[id]'";
  $sql = mysqli_query($con,$update);
  if ($sql) {
    echo "<script>alert('Data jadwal Telah Berhasil Di Update');document.location.href='?menu=buatJadwal'</script>";
  }else{
    echo "<script>alert('Data jadwal Gagal Di Update');document.location.href='?menu=buatJadwal'</script>";
  }
}

// sintaks ini untuk menghapus
if (isset($_GET['hapus'])) {
  $hapus = "DELETE FROM tbl_jadwal WHERE id_jadwal = '$_GET[id]'";
  $sql = mysqli_query($con,$hapus);
  if ($sql) {
    echo "<script>alert('Data jadwal Telah Berhasil Dihapus');document.location.href='?menu=buatJadwal'</script>";
  }else{
    echo "<script>alert('Data jadwal Gagal Dihapus');document.location.href='?menu=buatJadwal'</script>";
  }
}

// sintaks untuk tombol clear
if (isset($_POST['clear'])) {
  echo "<script>alert('Data Dibersihkan');document.location.href='?menu=buatJadwal'</script>";
}else{
  mysqli_error($con);
}

 ?>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form jadwal</h6>
            </div> 

            <div class="card-body">
            <form method="post">

           <div class="form-group">
                <div class="row">
                  <div class="col">
                    <input type="date" name="tanggal" class="form-control" placeholder="tanggal" value="<?php echo $isi['tanggal']; ?>">
                    </div>
                    <div class="col">
                     <select name="keterangan" class="form-control">
                        <option value="Sibuk">Sibuk</option>
                        <option value="Senggang">Senggang</option>
                      </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col">
                    <input type="text" name="acara" class="form-control" placeholder="acara" value="<?php echo $isi['acara']; ?>">
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
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID jadwal</th>
                      <th>Tanggal</th>
                      <th>Acara</th>
                      <th>keterangan</th>
                      <th colspan="2" style="text-align: center;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $sql = mysqli_query($con,"SELECT * FROM tbl_jadwal");
                      while($r=mysqli_fetch_array($sql)) :
                     ?>
                    <tr>
                      <td><?= $r['id_jadwal'] ?></td>
                      <td><?= $r['tanggal'] ?></td>
                      <td><?= $r['acara'] ?></td>
                      <td><?= $r['keterangan'] ?></td>
                     <td><a class="btn btn-success" href="?menu=buatJadwal&edit&id=<?= $r['id_jadwal'] ?>">Edit</a></td>
                      <td><a class="btn btn-danger" href="?menu=buatJadwal&hapus&id=<?= $r['id_jadwal'] ?>" onclick="return confirm('Yakin Hapus?')">Hapus</a></td>
                    </tr>
                  <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

