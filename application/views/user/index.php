<link rel="stylesheet" type="text/css" href="<?php echo site_url();?>assets/datatable/css/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="<?php echo site_url();?>assets/datatable/js/jquery.dataTables.js"></script>
<script>
jQuery(document).ready(function() {
	 jQuery('#datatable').DataTable( {
        "processing": true,
        "serverSide": true,
        'bSort': false,
        "ajax": "<?php echo site_url();?>ajax/get_users/1"
    } );
} );
</script>
 <section class="content">
	<div class="row">
    <div class="col-xs-12">
	<div class="box">
                <div class="box-header">
                <h3 class="box-title">
					  Users List
				</h3>
				<a href="<?php echo site_url();?>user/create">Add More</a>	
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="datatable" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Sr</th>
								<th>Username</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Email Id</th>
								<th>Role</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
</section>
