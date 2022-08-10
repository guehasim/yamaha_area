<!-- Modal Tambah -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Form Item</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo base_url(); ?>item/tambah">
            <div class="form-group">
              <label for="email">Nama:</label>
              <input type="text" class="form-control" style="background-color:#ede4e4" name="item" autocomplete="off" required>
            </div>
            <input type="hidden" name="area" value="<?php echo $idnya;?>">
            
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
                        <h3>Data Item</h3>
                      </div>
                      <div>
                        <?php echo $this->session->flashdata('msg'); ?>
                      </div>
                      <div>
                        <a href="<?php echo base_url(); ?>area"><button type="button" class="btn btn-primary">KEMBALI</button></a>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">TAMBAH</button>
                      </div>
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Item</th>
                                <th style="text-align: center;">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no=1; foreach ($item->result() as $ad): ?>                              
                              <tr>
                                <td style="text-align: center;"><?php echo $no++;?></td>
                                <td style="text-align: center;"><?php echo $ad->item;?></td>
                                <td style="text-align: center;">
                                  <a href="" data-toggle="modal" data-target="#detail-info-<?php echo $ad->ID_item;?>"><button type="button" class="btn btn-primary btn-xs">Edit</button></a>
                                  <a href="" data-toggle="modal" data-target="#hapus-info-<?php echo $ad->ID_item;?>"><button type="button" class="btn btn-danger btn-xs">Hapus</button></a>
                                </td>
                              </tr>

                              <div class="modal fade" id="detail-info-<?php echo $ad->ID_item;?>" role="dialog">
                                <div class="modal-dialog">
                                
                                  <div class="modal-content">
                                    <div class="modal-header" >
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Form Item</h4>
                                    </div>
                                    <div class="modal-body">
                                      <form method="post" action="<?php echo base_url(); ?>item/update">
                                        <input type="hidden" name="id" value="<?php echo $ad->ID_item;?>">
                                        <input type="hidden" name="area" value="<?php echo $ad->ID_area;?>">
                                        <input type="hidden" name="status" value="<?php echo $ad->status;?>">
                                        <div class="form-group">
                                          <label for="email">Nama:</label>
                                          <input type="text" class="form-control" style="background-color:#ede4e4" name="item" value="<?php echo $ad->item;?>">
                                        </div>
                                        <button type="submit" class="btn btn-default">Simpan</button>
                                      </form>
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>

                              <div class="modal fade" id="hapus-info-<?php echo $ad->ID_item;?>" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header" >
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Confirm Item</h4>
                                    </div>
                                    <div class="modal-body">
                                      <form method="post" action="<?php echo base_url(); ?>item/hapus">
                                        <div class="form-group">
                                          <input type="hidden" name="id" value="<?php echo $ad->ID_item;?>">
                                          <input type="hidden" name="area" value="<?php echo $ad->ID_area;?>">
                                          <p>Apakah anda menghapus item <b><?php echo $ad->item;?></b> ini?</p>
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