<link rel="stylesheet" href="<?php echo site_url('assets/plugins/datetimepicker/jquery.datetimepicker.css');?>">

<div class="container">
<?php
$attributes = array('class' => 'form', 'id' => 'edit_dailydeals', 'enctype'=>'multipart/form-data');
echo form_open('DailyDeals/edit/'.$dealInfo->id, $attributes);
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
			  <h3 class="box-title">Edit Daily Deal</h3>
			</div>
			
			
			<div class="box-body">
			Select Associates 
			<?php
				echo getAssociates($dealInfo->associate_id);
			?>
			</div>
			<div class="box-body">
			Title
			<?php
			$title = array(
				'name'		=>'title',
				'id'		=>'title',
				'class'		=>'form-control',
				'required'	=>'required',
				'value'		=> $dealInfo->title
			);	
				echo form_input($title);
			?>
			</div>

			<div class="box-body">
			Small Description
			<?php
			$title = array( 
				'name'		=>'small_title',
				'id'		=>'small_title',
				'class'		=>'form-control',
				'required'	=>'required',
				'value'		=> $dealInfo->small_title
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
				'class'		=> 'form-control',
				'value'		=> $dealInfo->description
			);	
				echo form_input($description);
			?>
			</div>

			<div class="box-body">
			Deal Code
			<?php
			$deal_code = array(
				'name'		=>'deal_code',
				'id'		=>'deal_code',
				'class'		=>'form-control',
				'value'		=> $dealInfo->deal_code
			);	
				echo form_input($deal_code);
			?>
			</div>

			<div class="box-body">
			Deal Expire
			<?php
			$deal_end = array(
				'name'		=>'deal_end',
				'id'		=>'deal_end',
				'class'		=>'form-control datetimepicker',
				'value'		=> $dealInfo->deal_end
			);	
				echo form_input($deal_end);
			?>
			</div>

			<div class="box-body">
			Custom Link
			<?php
			$customlink = array( 
				'name'		=> 'custom_link',
				'id'		=> 'custom_link',
				'class'		=> 'form-control',
				'value'		=> $dealInfo->custom_link
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
				'value'		=> $dealInfo->caption
			);	
				echo form_input($caption);
			?>
			</div>
			<div class="box-body">
				Upload Image
				<?php
				$dailydeal_image = array( 
					'name'	=>'dailydeal_image',
					'id'	=>'dailydeal_image',
					'class'	=>'form-control height-55',
					'type'	=> 'file'
				);	
					echo form_input($dailydeal_image);
				?>
				<img src="<?php echo $dealInfo->basepath.DIRECTORY_SEPARATOR.$dealInfo->image;?>" width="400" height="400">
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

				$inputHiddenId = array(
					'type'    	=> 'hidden',
					'name'		=> 'id',
					'value'		=> $dealInfo->id
				);

				echo form_input($inputHiddenId);
				echo form_submit('submit', 'Save',$submit);
				echo form_reset('reset', 'Reset',$reset);
			?>
			</div>
</div>
</div>
</div>

<script src="<?php echo site_url('assets/plugins/datetimepicker/jquery.datetimepicker.full.js');?>"></script>

<script type="text/javascript">
	jQuery(document).ready(function()
	{
		jQuery('.datetimepicker').datetimepicker();
	});
</script>