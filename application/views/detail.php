<div class="content-wrapper">

<section class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1>Detail Data</h1>
        </div>

        </div>
    </div>
</section>

<div class="card">
<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
            <tr>
            <th> Proses </th>
            <td><?php echo $detail->proses ?></td>
            </tr>   
            <tr>
            <th> Jenis Material </th>
            <td><?php echo $detail->jenis_material ?></td>
</tr>
<tr>
            <th> Nama Material </th>
            <td><?php echo $detail->nama_material ?></td>
</tr>
<tr>
            <th> Jumlah </th>
            <td><?php echo $detail->jumlah_material ?></td>
</tr>
<!-- <tr>
            <th>  Konversi </th>
            <td><?php echo $detail->konversi ?></td>
</tr> -->
<!-- <tr>
            <th> Satuan </th>
            <td><?php echo $detail->satuan ?></td>
</tr> -->
<tr>
            <th> Jenis Data </th>
            <td><?php echo $detail->tipedata ?></td>
</tr>
            


</table>
<input type="button" class ="btn btn-primary"  value="Back" onclick ="history.back()">


    </div>
    </div>
    </div>