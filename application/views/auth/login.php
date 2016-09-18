<div class="login-box">
      <div class="login-logo">
        <a href="javascript:void(0);">
			<?php if(isset($page_title)) { echo $page_title;} else { echo PAGE_DEFAULT_TITLE;}?>
        </a>
      </div>
      <div class="login-box-body">
		  <?php echo form_open("auth/login");?>
        <p class="login-box-msg">Sign in to start your session</p>
        <p  class="login-box-msg" id="infoMessage"><?php echo $message;?></p>
          <div class="form-group has-feedback">
			  <?php 
				$identity['class'] = 'form-control';
				$identity['placeholder'] = 'Username';
			  echo form_input($identity);?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <?php
				$password['class'] = 'form-control';
				echo form_input($password);?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-4">
				<?php echo form_submit('submit', lang('login_submit_btn'),'class="btn btn-primary btn-block btn-flat"');?>
            </div><!-- /.col -->
          </div>
        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
<?php echo form_close();?>
