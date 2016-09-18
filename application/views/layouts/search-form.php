<?php
$value = "";
if(isset($_GET['q']))
{
	$value = $_GET['q'];
}
?>
<form action="<?php echo site_url();?>contacts/search" method="get" class="sidebar-form">
	<div class="input-group">
		<input type="text" name="q" id="q"  value="<?php echo $value;?>" class="form-control" placeholder="Search...">
		<span class="input-group-btn">
			<button type="submit" name="search" id="search-btn" class="btn btn-flat">
				<i class="fa fa-search"></i>
			</button>
		</span>
	</div>
</form>