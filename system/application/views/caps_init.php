<div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
	<h2>Intialise Caps Sizes and Quantity</h2>
	<?
		if(isset($res))
		{
			if($res!="")
			{
				echo $res;
			}
		}
	?>
	<form method="post" action="<?= $base ?>/index.php/admin/caps_init">
				<table>
			<tr>
				<td>Quantity</td>
				<td><input type="text" name="cap_qty" value=""></td>
					
			</tr>
				
			<tr>
				<td colspan="2">
					<input type="hidden" name="created_date" value="<?= date('Y-m-d') ?> ">
					<input type="hidden" name="created_by" value="<?= $this->session->userdata("id") ?> ">
					<input type="submit" name="" id="" value="Confirm" /> <span class="warning">This function can only be used once.</span>

				</td>
			</tr>
		</table>
	</form>
</div>    		</div>	
    	</div>
