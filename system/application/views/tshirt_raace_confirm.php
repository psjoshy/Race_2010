<div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
	<h2>Confirm Race Packs Quantity</h2>
	<form method="post" action="<?= $baes ?>/index.php/admin/confrim_racepack>
				<table>
			<tr>

				<td>Quantity</td>
				<td><input type="text" name="quantity" id="quantity" /></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="hidden" name="created_date" value="<?= $date("d-m-y") ?>>
					<input type="hidden" name="created_by" value="<?= $this->session->userdata("id") ?>" >
					<input type="submit" name="" id="submit" value="Initialise" /> <span class="warning">This function can only be used once.</span>
				</td>

			</tr>
		</table>
	</form>
</div>    		</div>	
    	</div>
