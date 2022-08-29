<?php
  if(!isset($_GET['proses'])) {
    $_GET['proses'] = "Pembibitan";
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
            <h1>Life Cycle Inventory</h1>
            <br>
            <div class="row">
          <div class="col-md-4">
          <button class = "btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class= "fa fa-plus" ></i> Input LCI</button>    
          </div>
          <div class="col-md-5"></div>
          <div class="col-md-3">
          <div class="dropdown" align="right">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $tahun; ?>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php foreach ($dtahun as $row) { ?>
              <a class="dropdown-item" href="lci?proses=<?php echo $_GET['proses'];?>&tahun=<?= $row->tahun;?>"><?= $row->tahun;?></a>
            <?php }?>
            <!-- <a class="dropdown-item" href="lci?proses=<?php echo $_GET['proses'];?>&tahun=2020">2020</a>
            <a class="dropdown-item" href="lci?proses=<?php echo $_GET['proses'];?>&tahun=2021">2021</a>
            <a class="dropdown-item" href="lci?proses=<?php echo $_GET['proses'];?>&tahun=2022">2022</a>
            <a class="dropdown-item" href="lci?proses=<?php echo $_GET['proses'];?>&tahun=2023">2023</a> -->
          </div>
        </div>
       
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
              
              <div class="card-body">
                <h3>INPUT</h3>
                <br>
                <p>Tabel berikut adalah input yang terdiri dari bahan baku, energi, dan air.</p>
              </div>
            </div>
            <div class="card">
              
              <div class="card-header">Material</div>
              <div class="card-header">Raw Material</div>
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped tabel_example">
                  <thead>
                  <tr>
                  <th style = text-align:center scope="col"> No </th>
                    <th style = text-align:center  scope="col"> Proses </th>
                    <th style = text-align:center scope="col">Jenis</th>
                    <th style = text-align:center scope="col"> Nama Material </th>
                    <th style = text-align:center  scope="col" > Jumlah</th>
                    <!-- <th style = text-align:center  scope="col"> Satuan </th> -->
                    <th style = text-align:center scope="col"> Jenis Data </th>
                    <th style = text-align:center > Aksi </th> 
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i =1; $j = 0;
                    foreach ($inventory as $tbl){
                      $j++;
                      if($tbl->jenis_material != 'Raw Material') continue;
                      ?>
                  <tr>
                  <td scope ="row"><?= $i++; ?> </td>
                    <td style = text-align:center><?= $tbl->proses; ?></td>
                    <td style = text-align:center><?= $tbl->jenis_material; ?></td>
                    <td style = text-align:center><?= $tbl->nama_material; ?></td>
                    <td style = text-align:center><?= round($tbl->jumlah_material,3);?></td>
                    <!-- <td style = text-align:center><?= $tbl->satuan; ?></td> -->
                    <td style = text-align:center><?= $tbl->tipedata; ?></td>
                  <td style = text-align:center>
                    <a href="<?= base_url('lci/detail/'.$tbl->inventoryId)?>" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                    <a href="#" class="mr-3" title="Edit Record" data-toggle="modal" data-target="#edit<?php echo $j; ?>"><span class="fa fa-pencil"></span></a>
                    <a href="<?= base_url('lci/hapus/'.$tbl->inventoryId)?>" onclick="deleteLci(event)" class ="mr-auto deleteButton" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                    
                  </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="edit<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="edit<?php echo $j; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="exampleModalLabel">Input LCI</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method ="post" action="<?php echo base_url().'lci/update';?>">
                              <div class="form-group">
                                <input type="hidden" name="proses" value="<?php echo $_GET['proses']; ?>" />
                                <input type="hidden" name="inventoryId" value="<?= $tbl->inventoryId; ?>" />
                                  
                                  
                                  <label>Jenis Material</label>
                                  <select name="jenis_material"class="form-select" aria-label="Default select example">>
                                    <option value="Raw Material">Raw Material</option>
                                    <option value="Support Material">Support Material</option>
                                    <option value="Bahan Kimia">Bahan Kimia</option>
                                    <option value="Energi">Energi</option>
                                    <option value="Air">Air</option>
                                  </select>

                                  <label>Nama Material</label>
                                  <select name="nama_material"class="form-select" aria-label="Default select example">>
                                    <?php foreach ($materials as $material) { ?>
                                    <option value="<?php echo $material->nama_material; ?>"><?=$material->nama_material; ?></option>
                                    <?php } ?>
                                  </select>

                                  <label>Jumlah Material</label>
                                  <input type="decimal" name="jumlah_material" class="form-control" />
                                  
                                  <label>Tahun</label>
                                  <select name="tahun" class="form-select" aria-label="Default select example">
                                    <?php foreach ($dtahun as $row) { ?>
                                      <option value="<?= $row->tahun;?>" <?php if ($tbl->tahun == $row->tahun) echo "selected";?>><?= $row->tahun; ?></option>
                                    <?php } ?>
                                    <!-- <option value="2020"selected>2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option> -->
                                  </select>
                                  
                                  <!-- <label>Satuan</label>
                                  <select name="satuan" class="form-select" aria-label="Default select example">>
                                  <?php foreach($satuan as $sat) {?>
                                  <option value="<?= $sat->satuan;?>"><?= $sat->satuan; ?></option>
                                  <?php } ?>
                                  </select> -->
                                  
                                  <label>Tipe Data</label>
                                  <select name="tipedata" class="form-select" aria-label="Default select example">>
                                    <option value="Primer">Primer</option>
                                    <option value="Sekunder">Sekunder</option>
                                  </select>
                                  
                                  
                                  <br>
                          <button style="float: right" type="submit" class="btn btn-primary">Simpan</button>
                          </form>
                        </div>
                        

                        </div>
                      </div>
                    
                  </div>
                  
                  <script type="text/javascript">

                  </script>
                  <?php

                      

                    } 
                    unset($tbl);
                    ?>
                  </tbody>
                </table>
              </div>
              <div class="card-header">Support Material</div>
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped tabel_example">
                  <thead>
                  <tr>
                  <th style = text-align:center scope="col"> No </th>
                    <th style = text-align:center  scope="col"> Proses </th>
                    <th style = text-align:center scope="col">Jenis</th>
                    <th style = text-align:center scope="col"> Nama Material</th>
                    <th style = text-align:center  scope="col" > Jumlah</th>
                    <!-- <th style = text-align:center  scope="col"> Satuan </th> -->
                    <th style = text-align:center scope="col"> Jenis Data </th>
                    <th style = text-align:center > Aksi </th> 
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i =1; $j=0;
                    foreach ($inventory as $tbl){
                      $j++;
                      if($tbl->jenis_material != 'Support Material') continue;
                      ?>
                  <tr>
                  <td scope ="row"><?= $i++; ?> </td>
                    <td style = text-align:center><?= $tbl->proses; ?></td>
                    <td style = text-align:center><?= $tbl->jenis_material; ?></td>
                    <td style = text-align:center><?= $tbl->nama_material; ?></td>
                    <td style = text-align:center><?= round($tbl->jumlah_material,3); ?></td>
                    <!-- <td style = text-align:center><?= $tbl->satuan; ?></td> -->
                    <td style = text-align:center><?= $tbl->tipedata; ?></td>
                  <td style = text-align:center>
                    <a href="<?= base_url('lci/detail/'.$tbl->inventoryId)?>" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                    <a href="#" class="mr-3" title="Edit Record" data-toggle="modal" data-target="#edit<?php echo $j; ?>"><span class="fa fa-pencil"></span></a>
                    <a href="<?= base_url('lci/hapus/'.$tbl->inventoryId)?>" onclick="deleteLci(event)" class ="mr-auto deleteButton" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                    
                  </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="edit<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="edit<?php echo $j; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="exampleModalLabel">Input LCI</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method ="post" action="<?php echo base_url().'lci/update';?>">
                              <div class="form-group">
                                <input type="hidden" name="proses" value="<?php echo $_GET['proses']; ?>" />
                                <input type="hidden" name="inventoryId" value="<?= $tbl->inventoryId; ?>" />
                                  <!-- <label>Nama Proses</label>
                                  <select name="proses" class="form-select" aria-label="Default select example">>
                                    <option value="Penyemaian">Penyemaian</option>
                                    <option value="Budidaya">Budidaya</option>
                                    <option value="Pemanenan">Pemanenan</option>
                                  </select> -->
                                  
                                  <label>Jenis Material</label>
                                  <select name="jenis_material"class="form-select" aria-label="Default select example">>
                                  
                                  <option value="Raw Material" selected> Raw Material </option>
                                        </select>

                                  <label>Nama Material</label>
                                  <select name="nama_material"class="form-select" aria-label="Default select example">>
                                    <?php foreach ($materials as $material) { ?>
                                    <option value="<?php echo $material->nama_material; ?>"><?=$material->nama_material; ?></option>
                                    <?php } ?>
                                  </select>

                                  <label>Jumlah Material</label>
                                  <input type="decimal" name="jumlah_material" class="form-control" />
                                  
                                  <label>Tahun</label>
                                  <select name="tahun" class="form-select" aria-label="Default select example">
                                    <?php foreach ($dtahun as $row) { ?>
                                      <option value="<?= $row->tahun;?>" <?php if ($tbl->tahun == $row->tahun) echo "selected";?>><?= $row->tahun; ?></option>
                                    <?php } ?>
                                    <!-- <option value="2020"selected>2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option> -->
                                  </select>
                                  
                                  <!-- <label>Satuan</label>
                                  <select name="satuan" class="form-select" aria-label="Default select example">>
                                  <?php foreach($satuan as $sat) {?>
                                  <option value="<?= $sat->satuan;?>"><?= $sat->satuan; ?></option>
                                  <?php } ?>
                                  </select> -->
                                  
                                  <label>Tipe Data</label>
                                  <select name="tipedata" class="form-select" aria-label="Default select example">>
                                    <option value="Primer">Primer</option>
                                    <option value="Sekunder">Sekunder</option>
                                  </select>
                                  
                                  
                                  <br>
                          <button style="float: right" type="submit" class="btn btn-primary">Simpan</button>
                          </form>
                        </div>
                        

                        </div>
                      </div>
                    
                  </div>
                  
                  <script type="text/javascript">

                  </script>
                  <?php

                      

                    } 
                    unset($tbl);
                    ?>
                  </tbody>
                </table>
              </div>
              </div>
              <div class="card">
              <div class="card-header">Bahan Kimia</div>
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped tabel_example">
                  <thead>
                  <tr>
                  <th style = text-align:center scope="col"> No </th>
                    <th style = text-align:center  scope="col"> Proses </th>
                    <th style = text-align:center scope="col">Jenis</th>
                    <th style = text-align:center scope="col"> Nama Material </th>
                    <th style = text-align:center  scope="col" > Jumlah</th>
                    <!-- <th style = text-align:center  scope="col"> Satuan </th> -->
                    <th style = text-align:center scope="col"> Jenis Data </th>
                    <th style = text-align:center > Aksi </th> 
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i =1; $j = 0;
                    foreach ($inventory as $tbl){
                      $j++;
                      if($tbl->jenis_material != 'Bahan Kimia') {continue;}
                      ?>
                  <tr>
                  <td scope ="row"><?= $i++; ?> </td>
                    <td style = text-align:center><?= $tbl->proses; ?></td>
                    <td style = text-align:center><?= $tbl->jenis_material; ?></td>
                    <td style = text-align:center><?= $tbl->nama_material; ?></td>
                    <td style = text-align:center><?= round($tbl->jumlah_material,3); ?></td>
                    <!-- <td style = text-align:center><?= $tbl->satuan; ?></td> -->
                    <td style = text-align:center><?= $tbl->tipedata; ?></td>
                  <td style = text-align:center>
                    <a href="<?= base_url('lci/detail/'.$tbl->inventoryId)?>" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                    <a href="#" class="mr-3" title="Edit Record" data-toggle="modal" data-target="#edit<?php echo $j; ?>"><span class="fa fa-pencil"></span></a>
                    <a href="<?= base_url('lci/hapus/'.$tbl->inventoryId)?>" onclick="deleteLci(event)" class ="mr-auto deleteButton" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                    
                  </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="edit<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="edit<?php echo $j; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="exampleModalLabel">Input LCI</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method ="post" action="<?php echo base_url().'lci/update';?>">
                              <div class="form-group">
                                <input type="hidden" name="proses" value="<?php echo $_GET['proses']; ?>" />
                                <input type="hidden" name="inventoryId" value="<?= $tbl->inventoryId; ?>" />
                                  <!-- <label>Nama Proses</label>
                                  <select name="proses" class="form-select" aria-label="Default select example">>
                                    <option value="Penyemaian">Penyemaian</option>
                                    <option value="Budidaya">Budidaya</option>
                                    <option value="Pemanenan">Pemanenan</option>
                                  </select> -->
                                  
                                  <label>Jenis Material</label>
                                  <select name="jenis_material"class="form-select" aria-label="Default select example">>
                                  <?php foreach($jenismat as $jm) { ?>
                                  <option value ="<?= $jm->jenis_material; ?>"><?=$jm->jenis_material;?></option>
                                   <?php } ?>
                                  </select>

                                  <label>Nama Material</label>
                                  <select name="nama_material"class="form-select" aria-label="Default select example">>
                                    <?php foreach ($materials as $material) { ?>
                                    <option value="<?php echo $material->nama_material; ?>"><?=$material->nama_material; ?></option>
                                    <?php } ?>
                                  </select>

                                  <label>Jumlah Material</label>
                                  <input type="decimal" name="jumlah_material" class="form-control" />
                                  
                                  <label>Tahun</label>
                                  <select name="tahun" class="form-select" aria-label="Default select example">
                                    <?php foreach ($dtahun as $row) { ?>
                                      <option value="<?= $row->tahun;?>" <?php if ($tbl->tahun == $row->tahun) echo "selected";?>><?= $row->tahun; ?></option>
                                    <?php } ?>
                                  <!-- <option value="2020"selected>2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option> -->
                                  </select>
                                  
                                  <!-- <label>Satuan</label>
                                  <select name="satuan" class="form-select" aria-label="Default select example">>
                                  <?php foreach($satuan as $sat) {?>
                                  <option value="<?= $sat->satuan;?>"><?= $sat->satuan; ?></option>
                                  <?php } ?>
                                  </select>
                                   -->
                                  <label>Tipe Data</label>
                                  <select name="tipedata" class="form-select" aria-label="Default select example">>
                                    <option value="Primer">Primer</option>
                                    <option value="Sekunder">Sekunder</option>
                                  </select>
                                  
                                  
                                  <br>
                          <button style="float: right" type="submit" class="btn btn-primary">Simpan</button>
                          </form>
                        </div>
                        

                        </div>
                      </div>
                    
                  </div>
                  
                  <script type="text/javascript">

                  </script>
                  <?php

                      

                    } 
                    unset($tbl);
                    ?>
                  </tbody>
                </table>
              </div>
              </div>

              <div class="card">
              <div class="card-header">Energi</div>
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped tabel_example">
                  <thead>
                  <tr>
                  <th style = text-align:center scope="col"> No </th>
                    <th style = text-align:center  scope="col"> Proses </th>
                    <th style = text-align:center scope="col">Jenis</th>
                    <th style = text-align:center scope="col"> Nama Material </th>
                    <th style = text-align:center  scope="col" > Jumlah</th>
                    <!-- <th style = text-align:center  scope="col"> Satuan </th> -->
                    <th style = text-align:center scope="col"> Jenis Data </th>
                    <th style = text-align:center > Aksi </th> 
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i =1; $j = 0;
                    foreach ($inventory as $tbl){
                      $j++;
                      if($tbl->jenis_material != 'Energi') {continue;}
                      ?>
                  <tr>
                  <td scope ="row"><?= $i++; ?> </td>
                    <td style = text-align:center><?= $tbl->proses; ?></td>
                    <td style = text-align:center><?= $tbl->jenis_material; ?></td>
                    <td style = text-align:center><?= $tbl->nama_material; ?></td>
                    <td style = text-align:center><?= round($tbl->jumlah_material,3); ?></td>
                    <!-- <td style = text-align:center><?= $tbl->satuan; ?></td> -->
                    <td style = text-align:center><?= $tbl->tipedata; ?></td>
                  <td style = text-align:center>
                    <a href="<?= base_url('lci/detail/'.$tbl->inventoryId)?>" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                    <a href="#" class="mr-3" title="Edit Record" data-toggle="modal" data-target="#edit<?php echo $j; ?>"><span class="fa fa-pencil"></span></a>
                    <a href="<?= base_url('lci/hapus/'.$tbl->inventoryId)?>" onclick="deleteLci(event)" class ="mr-auto deleteButton" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                    
                  </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="edit<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="edit<?php echo $j; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="exampleModalLabel">Input LCI</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method ="post" action="<?php echo base_url().'lci/update';?>">
                              <div class="form-group">
                                <input type="hidden" name="proses" value="<?php echo $_GET['proses']; ?>" />
                                <input type="hidden" name="inventoryId" value="<?= $tbl->inventoryId; ?>" />
                                  <!-- <label>Nama Proses</label>
                                  <select name="proses" class="form-select" aria-label="Default select example">>
                                    <option value="Penyemaian">Penyemaian</option>
                                    <option value="Budidaya">Budidaya</option>
                                    <option value="Pemanenan">Pemanenan</option>
                                  </select> -->
                                  
                                  <label>Jenis Material</label>
                                  <select name="jenis_material"class="form-select" aria-label="Default select example">>
                                  <?php foreach($jenismat as $jm) { ?>
                                  <option value ="<?= $jm->jenis_material; ?>"><?=$jm->jenis_material;?></option>
                                   <?php } ?>
                                  </select>

                                  <label>Nama Material</label>
                                  <select name="nama_material"class="form-select" aria-label="Default select example">>
                                    <?php foreach ($materials as $material) { ?>
                                    <option value="<?php echo $material->nama_material; ?>"><?=$material->nama_material; ?></option>
                                    <?php } ?>
                                  </select>

                                  <label>Jumlah Material</label>
                                  <input type="decimal" name="jumlah_material" class="form-control" />
                                  
                                  <label>Tahun</label>
                                  <select name="tahun" class="form-select" aria-label="Default select example">
                                    <?php foreach ($dtahun as $row) { ?>
                                      <option value="<?= $row->tahun;?>" <?php if ($tbl->tahun == $row->tahun) echo "selected";?>><?= $row->tahun; ?></option>
                                    <?php } ?>
                                  <!-- <option value="2020"selected>2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option> -->
                                  </select>
                                  
                                  <!-- <label>Satuan</label>
                                  <select name="satuan" class="form-select" aria-label="Default select example">>
                                  <?php foreach($satuan as $sat) {?>
                                  <option value="<?= $sat->satuan;?>"><?= $sat->satuan; ?></option>
                                  <?php } ?>
                                  </select>
                                   -->
                                  <label>Tipe Data</label>
                                  <select name="tipedata" class="form-select" aria-label="Default select example">>
                                    <option value="Primer">Primer</option>
                                    <option value="Sekunder">Sekunder</option>
                                  </select>
                                  
                                  
                                  <br>
                          <button style="float: right" type="submit" class="btn btn-primary">Simpan</button>
                          </form>
                        </div>
                        

                        </div>
                      </div>
                    
                  </div>
                  
                  <script type="text/javascript">

                  </script>
                  <?php

                      

                    } 
                    unset($tbl);
                    ?>
                  </tbody>
                </table>
              </div>
              </div>
              <div class="card">
              <div class="card-header">Air</div>
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped tabel_example">
                  <thead>
                  <tr>
                  <th style = text-align:center scope="col"> No </th>
                    <th style = text-align:center  scope="col"> Proses </th>
                    <th style = text-align:center scope="col">Jenis</th>
                    <th style = text-align:center scope="col"> Nama Material</th>
                    <th style = text-align:center  scope="col" > Jumlah</th>
                    <!-- <th style = text-align:center  scope="col"> Satuan </th> -->
                    <th style = text-align:center scope="col"> Jenis Data </th>
                    <th style = text-align:center > Aksi </th> 
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i =1; $j=0;
                    foreach ($inventory as $tbl){
                      $j++;
                      if($tbl->jenis_material != 'Air') continue;
                      ?>
                  <tr>
                  <td scope ="row"><?= $i++; ?> </td>
                    <td style = text-align:center><?= $tbl->proses; ?></td>
                    <td style = text-align:center><?= $tbl->jenis_material; ?></td>
                    <td style = text-align:center><?= $tbl->nama_material; ?></td>
                    <td style = text-align:center><?= round($tbl->jumlah_material,3); ?></td>
                    <!-- <td style = text-align:center><?= $tbl->satuan; ?></td> -->
                    <td style = text-align:center><?= $tbl->tipedata; ?></td>
                  <td style = text-align:center>
                    <a href="<?= base_url('lci/detail/'.$tbl->inventoryId)?>" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                    <a href="#" class="mr-3" title="Edit Record" data-toggle="modal" data-target="#edit<?php echo $j; ?>"><span class="fa fa-pencil"></span></a>
                    <a href="<?= base_url('lci/hapus/'.$tbl->inventoryId)?>" onclick="deleteLci(event)" class ="mr-auto deleteButton" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                    
                  </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="edit<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="edit<?php echo $j; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="exampleModalLabel">Input LCI</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method ="post" action="<?php echo base_url().'lci/update';?>">
                              <div class="form-group">
                                <input type="hidden" name="proses" value="<?php echo $_GET['proses']; ?>" />
                                <input type="hidden" name="inventoryId" value="<?= $tbl->inventoryId; ?>" />
                                  <!-- <label>Nama Proses</label>
                                  <select name="proses" class="form-select" aria-label="Default select example">>
                                    <option value="Penyemaian">Penyemaian</option>
                                    <option value="Budidaya">Budidaya</option>
                                    <option value="Pemanenan">Pemanenan</option>
                                  </select> -->
                                  
                                  <label>Jenis Material</label>
                                  <select name="jenis_material"class="form-select" aria-label="Default select example">>
                                  <?php foreach($jenismat as $jm) { ?>
                                  <option value ="<?= $jm->jenis_material; ?>"><?=$jm->jenis_material;?></option>
                                   <?php } ?>
                                  </select>

                                  <label>Nama Material</label>
                                  <select name="nama_material"class="form-select" aria-label="Default select example">>
                                    <?php foreach ($materials as $material) { ?>
                                    <option value="<?php echo $material->nama_material; ?>"><?=$material->nama_material; ?></option>
                                    <?php } ?>
                                  </select>

                                  <label>Jumlah Material</label>
                                  <input type="decimal" name="jumlah_material" class="form-control" />
                                  
                                  <label>Tahun</label>
                                  <select name="tahun" class="form-select" aria-label="Default select example">
                                    <?php foreach ($dtahun as $row) { ?>
                                      <option value="<?= $row->tahun;?>" <?php if ($tbl->tahun == $row->tahun) echo "selected";?>><?= $row->tahun; ?></option>
                                    <?php } ?>
                                  <!-- <option value="2020"selected>2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option> -->
                                  </select>
                                  
                                  <!-- <label>Satuan</label>
                                  <select name="satuan" class="form-select" aria-label="Default select example">>
                                  <?php foreach($satuan as $sat) {?>
                                  <option value="<?= $sat->satuan;?>"><?= $sat->satuan; ?></option>
                                  <?php } ?>
                                  </select> -->
                                  
                                  <label>Tipe Data</label>
                                  <select name="tipedata" class="form-select" aria-label="Default select example">>
                                    <option value="Primer">Primer</option>
                                    <option value="Sekunder">Sekunder</option>
                                  </select>
                                  
                                  
                                  <br>
                          <button style="float: right" type="submit" class="btn btn-primary">Simpan</button>
                          </form>
                        </div>
                        

                        </div>
                      </div>
                    
                  </div>
                  
                  <script type="text/javascript">

                  </script>
                  <?php

                      

                    } 
                    unset($tbl);
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

              <div class="card">
                <div class="card-body">
                  <h3>Output</h3>
                  <br>
                  <p>Tabel berikut adalah output yang terdiri dari Produk, Waste, dan Emisi.</p>
                </div>
              </div>
              <div class="card">
                <div class="card-header">Produk</div>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped tabel_example">
                  <thead>
                  <tr>
                  <th style = text-align:center scope="col"> No </th>
                    <th style = text-align:center  scope="col"> Proses </th>
                    <th style = text-align:center scope="col">Jenis</th>
                    <th style = text-align:center scope="col"> Nama Material </th>
                    <th style = text-align:center  scope="col" > Jumlah</th>
                    <!-- <th style = text-align:center  scope="col"> Satuan </th> -->
                    <th style = text-align:center scope="col"> Jenis Data </th>
                    <th style = text-align:center > Aksi </th> 
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i =1; $j=0;
                    foreach ($inventory as $tbl){
                      $j++;
                      if($tbl->jenis_material != 'Produk') continue;
                      ?>
                  <tr>
                  <td scope ="row"><?= $i++; ?> </td>
                    <td style = text-align:center><?= $tbl->proses; ?></td>
                    <td style = text-align:center><?= $tbl->jenis_material; ?></td>
                    <td style = text-align:center><?= $tbl->nama_material; ?></td>
                    <td style = text-align:center><?= round($tbl->jumlah_material,3); ?></td>
                    <!-- <td style = text-align:center><?= $tbl->satuan; ?></td> -->
                    <td style = text-align:center><?= $tbl->tipedata; ?></td>
                  <td style = text-align:center>
                    <a href="<?= base_url('lci/detail/'.$tbl->inventoryId)?>" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                    <a href="#" class="mr-3" title="Edit Record" data-toggle="modal" data-target="#edit<?php echo $j; ?>"><span class="fa fa-pencil"></span></a>
                    <a href="<?= base_url('lci/hapus/'.$tbl->inventoryId)?>" onclick="deleteLci(event)" class ="mr-auto deleteButton" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                    
                  </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="edit<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="edit<?php echo $j; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="exampleModalLabel">Input LCI</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method ="post" action="<?php echo base_url().'lci/update';?>">
                              <div class="form-group">
                                <input type="hidden" name="proses" value="<?php echo $_GET['proses']; ?>" />
                                <input type="hidden" name="inventoryId" value="<?= $tbl->inventoryId; ?>" />
                                  <!-- <label>Nama Proses</label>
                                  <select name="proses" class="form-select" aria-label="Default select example">>
                                    <option value="Penyemaian">Penyemaian</option>
                                    <option value="Budidaya">Budidaya</option>
                                    <option value="Pemanenan">Pemanenan</option>
                                  </select> -->
                                  
                                  <label>Jenis Material</label>
                                  <select name="jenis_material"class="form-select" aria-label="Default select example">>
                                  <?php foreach($jenismat as $jm) { ?>
                                  <option value ="<?= $jm->jenis_material; ?>"><?=$jm->jenis_material;?></option>
                                  <?php } ?>
                                  </select>

                                  <label>Nama Material</label>
                                  <select name="nama_material"class="form-select" aria-label="Default select example">>
                                    <?php foreach ($materials as $material) { ?>
                                    <option value="<?php echo $material->nama_material; ?>"><?=$material->nama_material; ?></option>
                                    <?php } ?>
                                  </select>

                                  <label>Jumlah Material</label>
                                  <input type="decimal" name="jumlah_material" class="form-control" />
                                  
                                  <label>Tahun</label>
                                  <select name="tahun" class="form-select" aria-label="Default select example">
                                    <?php foreach ($dtahun as $row) { ?>
                                      <option value="<?= $row->tahun;?>" <?php if ($tbl->tahun == $row->tahun) echo "selected";?>><?= $row->tahun; ?></option>
                                    <?php } ?>
                                  <!-- <option value="2020"selected>2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option> -->
                                  </select>
                                  
                                  <!-- <label>Satuan</label>
                                  <select name="satuan" class="form-select" aria-label="Default select example">>
                                  <?php foreach($satuan as $sat) {?>
                                  <option value="<?= $sat->satuan;?>"><?= $sat->satuan; ?></option>
                                  <?php } ?>
                                  </select> -->
                                  
                                  <label>Tipe Data</label>
                                  <select name="tipedata" class="form-select" aria-label="Default select example">>
                                    <option value="Primer">Primer</option>
                                    <option value="Sekunder">Sekunder</option>
                                  </select>
                                  
                                  
                                  <br>
                          <button style="float: right" type="submit" class="btn btn-primary">Simpan</button>
                          </form>
                        </div>
                        

                        </div>
                      </div>
                    
                  </div>
                  
                  <script type="text/javascript">

                  </script>
                  <?php

                      

                    } 
                    unset($tbl);
                    ?>
                  </tbody>
                </table>
                </div>
              </div>
              <div class="card">
                <div class="card-header">Limbah</div>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped tabel_example">
                  <thead>
                  <tr>
                  <th style = text-align:center scope="col"> No </th>
                    <th style = text-align:center  scope="col"> Proses </th>
                    <th style = text-align:center scope="col">Jenis</th>
                    <th style = text-align:center scope="col"> Nama Material </th>
                    <th style = text-align:center  scope="col" > Jumlah</th>
                    <!-- <th style = text-align:center  scope="col"> Satuan </th> -->
                    <th style = text-align:center scope="col"> Jenis Data </th>
                    <th style = text-align:center > Aksi </th> 
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i =1; $j=0;
                    foreach ($inventory as $tbl){
                      $j++;
                      if($tbl->jenis_material != 'Limbah') continue;
                      ?>
                  <tr>
                  <td scope ="row"><?= $i++; ?> </td>
                    <td style = text-align:center><?= $tbl->proses; ?></td>
                    <td style = text-align:center><?= $tbl->jenis_material; ?></td>
                    <td style = text-align:center><?= $tbl->nama_material; ?></td>
                    <td style = text-align:center><?= round($tbl->jumlah_material,3); ?></td>
                    <!-- <td style = text-align:center><?= $tbl->satuan; ?></td> -->
                    <td style = text-align:center><?= $tbl->tipedata; ?></td>
                  <td style = text-align:center>
                    <a href="<?= base_url('lci/detail/'.$tbl->inventoryId)?>" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                    <a href="#" class="mr-3" title="Edit Record" data-toggle="modal" data-target="#edit<?php echo $j; ?>"><span class="fa fa-pencil"></span></a>
                    <a href="<?= base_url('lci/hapus/'.$tbl->inventoryId)?>" onclick="deleteLci(event)" class ="mr-auto deleteButton" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                    
                  </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="edit<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="edit<?php echo $j; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="exampleModalLabel">Input LCI</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method ="post" action="<?php echo base_url().'lci/update';?>">
                              <div class="form-group">
                                <input type="hidden" name="proses" value="<?php echo $_GET['proses']; ?>" />
                                <input type="hidden" name="inventoryId" value="<?= $tbl->inventoryId; ?>" />
                                  <!-- <label>Nama Proses</label>
                                  <select name="proses" class="form-select" aria-label="Default select example">>
                                    <option value="Penyemaian">Penyemaian</option>
                                    <option value="Budidaya">Budidaya</option>
                                    <option value="Pemanenan">Pemanenan</option>
                                  </select> -->
                                  
                                  <label>Jenis Material</label>
                                  <select name="jenis_material"class="form-select" aria-label="Default select example">>
                                  <?php foreach($jenismat as $jm) { ?>
                                  <option value ="<?= $jm->jenis_material; ?>"><?=$jm->jenis_material;?></option>
                                   <?php } ?>
                                  </select>

                                  <label>Nama Material</label>
                                  <select name="nama_material"class="form-select" aria-label="Default select example">>
                                    <?php foreach ($materials as $material) { ?>
                                    <option value="<?php echo $material->nama_material; ?>"><?=$material->nama_material; ?></option>
                                    <?php } ?>
                                  </select>

                                  <label>Jumlah Material</label>
                                  <input type="decimal" name="jumlah_material" class="form-control" />
                                  
                                  <label>Tahun</label>
                                  <select name="tahun" class="form-select" aria-label="Default select example">
                                    <?php foreach ($dtahun as $row) { ?>
                                      <option value="<?= $row->tahun;?>" <?php if ($tbl->tahun == $row->tahun) echo "selected";?>><?= $row->tahun; ?></option>
                                    <?php } ?>
                                  <!-- <option value="2020"selected>2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option> -->
                                  </select>
                                  
                                  <!-- <label>Satuan</label>
                                  <select name="satuan" class="form-select" aria-label="Default select example">>
                                  <?php foreach($satuan as $sat) {?>
                                  <option value="<?= $sat->satuan;?>"><?= $sat->satuan; ?></option>
                                  <?php } ?>
                                  </select> -->
                                  
                                  <label>Tipe Data</label>
                                  <select name="tipedata" class="form-select" aria-label="Default select example">>
                                    <option value="Primer">Primer</option>
                                    <option value="Sekunder">Sekunder</option>
                                  </select>
                                  
                                  
                                  <br>
                          <button style="float: right" type="submit" class="btn btn-primary">Simpan</button>
                          </form>
                        </div>
                        

                        </div>
                      </div>
                    
                  </div>
                  
                  <script type="text/javascript">

                  </script>
                  <?php

                      

                    } 
                    unset($tbl);
                    ?>
                  </tbody>
                </table>
                </div>
              </div>
              <div class="card">
                <div class="card-header">Emisi</div>
                <div class="card-header">Emisi ke udara</div>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped tabel_example">
                  <thead>
                  <tr>
                  <th style = text-align:center scope="col"> No </th>
                    <th style = text-align:center  scope="col"> Proses </th>
                    <th style = text-align:center scope="col">Jenis</th>
                    <th style = text-align:center scope="col"> Nama Material </th>
                    <th style = text-align:center  scope="col" > Jumlah</th>
                    <!-- <th style = text-align:center  scope="col"> Satuan </th> -->
                    <th style = text-align:center scope="col"> Jenis Data </th>
                    <th style = text-align:center > Aksi </th> 
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i =1; $j=0;
                    foreach ($inventory as $tbl){
                      $j++;
                      if($tbl->jenis_material != 'Emisi ke udara') continue;
                      ?>
                  <tr>
                  <td scope ="row"><?= $i++; ?> </td>
                    <td style = text-align:center><?= $tbl->proses; ?></td>
                    <td style = text-align:center><?= $tbl->jenis_material; ?></td>
                    <td style = text-align:center><?= $tbl->nama_material; ?></td>
                    <td style = text-align:center><?= round($tbl->jumlah_material,3); ?></td>
                    <!-- <td style = text-align:center><?= $tbl->satuan; ?></td> -->
                    <td style = text-align:center><?= $tbl->tipedata; ?></td>
                  <td style = text-align:center>
                    <a href="<?= base_url('lci/detail/'.$tbl->inventoryId)?>" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                    <a href="#" class="mr-3" title="Edit Record" data-toggle="modal" data-target="#edit<?php echo $j; ?>"><span class="fa fa-pencil"></span></a>
                    <a href="<?= base_url('lci/hapus/'.$tbl->inventoryId)?>" onclick="deleteLci(event)" class ="mr-auto deleteButton" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                    
                  </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="edit<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="edit<?php echo $j; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="exampleModalLabel">Input LCI</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method ="post" action="<?php echo base_url().'lci/update';?>">
                              <div class="form-group">
                                <input type="hidden" name="proses" value="<?php echo $_GET['proses']; ?>" />
                                <input type="hidden" name="inventoryId" value="<?= $tbl->inventoryId; ?>" />
                                  <!-- <label>Nama Proses</label>
                                  <select name="proses" class="form-select" aria-label="Default select example">>
                                    <option value="Penyemaian">Penyemaian</option>
                                    <option value="Budidaya">Budidaya</option>
                                    <option value="Pemanenan">Pemanenan</option>
                                  </select> -->
                                  
                                  <label>Jenis Material</label>
                                  <select name="jenis_material"class="form-select" aria-label="Default select example">>
                                  <?php foreach($jenismat as $jm) { ?>
                                  <option value ="<?= $jm->jenis_material; ?>"><?=$jm->jenis_material;?></option>
                                  <?php } ?>
                                  </select>

                                  <label>Nama Material</label>
                                  <select name="nama_material"class="form-select" aria-label="Default select example">>
                                    <?php foreach ($materials as $material) { ?>
                                    <option value="<?php echo $material->nama_material; ?>"><?=$material->nama_material; ?></option>
                                    <?php } ?>
                                  </select>

                                  <label>Jumlah Material</label>
                                  <input type="decimal" name="jumlah_material" class="form-control" />
                                  
                                  <label>Tahun</label>
                                  <select name="tahun" class="form-select" aria-label="Default select example">
                                    <?php foreach ($dtahun as $row) { ?>
                                      <option value="<?= $row->tahun;?>" <?php if ($tbl->tahun == $row->tahun) echo "selected";?>><?= $row->tahun; ?></option>
                                    <?php } ?>
                                  <!-- <option value="2020"selected>2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option> -->
                                  </select>
                                  
                                  <!-- <label>Satuan</label>
                                  <select name="satuan" class="form-select" aria-label="Default select example">>
                                  <?php foreach($satuan as $sat) {?>
                                  <option value="<?= $sat->satuan;?>"><?= $sat->satuan; ?></option>
                                  <?php } ?>
                                  </select> -->
                                  
                                  <label>Tipe Data</label>
                                  <select name="tipedata" class="form-select" aria-label="Default select example">>
                                    <option value="Primer">Primer</option>
                                    <option value="Sekunder">Sekunder</option>
                                  </select>
                                  
                                  
                                  <br>
                          <button style="float: right" type="submit" class="btn btn-primary">Simpan</button>
                          </form>
                        </div>
                        

                        </div>
                      </div>
                    
                  </div>
                  
                  <script type="text/javascript">

                  </script>
                  <?php

                      

                    } 
                    unset($tbl);
                    ?>
                  </tbody>
                </table>
                </div>
                <div class="card-header">Emisi ke tanah</div>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped tabel_example">
                  <thead>
                  <tr>
                  <th style = text-align:center scope="col"> No </th>
                    <th style = text-align:center  scope="col"> Proses </th>
                    <th style = text-align:center scope="col">Jenis</th>
                    <th style = text-align:center scope="col"> Nama Material</th>
                    <th style = text-align:center  scope="col" > Jumlah</th>
                    <!-- <th style = text-align:center  scope="col"> Satuan </th> -->
                    <th style = text-align:center scope="col"> Jenis Data </th>
                    <th style = text-align:center > Aksi </th> 
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i =1; $j=0;
                    foreach ($inventory as $tbl){
                      $j++;
                      if($tbl->jenis_material != 'Emisi ke tanah') continue;
                      ?>
                  <tr>
                  <td scope ="row"><?= $i++; ?> </td>
                    <td style = text-align:center><?= $tbl->proses; ?></td>
                    <td style = text-align:center><?= $tbl->jenis_material; ?></td>
                    <td style = text-align:center><?= $tbl->nama_material; ?></td>
                    <td style = text-align:center><?= round($tbl->jumlah_material,3); ?></td>
                    <!-- <td style = text-align:center><?= $tbl->satuan; ?></td> -->
                    <td style = text-align:center><?= $tbl->tipedata; ?></td>
                  <td style = text-align:center>
                    <a href="<?= base_url('lci/detail/'.$tbl->inventoryId)?>" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                    <a href="#" class="mr-3" title="Edit Record" data-toggle="modal" data-target="#edit<?php echo $j; ?>"><span class="fa fa-pencil"></span></a>
                    <a href="<?= base_url('lci/hapus/'.$tbl->inventoryId)?>" onclick="deleteLci(event)" class ="mr-auto deleteButton" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                    
                  </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="edit<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="edit<?php echo $j; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="exampleModalLabel">Input LCI</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method ="post" action="<?php echo base_url().'lci/update';?>">
                              <div class="form-group">
                                <input type="hidden" name="proses" value="<?php echo $_GET['proses']; ?>" />
                                <input type="hidden" name="inventoryId" value="<?= $tbl->inventoryId; ?>" />
                                  <!-- <label>Nama Proses</label>
                                  <select name="proses" class="form-select" aria-label="Default select example">>
                                    <option value="Penyemaian">Penyemaian</option>
                                    <option value="Budidaya">Budidaya</option>
                                    <option value="Pemanenan">Pemanenan</option>
                                  </select> -->
                                  
                                  <label>Jenis Material</label>
                                  <select name="jenis_material"class="form-select" aria-label="Default select example">>
                                  <?php foreach($jenismat as $jm) { ?>
                                  <option value ="<?= $jm->jenis_material; ?>"><?=$jm->jenis_material;?></option>
                                  <?php } ?>
                                  </select>

                                  <label>Nama Material</label>
                                  <select name="nama_material"class="form-select" aria-label="Default select example">>
                                    <?php foreach ($materials as $material) { ?>
                                    <option value="<?php echo $material->nama_material; ?>"><?=$material->nama_material; ?></option>
                                    <?php } ?>
                                  </select>

                                  <label>Jumlah Material</label>
                                  <input type="decimal" name="jumlah_material" class="form-control" />
                                  
                                  <label>Tahun</label>
                                  <select name="tahun" class="form-select" aria-label="Default select example">
                                    <?php foreach ($dtahun as $row) { ?>
                                      <option value="<?= $row->tahun;?>" <?php if ($tbl->tahun == $row->tahun) echo "selected";?>><?= $row->tahun; ?></option>
                                    <?php } ?>
                                  <!-- <option value="2020"selected>2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option> -->
                                  </select>
                                  
                                  <!-- <label>Satuan</label>
                                  <select name="satuan" class="form-select" aria-label="Default select example">>
                                  <?php foreach($satuan as $sat) {?>
                                  <option value="<?= $sat->satuan;?>"><?= $sat->satuan; ?></option>
                                  <?php } ?>
                                  </select>
                                   -->
                                  <label>Tipe Data</label>
                                  <select name="tipedata" class="form-select" aria-label="Default select example">>
                                    <option value="Primer">Primer</option>
                                    <option value="Sekunder">Sekunder</option>
                                  </select>
                                  
                                  
                                  <br>
                          <button style="float: right" type="submit" class="btn btn-primary">Simpan</button>
                          </form>
                        </div>
                        

                        </div>
                      </div>
                    
                  </div>
                  
                  <script type="text/javascript">

                  </script>
                  <?php

                      

                    } 
                    unset($tbl);
                    ?>
                  </tbody>
                </table>
                </div>
                <div class="card-header">Emisi ke air</div>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped tabel_example">
                  <thead>
                  <tr>
                  <th style = text-align:center scope="col"> No </th>
                    <th style = text-align:center  scope="col"> Proses </th>
                    <th style = text-align:center scope="col">Jenis</th>
                    <th style = text-align:center scope="col"> Nama Material </th>
                    <th style = text-align:center  scope="col" > Jumlah</th>
                    <!-- <th style = text-align:center  scope="col"> Satuan </th> -->
                    <th style = text-align:center scope="col"> Jenis Data </th>
                    <th style = text-align:center > Aksi </th> 
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i =1; $j=0;
                    foreach ($inventory as $tbl){
                      $j++;
                      if($tbl->jenis_material != 'Emisi ke air') continue;
                      ?>
                  <tr>
                  <td scope ="row"><?= $i++; ?> </td>
                    <td style = text-align:center><?= $tbl->proses; ?></td>
                    <td style = text-align:center><?= $tbl->jenis_material; ?></td>
                    <td style = text-align:center><?= $tbl->nama_material; ?></td>
                    <td style = text-align:center><?= round($tbl->jumlah_material,3); ?></td>
                    <!-- <td style = text-align:center><?= $tbl->satuan; ?></td> -->
                    <td style = text-align:center><?= $tbl->tipedata; ?></td>
                  <td style = text-align:center>
                    <a href="<?= base_url('lci/detail/'.$tbl->inventoryId)?>" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                    <a href="#" class="mr-3" title="Edit Record" data-toggle="modal" data-target="#edit<?php echo $j; ?>"><span class="fa fa-pencil"></span></a>
                    <a href="<?= base_url('lci/hapus/'.$tbl->inventoryId)?>" onclick="deleteLci(event)" class ="mr-auto deleteButton" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                    
                  </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="edit<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="edit<?php echo $j; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="exampleModalLabel">Input LCI</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method ="post" action="<?php echo base_url().'lci/update';?>">
                              <div class="form-group">
                                <input type="hidden" name="proses" value="<?php echo $_GET['proses']; ?>" />
                                <input type="hidden" name="inventoryId" value="<?= $tbl->inventoryId; ?>" />
                                  <!-- <label>Nama Proses</label>
                                  <select name="proses" class="form-select" aria-label="Default select example">>
                                    <option value="Penyemaian">Penyemaian</option>
                                    <option value="Budidaya">Budidaya</option>
                                    <option value="Pemanenan">Pemanenan</option>
                                  </select> -->
                                  
                                  <label>Jenis Material</label>
                                  <select name="jenis_material"class="form-select" aria-label="Default select example">>
                                  <?php foreach($jenismat as $jm) { ?>
                                  <option value ="<?= $jm->jenis_material; ?>"><?=$jm->jenis_material;?></option>
                                  <?php } ?>
                                  </select>

                                  <label>Nama Material</label>
                                  <select name="nama_material"class="form-select" aria-label="Default select example">>
                                    <?php foreach ($materials as $material) { ?>
                                    <option value="<?php echo $material->nama_material; ?>"><?=$material->nama_material; ?></option>
                                    <?php } ?>
                                  </select>

                                  <label>Jumlah Material</label>
                                  <input type="decimal" name="jumlah_material" class="form-control" />
                                  
                                  <label>Tahun</label>
                                  <select name="tahun" class="form-select" aria-label="Default select example">
                                    <?php foreach ($dtahun as $row) { ?>
                                      <option value="<?= $row->tahun;?>" <?php if ($tbl->tahun == $row->tahun) echo "selected";?>><?= $row->tahun; ?></option>
                                    <?php } ?>
                                  <!-- <option value="2020"selected>2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option> -->
                                  </select>
                                  
                                  <!-- <label>Satuan</label>
                                  <select name="satuan" class="form-select" aria-label="Default select example">>
                                  <?php foreach($satuan as $sat) {?>
                                  <option value="<?= $sat->satuan;?>"><?= $sat->satuan; ?></option>
                                  <?php } ?>
                                  </select> -->
                                  
                                  <label>Tipe Data</label>
                                  <select name="tipedata" class="form-select" aria-label="Default select example">>
                                    <option value="Primer">Primer</option>
                                    <option value="Sekunder">Sekunder</option>
                                  </select>
                                  
                                  
                                  <br>
                          <button style="float: right" type="submit" class="btn btn-primary">Simpan</button>
                          </form>
                        </div>
                        

                        </div>
                      </div>
                    
                  </div>
                  
                  <script type="text/javascript">

                  </script>
                  <?php

                      

                    } 
                    unset($tbl);
                    ?>
                  </tbody>
                </table>
                </div>
              </div>
      </div>

            
            <!-- /.card -->
            <div class="row">
          
              <!-- /.card-body -->
            </div>
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
        <h4 class="modal-title" id="exampleModalLabel">Input LCI</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method ="post" action="<?php echo base_url().'/lci/tambah_aksi';?>">
            <div class="form-group">

                <!-- <label>Nama Proses</label>
                <select name="proses" class="form-select" aria-label="Default select example" disabled>>
                  <option value="Penyemaian">Penyemaian</option>
                  <option value="Budidaya" selected>Budidaya</option>
                  <option value="Pemanenan">Pemanenan</option>
                </select> -->
                <input type="hidden" name="proses" value="<?php echo $_GET['proses']; ?>" />
                <input type="hidden" name="id_user" value="<?php echo $user['id']; ?>" />
                <label>Jenis Material</label>
                <select name="jenis_material"class="form-select" aria-label="Default select example">>
                  <?php foreach($jenismat as $jm) { ?>
                  <option value ="<?= $jm->jenis_material; ?>"><?=$jm->jenis_material;?></option>
                <?php } ?>
                  <!-- <option value="Raw Material">Raw Material</option>
                  <option value="Support Material">Support Material</option>
                  <option value="Bahan Kimia">Bahan Kimia</option>
                  <option value="Energi">Energi</option>
                  <option value="Air">Air</option>
                  <option value="Emisi ke udara">Emisi ke udara</option>
                  <option value="Emisi ke tanah">Emisi ke tanah</option>
                  <option value="Emisi ke air">Emisi ke air</option> -->

                </select>

                <label>Nama Material</label>
                <select name="nama_material"class="form-select" aria-label="Default select example">>
                  <?php foreach ($materials as $material) { ?>
                  <option value="<?php echo $material->nama_material; ?>"><?=$material->nama_material; ?></option>
                  <?php } ?>
                </select>

                <label>Jumlah Material</label>
                <input type="decimal" name="jumlah_material" class="form-control" />
                
                <label>Tahun</label>
                <select name="tahun" class="form-select" aria-label="Default select example">
                <?php foreach ($dtahun as $row) { ?>
                  <option value="<?= $row->tahun;?>"><?= $row->tahun; ?></option>
                <?php } ?>
                <!-- <option value="2020"selected>2020</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option> -->
                </select>
                
              
                
                <label>Tipe Data</label>
                <select name="tipedata" class="form-select" aria-label="Default select example">>
                  <option value="Primer">Primer</option>
                  <option value="Sekunder">Sekunder</option>
                </select>
                
                
                <br>
        <button style="float: right" type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
      

      </div>
    </div>
   
</div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type=""src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
      $(".tabel_example").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      function deleteLci(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        new Swal({
          title: "Apakah anda yakin?",
          text: "Setelah data terhapus, anda harus membuat data ulang dan tidak bisa mengembalikannya!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Ya",
          cancelButtonText: "Tidak",
          closeOnConfirm: false,
          closeOnCancel: false
        })
        .then((willDelete) => {
          if (willDelete.isConfirmed) {
            new Swal("Data telah dihapus!", {
              icon: "success",
            });
            setTimeout(function(){location.href=urlToRedirect} , 3000); 
          } else if (
            result.dismiss === Swal.DismissReason.cancel
          ) {
            Swal.fire(
              'Batal',
              'Data tidak terhapus.',
              'error'
            )
          
          }
        });                 
      }

    
    </script>    