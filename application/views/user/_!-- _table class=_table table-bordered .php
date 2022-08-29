<?php
  if(!isset($_GET['dampak'])) {
    $_GET['dampak'] = "GWP";
  }

  if(!isset($_GET['tahun'])) {
    $_GET['tahun'] = "2020";
  }
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<script type="text/javascript">


function random_rgba() {
    var o = Math.round, r = Math.random, s = 255;
    return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
}


let warnaArr = [];


let prosesArr = []
let materialArr = []
let jumlahArr = []
let proses = []
let jumlahProses = []

<?php foreach($arrProses as $rowProses) { ?>
  console.log('<?php echo $rowProses; ?>')
  prosesArr.push('<?php echo $rowProses; ?>')

<?php } ?>

<?php foreach ($arrMaterial as $rowMaterial) { ?>
  console.log('<?php echo $rowMaterial; ?>')
  materialArr.push('<?php echo $rowMaterial; ?>')
  warnaArr.push(random_rgba())
<?php } ?>  

<?php foreach ($arrJumlah as $rowJumlah) { ?>
  console.log('<?php echo $rowJumlah; ?>')
  jumlahArr.push('<?php echo $rowJumlah; ?>')
  
<?php } ?>  

<?php foreach ($jumlahProses as $key => $value) { ?>
  proses.push('<?php echo $key; ?>')
  jumlahProses.push('<?php echo $value; ?>')
<?php } ?>  



console.log('proses: ' + prosesArr)
console.log('material: '+ materialArr)
console.log('jumlah: '+ jumlahArr)
console.log('jumlah proses: '+ jumlahProses)
console.log('proses unique: '+ proses)

</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
          
            <h1 class="m-0">Interpretasi</h1>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
          <form method ="get" action="<?php echo base_url().'interpretasi';?>">
          <div class="col-sm-3">
            Dampak
            <select name="dampak" class="form-select" aria-label="Default select example">>
              <option value="GWP"<?php if ($_GET["dampak"] == "GWP") echo "selected";?>>GWP</option>
              <option value="AP"<?php if ($_GET["dampak"] == "AP") echo "selected";?>>AP</option>
              <option value="EP"<?php if ($_GET["dampak"] == "EP") echo "selected";?>>EP</option>
              <option value="ODP"<?php if ($_GET["dampak"] == "ODP") echo "selected";?>>ODP</option>
              <option value="HCT"<?php if ($_GET["dampak"] == "HCT") echo "selected";?>>HCT</option>
            </select>
            Tahun
            <select name="tahun" class="form-select" aria-label="Default select example">
              <?php foreach ($dtahun as $row) { ?>
                <option value="<?= $row->tahun; ?>"<?php if ($_GET["tahun"] == $row->tahun) echo "selected";?>><?= $row->tahun;?></option>
              <?php }?>
              <!-- <option value="2020"<?php if ($_GET["tahun"] == "2020") echo "selected";?>>2020</option>
              <option value="2021"<?php if ($_GET["tahun"] == "2021") echo "selected";?>>2021</option>
              <option value="2022"<?php if ($_GET["tahun"] == "2022") echo "selected";?>>2022</option>
              <option value="2023"<?php if ($_GET["tahun"] == "2023") echo "selected";?>>2023</option> -->
            </select>
            <br>
          <button style="float: left" type="submit" class="btn btn-primary">Simpan</button>
</form> 
<br>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- <div class="col-lg-2"></div> -->
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Bar Chart</h3>
                </div>
              </div>
              <div class="card-body" align="center">
                <div>

                <?php $no = 0; foreach ($jumlahProses as $key => $value) { ?>
                  <center><h3><?php echo $key; ?></h3></center>
                  <canvas id="barChart<?php echo $no+1; ?>" width="400px" height="400px"></canvas>
                  <br>

                  <script></script>

                  

                <?php $no++;} ?>

                </div>
              </div>
            </div>
        
          </div>
          <!-- <div class="col-lg-2"></div> -->
        </div>

        <div class="row">
          <!-- <div class="col-lg-2"></div> -->
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th style = text-align:center scope="col"> Proses</th>
                    <th style = text-align:center  scope="col"> Dampak </th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($arrFix as $key => $value) {
                   
                   ?>
 
                   <tr>
                     <td><?= $key + 1 ?>.</td>
                     <td style = text-align:center scope="col"> <?= $value[0]; ?></td>
                     <td style = text-align:center  scope="col"> <?= $value[1]; ?></td>
                   </tr>
                   <?php
                     
                   }?>
                 </tbody>
                 </table>
              </div>
            </div>
          </div>
          <!-- <div class="col-lg-2"></div> -->
        </div>

        <div class="row">
          <!-- /.col-md-6 -->
          <!-- <div class="col-lg-2"></div> -->
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Pie Chart</h3>
                </div>
              </div>
              <div class="card-body" align="center">
              <div>
              <?php $no = 0; foreach ($jumlahProses as $key => $value) { ?>
                  <center><h3><?php echo $key; ?></h3></center>
                  <canvas id="pieChart<?php echo $no+1; ?>" width="400px" height="400px"></canvas>
                  <br>

                  <script></script>

                  

                <?php $no++;} ?>
              </div>
              </div>
            </div>
            <!-- /.card -->

              </div>
            </div>
          </div>
          <!-- <div class="col-lg-2"></div> -->
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script>

let j = 0;

let barCanvas;
let barChart;

let pieCanvas;
let pieChart;

