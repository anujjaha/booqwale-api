<!-- Css Block -->
<link rel="stylesheet" type="text/css" href="<?php echo site_url();?>assets/css/multiple-select.css">
<style type="text/css">
	.green {
		color: green;
	}

	.red {
		color: red;
	}

</style>
<!-- Css Block End-->

<div class="container">
<?php
	$attributes = array('class' => 'form', 'id' => 'create_sms');
	echo form_open('sms/create', $attributes);
?>	

<div class="col-md-12">
	<div class="row">
		<div class="col-md-11">
		 	<div class="box box-success">
			
			<div class="box-header with-border">
			  <h3 class="box-title">Send SMS</h3>
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
			<h3>Send Content</h3>
			<?php
			$sms_content = array(
				'name  '=> 'sms_content',
				'id'    => 'sms_content',
				'class' => 'form-control',
				'type'  => 'textarea'
			);	
			
			echo form_input($sms_content);
			?>
			<label>Characters : <span id="charCount">0</span></label>
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

				echo form_submit('submit', 'Save',$submit);
				echo form_reset('reset', 'Reset',$reset);
			?>
			</form>
			</div>
		</div> 
	</div>
</div>
</div>


<!-- JavaScript Block -->
<script type="text/javascript" language="javascript" src="<?php echo site_url();?>assets/js/multiple-select.js"></script>

<script type="text/javascript">
var contentLength  = 0;
jQuery(document).ready(function() {
	
	// Multiple Select jQuery
	jQuery('select').multipleSelect();

	jQuery("#sms_content").on('keyup', function()
	{
		contentLength = jQuery("#sms_content").val().length;
		if(contentLength > 10)
		{
			jQuery("#charCount").html('<span class="green">' +contentLength+ '</span>');
		}
		else
		{
			jQuery("#charCount").html('<span class="red">' +contentLength+ '</span>');	
		}
		

	});
});

function validateForm()
{
	if(jQuery("#sms_content").val().length > 10)
	{
		return true;
	}

	jQuery("#charCount").html('<span class="red">SMS length should be at least 10 Characters.</span>');
	alert("SMS length should be at least 10 Characters.");
	return false;
}
</script>