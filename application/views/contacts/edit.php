<div class="container">
<?php
$attributes = array('class' => 'form', 'id' => 'create_contact','enctype'=>'multipart/form-data');
echo form_open('contacts/edit/'.$contact['id'], $attributes);
?>	

<style>
.height-55  {
	height:55px;
}

</style>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-5">
		  <div class="box box-success">
			<div class="box-header with-border">
			  <h3 class="box-title">Personal details</h3>
			</div>
			
			<div class="box-body">
			Contact Name
			<?php
			$name = array( 'name'=>'name',
								'id'=>'name',
								'class'=>'form-control',
								'required'=>'required',
								'value' => $contact['name']
							);	
				echo form_input($name);
			?>
			</div>
			
			
			<div class="box-body">
			Company Name
			<?php
			$company_name = array( 'name'=>'company_name',
								 'id'=>'company_name',
								 'class'=>'form-control',
								 'value' => $contact['company_name']
								);	
				echo form_input($company_name);
			?>
			</div>
			
			<div class="box-body">
			Mobile Number
			<?php
			$mobile = array( 'name'=>'mobile',
								 'id'=>'mobile',
								 'class'=>'form-control',
								 'required'=>'required',
								 'value' => $contact['mobile']
								);	
			echo form_input($mobile);
			?>
			</div>

			<div class="box-body">
			Contact Number
			<?php
			$contact_number = array( 'name'=>'contact_number',
								 'id'=>'contact_number',
								 'class'=>'form-control',
								 'value' => $contact['contact_number']
								);	
			echo form_input($contact_number);
			?>
			</div>

			<div class="box-body">
			Email id
			<?php
			$email1 = array( 'name'=>'email_id_one',
								 'id'=>'email_id_one',
								 'class'=>'form-control',
								 'value' => $contact['email_id_one']
								);	
			echo form_input($email1);
			?>
			</div>

			<div class="box-body">
			Contact Category
			<?php
				echo getCategories($contact['category_id']);
			?>
			</div>
		  </div>
		  
		</div>

		<div class="col-md-5">
		  <div class="box box-success">
			<div class="box-header with-border">
			  <h3 class="box-title">Other Details</h3>
			</div>
			
			<div class="box-body">
			Address Line 1
			<?php
			$address_one = array( 'name'=>'address_one',
								 'id'=>'address_one',
								 'class'=>'form-control',
								 'required'=>'required',
								 'value' => $contact['address_one']
								);	
				echo form_input($address_one);
			?>
			</div>
			
			<div class="box-body">
			Address Line 2
			<?php
			$address_two = array( 'name'=>'address_two',
								 'id'=>'address_two',
								 'class'=>'form-control',
								'type'=>'text',
								'required'=>'required',
								'value' => $contact['address_two']
								);	
				echo form_input($address_two);
			?>
			
			</div>
			
			<div class="box-body">
			City
			<?php
			$city = array( 'name'=>'city',
								 'id'=>'city',
								 'class'=>'form-control',
								 'value' => $contact['city']
								);	
				echo form_input($city);
			?>
			</div>
			
			
			<div class="box-body">
			State
			<?php
			$state = array( 'name'=>'state',
								 'id'=>'state',
								 'class'=>'form-control',
								 'value' => $contact['state']
								);	
				echo form_input($state);
			?>
			</div>

			<div class="box-body">
			Zip
			<?php
			$zip = array( 'name'=>'zip',
								 'id'=>'zip',
								 'class'=>'form-control',
								 'value' => $contact['zip']
								);	
				echo form_input($zip);
			?>
			</div>

			<div class="box-body">
			Reference Details
			<?php
			$reference_name = array( 'name'=>'reference_name',
								 'id'=>'reference_name',
								 'class'=>'form-control',
								 'value' => $contact['reference_name']
								);	
				echo form_input($reference_name);
			?>
			</div>
			
		</div>
				
		  </div><!-- /.box -->
		</div>
</div>

	<div class="col-md-5">
		<div class="box box-success">
			<div class="box-body">
			<h3><img class="profile-picture" src="<?php echo site_url('assets/profilepicuters/'.$contact['profile_picture']);?>"> Profile Picture </h3>
			<hr>
			
			
			<?php
			$profile_picture = array( 'name'=>'profile_picture',
								 'id'=>'profile_picture',
								 'class'=>'form-control height-55',
								 'type'=> 'file',
								);	
				echo form_input($profile_picture);
			?>
			</div>
		</div>
	</div>

	<div class="col-md-5">
		<div class="box box-success">
			<div class="box-body">
			<h3> Notes </h3>
			<hr>
			<?php
			$notes = array( 'name'=>'notes',
								 'id'=>'notes',
								 'class'=>'form-control',
								 'type'=> 'textarea',
								 'rows' =>2,
								 'value' => $contact['notes']
								);	
				echo form_textarea($notes);
			?>
			</div>
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

	$hiddenId = array( 'name' => 'id',
								'value' => $contact['contact_id'],
								'type' => 'hidden'
						);
	
	echo form_input($hiddenId);
	echo form_submit('submit', 'Save',$submit);
	echo form_reset('reset', 'Reset',$reset);
?>
</div>
</div>
</div>
