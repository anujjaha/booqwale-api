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
						<th>Subject</th>
						<th>From Email</th>
						<th>View Email</th>
						<th>Receipient Count</th>
						<th>Status</th>
					</tr>
			</thead>
			<?php
				$sr=1;
				foreach($campaigns as $campaign) {
				?>
				<tr id="record_<?php echo $campaign['campaign_id'];?>">
					<td> <?php echo $sr;?> </td>
					<td> <?php echo $campaign['subject'];?> </td>
					<td> <?php echo $campaign['from_email'];?> </td>
					<td> 
						<a class="fancybox"  onclick="show_html(<?php echo $campaign['campaign_id'];?>);" href="#view_receipt_details">
							View
						</a>
					</td>
					<td> 
						<a class="fancybox"  onclick="show_receipt_details(<?php echo $campaign['campaign_id'];?>);" href="#view_receipt_details">
						
						<?php echo count(explode(",", $campaign['receipt_ids'])) - 1;?> 

						</a>
					</td>

					<td>
						<?php echo $campaign['status'] ?  
									'<div class="alert alert-success text-center"><strong>Success</div>' :
									'<div class="alert alert-danger text-center">Failure</div>';?>
					</td>
				</tr>
			<?php
				$sr++;
			}
			?>
		</table>

		<?php
			//	pr($campaigns);
			?>
	</div>
</div>
	</div>
</div>
</section>

<!-- FancyBox Start -->
<div id="view_receipt_details" style="width:900px;display: none;margin-top:-75px;">
<div style="width: 900px; margin: 0 auto; padding: 120px 0 40px;">
    <div id="receipt_view"></div>
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

function show_receipt_details(id)
{
	$.ajax({
		type: "POST",
        url: "<?php echo site_url();?>/ajax/ajaxGetReceipt/"+id, 
        success: function(data) 
        		{
            		console.log(data);
                	jQuery("#receipt_view").html(data);
        }
    });
}

function show_html(id)
{
	$.ajax({
		type: "POST",
        url: "<?php echo site_url();?>/ajax/ajaxHmtlContent/"+id, 
        success: function(data) 
        		{
            		if(data.length > 0)
            		{
            			jQuery("#receipt_view").html("<h2>Email Content</h2<br><hr>"+data);	
            		}
        }
    });
}
</script>
