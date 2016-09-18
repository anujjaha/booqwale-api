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
        <h2 class="box-title">
			  Search Result : Found <?php echo count($results);?>  Results for "<?php echo $keyword;?>"
		</h2>
		</div><!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="datatable" class="table">
				<thead>
					<tr>
						<th>Sr</th>
						<th>Group</th>
						<th>Image</th>
						<th>Name</th>
						<th>Company Name</th>
						<th>Mobile Number</th>
						<th>Contact Number </th>
						<th>City</th>
						<th>Email Id</th>
						<th>Actions</th>
					</tr>
			</thead>
			<?php
				$sr=1;

				if(count($results) > 0)
				{
					foreach($results as $contact) {
					?>
					<tr id="record_<?php echo $contact['contact_id'];?>">
						<td> <?php echo $sr;?> </td>
						<td> <?php echo $contact['categories'];?> </td>
						<td> 
						
							<a class="fancybox"  onclick="show_contact_details(<?php echo $contact['contact_id'];?>);" href="#view_job_details">

								<img class="profile-picture" src="<?php echo site_url('assets/	profilepicuters/'.$contact['profile_picture']);?>">
							</a>	
						</td>
						<td> <?php echo $contact['name'];?> </td>
						<td> <?php echo $contact['company_name'];?> </td>
						<td> <?php echo $contact['mobile'];?> </td>
						<td> <?php echo $contact['contact_number'];?> </td>
						<td> <?php echo $contact['city'];?> </td>
						<td> <?php echo $contact['email_id_one'];?> </td>
						<td>
							
							<a class="fancybox"  onclick="show_contact_details(<?php echo $contact['contact_id'];?>);" href="#view_job_details">
								<i class="fa fa-eye"></i>
							</a>
							
							&nbsp;&nbsp;&nbsp; 
							
							
							<a href="<?php echo site_url();?>contacts/edit/<?php echo $contact['contact_id'];?>">
								<i class="fa fa-edit"></i>
							</a>
							
							&nbsp;&nbsp;&nbsp; 

							
						</td>
					</tr>
				<?php
					$sr++;
				}
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

function show_contact_details(id) {
	$.ajax({
         type: "POST",
         url: "<?php echo site_url();?>/ajax/ajax_get_contact/"+id, 
         success: 
            function(data) {
            		console.log(data);
                	jQuery("#contact_view").html(data);
            }
          });
}	

</script>