<div class="container">
<?php
$attributes = array('class' => 'form', 'id' => 'edit_category');
echo form_open('category/edit/'.$category['id'], $attributes);
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
			  <h3 class="box-title">Group Details</h3>
			</div>
			
			<div class="box-body">
			Contact Name
			<?php
			$name = array( 'name'=>'name',
								'id'=>'name',
								'class'=>'form-control',
								'required'=>'required',
								'value' => $category['categories']
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

				$hiddenId = array( 'name' => 'id',
											'value' => $category['id'],
											'type' => 'hidden'
									);
				
				echo form_input($hiddenId);
				echo form_submit('submit', 'Save',$submit);
				echo form_reset('reset', 'Reset',$reset);
			?>
</div>
</div>
</div>
