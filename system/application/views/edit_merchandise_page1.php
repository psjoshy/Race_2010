<div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
	
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
<h2>Intialise <?= $row->item_name  ?>  Quantity</h2>
	<form method="post" action="<?= $base ?>/index.php/admin/edit_merchandise_page1/<?= $id ?>">
				<table>
		<tr>
			<td>Quantity</td>
				<td><input type="text" name="cap_qty" value="<?= $row->cap_qty ?>"></td>
		</tr>
			<tr>
				<td colspan="2">
					<input type="hidden" name="modified_date" value="<?= date('Y-m-d') ?> ">
					<input type="hidden" name="modified_by" value="<?= $this->session->userdata("id") ?> ">
					<input type="submit" name="" id="" value="Update" disabled="disabled" />

				</td>
			</tr>
		</table>
	</form>
<?
}
?>
</div>    		</div>	
    	</div>
