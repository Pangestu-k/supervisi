<div class="table-responsive">
 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID RPP</th>
                      <th>Nama Guru</th>
                      <th>keterangan</th>
                      <th>Tanggal</th>
                      <th>File RPP</th>
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
                    </tr>
                  <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>