<!-- Css Block -->
<link rel="stylesheet" type="text/css" href="<?php echo site_url();?>assets/datatable/css/jquery.dataTables.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/fancybox/
jquery.fancybox.css?v=2.1.5" media="screen" />
<!-- Css Block End-->
<section class="content">
	<div class="row">
    <div class="col-xs-12">
	<div class="box">
        <div class="box-header">
        <h3 class="box-title">
			  Group List
		<a href="<?php echo site_url();?>category/create">Add More</a>	
		</h3>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="datatable" class="table">
				<thead>
					<tr>
						<th>Sr</th>
						<th>Name</th>
						<th>Email Id</th>
						<th>Subject</th>
						<th>Respond</th>
						<th>Date/Time</th>
					</tr>
			</thead>
			<?php
				$sr=1;
				foreach($sent as $email) {
				?>
				<tr id="record_<?php echo $email['email_transaction_id'];?>">
					<td> <?php echo $sr;?> </td>
					<td> <?php echo $email['name'];?> </td>
					<td> <?php echo $email['email_id_one'];?> </td>
					<td> 
						<a class="fancybox" href="#view_content" onclick="show_html(<?php echo $email['campaign_id'];?>);">
							<?php echo $email['subject'];?>
						</a>
					</td>
					<td> <?php
							$respond = json_decode($email['server_respond'], true);
							if(isset($respond))
							{
								if(isset($respond['id']))
								{
									echo "Send Successfully";
								} 
								else
								{
									echo $respond['message'];
								}	
							}
							else
							{
								echo "Failure";
							}
							
					?> </td>	
					<td> <?php echo date('H:i A Y-m-d',strtotime($email['email_created_on']));?> </td>	
				</tr>
			<?php
				$sr++;
			}
			?>
		</table>
	</div>
</div>
	</div>
</div>
</section>

<!-- FancyBox Start -->
<div id="view_content" style="width:900px;display: none;margin-top:-75px;">
<div style="width: 900px; margin: 0 auto; padding: 120px 0 40px;">
    <div id="content_view"></div>
</div>
</div>
<!-- FancyBox End -->

<!-- Java Script -->

<script type="text/javascript" language="javascript" src="<?php echo site_url();?>assets/datatable/js/jquery.dataTables.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.fancybox.js?v=2.1.5"></script>

<script type="text/javascript">
$(document).ready(function() {

		// Load DataTable
		$('#datatable').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true,
            "bDestroy": true,
            "iDisplayLength": 50
    	});

		// Load Fancybox 
		$('.fancybox').fancybox({
	        'autoSize' : true,
	    });

});


function show_html(id)
{
	$.ajax({
		type: "POST",
        url: "<?php echo site_url();?>/ajax/ajaxHmtlContent/"+id, 
        success: function(data) 
        		{
            		if(data.length > 0)
            		{
            			jQuery("#content_view").html("<h2>Email Content</h2<br><hr>"+data);	
            		}
        }
    });
}
</script>