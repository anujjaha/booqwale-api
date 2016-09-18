<?php 
$title = SITE_TITLE;

if(isset($siteTitle))
    $title = $siteTitle . " | ". SITE_TITLE;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>
                <?php echo $title;;?>
        </title>
    
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <?php
    		echo link_tag( 'assets/css/bootstrap.min.css' );
    		echo link_tag( 'assets/dist/css/AdminLTE.min.css');
    		echo link_tag( 'assets/dist/css/skins/_all-skins.min.css');
        ?>
    
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->    
        
        <!-- jQuery 2.1.4 -->
        <script src="<?php echo site_url();?>/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>

        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
</head>

<!-- Header Panel Start -->
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    <header class="main-header">
        
        <!-- Logo -->
        <a href="<?php echo site_url();?>" class="logo">
            <span class="logo-mini">
                <b><?php echo SITE_SHORT_TITlE;?></b>
            </span>
          
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">
                <b><?php echo SITE_FULL_TITlE;?></b>
            </span>
        </a>
        
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
        
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo site_url('assets/dist/img/user2-160x160.jpg');?>" class="user-image" alt="User Image">
                  <span class="hidden-xs">
                      <?php echo AUTH_USER_NAME;?>
                  </span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                    <img src="<?php echo site_url('assets/dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">
                    <p>
                        <?php echo AUTH_USER_NAME;?>
                        <small><?php echo COMPNAY_TITLE;?> - Member</small>
                    </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                  <li class="user-footer">
                   <div class="pull-left">
                        <!--<a href="<?php echo site_url();?>user/settings" class="btn btn-default btn-flat">Settings</a>-->
                   </div> 
                    <div class="pull-right">
                      <a href="<?php echo site_url();?>auth/logout" class="btn btn-default btn-flat">
                        Sign Out
                      </a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>