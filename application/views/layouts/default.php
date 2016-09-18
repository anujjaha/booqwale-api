<!-- Header Loaded -->
<?php require_once('header.php'); ?>

<!-- Left side column. contains the logo and sidebar -->
<?php require_once('side-bar.php');?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Content Header (Page header) -->
          <?php require_once('page-bar.php');?>

          <!-- Main content -->
          <section class="content">
			       <?php echo $body;?>
		      </section>

      </div>

      <!-- Page Footer -->
        <?php require_once('page-footer.php');?>
      <!-- Page Footer -->
    
    <!-- Bootstrap 3.3.5 -->
      <script src="<?php echo site_url();?>/assets/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    
    <!-- AdminLTE App -->
      <script src="<?php echo site_url();?>/assets/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    
  </body>
</html>