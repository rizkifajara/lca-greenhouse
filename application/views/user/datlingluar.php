a <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Lingkungan</h1>
            <div class="row mt-3">
          <div class="col-md-6">

          
          </div>
       
        </div>
      </div><!-- /.container-fluid -->
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header text-right">
                <h3 class="card-title">Tabel Data Lingkungan Luar</h3>
                 <button class = "btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class= "fa fa-plus" ></i> Add Data </button>    
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style = text-align:center  scope="col"> No </th>
                    <th style = text-align:center  scope="col"> Waktu </th>
                    <th style = text-align:center  scope="col"> Suhu BB ( °C) </th>
                    <th style = text-align:center  scope="col" > Suhu BK( °C)</th>
                    <th style = text-align:center scope="col"> RH </th>
                    <th style = text-align:center  scope="col"> Kec.Udara</th>
                    <th style = text-align:center  scope="col"> FC</th>
                    <th style = text-align:center scope="col"> Lx </th> 
                    <th style = text-align:center > PPFD</th> 
                    <th style = text-align:center > Watt/m²</th> 
                    <th style = text-align:center > Aksi</th> 

                  </tr>
                  </thead>
                  <tbody>
                    <?php $i =1;
                    foreach ($siakad as $tbl){
                      ?>
                  <tr>
                  <td scope ="row"><?= $i++; ?> </td>
                    <td style = text-align:center><?= $tbl->waktu; ?></td>
                    <td style = text-align:center><?= $tbl->suhudlm; ?></td>
                    <td style = text-align:center><?= $tbl->suhuluar; ?></td>
                    <td style = text-align:center><?= $tbl->rh; ?></td>
                    <td style = text-align:center><?= $tbl->kecepatanudara; ?></td>
                    <td style = text-align:center><?= $tbl->fc; ?></td>
                    <td style = text-align:center><?= $tbl->lx; ?></td>
                    <td style = text-align:center><?= $tbl->ppfd; ?></td>
                    <td style = text-align:center><?= $tbl->wattm2; ?></td>
                  <td style=text-align:center>
                    <!-- <a href="<?= base_url('datlingluar/detail/'.$tbl->id)?>" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span><a> -->
                    <a href="<?= base_url('datlingluar/edit/'.$tbl->id)?>"  class="mr-3" title="Edit Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>
                    <a href="<?= base_url('datlingluar/hapus/'.$tbl->id)?>" onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data?')" class ="mr-auto title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span> </a>
                    
                  </td>
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Form Input Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method ="post" action="<?php echo base_url().'datlingluar/tambah_aksi';?>">
        <input type="hidden" name="id_user" value="<?php echo $user['id']; ?>" />
            <div class="form-group">
                <label>Waktu</label>
                <input type="text" name ="waktu" class ="form-control" >
                <label>Suhu BB ( °C)</label>
                <input type="int" name ="suhudlm" class ="form-control" >
                <label>Suhu BK ( °C)</label>
                <input type="int" name ="suhuluar" class ="form-control">
                <label>RH</label>
                <input type="int" name ="rh" class ="form-control">
                <label>Kecepatan Udara</label>
                <input type="int" name ="kecepatanudara" class ="form-control">
                <label>FC</label>
                <input type="int" name ="fc" class ="form-control">
                <label>Lx</label>
                <input type="int" name ="lx" class ="form-control">
                <label>PPFD</label>
                <input type="int" name ="ppfd" class ="form-control">
                <label>Watt/m²</label>
                <input type="int" name ="wattm2" class ="form-control">
                <br>
        <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
      

      </div>
    </div>
   
</div>
    </div>
