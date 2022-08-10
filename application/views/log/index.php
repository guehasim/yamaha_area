
<div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                      <div class="col-md-12">
                        <h3>Log Aktivitas</h3>
                      </div>
                      <form action="<?php echo base_url(); ?>log" method="post">
                      <div class="col-md-12">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Period Awal:</label>
                            <input type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" id="period_awal" class="form-control" style="background-color:#ede4e4" name="period_awal" value="<?php echo $period_awal; ?>" required>
                          <script>
                              function timeFunctionLong(input) {
                                setTimeout(function() {
                                  input.type = 'text';
                                }, 60000);
                              }
                            </script>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Period Akhir:</label>
                            <input type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" id="period_akhir" class="form-control" style="background-color:#ede4e4" name="period_akhir" value="<?php echo $period_akhir;?>"  required>
                            <script>
                              function timeFunctionLong(input) {
                                setTimeout(function() {
                                  input.type = 'text';
                                }, 60000);
                              }
                            </script>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-8">
                          <input type="submit" name="submitdata" class="btn btn-primary" value="Print PDF"> 
                          <input type="submit" name="submitdata" class="btn btn-success" value="Print Excel">
                          <input type="submit" name="submitdata" class="btn btn-info" value="Reset">
                          <input type="submit" name="submitdata" class="btn btn-warning" value="Search">
                        </div>
                      </div>

                      </form>
                      <div class="col-md-12">
                        <h7>&nbsp;</h7>
                      </div>
                      <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Tanggal</th>
                                <th style="text-align: center;">Operator</th>
                                <th style="text-align: center;">Gambar</th>
                                <th style="text-align: center;">Keterangan</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no=1; foreach ($log->result() as $ad): ?>                              
                              <tr>
                                <td style="text-align: center;"><?php echo $no++;?></td>
                                <td style="text-align: center;"><?php echo date('d M y',strtotime($ad->Tgl));?> <?php echo date('H:i:s a',strtotime($ad->Jam)) ?> </td>
                                <td style="text-align: center;"><?php echo $ad->Operator;?></td>
                                <td style="text-align: center;">
                                  <?php if ($ad->image != NULL): ?>
                                    <img class="img-responsive avatar-view" src="<?=base_url()?>assets/upload/images/<?=$ad->image?>" style="height: 50px; text-align:center; display: block;" height:"100px">
                                  <?php else: ?>
                                    <?php echo "-"; ?>
                                  <?php endif ?>
                                </td>
                                <td style="text-align: left;">Item <?php echo $ad->item;?> di <?php echo $ad->nama;?> <?php echo $ad->Ket;?></td>
                              </tr>
                              <?php endforeach ?>
                            </tbody>
                          </table>
                      </div>
                    </div>
                </div>
            </div>          
    </div>

<script>
$( function() {
    $( "#period_awal" ).datepicker({dateFormat:'dd-mm-yy'});
  } );

    $( function() {
    $( "#period_akhir" ).datepicker({dateFormat:'dd-mm-yy'});
  } );
</script>