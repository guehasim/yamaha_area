<style>
.contoh1::-webkit-input-placeholder{
  color: #909190;
}
</style>
<!-- Modal Tambah -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Form Area</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo base_url(); ?>area/tambah">
            <div class="form-group">
              <label for="email">Nama:</label>
              <input type="text" class="form-control" style="background-color:#ede4e4" name="nama" required>
            </div>
            <div class="form-group">
              <label for="email">PIC:</label>
              <select class="form-control" name="pic" style="background-color:#ede4e4" required>
                <option></option>
                <?php foreach ($pic->result() as $ad): ?>
                  <option value="<?php echo $ad->ID_pic;?>"><?php echo $ad->nama;?></option>
                <?php endforeach ?>
              </select>
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
                        <h3>Data Area</h3>
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
                                <th style="text-align: center;">QTY Item</th>
                                <th style="text-align: center;">PIC</th>
                                <th style="text-align: center;">Nama PIC</th>
                                <th style="text-align: center;">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no=1; foreach ($area->result() as $ad): ?>                              
                              <tr>
                                <td style="text-align: center;"><?php echo $no++;?></td>
                                <td style="text-align: center;"><a href="<?php echo base_url() ?>area/get_item?us=<?php echo $ad->ID_area; ?>"> <?php echo $ad->nama_area;?> </a></td>
                                <td style="text-align: center;"><?php echo $ad->qty;?></td>
                                <td style="text-align: center;"><?php echo $ad->NO_pic;?></td>
                                <td style="text-align: center;"><?php echo $ad->nama_pic;?></td>
                                <td style="text-align: center;">
                                  <a href="<?php echo base_url() ?>area/cetak?us=<?php echo $ad->ID_area; ?>" target="_blank"><button type="button" class="btn btn-info btn-xs">Barcode</button></a>
                                  <a href="" data-toggle="modal" data-target="#detail-info-<?php echo $ad->ID_area;?>"><button type="button" class="btn btn-primary btn-xs">Edit</button></a>
                                  <a href="" data-toggle="modal" data-target="#hapus-info-<?php echo $ad->ID_area;?>"><button type="button" class="btn btn-danger btn-xs">Hapus</button></a>
                                </td>
                              </tr>

                              <div class="modal fade" id="detail-info-<?php echo $ad->ID_area;?>" role="dialog">
                                <div class="modal-dialog">
                                
                                  <div class="modal-content">
                                    <div class="modal-header" >
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Form Area</h4>
                                    </div>
                                    <div class="modal-body">
                                      <form method="post" action="<?php echo base_url(); ?>area/update">
                                        <input type="hidden" name="id" value="<?php echo $ad->ID_area;?>">
                                        <div class="form-group">
                                          <label for="email">Nama:</label>
                                          <input type="text" class="form-control" style="background-color:#ede4e4" name="nama" value="<?php echo $ad->nama_area;?>" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="email">PIC:</label>
                                          <select class="form-control" name="pic" style="background-color:#ede4e4" required>                                           
                                           

                                            <?php foreach ($pic->result() as $pc): ?>
                                            <option value="<?php echo $pc->ID_pic;?>" 
                                              <?php if ($ad->ID_pic == $pc->ID_pic): ?>
                                                selected
                                              <?php endif ?>

                                              ><?php echo $pc->nama;?></option>

                                            <?php endforeach ?>
                                          </select>
                                        </div>
                                        <button type="submit" class="btn btn-default">Simpan</button>
                                      </form>
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>

                              <div class="modal fade" id="hapus-info-<?php echo $ad->ID_area;?>" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header" >
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Confirm Area</h4>
                                    </div>
                                    <div class="modal-body">
                                      <form method="post" action="<?php echo base_url(); ?>area/hapus">
                                        <div class="form-group">
                                          <input type="hidden" name="id" value="<?php echo $ad->ID_area;?>">
                                          <p>Apakah anda menghapus area <b><?php echo $ad->nama_area;?></b> ini?</p>
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