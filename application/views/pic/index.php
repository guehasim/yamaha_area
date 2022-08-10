<div class="section text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">

            <?php foreach ($pic->result() as $ad): ?>   
                <div class="register-card">
                    <h3 class="text-primary title-uppercase"><?php echo $ad->nama;?></h3>
                    <table style="text-align:center;">
                        <tbody>                         
                        <tr>
                            <td>
                               <?php 

                                $query_item = $this->db->query("SELECT * FROM m_item WHERE ID_area='".$ad->ID_area."' ORDER BY ID_Item DESC");
                                    foreach ($query_item->result() as $item_list){
                                    ?>
                                            <table style="text-align:center;">
                                                <tbody>                         
                                                        <tr>
                                                            <td>
                                                                <?php if ($item_list->status=='1'): ?>
                                                                    <a href="" data-toggle="modal" data-target="#tersedia-info-<?php echo $item_list->ID_item;?>"> <button type="button" class="btn btn-fill btn-primary btn-lg"><?php echo $item_list->item;?></button> </a>
                                                                    
                                                                <?php else: ?>
                                                                    <button href="#fakelink" class="btn btn-fill btn-primary btn-lg disabled"><?php echo $item_list->item;?> <i class="fa fa-refresh fa-spin"></i></button>
                                                                    </form>
                                                                    
                                                                <?php endif ?>
                                                            </td>
                                                        </tr>

                                                         <div class="modal fade" id="tersedia-info-<?php echo $item_list->ID_item;?>" role="dialog">
                                                            <div class="modal-dialog">
                                                            
                                                              <!-- Modal content-->
                                                              <div class="modal-content">
                                                                <div class="modal-header" >
                                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                  <h4 class="modal-title" style="color:#000000">Confirm Item</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                  <form method="post" action="<?php echo base_url(); ?>pic/update" enctype="multipart/form-data">
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="status" value="0" >
                                                                        <input type="hidden" name="tgl" value="<?php echo date('Y-m-d'); ?>">
                                                                        <input type="hidden" name="waktu" value="<?php echo date('h:i:s a'); ?>">
                                                                        <input type="hidden" name="area" value="<?php echo $item_list->ID_area;?>">
                                                                        <input type="hidden" name="id" value="<?php echo $item_list->ID_item;?>" >
                                                                        <input type="hidden" name="pic" value="<?php echo $this->session->userdata('ses_namapic');?>">

                                                                      <p style="color:#757574">Apakah Item <b><?php echo $item_list->item;?></b> ini sudah tersedia di <b><?php echo $ad->nama;?></b> ?</p>

                                                                    </div>
                                                                    <div class="form-group">
                                                                       <div class="form-group" style="text-align:left;">
                                                                          <label style="color:#000000">Gambar :</label>
                                                                          <input type="file" class="form-control" style="background-color:#ede4e4" name="image" required>
                                                                        </div>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-default">Tersedia</button>
                                                                  </form>
                                                                </div>
                                                              </div>
                                                              
                                                            </div>
                                                          </div>

                                                    
                                                    
                                                </tbody>
                                            </table>
                                    <?php
                                    }
                               ?>
                            </td>
                        </tr>                           
                            
                        </tbody>
                    </table>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>