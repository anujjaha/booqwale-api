<div class="col-md-12">
	<div class="row">

		<div class="col-md-12">

			<h3> Subject : <?php echo $campaign->subject;?> </h3>
			
			<table class="table">
				<tr>	
					<th> Sr </th>
					<th> Name </th>
					<th> Mobile </th>
					<th> Email Id </th>
				</tr>
			<?php
				$sr=1;
				foreach($receipts as $receipt)
				{
			?>
				<tr>	
					<td> <?php echo $sr;?> </td>
					<td> <?php echo $receipt['name'];?> </td>
					<td> <?php echo $receipt['mobile'];?> </td>
					<td> <?php echo $receipt['email_id_one'];?> </td>
				</tr>
			<?php
				$sr++;
				}
			?>
			</table>
	
		</div>
		
	</div>
</div>
