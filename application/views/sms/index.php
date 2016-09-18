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
						<th>Mobile</th>
						<th>SMS</th>
						<th>Characters</th>
						<th>Status</th>
					</tr>
			</thead>
			<?php
				$sr=1;
				foreach($smss as $sms) 
				{
				?>
				<tr id="record_<?php echo $sms['id'];?>">
					<td> <?php echo $sr;?> </td>
					<td> <?php echo $sms['name'];?> </td>
					<td> <?php echo $sms['mobile'];?> </td>
					<td> <?php echo $sms['sms_text'];?> </td>
					<td> <?php echo $sms['char_count'];?> </td>
					<td> <?php echo $sms['status'];?> </td>
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
});


</script>