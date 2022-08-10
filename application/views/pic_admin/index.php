<!-- Modal Tambah -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Form PIC</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo base_url(); ?>pic_admin/tambah">
            
            <div class="form-group">
              <label for="email">Nomor PIC:</label>
              <input type="number" class="form-control" style="background-color:#ede4e4" name="no_pic" required>
            </div>
            <div class="form-group">
              <label for="email">Nama:</label>
              <input type="text" class="form-control" style="background-color:#ede4e4" name="nama" required>
            </div>
            <div class="form-group">
              <label for="email">NO HP(Terhubung ke Whatsapp):</label>
              <input type="text" class="form-control contoh1" placeholder="(Contoh : 6281234xxxxx)" maxlength="14" minlength="10" onkeypress="return event.charCode >= 48 && event.charCode <=57" style="background-color:#ede4e4" name="nohp" required>
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
                        <h3>Data PIC</h3>
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
                                <th style="text-align: center;">No.PIC</th>
                                <th style="text-align: center;">Nama</th>
                                <th style="text-align: center;">No.HP</th>
                                <th style="text-align: center;">Username</th>
                                <th style="text-align: center;">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no=1; foreach ($pic->result() as $ad): ?>                              
                              <tr>
                                <td style="text-align: center;"><?php echo $no++;?></td>
                                <td style="text-align: center;"><?php echo $ad->NO_pic;?></td>
                                <td style="text-align: center;"><?php echo $ad->nama;?></td>
                                <td style="text-align: center;"><?php echo $ad->NoHP;?></td>
                                <td style="text-align: center;"><?php echo $ad->username;?></td>
                                <td style="text-align: center;">
                                  <a href="" data-toggle="modal" data-target="#detail-info-<?php echo $ad->ID_pic;?>"><button type="button" class="btn btn-primary btn-xs">Edit</button></a>
                                  <a href="" data-toggle="modal" data-target="#hapus-info-<?php echo $ad->ID_pic;?>"><button type="button" class="btn btn-danger btn-xs">Hapus</button></a>
                                </td>
                              </tr>

                              <div class="modal fade" id="detail-info-<?php echo $ad->ID_pic;?>" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header" >
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Form PIC</h4>
                                    </div>
                                    <div class="modal-body">
                                      <form method="post" action="<?php echo base_url(); ?>pic_admin/update">

                                        <input type="hidden" name="id" value="<?php echo $ad->ID_pic;?>">
                                        <div class="form-group">
                                          <label for="email">Nomor PIC:</label>
                                          <input type="text" class="form-control" style="background-color:#ede4e4" name="no_pic" value="<?php echo $ad->NO_pic;?>" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="email">Nama:</label>
                                          <input type="text" class="form-control" style="background-color:#ede4e4" name="nama" value="<?php echo $ad->nama;?>" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="email">NO HP(Terhubung ke Whatsapp):</label>
                                          <input type="text" class="form-control contoh1" placeholder="(Contoh : 6281234xxxxx)" maxlength="14" minlength="10" onkeypress="return event.charCode >= 48 && event.charCode <=57" style="background-color:#ede4e4" name="no_hp" value="<?php echo $ad->NoHP; ?>" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="email">Username:</label>
                                          <input type="text" class="form-control" style="background-color:#ede4e4" name="user" value="<?php echo $ad->username;?>" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="pwd">Password:</label>
                                          <input type="password" class="form-control" style="background-color:#ede4e4" id="pwd" placeholder="Enter password" name="pass">
                                        </div>
                                        <button type="submit" class="btn btn-default">Simpan</button>

                                      </form>
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>

                              <div class="modal fade" id="hapus-info-<?php echo $ad->ID_pic;?>" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header" >
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Confirm PIC</h4>
                                    </div>
                                    <div class="modal-body">
                                      <form method="post" action="<?php echo base_url(); ?>pic_admin/hapus">
                                        <div class="form-group">
                                          <input type="hidden" name="id" value="<?php echo $ad->ID_pic;?>">
                                          <p>Apakah anda menghapus data PIC atas nama <b><?php echo $ad->nama;?></b> ini?</p>
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