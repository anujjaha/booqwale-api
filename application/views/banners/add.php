<div class="container">
<?php
$attributes = array('class' => 'form', 'id' => 'create_banner', 'enctype'=>'multipart/form-data');
echo form_open('banners/create', $attributes);
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
			  <h3 class="box-title">Create New Banner</h3>
			</div>
			
			<div class="box-body">
			Banner Title
			<?php
			$title = array( 'name'=>'title',
								'id'=>'title',
								'class'=>'form-control',
								'required'=>'required'
							);	
				echo form_input($title);
			?>
			</div>

			<div class="box-body">
			Description
			<?php
			$description = array( 
				'type'		=> 'textarea',
				'cols'		=> 40,
				'rows'		=> 4,
				'name'		=> 'description',
				'id'		=> 'description',
				'class'		=> 'form-control'
			);	
				echo form_input($description);
			?>
			</div>

			<div class="box-body">
			Custom Link
			<?php
			$customlink = array( 
				'name'		=> 'customlink',
				'id'		=> 'customlink',
				'class'		=> 'form-control'
			);	
				echo form_input($customlink);
			?>
			</div>

			<div class="box-body">
			Caption
			<?php
			$caption = array( 
				'name'		=> 'caption',
				'id'		=> 'caption',
				'class'		=> 'form-control',
				'value'		=> 'View More'
			);	
				echo form_input($caption);
			?>
			</div>
			<div class="box-body">
				Upload Image
				<?php
				$banner_picture = array( 
					'name'	=>'banner_image',
					'id'	=>'banner_image',
					'class'	=>'form-control height-55',
					'type'	=> 'file'
				);	
					echo form_input($banner_picture);
				?>
			</div>
			
			<div class="box-body">
				Show on Home Page
					<label><input type="radio" checked="checked" name="is_homepage" value="1">Yes</label>
					<label><input  type="radio" name="is_homepage" value="0">NO</label>
			</div>

			<div class="box-body">
				Redirect Page
					<label><input type="radio" checked="checked"  name="is_booqwale" value="1">Yes</label>
					<label><input type="radio" name="is_booqwale" value="0">NO</label>
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
