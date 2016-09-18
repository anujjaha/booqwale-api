<div class="container">
<?php
$attributes = array('class' => 'form', 'id' => 'create_user');
echo form_open('user/create', $attributes);
?>	
<div class="col-md-12">
	<div class="row">
		<div class="col-md-5">
		  <div class="box box-success">
			<div class="box-header with-border">
			  <h3 class="box-title">Personal details</h3>
			</div>
			
			<div class="box-body">
			First Name
			<?php
			$first_name = array( 'name'=>'first_name',
								 'id'=>'first_name',
								 'class'=>'form-control',
								 'required'=>'required'
								);	
				echo form_input($first_name);
			?>
			</div>
			
			<div class="box-body">
			Last Name
			<?php
			$last_name = array( 'name'=>'last_name',
								 'id'=>'last_name',
								 'class'=>'form-control',
								 'required'=>'required'
								);	
				echo form_input($last_name);
			?>
			</div>
			
			<div class="box-body">
			Company Name
			<?php
			$company = array( 'name'=>'company',
								 'id'=>'company',
								 'class'=>'form-control',
								);	
				echo form_input($company);
			?>
			</div>
			
			<div class="box-body">
			Phone Number
			<?php
			$phone = array( 'name'=>'phone',
								 'id'=>'phone',
								 'class'=>'form-control',
								 'required'=>'required'
								);	
				echo form_input($phone);
			?>
			</div>
		  </div>
		  
		</div>

		<div class="col-md-5">
		  <div class="box box-success">
			<div class="box-header with-border">
			  <h3 class="box-title">User Details</h3>
			</div>
			
			<div class="box-body">
			Username
			<?php
			$username = array( 'name'=>'username',
								 'id'=>'username',
								 'class'=>'form-control',
								 'required'=>'required'
								);	
				echo form_input($username);
			?>
			</div>
			
			<div class="box-body">
			Password
			<?php
			$password = array( 'name'=>'password',
								 'id'=>'password',
								 'class'=>'form-control',
								'type'=>'password',
								'required'=>'required'
								);	
				echo form_input($password);
			?>
			</div>
			
			<div class="box-body">
			Email Id
			<?php
			$email = array( 'name'=>'email',
								 'id'=>'email',
								 'class'=>'form-control',
								);	
				echo form_input($email);
			?>
			</div>
			
			
			<div class="box-body">
			Select Role
			<?php
			$role_options = get_users_groups();
			$user_role = array();
			foreach($role_options as $roles)  {
				$user_role[$roles['id']] =ucfirst($roles['name']);
			}
			
			$role = array('class'=>'form-control');
			echo form_dropdown('user_role', $user_role , 'large',$role);
			?>
			</div>
			
		  </div><!-- /.box -->
		</div>
</div>
<div class="col-md-10 text-center">
<?php	
	$submit = array(
			'id'    => 'submit',
			'class' => 'btn btn-primary btn-flat'
	);

	$reset = array(
			'id'    => 'submit',
			'class' => 'btn btn-primary btn-flat'
	);

	echo form_submit('submit', 'Save',$submit);
	echo form_reset('reset', 'Reset',$reset);
?>
</div>
</div>
</div>
