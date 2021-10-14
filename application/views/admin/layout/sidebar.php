<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="<?php echo base_url('assets/dist/img/AdminLTELogo.png')?>"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <?php if($_SESSION['user_type'] == 'ADMIN') { ?>
         
          <li class="nav-item has-treeview">
            <a href="<?php echo admin_url('dashboard/index'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
           
          </li>
         
          <li class="nav-item has-treeview">
            <a href="<?php echo admin_url('users/index'); ?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
           
          </li>
          
           <li class="nav-item has-treeview">
            <a href="<?php echo admin_url('result/index'); ?>" class="nav-link">
              <i class="nav-icon fas fa-poll"></i>
              <p>
               Result
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
           
          </li>
          
           <li class="nav-item has-treeview">
            <a href="<?php echo admin_url('chat/index'); ?>" class="nav-link">
              <i class="nav-icon fas fa-sms"></i>
              <p>
               Chat
               
              </p>
            </a>
           
          </li>
           <li class="nav-item has-treeview">
            <a href="<?php echo admin_url('users_list/index'); ?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users List
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
           
          </li>
           <li class="nav-item has-treeview">
            <a href="<?php echo admin_url('employee/index'); ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Employee
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
           
          </li>

          <li class="nav-item has-treeview">
            <a href="<?php echo admin_url('market_type/index'); ?>" class="nav-link">
              <i class="nav-icon fas fa-heart"></i>
              <p>
                Game Type
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
           
          </li>
          <!--   <li class="nav-item has-treeview">-->
          <!--  <a href="<?php echo admin_url('market/index'); ?>" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-user"></i>-->
          <!--    <p>-->
          <!--      Market-->
                
          <!--    </p>-->
          <!--  </a>-->
           
          <!--</li>-->
           </li>
           
             <ul class="dropdown-menu">
                <li class="nav-item has-treeview">
            <a href="<?php echo admin_url('money_request'); ?>" class="nav-link">
              <i class="nav-icon fas fa-rupee-sign"></i>
              <p>
                Withdraw Money
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
                <li></li>
    
  </ul>
           <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
              <i class="fa fa-upload"></i>
              <p>
                Uploaded Request
                <i class="right fas fa-angle-left" class="active-link"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             <li class="nav-item has-treeview">
            <a href="<?php echo admin_url('money_request'); ?>" class="nav-link">
              <i class="nav-icon fas fa-rupee-sign"></i>
              <p>
                Withdraw Money
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
           <li class="nav-item has-treeview">
            <a href="<?php echo admin_url('deposit_money'); ?>" class="nav-link">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
               Deposit Money
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="<?php echo admin_url('market1/index'); ?>" class="nav-link">
              <i class="nav-icon fas fa-search-dollar"></i>
              <p>
                Bazar
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
           
          </li>
           <li class="nav-item has-treeview">
            <a href="<?php echo admin_url('market_time/index'); ?>" class="nav-link">
              <i class="nav-icon fas fa-hourglass-start"></i>
              <p>
                Bazar time
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
           
          </li>
           <li class="nav-item has-treeview">
            <a href="<?php echo admin_url('betting/index'); ?>" class="nav-link">
              <i class="nav-icon fas fa-hourglass-start"></i>
              <p>
                Betting
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
           
          </li>
          
              <li class="nav-item has-treeview">
            <a href="<?php echo admin_url('notice_board'); ?>" class="nav-link">
              <i class="nav-icon fas fa-bell"></i>
              <p>
                Notice Board
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
           
          
          <?php }else{  ?>
           <li class="nav-item has-treeview">
            <a href="<?php echo admin_url('result/index'); ?>" class="nav-link">
              <i class="nav-icon fas fa-poll"></i>
              <p>
               Result
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
           
          </li>
          
          <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
              <i class="fa fa-upload"></i>
              <p>
                Uploaded Request
                <i class="right fas fa-angle-left" class="active-link"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             <li class="nav-item has-treeview">
            <a href="<?php echo admin_url('money_request'); ?>" class="nav-link">
              <i class="nav-icon fas fa-rupee-sign"></i>
              <p>
                Withdraw Money
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
           <li class="nav-item has-treeview">
            <a href="<?php echo admin_url('deposit_money'); ?>" class="nav-link">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
               Deposit Money
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          </ul>
          </li>
           
           <?php } ?>
          
            <li class="nav-item has-treeview">
            <a href="<?php echo admin_url('comments'); ?>" class="nav-link">
              <i class="nav-icon fas fa-comments"></i>
              <p>
               Comments
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
         
          <li class="nav-item has-treeview">
            <a href="<?php echo admin_url('auth/logout'); ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
               Logout
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>