 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Daftar User</h2>
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
                <h3 class="card-title">Table Daftar User</h3>
                <!-- <button type="button" class ="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> 
                    <i class="fa fa-plus-circle"></i> Add Role -->
                    
              </div>
            
              <!-- /.card-header -->
              <div class="card-body">
                <table id="exampleMaster" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th style = text-align:center scope="col">Id</th>
                  <th style = text-align:center scope="col">Nama</th>
                  <th style = text-align:center scope="col">Email</th>
                  <!-- <th style = text-align:center scope="col">Tanggal Pembuatan</th> -->
                  <th style = text-align:center scope="col">Lokasi</th>
                  <th style = text-align:center scope="col">Nama Greenhouse</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;?>
                    <?php foreach($daftar as $la) :?>
                        <tr>
                            <!-- <td style = text-align:center scope="row"><?= $i;?></td> -->
                            <td style=text-align:center><?= $la->id; ?></td>
                            <td style=text-align:center><?= $la->name; ?></td>
                            <td style=text-align:center><?= $la->email; ?></td>
                            <!-- <td style=text-align:center><?= $la->date_created; ?></td> -->
                            <td style=text-align:center><?= $la->lokasi; ?></td>
                            <td style=text-align:center><?= $la->nama_gh; ?></td>
                            
                            
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach;?>
                        
                  </tbody>
                </table>
                <div class="button">
          <input type="button" class ="btn btn-primary" value="Back" onclick ="history.back()">
        </div>
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
        <h5 class="modal-title" id="exampleModalLabel">Add New Role!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/menu/tambah_role');?>" method="post">
      <div class="modal-body">
        <div class="form-group">
            <input type="text" class="form-control"
            id="role" name="role" placeholder="Role name">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
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

</script>