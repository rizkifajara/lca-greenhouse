 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Master Data</h2>
            <div class="row mt-3">
          <div class="col-md-6">
                
               
          </div>
       
        </div>
      </div><!-- /.container-fluid -->
      
    </section>
    <div class="col-lg-12">
    <?= $this->session->flashdata('message'); ?>
    </div> 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header text-right">
                <h3 class="card-title">Table Master Data</h3>
                <button type="button" class ="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="tomboltambah">
                    <i class="fa fa-plus-circle"></i> Add Material 
                    
                <!-- <button class = "btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class= "fa fa-plus" ></i> Add Data </button>     -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th style = text-align:center scope="col"> No </th>
                    <th style = text-align:center scope="col"> Nama Material</th>
                    <th style = text-align:center  scope="col"> GWP<br> (kg CO2 eq)</th>
                    <th style = text-align:center  scope="col"> AP<br>(kg SO2 eq)</th>
                    <th style = text-align:center  scope="col"> EP<br> (kg PO4 eq)</th>
                    <th style = text-align:center  scope="col"> ODP<br> (kg CFC-11 eq)</th>
                    <th style = text-align:center  scope="col"> HCT <br> (kg 1,4-DCB eq)</th>
                    <th style = text-align:center  scope="col"> Sumber Data</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i =1;
                    foreach ($siakad as $tbl){
                      ?>
                  <tr>
                  <td scope ="row"><?= $i++; ?> </td>
                    <td style = text-align:left><?= $tbl->nama_material; ?></td>
                    <td style = text-align:center><?= $tbl->GWP; ?></td>
                    <td style = text-align:center><?= $tbl->AP; ?></td>
                    <td style = text-align:center><?= $tbl->EP; ?></td>
                    <td style = text-align:center><?= $tbl->ODP; ?></td>
                    <td style = text-align:center><?= $tbl->HCT; ?></td>
                    <td style = text-align:center><?= $tbl->sumberdata; ?></td>
                  </tr>
                  <?php



                    } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
  
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Form Input Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method ="post" action="<?php echo base_url().'masterdata/tambah_aksi';?>">
                        <div class="form-group row">
                        <label class="col-md-4 col-form-label text-left" for="name">Nama Material (Satuan)</label>
                          <div class="col-md-7">
                            <input id="nama_material" class="form-control" type="text" name="nama_material" required>
                        </div>

                          </div>
                          <div class="form-group row">
                        <label class="col-md-4 col-form-label text-left" for="name">Sumber Data</label>
                          <div class="col-md-7">
                            <input id="sumberdata" class="form-control" type="text" name="sumberdata" required>
                        </div>

                          </div>
                        <!-- <div class="form-group row">
                        <label class="col-md-3 col-form-label text-left" for="name">Satuan</label>
                          <div class="col-md-5">
                            <input id="satuan" class="form-control" type="text" name="satuan" required>
                        </div>
                          </div> -->
     
                    
                    <div class="form-group row">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header">
                                    <h5>Input Dampak </h3>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped" id="material_id">
                                    <thead>
                                        <tr>
                                            <td style="width: 2%">No</td>
                                            <td style="width: 20%">Jenis Dampak</td>
                                            <td style="width: 20%">Nilai CF</td>
                                            <td style="width: 10%">Satuan</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                                                                                        <tr>
                                            <td>1</td>
                                            <td hidden><input id="record_dampak-0" class="form-control"
                                                    name="record_dampak[]" readonly></td>
                                            <td hidden><input id="dampak-0" class="form-control"
                                                    type="text" value="1" readonly name="cat_dampak[]">
                                            </td>
                                            <td hidden><input id="cat_dampak-0" class="form-control"
                                                    type="text" value="Global Warming Potential" readonly name="cat_name[]">
                                            </td>
                                            <td>Global Warming Potential</td>
                                            <td><input id="cf-0" class="form-control" type="number"
                                                    name="GWP" placeholder="Nilai CF Global Warming Potential"
                                                    step="0.00000000001" required></td>
                                            <td>kg CO<sub>2</sub> eq</td>
                                            
                                        </tr>
                                                                                <tr>
                                            <td>2</td>
                                            <td hidden><input id="record_dampak-1" class="form-control"
                                                    name="record_dampak[]" readonly></td>
                                            <td hidden><input id="dampak-1" class="form-control"
                                                    type="text" value="2" readonly name="cat_dampak[]">
                                            </td>
                                            <td hidden><input id="cat_dampak-1" class="form-control"
                                                    type="text" value="Acidification Potential" readonly name="cat_name[]">
                                            </td>
                                            <td>Acidification Potential</td>
                                            <td><input id="cf-1" class="form-control" type="number"
                                                    name="AP" placeholder="Nilai CF Acidification Potential"
                                                    step="0.00000000001" required></td>
                                            <td>kg SO<sub>2</sub> eq</td>
                                           
                                        </tr>
                                                                                <tr>
                                            <td>3</td>
                                            <td hidden><input id="record_dampak-2" class="form-control"
                                                    name="record_dampak[]" readonly></td>
                                            <td hidden><input id="dampak-2" class="form-control"
                                                    type="text" value="3" readonly name="cat_dampak[]">
                                            </td>
                                            <td hidden><input id="cat_dampak-2" class="form-control"
                                                    type="text" value="Eutrophication Potential" readonly name="cat_name[]">
                                            </td>
                                            <td>Eutrophication Potential</td>
                                            <td><input id="cf-2" class="form-control" type="number"
                                                    name="EP" placeholder="Nilai CF Eutrophication Potential"
                                                    step="0.00000000001" required></td>
                                            <td>kg PO<sub>4</sub> eq</td>
                                          
                                        </tr>
                                                                                <tr>
                                            <td>4</td>
                                            <td hidden><input id="record_dampak-3" class="form-control"
                                                    name="record_dampak[]" readonly></td>
                                            <td hidden><input id="dampak-3" class="form-control"
                                                    type="text" value="4" readonly name="cat_dampak[]">
                                            </td>
                                            <td hidden><input id="cat_dampak-3" class="form-control"
                                                    type="text" value="Ozon Depletion Potential" readonly name="cat_name[]">
                                            </td>
                                            <td>Ozon Depletion Potential</td>
                                            <td><input id="cf-3" class="form-control" type="number"
                                                    name="ODP" placeholder="Nilai CF Ozon Depletion Potential"
                                                    step="0.00000000001" required></td>
                                            <td>kg CFC-11 eq</td>
                                           
                                        </tr>
                                                                                <tr>
                                            <td>5</td>
                                            <td hidden><input id="record_dampak-4" class="form-control"
                                                    name="record_dampak[]" readonly></td>
                                            <td hidden><input id="dampak-4" class="form-control"
                                                    type="text" value="5" readonly name="cat_dampak[]">
                                            </td>
                                            <td hidden><input id="cat_dampak-4" class="form-control"
                                                    type="text" value="Human Carcinogenic Toxicity" readonly name="cat_name[]">
                                            </td>
                                            <td>Human Carcinogenic Toxicity</td>
                                            <td><input id="cf-4" class="form-control" type="number"
                                                    name="HCT" placeholder="Nilai CF Human Carcinogenic Toxicity"
                                                    step="0.00000000001" required></td>
                                            <td>kg 1,4-DCB eq</td>
                                         
                                        </tr>
                                        
                                                                            </tbody>

                                </table>
                            </div>

                        </div>


                    </div>


                    <div class="form-group">
                        <input type="hidden" name="action" id="action" value="Add" />
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="pull-right">
                        <input type="submit" name="action_button" id="action_button" class="btn btn-warning"
                            value="Add" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
            <!-- <div class="form-group">
                <label>Waktu</label>
                <input type="date" name ="waktu" class ="form-control" id="waktu" placeholder="masukan waktu">
                 
                <label>Nama Material</label>
                <input type="text" name ="namamaterial" class ="form-control" id="namamaterial" placeholder="masukan waktu" >
                <label>Jumlah</label>
                <input type="text" name ="jumlahmaterial" class ="form-control">
                <label>Satuan</label>
                <input type="int" name ="satuan" class ="form-control">
                <label>Sumber Data</label>
                <input type="text" name ="sumberdata" class ="form-control">
                <label>Jenis Data</label>
                <input type="text" name ="jenisdata" class ="form-control">
                <label>Keterangan</label>
                <input type="text" name ="keterangan" class ="form-control">
                <br>
        <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
       -->

      </div>
    </div>
   
</div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<script>
$(document).ready(function () {
        window.alert = function() {};
    $('#exampleMaster').DataTable({
        responsive: true,
        searching: false,
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'All'],
        ],
    });
});

$(document).ready(function () {
        window.alert = function() {};
    $('#exampleMaster').DataTable({
        responsive: true,
        searching: false,
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'All'],
        ],
    });
});

$(document).ready(function() {
    $('#example2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

</script>
