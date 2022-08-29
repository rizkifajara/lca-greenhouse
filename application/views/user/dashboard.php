<div class="content-wrapper">

<section class="content-header">
          <!-- <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6"> -->
                    <h1><?= $title; ?></h1>

</section>
<section class="content">
<div class="container-fluid">

<div class="row">
<div class="col-lg-4 col-6">

<div class="small-box bg-info">
<div class="inner">
<h3><?php echo $user['nama_gh']; ?></h3>
<p>Nama Greenhouse</p>
</div>
<div class="icon">
<i class="fa-solid fa-user"></i>
</div>

</div>
</div>

<div class="col-lg-4 col-6">

<div class="small-box bg-success">
<div class="inner">
<h3><?php echo $user['lokasi']; ?></h3>
<p>Lokasi Greenhouse</p>
</div>
<div class="icon">
<i class="fa-solid fa-location-arrow"></i>
</div>

</div>
</div>

<div class="col-lg-4 col-6">

<div class="small-box bg-warning">
<div class="inner">
<?php $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])-> row_array();
$user_id = $data['user']['id']; ?>
<?php $count4 = $this->db->query("SELECT COUNT(*) as count_rows FROM lca_proses where userId = $user_id")->result(); 
                  foreach ($count4 as $key => $value) { 

}?>
<h3><?php echo $value->count_rows; ?></h3>
<p>Jumlah Proses</p>
</div>
<div class="icon">
<i class="fa-solid fa-seedling"></i>
</div>

</div>
</div>

<section class="content">

<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active"  >Deskripsi</a>
      </li>
      
    </ul> 
  </div>
  
  <div class="card-body">
    <h1 class="card-title"><i><b>Life Cycle Assessment Software </i></b> </h1>
    <br>
    <hr>
   
    <p class="card-text">
    <i>Life Cycle Assessment</i> (LCA) merupakan metode penilaian daur hidup yang dilakukan untuk mengetahui dampak emisi
    yang dihasilkan dalam proses produksi. Analisis LCA biasanya dilakukan untuk membantu strategi bisnis sebuah
    perusahaan yang berimplikasi pada pembuatan keputusan dan meningkatkan kualitas produk dan proses sesuai
    dengan arahan <b>Peraturan Menteri Lingkungan Hidup No.1 Tahun 2021</b> terkait Program Penilaian Perangkat Kinerja
    Perusahaan dalam Pengelolaan Lingkungan Hidup (PROPER). Tahapan LCA terbagi menjadi 4 yaitu: 1.)<i> Goal & Scope Definition
     2.) Life Cycle Inventory 3.) Life Cycle Impact Assessment</i> dan 4.) Interpretasi
    </p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->

    <hr>

    <div class="card-deck">
    <div class="col d-flex justify-content-center">
    <div class="card" style="width: 18rem;" class="mx-auto">
  <img class="card-img-top" src="<?php echo base_url();?>assets/dist/img/penyemaian.jpeg" alt="Card image cap">
  <div class="card-body">
    <p class="card-text">Gambar 1. <b>Proses Penyemaian di Greenhouse Leuwikopo</b></p>
  </div>
</div>


    <div class="card" style="width: 18rem;" class="mx-auto">
  <img class="card-img-top" src="<?php echo base_url();?>assets/dist/img/budidaya.jpeg" alt="Card image cap">
  <div class="card-body">
    <p class="card-text">Gambar 2. <b>Proses Budidaya di Greenhouse Leuwikopo</b></p>
  </div>
</div>

<div class="card" style="width: 18rem;" class="mx-auto">
  <img class="card-img-top" src="<?php echo base_url();?>assets/dist/img/panen.jpeg" alt="Card image cap">
  <div class="card-body">
    <p class="card-text">Gambar 3. <b>Proses Pemanenan di Greenhouse Leuwikopo</b> </p>
  </div>
</div>

  </div>
</div>








          
                </div>
                </div>
            </div>
    </section>



</div>

