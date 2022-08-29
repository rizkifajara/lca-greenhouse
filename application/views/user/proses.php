 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Daftar Proses</h2>
            <div class="row mt-3">
          <div class="col-md-6">

            <button type="button" class ="btn btn-success" data-toggle="modal" data-target="#prosesModal" id="tombolProses">
                    <i class="fa fa-plus-circle"></i> Add Proses 
                </button>

          
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
                <h3 class="card-title">Table Daftar Proses</h3>
                <!-- <button type="button" class ="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> 
                    <i class="fa fa-plus-circle"></i> Add Role -->
                    
              </div>
            
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th style = text-align:center scope="col">No</th>
                  <th style = text-align:center scope="col">User ID</th>
                  <th style = text-align:center scope="col">Proses</th>
                  
                  
                  </tr>
                  </thead>
                  <tbody>
                    
                    <?php foreach($tampil_proses as $tp) :?>
                        <tr>
                            <!-- <td style = text-align:center scope="row"><?= $i;?></td> -->
                            <td style=text-align:center><?= $tp->id_proses; ?></td>
                            <td style=text-align:center><?= $tp->userId; ?></td>
                            <td style=text-align:center><?= $tp->proses; ?></td>
                        </tr>
                       
                        <?php endforeach;?>
                        
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


  <div class="modal fade" id="prosesModal" tabindex="-1" role="dialog" aria-labelledby="modalProsesLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modalProsesLabel">Input Proses</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method ="post" action="<?php echo base_url().'masterdata/tambahProses';?>">
        <input type="hidden" name="id_user" value="<?php echo $user['id']; ?>" />
            <div class="form-group">
                <label>Proses</label>
                <input type="text" name="title" class="form-control">
                <label>Urutan</label>
                <input type="int" name="urutan" class="form-control">
                <br>
                <button style="float: left" type="submit" class="btn btn-primary">Simpan</button>
                
            </div>
        </form>
      </div>
    </div>
  </div>
</div>