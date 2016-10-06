<div class="container">
<?php
$attributes = array('class' => 'form', 'id' => 'create_associate', 'enctype'=>'multipart/form-data');
echo form_open('associates/create', $attributes);
?>	

<style>
.height-55  {
	height:55px;
}

</style>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-10">
		  <div class="box box-success">
			<div class="box-header with-border">
			  <h3 class="box-title">Create New Associates</h3>
			</div>
			
			<div class="box-body">
			Title
			<?php
			$title = array( 
				'name'		=> 'associate_title',
				'id'		=> 'associate_title',
				'class'		=> 'form-control',
				'required'	=> 'required'
			);	
			echo form_input($title);
			?>
			</div>

			<div class="box-body">
				Upload Image
				<?php
				$banner_picture = array( 
					'name'	=> 'associate_image',
					'id'	=> 'associate_image',
					'class'	=> 'form-control height-55',
					'type'	=> 'file'
				);	
					echo form_input($banner_picture);
				?>
			</div>
		
			<div class="box-body text-center">
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
</div>
