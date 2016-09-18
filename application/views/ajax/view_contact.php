<style>
.view-contact-profilepicture {
	width:150px;
	height: 150px;
	border-radius: 100%;
}
</style>
<div class="col-md-12">
	<div class="row">

		<div class="col-md-12">
		
			<div class="col-md-3 col-sm-4">
				<img class="view-contact-profilepicture" src="<?php echo site_url('assets/profilepicuters/'.$contact['profile_picture']);?>">
			</div>

			<div class="col-md-9  col-sm-8">
				<h3> <?php echo $contact['name'];?> </h3>
				<h4> <?php echo $contact['company_name'];?> </h4>
				<h4> <?php echo $contact['mobile'];?> </h4>
				<h5> <?php echo $contact['email_id_one'];?> </h5>
				<h5> <?php echo getCategoryValue($contact['category_id']);?> </h5>
			</div>

		</div>

		<div class="col-md-12">
			<div class="col-md-12">
				<br>&nbsp;<br>
			</div>
			<table class="table" border="0">
				<tr>
					<td align="right">
						Address : 
					</td>
					<td>
						<?php echo $contact['address_one'];?>
							&nbsp;
						<?php echo $contact['address_two'];?>
					</td>
				</tr>

				<tr>
					<td align="right">
						City :
					</td>
					<td>
						<?php echo $contact['city'];?>
					</td>
				</tr>

				<tr>
					<td align="right">
						State :
					</td>
					<td>
						<?php echo $contact['state'];?>
					</td>
				</tr>

				<tr>
					<td align="right">
						Zip :
					</td>
					<td>
						<?php echo $contact['zip'];?>
					</td>
				</tr>

				<tr>
					<td align="right">
						Reference By :
					</td>
					<td>
						<strong> <?php echo $contact['reference_name'];?> </strong>
					</td>
				</tr>

				<tr>
					<td align="right">
						Notes : 
					</td>
					<td>
						<?php echo $contact['notes'];?>
					</td>
				</tr>
			</table>

		</div>
	</div>
</div>