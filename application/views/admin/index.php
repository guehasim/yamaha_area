<!-- Modal Tambah -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Form Admin</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo base_url(); ?>admin/tambah">
            <div class="form-group">
              <label for="email">Nama:</label>
              <input type="text" class="form-control" style="background-color:#ede4e4" name="nama" required>
            </div>
            <div class="form-group">
              <label for="email">Username:</label>
              <input type="text" class="form-control" style="background-color:#ede4e4" name="user" required>
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" style="background-color:#ede4e4" id="pwd" placeholder="Enter password" name="pass" required>
            </div>
            <button type="submit" class="btn btn-default">Simpan</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>

<div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                      <div>
                        <h3>Data Admin</h3>
                      </div>
                      <div>
                        <?php echo $this->session->flashdata('msg'); ?>
                      </div> 
                      <div>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">TAMBAH</button>
                      </div>
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Nama</th>
                                <th style="text-align: center;">Username</th>
                                <th style="text-align: center;">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no=1; foreach ($admin->result() as $ad): ?>                              
                              <tr>
                                <td style="text-align: center;"><?php echo $no++;?></td>
                                <td style="text-align: center;"><?php echo $ad->nama;?></td>
                                <td style="text-align: center;"><?php echo $ad->username;?></td>
                                <td style="text-align: center;">
                                  <a href="" data-toggle="modal" data-target="#detail-info-<?php echo $ad->ID_admin;?>"><button type="button" class="btn btn-primary btn-xs">Edit</button></a>
                                  <a href="" data-toggle="modal" data-target="#hapus-info-<?php echo $ad->ID_admin;?>"><button type="button" class="btn btn-danger btn-xs">Hapus</button></a>
                                </td>
                              </tr>

                              <div class="modal fade" id="detail-info-<?php echo $ad->ID_admin;?>" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header" >
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Form Admin</h4>
                                    </div>
                                    <div class="modal-body">
                                      <form method="post" action="<?php echo base_url(); ?>admin/update">
                                        <input type="hidden" name="id" value="<?php echo $ad->ID_admin;?>">
                                        <div class="form-group">
                                          <label for="email">Nama:</label>
                                          <input type="text" class="form-control" style="background-color:#ede4e4" name="nama" value="<?php echo $ad->nama;?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="email">Username:</label>
                                          <input type="text" class="form-control" style="background-color:#ede4e4" name="user" value="<?php echo $ad->username;?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="pwd">Password:</label>
                                          <input type="password" class="form-control" style="background-color:#ede4e4" id="pwd" placeholder="Enter password">
                                        </div>
                                        <button type="submit" class="btn btn-default">Simpan</button>
                                      </form>
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>

                              <div class="modal fade" id="hapus-info-<?php echo $ad->ID_admin;?>" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header" >
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Confirm Admin</h4>
                                    </div>
                                    <div class="modal-body">
                                      <form method="post" action="<?php echo base_url(); ?>admin/hapus">
                                        <div class="form-group">
                                          <input type="hidden" name="id" value="<?php echo $ad->ID_admin;?>">
                                          <p>Apakah anda menghapus data <b><?php echo $ad->nama;?></b></p>
                                        </div>
                                        <button type="submit" class="btn btn-default">Hapus</button>
                                      </form>
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
                              <?php endforeach ?>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>          
    </div>