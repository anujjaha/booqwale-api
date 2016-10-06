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
		<a href="<?php echo site_url();?>associates/create">Add More Associate</a>	
		</h3>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="datatable" class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Title </th>
						<th>Image</th>
						<th>Action</th>
					</tr>
			</thead>
			<?php
				$sr=1;
				foreach($associates as $associate) {
				?>
				<tr id="record_<?php echo $associate['id'];?>">
					<td> <?php echo $associate['id'];?> </td>
					<td> <?php echo $associate['associate_title'];?> </td>
					<td> 
						<?php
							if(isset($associate['associate_image']) && !empty($associate['associate_image']))
							{
						?>
						<img width="50" height="50" class="circle" src="<?php echo $associate['associate_image'];?>"> 
						<?php } ?>
					</td>
					<td>
						<span class="btn btn-success delete-data" data-id="<?php echo $associate['id'];?>">
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
	var status = confirm("Do you want to Delete Associate ?");

	if(status == false) { 
		return false; 
	}

	jQuery.ajax({
         type: "POST",
         url: "<?php echo site_url();?>/ajax/ajax_delete_associate/"+id, 
         success: 
            function(data) {
            		if(data == true) {
            			jQuery("#record_"+id).remove();
            		} else {
            			alert("Unable to Delete Associate");
            		}
            		return true;
            }
          });
}	


</script>