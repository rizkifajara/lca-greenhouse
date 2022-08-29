 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Sub Menu Management</h2>
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
                <h3 class="card-title">Table Sub Menu Management</h3>
                <button type="button" class ="btn btn-primary" data-toggle="modal" data-target="#exampleModal2"> 
                    <i class="fa fa-plus-circle"></i> Add New Sub Menu
                    
              </div>
              <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                  <?= validation_errors();?>
                </div>
                <?php endif;?>
              <?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>');?>

              <?= $this->session->flashdata('message'); ?> 
              <!-- /.card-header -->
              <div class="card-body">
                <table id="exampleMaster" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th style = text-align:center scope="col">No</th>
                  <th style = text-align:center scope="col">Title</th>
                  <th style = text-align:center scope="col">Menu</th>
                  <th style = text-align:center scope="col">Url</th>
                  <th style = text-align:center scope="col">Icon</th>
                  <!-- <th style = text-align:center scope="col">Active</th> -->
                  <th style = text-align:center scope="col">Action</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;?>
                    <?php foreach($subMenu as $sm) :?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $sm['title']; ?></td>
                            <td><?= $sm['menu']; ?></td>
                            <td><?= $sm['url']; ?></td>
                            <td><?= $sm['icon']; ?></td>
                            <!-- <td><?= $sm['is_active']; ?></td> -->
                            <td style = text-align:center>
                            <a href="<?php echo base_url('admin/hapus_submenu/'.$sm['id']);?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> </a>
                            <a href="<?php echo base_url('admin/edit_submenu/'.$sm['id']);?>" class="btn btn-small text-warning"><i class="fas fa-pencil"></i> </a>
                            </td>
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
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal2Label">Add New Sub Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url().'admin/tambah_submenu';?>" method="post">
      <div class="modal-body">
        <div class="form-group">
            <input type="text" class="form-control"
            id="title" name="title" placeholder="Sub menu title">
        </div>
        <div class="form-group">
            <select name="menu_id"id="menu_id" class="form-control">
              <option value="">Select Menu</option>
              <?php foreach ($menu as $m) :?>
                <option value="<?= $m['id']; ?>"><?= $m['menu'];?> </option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control"
            id="url" name="url" placeholder="Sub menu url">
        </div>
        <div class="form-group">
            <input type="text" class="form-control"
            id="icon" name="icon" placeholder="Sub menu icon">
        </div>
        <div class="form-group">
            <input type="int" class="form-control"
            id="urutan" name="urutan" placeholder="Urutan">
        </div>
        <!-- <div class="form-group">
            <input type="text" class="form-control"
            id="active" name="active" placeholder="Sub menu active">
        </div> -->
        <!-- <div class="form-group">
           <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
            <label class="form-check-label" for="is_active">
             Active?
            </label>
        </div>
      </div> -->
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