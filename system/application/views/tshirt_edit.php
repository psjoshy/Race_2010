<div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
	<h2>Intialise T-Shirt Sizes and Quantity</h2>
	<?
		if(isset($res))
		{
			if($res!="")
			{
				echo $res;
			}
		}
	
foreach($query as $row)
{
?>
	<form method="post" action="<?= $base ?>/index.php/admin/tshirt_editit/<?= $id ?>">
				<table>
			<tr>

				<td>Sizes</td>
				<td>Quantity</td>
			</tr>
			<tr>
				<td>Xs</td>
				<td><input type="text" name="size_XS" id="size_XS" value="<?= $row->size_XS  ?>" /></td>
			</tr>
			<tr>
				<td>S </td>
				<td><input type="text" name="size_S" id="size_XS" value="<?= $row->size_S ?>" /> </td>
			<tr>
			<tr>	
				<td>M</td>
				<td><input type="text" name="size_M" id="size_M" value="<?= $row->size_M ?>" /></td>
			</tr>
			<tr>	
				<td>L</td>
				<td><input type="text" name="size_L" id="size_XL" value="<?= $row->size_L ?>" /></td>
			</tr>
				<tr>	
				<td>XL</td>
				<td><input type="text" name="size_XL" id="size_XL" value="<?= $row->size_XL ?>" /></td>
			</tr>
			<tr>
				<td>XXL</td>
				<td><input type="text" name="size_XXL" id="size_XXL" value="<?= $row->size_XXL ?>" /></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="hidden" name="created_date" value="<?= date('Y-m-d') ?> ">
					<input type="hidden" name="created_by" value="<?= $this->session->userdata("id") ?> ">
					<input type="submit" name="" id="" value="Confirm" disabled="disabled"/> <span class="warning">This function can only be used once.</span>

				</td>
			</tr>
		</table>
	</form>
<?
}
?>
</div>    		</div>	
    	</div>
