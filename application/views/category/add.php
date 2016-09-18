<div class="container">
<?php
$attributes = array('class' => 'form', 'id' => 'create_category');
echo form_open('category/create', $attributes);
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
			  <h3 class="box-title">Create Group</h3>
			</div>
			
			<div class="box-body">
			Group Name
			<?php
			$name = array( 'name'=>'name',
								'id'=>'name',
								'class'=>'form-control',
								'required'=>'required'
							);	
				echo form_input($name);
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
