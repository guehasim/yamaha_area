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
                                        <?php if ($ad->status=='1'): ?>
                                            <a href="" data-toggle="modal" data-target="#tersedia-info-<?php echo $ad->ID_item;?>"> <button type="button" class="btn btn-fill btn-primary btn-lg"><?php echo $ad->item;?></button> </a>
                                            
                                        <?php else: ?>
                                            <button href="#fakelink" class="btn btn-fill btn-primary btn-lg disabled"><?php echo $ad->item;?> <i class="fa fa-refresh fa-spin"></i></button>
                                            </form>
                                            
                                        <?php endif ?>
                                    </td>
                                </tr>

                                 <div class="modal fade" id="tersedia-info-<?php echo $ad->ID_item;?>" role="dialog">
                                    <div class="modal-dialog">
                                    
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header" >
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title" style="color:#000000">Confirm Item</h4>
                                        </div>
                                        <div class="modal-body">
                                          <form method="post" action="<?php echo base_url(); ?>pic/update">
                                            <div class="form-group">
                                                <input type="hidden" name="status" value="0" >
                                                <input type="hidden" name="tgl" value="<?php echo date('Y-m-d'); ?>">
                                                <input type="hidden" name="waktu" value="<?php echo date('h:i:s'); ?>">
                                                <input type="hidden" name="area" value="<?php echo $ad->ID_area;?>">
                                                <input type="hidden" name="id" value="<?php echo $ad->ID_item;?>" >
                                                <input type="hidden" name="operator" value="<?php echo $ad->pic;?>">
                                              <p style="color:#757574">Apakah Item <b><?php echo $ad->item;?></b> ini sudah tersedia di <b><?php echo $ad->nama;?></b> ?</p>
                                            </div>
                                            <button type="submit" class="btn btn-default">Tersedia</button>
                                          </form>
                                        </div>
                                      </div>
                                      
                                    </div>
                                  </div>

                            
                            
                        </tbody>
                    </table>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>