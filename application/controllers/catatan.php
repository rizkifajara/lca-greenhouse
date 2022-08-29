public function tampil_data(){
        $db2 = $this->load->database('lcip', TRUE);
        $db2->select('*');
        $db2->from('tesdatabase');
        $query =$db2->get();
        return $query->result();
    }
    public function input_data($data2){
    $this->db3 = $this->load->database('lcip', TRUE);
    $this->db3->insert('tesdatabase', $data2);
    }
}
$this->load->database();
		return $this->db->get('lcip');

        public function input_data($data2){
    $this->db3 = $this->load->database('lcip', TRUE);
    $this->db3->insert('tesdatabase', $data2);
    }
    


    return $this->db->get('tesdatabase');


    <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo base_url();?>assets/dist/img/slider1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url();?>assets/dist/img/slider2.jpg" alt="Second slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



a href="<?php echo anchor ('C_Skripsi/hapus/'.$mtr->id,) class="mr-1" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a> ?>
<!-- <a href="delete.php?id='. $row['no'] .'" class="ml-10" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>  -->
onclick="javascript: return confirm('Yakin untuk menghapus data?')"><?php echo anchor('C_skripsi/lcia/hapus/'.$mtr->id, ' <div class="ml-10" title="Delete Record" data-toggle="tooltip"><span class ="fa fa-trash"></span></div>') ?>
</td>
<?php echo anchor('C_skripsi/lcia/hapus/'.$mtr->id, ' <div class="ml-10" title="Delete Record" data-toggle="tooltip"><span class ="fa fa-trash"></span></div>') ?>


<a href="read.php?id='. $row['no'] .'" class="mr-1" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
    <a href="update.php?id='. $row['no'] .'" class="mr-1" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>


    <input type="button" value="Go back!" onclick ="history.back()">



    <td onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data?')"><?php echo anchor('C_skripsi/material/hapus/'.$tbl->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
<td> <?php echo anchor('C_skripsi/material/edit/'.$tbl->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></div>') ?></td>    
<td> <?php echo anchor('C_skripsi/material/detail/'.$tbl->id, '<div class="btn btn-success btn-sm"><i class="fa fa-eye"></i></div>') ?></td>    


<ul class = "na navbar-nav navbar-right">
      <li class ="nav-item">
      <a href="<?php echo base_url('auth')?>" class="nav-link">
      <button type="button" class="btn btn-block btn-primary btn-lg" >Logout
      <li class = "ml-2"></li>
      </button>
      </a>
    </ul>


    <div class="content-wrapper">
    <section class ="content">'
      
<?php 
        $role_id =$this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu` . `id`, `menu`
                      FROM `user_menu` JOIN `user_access_menu`
                      ON `user_menu` . `id` = `user_access_menu` . `menu_id`
                      WHERE `user_access_menu`.`role_id` = $role_id
                      ORDER BY `user_access_menu`. `menu_id` ASC";
        $menu = $this->db->query($queryMenu)->result_array();
                      ?>


      <!-- LOOPING MENU -->
      <?php foreach ($menu as $m):?>
      <li class="nav-header ">
        <?= $m['menu'];?>
      </li>
      <hr class ="sidebar-divider" color="white">

      <!-- SIAPKAN SUB-MENU SESUAI MENU -->
      <?php
      $menuId = $m['id'];
      $querySubMenu = "SELECT *
                      FROM `user_sub_menu` JOIN `user_menu`
                      ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                      WHERE `user_sub_menu`. `menu_id` = $menuId
                      AND `user_sub_menu` .`is_active` =1
                  ";
      $subMenu = $this->db->query($querySubMenu)->result_array();
      ?>

            <?php foreach($subMenu as $sm) :?>
              <li class="nav-item">
                  <a href="<?php echo base_url($sm['url']); ?>" class="nav-link">
                    <i class="<?php echo $sm['icon'];?>"></i>
                      <p style="font-family:Arial">
                          <?php echo $sm['title'];?>              
                      </p>
                  </a>        
              </li>
              <?php endforeach;?>

      <?php endforeach; ?>