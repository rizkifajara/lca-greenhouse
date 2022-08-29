 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Daftar Tahun</h2>
            <div class="row mt-3">
          <div class="col-md-6">

          <button type="button" class ="btn btn-warning" data-toggle="modal" data-target="#modalTahun" id="tombolTahun">
                    <i class="fa fa-plus-circle"></i> Add Tahun 
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
                <h3 class="card-title">Table Daftar Tahun</h3>
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
                  <th style = text-align:center scope="col">Tahun</th>
                  
                  
                  </tr>
                  </thead>
                  <tbody>
                    
                    <?php foreach($tampil_tahun as $tt) :?>
                        <tr>
                            <!-- <td style = text-align:center scope="row"><?= $i;?></td> -->
                            <td style=text-align:center><?= $tt->id_tahun; ?></td>
                            <td style=text-align:center><?= $tt->userId; ?></td>
                            <td style=text-align:center><?= $tt->tahun; ?></td>
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


  <div class="modal fade" id="modalTahun" tabindex="-1" role="dialog" aria-labelledby="modalTahunLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modalTahunLabel">Input Tahun</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method ="post" action="<?php echo base_url().'masterdata/tambahTahun';?>">
        <input type="hidden" name="id_user" value="<?php echo $user['id']; ?>" />
            <div class="form-group">
                <label>Tahun</label>
                <input type="text" name="tahun" class="form-control" />
                <br>
                <button style="float: left" type="submit" class="btn btn-primary">Simpan</button>
                
            </div>
        </form>
      </div>
    </div>
  </div>
</div>