console.log('warna: '+warnaArr.length)

  for(let i = 0; i < jumlahProses.length; i++) {
    
    console.log("i: "+i)
    console.log("j: "+j)
    console.log('jumlahProses[i]: '+jumlahProses[i])
    

    
    console.log(materialArr.slice(j,jumlahProses[i]))
    console.log(jumlahArr.slice(j,jumlahProses[i]))
    console.log("slice "+j,(j+parseInt(jumlahProses[i])))
    console.log("warnaArr: "+j,(j+parseInt(jumlahProses[i])))
    barCanvas = document.getElementById('barChart'+(i+1)).getContext('2d');
    barChart = new Chart(barCanvas, {
        type: 'bar',
        data: {
            labels: materialArr.slice(j,j+parseInt(jumlahProses[i])),
            datasets: [{
                label: null,
                data: jumlahArr.slice(j,j+parseInt(jumlahProses[i])),
                backgroundColor: warnaArr.slice(j,j+parseInt(jumlahProses[i])),
                
                borderColor: warnaArr.slice(j,j+parseInt(jumlahProses[i])),
                
                borderWidth: 1
            }]
        },
        options: {
          tooltips: {
            mode: 'index'
          },
          indexAxis: 'y',
          plugins: {
            legend: {
              display: false,
              // position: 'bottom'
            }
          },
          responsive: false,
          // maintainAspectRatio: true,
            scales: {
                x: {
                  type: 'logarithmic',
                }
            }
        }
    });

    pieCanvas = document.getElementById('pieChart'+(i+1)).getContext('2d');
    pieChart = new Chart(pieCanvas, {
        type: 'pie',
        data: {
            labels: materialArr.slice(j,j+parseInt(jumlahProses[i])),
            datasets: [{
                data: jumlahArr.slice(j,j+parseInt(jumlahProses[i])),
                backgroundColor: warnaArr.slice(j,j+parseInt(jumlahProses[i])),
                // backgroundColor: [
                //     'rgba(255, 99, 132, 0.2)',
                //     'rgba(54, 162, 235, 0.2)',
                //     'rgba(255, 206, 86, 0.2)',
                // ],
                borderColor: warnaArr.slice(j,j+parseInt(jumlahProses[i])),
                // borderColor: [
                //     'rgba(255, 99, 132, 1)',
                //     'rgba(54, 162, 235, 1)',
                //     'rgba(255, 206, 86, 1)',
                // ],
                borderWidth: 1
            }]
        },
        options: {
          plugins: {
            legend: {
              position: 'bottom'
            }
          },
          responsive: false,
          // maintainAspectRatio: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    console.log(materialArr)
    j = j + parseInt(jumlahProses[j])
  }

    // barCanvas = document.getElementById('barChart1').getContext('2d');
    // barChart = new Chart(barCanvas, {
    //     type: 'bar',
    //     data: {
    //         labels: materialArr.slice(0,2),
    //         datasets: [{
    //             label: null,
    //             data: jumlahArr.slice(0,2),
    //             backgroundColor: warnaArr.slice(0,2),
                
    //             borderColor: warnaArr.slice(0,2),
                
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //       tooltips: {
    //         mode: 'index'
    //       },
    //       indexAxis: 'y',
    //       plugins: {
    //         legend: {
    //           display: false,
    //           // position: 'bottom'
    //         }
    //       },
    //       responsive: false,
    //       // maintainAspectRatio: true,
    //         scales: {
    //             x: {
    //               type: 'logarithmic',
    //             }
    //         }
    //     }
    // });


    // barCanvas = document.getElementById('barChart2').getContext('2d');
    // barChart = new Chart(barCanvas, {
    //     type: 'bar',
    //     data: {
    //         labels: materialArr.slice(2,3),
    //         datasets: [{
    //             label: null,
    //             data: jumlahArr.slice(2,3),
    //             backgroundColor: warnaArr.slice(2,3),
                
    //             borderColor: warnaArr.slice(2,3),
                
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //       tooltips: {
    //         mode: 'index'
    //       },
    //       indexAxis: 'y',
    //       plugins: {
    //         legend: {
    //           display: false,
    //           // position: 'bottom'
    //         }
    //       },
    //       responsive: false,
    //       // maintainAspectRatio: true,
    //         scales: {
    //             x: {
    //               type: 'logarithmic',
    //             }
    //         }
    //     }
    // });
    






</script>









    // let barCanvas = document.getElementById('barChart<?php echo $nomer; ?>').getContext('2d');
    // let barChart = new Chart(barCanvas, {
    //     type: 'bar',
    //     data: {
    //         labels: prosesArr,
    //         datasets: [{
    //             label: null,
    //             data: jumlahArr,
    //             backgroundColor: warnaArr,
    //             // backgroundColor: [
    //             //     'rgba(255, 99, 132, 0.2)',
    //             //     'rgba(54, 162, 235, 0.2)',
    //             //     'rgba(255, 206, 86, 0.2)',
    //             // ],
    //             borderColor: warnaArr,
    //             // borderColor: [
    //             //     'rgba(255, 99, 132, 1)',
    //             //     'rgba(54, 162, 235, 1)',
    //             //     'rgba(255, 206, 86, 1)',
    //             // ],
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //       indexAxis: 'y',
    //       plugins: {
    //         legend: {
    //           display: false,
    //           // position: 'bottom'
    //         }
    //       },
    //       responsive: false,
    //       // maintainAspectRatio: true,
    //         scales: {
    //             x: {
    //                 beginAtZero: true
    //             }
    //         }
    //     }
    // });
    // $nomer = $nomer + 1;