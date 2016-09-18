<!-- Css Block -->
<link rel="stylesheet" type="text/css" href="<?php echo site_url();?>assets/css/multiple-select.css">
<!-- Css Block End-->

<div class="container">
<?php
	$attributes = array('class' => 'form', 'id' => 'create_email');
	echo form_open('email/create', $attributes);
?>	

<div class="col-md-12">
	<div class="row">
		<div class="col-md-11">
		 	<div class="box box-success">
			
			<div class="box-header with-border">
			  <h3 class="box-title">Create Email</h3>
			</div>
			
			<div class="box-body">
				<h3>Subject</h3>
			<?php
			$subject = array(
						'name      '=> 'subject',
						'id'        => 'name',
						'class'     => 'form-control',
						'required'  => 'required'
			);	
			
			echo form_input($subject);
			?>
			</div>

			<div class="box-body">
	            <h3>Select Friend</h3>
			    <?php
		            $group = array();
		            $html  = "";
		            $sr    = 0;
		            foreach($contacts as $contact)
		            {

		            	if(in_array($contact['categories'], $group))
			            {
			    			 $html .= '<option value="'.$contact['contact_id'].'">'. $contact['name'].'</option>';
			            }
			            else
			            {
			            	$group[] = $contact['categories'];
			            	$html .= '<optgroup label="' .$contact['categories'].'">';
			            	$html .= ' <option value="'.$contact['contact_id'].'">'. $contact['name'] .'</option>';
			            }

		            	if($contacts[$sr]['categories'] != $contact['categories'])
			            {
			            	$html .= "</optgroup>";
			            }

			        $sr++;
		        	}
	            ?>
	            <select multiple="multiple" name="contacts_id[]" style="width:60%;">
	            	<?php echo $html;?>
		   		</select>
	        </div>

			<div class="box-body">
				<h3>Add Content</h3>
				<textarea name="editor1"  id="my_editor"><?php echo SITE_SIGNATURE;?></textarea>
			    <iframe id="form_target" name="form_target" style="display:none"></iframe>
			</div>


			<div class="box-body">
			<h3>Send Content</h3>

			<label><input type="checkbox" name="sendSms" value="1">Send SMS</label>
			<?php
			$subject = array(
				'name   '=> 'sms_content',
				'id'    => 'sms_content',
				'class' => 'form-control',
				'type'  => 'textarea'
			);	
			
			echo form_input($subject);
			?>
			</div>
			<div class="box-body text-center">
			<?php	
				$submit = array(
						'id'      => 'submit',
						'class'   => 'btn btn-primary btn-flat',
						'onClick' => 'return validateForm();'
				);

				$reset = array(
						'id'    => 'submit',
						'class' => 'btn btn-primary btn-flat'
				);

				$hiddenUserId = array( 'name' => 'contact_ids',
										'id' => 'contact_ids',
										'type' => 'hidden'
									);
				echo form_input($hiddenUserId);

				$htmlContent = array(
					'name' => 'html_content',
					'id'   => 'html_content',
					'type' => 'hidden'
				);
				echo form_input($htmlContent);

				$fromName = array(
					'name' => 'from_name',
					'id'   => 'from_name',
					'type' => 'hidden',
					'value'=> 'Anuj Jaha'
				);
				echo form_input($fromName);
				
				$fromEmail = array(
					'name' => 'from_email',
					'id'   => 'from_email',
					'type' => 'hidden',
					'value'=> 'er.anujjaha@gmail.com'

				);
				echo form_input($fromEmail);
				
				echo form_submit('submit', 'Save',$submit);
				echo form_reset('reset', 'Reset',$reset);
			?>
			</form>
			</div>
		</div> 
	</div>
</div>
</div>
<iframe id="form_target" name="form_target" style="display:none"></iframe>
<form id="my_form" action="<?php echo site_url();?>email/uploadImage" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
<input name="image" type="file" onchange="$('#my_form').submit();this.value='';">
</form>

<!-- JavaScript Block -->
<script type="text/javascript" language="javascript" src="<?php echo site_url();?>assets/js/multiple-select.js"></script>

<script type="text/javascript" language="javascript" src="<?php echo site_url();?>assets/tinymce/tinymce.min.js"></script>

<script type="text/javascript">
//Tiny Mce Editor
tinymce.init({
	selector: 'textarea',
	relative_urls : false,
	remove_script_host : false,
	convert_urls : true,
	automatic_uploads: true,
	height: 300,
	theme: 'modern',
	plugins: [
		'image',
		'advlist autolink lists link image charmap print preview hr anchor pagebreak',
		'searchreplace wordcount visualblocks visualchars code fullscreen',
		'insertdatetime media nonbreaking save table contextmenu directionality',
		'emoticons template paste textcolor colorpicker textpattern imagetools'
	],
	toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
	toolbar2: 'print preview media | forecolor backcolor emoticons',
	image_advtab: true,
	templates: [
		{ title: 'Test template 1', content: 'Test 1' },
		{ title: 'Test template 2', content: 'Test 2' }
	],
	content_css: [
		'//www.tinymce.com/css/codepen.min.css'
	],
	file_browser_callback: function(field_name, url, type, win) {
		if(type=='image')
		{
			$('#my_form input').click();	
		} 
	}
	 });

jQuery(document).ready(function() {
	
	// Multiple Select jQuery
	jQuery('select').multipleSelect();
});

function validateForm()
{
	tinyMCE.triggerSave();
	var content =$('#my_editor').val();
	jQuery("#html_content").val(content);
	return true;
}
</script>