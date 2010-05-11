<div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
	<h2>Intialise Bibs Sizes and Quantity</h2>
	<?
		if(isset($res))
		{
			if($res!="")
			{
				echo $res;
			}
		}
	?>
	<form method="post" action="<?= $base ?>/index.php/admin/bibs_init">
				<table>
			<tr>

				<td>Sizes</td>
				<td>Quantity</td>
			</tr>
			<tr>
				<td>Size Xs</td>
				<td><input type="text" name="size_XS" id="size_XS" /></td>
			</tr>
			<tr>
				<td>Collected XS </td>
				<td><input type="text" name="collected_XS" id="collected_XS" /> </td>
			<tr>
			<tr>	
				<td>XL</td>
				<td><input type="text" name="size_XL" id="size_XL" /></td>
			</tr>
			<tr>	
				<td>Collected XL</td>
				<td><input type="text" name="collected_XL" id="collected_XL" /></td>
			</tr>
				<tr>	
				<td>Spare XL</td>
				<td><input type="text" name="spare_XL" id="spare_XL" /></td>
			</tr>
			<tr>
				<td>L</td>
				<td><input type="text" name="size_L" id="size_L" /></td>
			</tr>
			<tr>
				<td>collected_L</td>
				<td><input type="text" name="collected_L" id="collected_L" /></td>
			</tr>

			<tr>
				<td>Spare L</td>
				<td><input type="text" name="spare_L" id="spare_L" /></td>
			</tr>
			<tr>
				<td>M</td>
				<td><input type="text" name="size_M" id="size_M" /></td>
			</tr>
			<tr>
				<td>Collected M</td>
				<td><input type="text" name="collected_M" id="collected_M" /></td>
			</tr>

			<tr>
				<td>Spare M</td>
				<td><input type="text" name="spare_M" id="spare_M" /></td>
			</tr>
			<tr>
				<td>S</td>
				<td><input type="text" name="size_S" id="size_S" /</td>
			</tr>
			<tr>
				<td>Collected S</td>
				<td><input type="text" name="collected_S" id="collected_S" /</td>
			</tr>

			<tr>
				<td>Spare S</td>
				<td><input type="text" name="spare_S" id="spare_S" /></td>
			</tr>
			<tr>
				<td>XS</td>
				<td><input type="text" name="size_XS" id="size_XS" /></td>
			</tr>

			<tr>
				<td>Spare XS</td>
				<td><input type="text" name="spare_XS" id="spare_XS" /></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="hidden" name="created_date" value="<?= date('y-m-d') ?> ">
					<input type="hidden" name="created_by" value="<?= $this->session->userdata("id") ?> ">
					<input type="submit" name="" id="" value="Confirm" /> <span class="warning">This function can only be used once.</span>

				</td>
			</tr>
		</table>
	</form>
</div>    		</div>	
    	</div>
