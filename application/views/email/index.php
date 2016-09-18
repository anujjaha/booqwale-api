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
						<th>Group Name</th>
						<th>Actions</th>
					</tr>
			</thead>
			<?php
				$sr=1;
				foreach($categories as $category) {
				?>
				<tr id="record_<?php echo $category['id'];?>">
					<td> <?php echo $sr;?> </td>
					<td> <?php echo $category['categories'];?> </td>
					<td>
						
						<a href="<?php echo site_url();?>category/edit/<?php echo $category['id'];?>">
							<i class="fa fa-edit"></i>
						</a>
						
						&nbsp;&nbsp;&nbsp; 

						<a href="javascript:void(0);" onclick="deleteCategory(<?php echo $category['id'];?>);">
							<i class="fa fa-times"></i>
						</a>
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

<!-- FancyBox Start -->
<div id="view_job_details" style="width:900px;display: none;margin-top:-75px;">
<div style="width: 900px; margin: 0 auto; padding: 120px 0 40px;">
    <div id="contact_view"></div>
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

function deleteCategory(id) {
	var status = confirm("Do you want to Delete category ?");

	if(status == false) { 
		return false; 
	}

	
	$.ajax({
         type: "POST",
         url: "<?php echo site_url();?>/ajax/ajax_delete_category/"+id, 
         success: 
            function(data) {
            		if(data == true) {
            			jQuery("#record_"+id).remove();
            		} else {
            			alert("Group is Not Empty, Cann't Delete !");
            		}
            		return true;
            }
          });
}	


</script>