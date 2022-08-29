
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
      <img src="<?php echo base_url();?>assets/dist/img/lcamaster.png" alt="lcamaster" 
      class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">LCA Master</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <nav class= "mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

      <?php
      $role_id = $this->session->userdata('role_id');
      $queryMenu = "SELECT `user_menu`.`id`, `menu`
                    FROM `user_menu` JOIN `user_access_menu`
                    ON `user_menu`.`id` = `user_access_menu` . `menu_id`
                    WHERE `user_access_menu`.`role_id` = $role_id
                    ORDER BY `user_access_menu`.`menu_id` ASC
                    ";
      $menu = $this->db->query($queryMenu)->result_array();
       ?>
      <!-- LOOPING MENU -->
      <?php foreach ($menu as $m) { ?>
        <div class ="nav-header">
          <?= $m['menu']; ?>
        </div>

        <!-- SIAPKAN SUB MENU SESUAI MENU-->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT * FROM `user_sub_menu`
                          WHERE `menu_id` = $menuId
                          AND `is_active` =1
                          ORDER BY `urutan` ASC
                          ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>
  
              <?php foreach($subMenu as $sm) { ?>
                <li class="nav-item subMenu">

                    <a href =<?= base_url($sm['url']) ?> class="nav-link <?= ($sm['url'] == uri_string() ? "active" : "") ?>">
                      <i class="<?php echo $sm['icon'];?>"></i>
                        <p style="font-family:Arial">
                            <?php echo $sm['title'];?>              
                        </p>
                      <i class="icon-check fa"></i>
                    </a>
                    
                    <?php
                    $group_menu = $sm['group_menu'];
                    $data['user'] = $this->db->get_where('user', ['email' => 
                    $this->session->userdata('email')])-> row_array();
                    $user_id = $data['user']['id'];
                    $querySubSubMenu = "SELECT * FROM `user_sub_sub_menu`
                                      WHERE `group_menu` = $group_menu AND `userId` =$user_id
                                      ORDER BY urutan ASC, date_created DESC 
                                      ";
                    $subSubMenu = $this->db->query($querySubSubMenu)->result_array();
                    ?>
                    <?php foreach($subSubMenu as $ssm) { ?>
                    <ul class="nav-treeview">
                      <li class="nav-item">
                        <a href="<?= base_url($ssm['url']);  ?>" class="nav-link <?= $sm['url'] == $title ? "active" : "" ?>">
                        <i class="far fa-circle nav-icon"></i>
                          <!-- <i class="<?php echo $sm['icon'];?>"></i> -->
                          <p><?= $ssm['title'] ?></p>
                        </a>
                      </li>
                    </ul>
                    <?php } ?>
                            
                </li>
              <?php } ?>
              


          <?php } ?>

                  



     


          </li>
          </a>
          
          </li>
        </ul>
      </nav>
       <!-- /.sidebar-menu -->
    </div>
     <!-- /.sidebar  -->
  </aside>
<script>
  $( document ).ready(function() {
    let li_elem = $()
    if ($(".subMenu").has('ul').length) {
      $(".icon-check").addClass('fa-angle-left right');
    }
  });
  
</script>