<div class="content-wrapper">

<section class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1>Material and Mass Balance</h1>
        </div>
        

        </div>
        <div class="row">
        <div class="dropdown" align="right">
        <!-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $tahun; ?>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php foreach ($dtahun as $row) { ?>
              <a class="dropdown-item" href="material?tahun=<?= $row->tahun;?>"><?= $row->tahun;?></a>
            <?php }?> -->
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= $tahun; ?>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php foreach ($dtahun as $row) { ?>
              <a class="dropdown-item" href="material?tahun=<?= $row->tahun;?>"><?= $row->tahun;?></a>
            <?php }?>
          <!-- <a class="dropdown-item" href="material?tahun=2020">2020</a>
            <a class="dropdown-item" href="material?tahun=2021">2021</a>
            <a class="dropdown-item" href="material?tahun=2022">2022</a>
            <a class="dropdown-item" href="material?tahun=2023">2023</a> -->
          </div>
        </div>
      
</div>
    </div>
</section>

<div class="card">
<div class="card-header text-right">
<h3 class="card-title ">Tabel Material and Mass Balance</h3>
    <!-- <button class = "btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class= "fa fa-plus" ></i> Tambah Data </button>     -->
</div>

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
    <tr>
<th style = text-align:center scope="col"> No </th>
<th style = text-align:center width = 120px scope="col"> Proses </th>
<th style = text-align:center width = 250px scope="col"> Jenis </th>
<th style = text-align:center  scope="col" > Nama</th>
<th style = text-align:center  scope="col" > Jumlah</th>
<!-- <th style = text-align:center scope="col"> Satuan </th> -->
<th style = text-align:center width = 200px scope="col"> Jenis Data </th>
    </tr>
</thead>
<tbody>
<!-- <?php $i = 0;
foreach ($siakad as $tbl) {
  $i++;
  
?>
<tr>
<td scope ="row"><?= $i; ?> </td>
<td rowspan="<?php echo ""?>"style = text-align:center><?= $tbl->proses; ?></td>
<td style = text-align:center><?= $tbl->jenis_material; ?></td>
<td style = text-align:center><?= $tbl->nama_material; ?></td>
<td style = text-align:center><?= $tbl->jumlah_material; ?></td>
<td style = text-align:center><?= $tbl->satuan; ?></td>
<td style = text-align:center><?= $tbl->tipedata; ?></td>
</tr>
<?php 



} ?> -->

<?php 
foreach ($dataArrFix as $key => $value) {
  
?>

<?php foreach ($value as $k => $v) { ?>
<tr>
<?php if ($k == 0) : ?>
                        
<td rowspan="<?= count($value);?>"><?= $key + 1; ?> </td>
<td style = text-align:center rowspan="<?= count($value);?>"><?= $v->proses; ?></td>
<?php endif ?>

<td style = text-align:center><?= $v->jenis_material; ?></td>
<td style = text-align:center><?= $v->nama_material; ?></td>
<td style = text-align:center><?= $v->jumlah_material; ?></td>
<!-- <td style = text-align:center><?= $v->satuan; ?></td> -->
<td style = text-align:center><?= $v->tipedata; ?></td>
</tr>

<?php } ?>
  </tr>
<?php 

} ?>



</tbody>
</table>
</div>

</div>

</div>

</div>



</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    < class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Form Input Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      
      

      </div>
    </div>

</div>
    </div>
