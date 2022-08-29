 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Table Role Akses</h2>
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
            
              <div class="card-header text-left">
              <h5>Role: <?= $role['role']?></h5>
              
                <h3 class="card-title">Table Role Akses</h3>

                    
              </div>
              
              <?= $this->session->flashdata('message'); ?> 
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="exampleMaster" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th style = text-align:center scope="col">#</th>
                  <th style = text-align:center scope="col">Menu</th>
                  <th style = text-align:center scope="col">Akses</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;?>
                    <?php foreach($menu as $m) :?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $m['menu']; ?></td>
                            <td style = text-align:center>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" 
                                    <?= check_access($role['id'],$m['id']);?>
                                    data-role="<?= $role['id']; ?>" data-menu="<?= $m['id'];?>">
                                </div>

                    </td>

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