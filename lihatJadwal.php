<div class="table-responsive">
 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Jadwal</th>
                      <th>Tanggal</th>
                      <th>Acara</th>
                      <th>Keterangan</th>
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
                    </tr>
                  <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>