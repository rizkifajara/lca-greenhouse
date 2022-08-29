 <!-- form inline -->
 <style>
  form {
    display: inline-block;
  }
 </style>
 
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h2><?php echo $title; ?></h2> -->
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
        <div class="card">
              
              <div class="card-body">
                <h3>Kalkulator Nutrisi</h3>
                <br>
                <p>Perhitungan berat nutrisi yang digunakan (dalam gram) dilakukan dengan memasukkan input
                    ppm dan banyak air yang digunakan..</p>
              </div>
            </div>
          <div class="col-14">
          <!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap -->
    
</head>
<body>
<div class="container bg-dark text-white">
    <?php
    $bil1=null;
    $bil2=null;
    if (isset($_GET['bil1'])) {

        $bil1=$_GET['bil1'];
        $bil2=$_GET['bil2'];
        $hasil=0;
        $operasi=$_GET["operasi"];
        switch ($operasi) {
            // case '+':
            //     $hasil = $bil1+$bil2;
            //     break;
            // case '-':
            //     $hasil = $bil1-$bil2;
            //     break;
            case 'x':
                $hasil = ($bil1*$bil2)/1000;
                break;
            // case '/':
            //     $hasil = $bil1/$bil2;
            //     break;
            // case '%':
            //     $hasil = $bil1%$bil2;
            //     break;

            // case '**':
            //     $hasil = $bil1**$bil2;
            //     break;
        }
    }
    ?>
    <div class="row mb-2">
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
            <h2>Kalkulator Nutrisi</h2>
            <div class="form-group">
                <label>Besar PPM</label>
                <input type="text" name="bil1" class="form-control" value="<?php echo $bil1; ?>" required>
            </div>
            <div class="form-group">
                <label>Air yang digunakan (liter)</label>
                <input type="text" name="bil2" class="form-control" value="<?php echo $bil2; ?>"  required>
            </div>
            <div class="form-group">

            Fungsi yang digunakan
                <select class="form-control" name="operasi">
                    <!-- <option value="+">+</option>
                    <option value="-">-</option> -->
                    <option value="x">x (Perkalian) </option>
                    <!-- <option value="/">/</option>
                    <option value="%">%</option>
                    <option value="**">**</option> -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Hitung</button>
            
        </form>
		
		<br>
        
        <form method="POST" action="<?php echo base_url().'/kalkulatornutrisi/save';?>">
        <?php
        if (isset($_GET['bil1'])) {
            echo "<br><button type='submit' class='btn btn-success'>Simpan</button>";
            echo "<h1>$hasil gram </h1>";
            echo "<input type='hidden' name='hasil_form' value='$hasil' />";
            echo "<input type='hidden' name='id_user' value='$id_user' />";
			echo "<input type='hidden' name='ppm' value='$bil1' />";
			echo "<input type='hidden' name='air' value='$bil2' />";
            
        }
        ?>
        </form>
    </div>
</div>
</body>
</html>
<br>
            <div class="card">
              <div class="card-header text-right">
                <h3 class="card-title">Table Perhitungan Komposisi Nutrisi</h3>
                    
              </div>
              <?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>');?>

              <?= $this->session->flashdata('message'); ?> 
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th style = text-align:center scope="col">Tanggal</th>
				  <th style = text-align:center scope="col">PPM</th>
				  <th style = text-align:center scope="col">Air</th>
                  <th style = text-align:center scope="col">N (NO3)<br> (gr)</th>
                  <th style = text-align:center scope="col">N (NH4)<br> (gr)</th>
                  <th style = text-align:center scope="col">P<br> (gr)</th>
                  <th style = text-align:center scope="col">K<br> (gr)</th>
                  <th style = text-align:center scope="col">Ca<br> (gr)</th>
                  <th style = text-align:center scope="col">Mg<br> (gr)</th>
                  <th style = text-align:center scope="col">S<br> (gr)</th>
                  <th style = text-align:center scope="col">Volume Pekatan A<br> yang dibutuhkan (ml)</th>
                  <th style = text-align:center scope="col">Volume Pekatan B<br> yang dibutuhkan (ml)</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    foreach($kalkulator as $row) {
                  ?>
                  <tr>
                  <td style = text-align:center><?php echo $row->tanggal; ?></td>
				  <td style = text-align:center><?php echo $row->ppm; ?></td>
				  <td style = text-align:center><?php echo $row->air; ?></td>
                  <td style = text-align:center><?php echo 0.235 * $row->nutrisi; ?></td>
                  <td style = text-align:center><?php echo 0.038 * $row->nutrisi; ?></td>
                  <td style = text-align:center><?php echo 0.048 * $row->nutrisi; ?></td>
                  <td style = text-align:center><?php echo 0.369 * $row->nutrisi; ?></td>
                  <td style = text-align:center><?php echo 0.16 * $row->nutrisi; ?></td>
                  <td style = text-align:center><?php echo 0.048 * $row->nutrisi; ?></td>
                  <td style = text-align:center><?php echo 0.096 * $row->nutrisi; ?></td>
                  <td style = text-align:center><?php echo $row->nutrisi; ?></td>
                  <td style = text-align:center><?php echo $row->nutrisi; ?></td>
                  </tr>

                  <?php
                    }
                  ?>
                    
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

$(document).ready(function() {
    $('#example2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

</script>