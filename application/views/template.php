 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="_themes/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
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
      <?php foreach ($menu as $m) : ?>
        <div class ="nav-header">
          <?= $m['menu']; ?>
        </div>

        <!-- SIAPKAN SUB MENU SESUAI MENU-->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT * FROM `user_sub_menu`
                          WHERE `menu_id` = $menuId
                          AND `is_active` =1";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        $main_menu = $this->db->get_where('user_sub_menu', array('is_main_menu' => 0));
        ?>
  
              <?php foreach($subMenu as $sm) :?>
                <div class="nav-item">
                    <a class="nav-link" href="<?php echo base_url($sm['url']); ?>" >
                      <i class="<?php echo $sm['icon'];?>"></i>
                        <!-- <p style="font-family:Arial"> -->
                            <?php echo $sm['title'];?>              
                        </p>
                    </a>        
               </div>
              <?php endforeach;?>
  
      <?php endforeach; ?>



     


          </li>
          </a>
          
          </li>
        </ul>
      </nav>
       <!-- /.sidebar-menu -->
    </div>
     <!-- /.sidebar  -->
  </aside>
                                
                            
                                
                            
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="_themes/pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li> -->

    

 