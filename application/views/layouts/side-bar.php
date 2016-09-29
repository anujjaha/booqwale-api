<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo site_url('assets/dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p> 
          <?php echo AUTH_USER_NAME;?>
        </p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
            
    <!-- search form -->
    <?php require_once('search-form.php')?>
    
    <ul class="sidebar-menu">
     <li>
        <a href="<?php echo site_url();?>categories">
          <i class="fa fa-circle-o text-red"></i> <span>Category Manager</span>
        </a>
      </li>
      <li>
         <a href="<?php echo site_url();?>banners">
           <i class="fa fa-circle-o text-red"></i> <span>Banners Manager</span>
         </a>
      </li>
      <li>
         <a href="<?php echo site_url();?>DailyDeals">
           <i class="fa fa-circle-o text-red"></i> <span>Daily Deals Manager</span>
         </a>
      </li>
    </ul>
  </section>
</aside>
