<div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
	<h2>Intialise Skorts Sizes and Quantity</h2>
	<?
		if(isset($res))
		{
			if($res!="")
			{
				echo $res;
			}
		}
	?>
	<form method="post" action="<?= $base ?>/index.php/admin/skorts_init">
				<table>
			<tr>

				<td>Sizes</td>
				<td>Quantity</td>
			
			</tr>
				<tr>
				<td>XS</td>
				<td><input type="text" name="size_XS" id="size_XS" value="" /></td>
			</tr>
			
			</tr>
				<tr>
				<td>S</td>
				<td><input type="text" name="size_S" id="size_S" value="" /></td>
			</tr>
			<tr>
				<td>M </td>
				<td><input type="text" name="size_M" id="size_M" value=""   /> </td>
			<tr>
			<tr>	
				<td>L</td>
				<td><input type="text" name="size_L" id="size_L" value="" /></td>
			</tr>
			<tr>	
				<td>XL</td>
				<td><input type="text" name="size_XL" id="size_XL" value="" /></td>
			</tr>
			<tr>	
				<td>XXL</td>
				<td><input type="text" name="size_XXL" id="size_XXL" value="" /></td>
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
