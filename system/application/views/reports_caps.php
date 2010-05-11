<div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
	<h2>Participants Caps Inventory Report</h2>
<? foreach($query as $row)
{
?>
	<table class="tshirt_report" style="position: relative; margin-top: 10px; margin-left: auto; margin-right: auto;">
		<tr style="font-weight: bold;">
			<td rowspan="2">Size</td><td rowspan="2">Total Confirmed</td>

						<td colspan="2">Saturday, 9 May 2009</td><td colspan="2">Sunday, 10 May 2009</td>
						<td rowspan="2">Spare</td>
		</tr>
		<tr>
			<td>Collected</td><td>Not Collected</td> <td>Collected</td><td>Not Collected</td>

		</tr>
		<tr>
			<td>XS</td><td><?= $row->size_XS  ?></td>
			<td>0</td><td><?= $row->size_XS  ?></td>
			<td>0</td><td><?= $row->size_XS  ?></td><td><?= $row->spare_XS  ?></td>

		</tr>
		<tr>
			<td>S</td><td><?= $row->size_S  ?></td>
			<td>0</td><td><?= $row->size_S  ?></td>
			<td>0</td><td><?= $row->size_S  ?></td><td><?= $row->spare_S  ?></td>

		</tr>
		<tr>
			<td>M</td><td><?= $row->size_M  ?></td>
			<td>0</td><td><?= $row->size_M  ?></td>
			<td>0</td><td><?= $row->size_M  ?></td><td><?= $row->spare_M  ?></td>

		</tr>
		<tr>
			<td>L</td><td><?= $row->size_L  ?></td>
			<td>0</td><td><?= $row->size_L  ?></td>
			<td>0</td><td><?= $row->size_L  ?></td><td><?= $row->spare_L  ?></td>

		</tr>
		<tr>
			<td>XL</td><td><?= $row->size_XL  ?></td>
			<td>0</td><td><?= $row->size_XL ?></td>
			<td>0</td><td><?= $row->size_XL  ?></td><td><?= $row->spare_XL  ?></td>

		</tr>
	</table>
<?
}
?>
</div>    		</div>	
    	</div>
