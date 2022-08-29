
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
    <nav class= "navbar"mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" 
          aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

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
                          AND `is_active` =1
                          "
                          ;
        $subMenu = $this->db->query($querySubMenu)->result_array();
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
