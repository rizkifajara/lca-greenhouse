<?php
  if(!isset($_GET['proses'])) {
    $_GET['proses'] = "Penyemaian";
  }
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <h1>Life Cycle Impact Assessment</h1>
            <br>
            <div class="row">
          <div class="col-md-4">
          </div>
          <div class="col-md-5"></div>
          <div class="col-md-3">
            
            <div class="dropdown" align="right">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $tahun; ?>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php foreach ($dtahun as $row) { ?>
              <a class="dropdown-item" href="lcia?proses=<?php echo $_GET['proses'];?>&tahun=<?= $row->tahun;?>"><?= $row->tahun;?></a>
            <?php }?>
          </div>
        </div>
            
          </div>
       
        </div>
        
      </div><!-- /.container-fluid -->
</section>

                <table id="tabel_budidaya" class="table table-bordered table-striped tabel_example">
                  <thead>
                  <tr>
                    <th rowspan="3" style = "text-align:center; vertical-align: center;" scope="col"> No </th>
                    <th rowspan="3" style = "text-align:center; vertical-align: center;" scope="col"> Nama </th>
                    <th rowspan="3" style = "text-align:center; vertical-align: center;"  scope="col" > Jumlah</th>
                    <!-- <th rowspan="3" style = "text-align:center; vertical-align: center;"  scope="col"> Satuan </th> -->
                    <th colspan="5"style = text-align:center scope="col"> Dampak </th> 
                  </tr>
                  <tr>
                    <th style = text-align:center scope="col"> GWP </th> 
                    <th style = text-align:center scope="col"> AP </th>
                    <th style = text-align:center  scope="col"> EP </th>
                    <th style = text-align:center  scope="col" > ODP</th>
                    <th style = text-align:center  scope="col"> HCT </th>
                  </tr>
                  <tr>
                    <th style = text-align:center scope="col"> kg CO2 eq</th>
                    <th style = text-align:center  scope="col" > kg SO2 eq</th>
                    <th style = text-align:center  scope="col"> kg PO4 eq </th>
                    <th style = text-align:center scope="col">kg CFC-11 eq </th> 
                    <th style = text-align:center scope="col">kg 1,4-DCB eq </th> 
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i =1;
                    foreach ($siakad as $tbl){
                      ?>
                  <tr>
                    <td style = text-align:center scope="row"><?= $i;?></td>
                    <td style = text-align:left><?= $tbl->nama_material; ?></td>
                    <td style = text-align:center><?= $tbl->jumlah_material; ?></td>
                    <!-- <td style = text-align:center><?= $tbl->satuan ?></td> -->
                    <td style = text-align:center><?= $tbl->GWP * $tbl->jumlah_material; ?></td>
                    <td style = text-align:center><?php echo $tbl->AP * $tbl->jumlah_material; ?></td>
                    <td style = text-align:center><?= $tbl->EP * $tbl->jumlah_material; ?></td>
                    <td style = text-align:center><?= $tbl->ODP * $tbl->jumlah_material; ?></td>
                    <td style = text-align:center><?= $tbl->HCT* $tbl->jumlah_material; ?></td>
                  </tr>
                 
                  <script type="text/javascript">

                  </script>
                  <?php

                    $i++;

                    } ?>
                  
                  <tr>
                      <td colspan="3" style=" text-align:left">Jumlah dampak </td>
                      <td style = text-align:center><?= $sumTable[0]->jumlah_gwp; ?></td>
                      <td style = text-align:center><?= $sumTable[0]->jumlah_ap; ?></td>
                      <td style = text-align:center><?= $sumTable[0]->jumlah_ep; ?></td>
                      <td style = text-align:center><?= $sumTable[0]->jumlah_odp; ?></td>
                      <td style = text-align:center><?= $sumTable[0]->jumlah_hct; ?></td>
                  </tr>
                  </tbody>
                </table>
      
    
</div>