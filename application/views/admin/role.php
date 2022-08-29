 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Role</h2>
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
                <h3 class="card-title">Table Role</h3>
                <a href="<?php echo base_url('admin/list_akses/') ?>" class="btn btn-primary">List User</a>
                    
              </div>
              <?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>');?>

              <?= $this->session->flashdata('message'); ?> 
              <!-- /.card-header -->
              <div class="card-body">
                <table id="exampleMaster" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th style = text-align:center scope="col">No</th>
                  <th style = text-align:center scope="col">Role</th>
                  <th style = text-align:center scope="col">Action</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;?>
                    <?php foreach($role as $r) :?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $r['role']; ?></td>
                            <td style = text-align:center>
                            <a href="<?php echo base_url('admin/roleaccess/'.$r['id']);?>" class="btn btn-small text-warning"><i class="fa-solid fa-universal-access"></i> Akses</a>
                            <!-- <a href="<?php echo base_url('admin/list_akses/'.$r['id']);?>" class="btn btn-small text-primary"><i class="fas fa-user"></i> List Akses</a> -->
                            <!-- <a href="<?php echo base_url('admin/edit_role/'.$r['id']);?>" class="btn btn-small text-success"><i class="fas fa-pencil"></i> Edit</a> -->
                        </tr>
                        <?php $i++; ?>
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