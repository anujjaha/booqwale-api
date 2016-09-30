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
		<a href="<?php echo site_url();?>offers/create">Add More</a>	
		</h3>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="datatable" class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Associated</th>
						<th>Title </th>
						<th>Small Tilte</th>
						<th>Description</th>
						<th>Deal Code</th>
						<th>Deal Expired</th>
						<th>Link</th>
						<th>Booqwale Affiliate</th>
						<th>Image</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
			</thead>
			<?php
				$sr=1;
				foreach($offers as $offer) {
				?>
				<tr id="record_<?php echo $offer['id'];?>">
					<td> <?php echo $offer['id'];?> </td>
					<td> <?php echo $offer['associate_title'];?> </td>
					<td> <?php echo $offer['title'];?> </td>
					<td> <?php echo $offer['small_title'];?> </td>
					<td> <?php echo $offer['description'];?> </td>
					<td> <?php echo $offer['deal_code'];?> </td>
					<td> <?php echo $offer['deal_end'];?> </td>
					<td> <?php echo $offer['custom_link'];?> </td>
					<td> <?php
							if($offer['is_booqwale'])
							{
								echo "Yes";
							}
							else
							{
								echo "No";
							}
						?> 
					</td>
					<td> 
						<?php
							if(isset($offer['image']) && !empty($offer['image']))
							{
						?>
						<img width="50" height="50" class="circle" src="<?php echo site_url();?>/assets/offer-images/<?php echo $offer['image'];?>"> 
						<?php } ?>
					</td>
					<td>
						<?php
							if($offer['status']) 
							{
								echo "<span class='green'>Active</span>";
							}
							else
							{
								echo "<span class='red'>Inactive</span>";	
							}
						?>
					</td>
					<td>
						<span class="btn btn-success delete-data" data-id="<?php echo $offer['id'];?>">
							Delete
						</span>
					</td>
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

		jQuery(".delete-data").on('click', function()
		{
			deleteCategory(jQuery(this).data('id'));
		})
});

function deleteCategory(id) {
	var status = confirm("Do you want to Delete Daily Offer ?");

	if(status == false) { 
		return false; 
	}

	jQuery.ajax({
         type: "POST",
         url: "<?php echo site_url();?>/ajax/ajax_delete_offer/"+id, 
         success: 
            function(data) {
            		if(data == true) {
            			jQuery("#record_"+id).remove();
            		} else {
            			alert("Unable to Delete Offer");
            		}
            		return true;
            }
          });
}	


</script>