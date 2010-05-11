<script>
$(document).ready(function(){

	$(".uncollect").click(function(){
			$("#message").load("<?= $base ?>/index.php/admin/uncollect/<?= $id ?>");
			location.reload(true);
	});
});

</script>
<div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
	<div id="message"></div>
	<div class="menu_action">
		<ul class="menu">
			<li><a href="<?= $base ?>/index.php/admin/manparticipant">Search</a></li>	
		<?	foreach($query as $row)
			{
				if($row->collect_it==1)
				{
		?>
			<li><a href="#" class="uncollect">Uncollect</a></li>	
		<?
				}
			}
		?>
			<li><a href="<?= $base ?>/index.php/admin/part_edit/<?= $id ?>">Edit This</a></li>
			<li><a href="<?= $base ?>/index.php/admin/part_del/<?= $id ?>">Delete This</a></li>
					</ul>
	</div>
	<div id="profile">
		<h2>Show</h2>
		
		<? foreach($query as $row)
		{
		?>
		
		<table width="100%" cellpadding="0"  cellspacing="0" border="0">
<tr>
<td width="22%">Race ID</td>
<td width="78%"><?= $row->race_id?> </td>
</tr>
<tr>
<td>Category</td>
<td><?= $row->category ?></td>
</tr>
<tr>
<td>Bib Name</td>
<td><?= $row->bib_name ?></td>
</tr>
<!-- 
<tr>
<td>Gold Series Choice</td>
<td><?= $row->gold_series_choice ?></td>
</tr>
<tr>
<td>Gold Series Size</td>
<td><? $row->gold_series_size ?></td>
</tr><tr>
<td>Emergency Contact Person</td>
<td><?= $row->emergency_contact_person ?></td>
</tr><tr>
<td>Emergency Contact No</td>
<td><?= $row->emergency_contact_no ?></td>
</tr>
<tr>
<td>Emergency Relationship</td>
<td><?= $row->relationship ?></td>
</tr>
-->
<tr>
<td>Date Signed up</td>
<td><?= $row->date_signed_up ?></td>
</tr>
<tr>
<td>Date Time Paid</td>
<td><?= $row->date_time_paid ?></td>
</tr>

<tr>
<td>Promo Code</td>
<td><?= $row->promo_code ?></td>
</tr>

<tr>
<td>Payment Mode</td>
<td><?= $row->payment_mode ?></td>
</tr>
<tr>
<td>Admin Track</td>
<td><?= $row->admin_track ?></td>
</tr>

<tr>
<td>First Name</td>
<td><?= $row->fullname ?></td>
</tr>

<tr>
<td>Last Name</td>
<td><?= $row->lastname ?></td>
</tr>

<tr>
<td>Nric</td>
<td><?= $row->nric ?></td>
</tr>
<!-- 
<tr>
<td>Date Of Birth</td>
<td><?= $row->dob ?></td>
</tr>

<tr>
<td>Age</td>
<td><?= $row->age ?></td>
</tr>

<tr>
<td>Organization</td>
<td><?= $row->organization ?></td>
</tr>

<tr>
<td>Occupation</td>
<td><?= $row->occupation ?></td>
</tr>
-->
<tr>
<td>Tshirt Size</td>
<td><?= $row->tshirt_size ?></td>
</tr>

<tr>
<td>Address</td>
<td><?= $row->address ?></td>
</tr>

<tr>
<td>Country</td>
<td><?= $row->country ?></td>
</tr>

<tr>
<td>Postal Code</td>
<td><?= $row->postal_code ?></td>
</tr>

<tr>
<td>Email</td>
<td><?= $row->email ?></td>
</tr>

<tr>
<td>Home No</td>
<td><?= $row->home_no ?></td>
</tr>

<tr>
<td>Mobile No</td>
<td><?= $row->mobile_no ?></td>
</tr>
<!-- 
<tr>
<td>Medical Allergies</td>
<td><?= $row->medical_allergies ?></td>
</tr>

<tr>
<td>Medical Conditions</td>
<td><?= $row->medical_conditions ?></td>
</tr>
  
<tr>
<td>Merchandise</td>
<td><?= $row->merchandise ?></td>
</tr>

<tr>
<td>Women10k Series Cap</td>
<td><? $row->women10k_series_cap ?></td>
</tr>

<tr>
<td>Women10k Series Shorts</td>
<td><?= $row->women10k_series_shorts ?></td>
</tr>

<tr>
<td>Women10k Skorts</td>
<td><?= $row->women10k_skorts ?></td>
</tr>
 -->
<tr>
<td>Remark</td>
<td><?= $row->remark ?></td>
</tr>
</table>
<?
	if($row->collect_it==1)
	{
?>
	<h2>Collect Detail</h2>
	<table>
	
	<tr>
		<td>
			Collect Type &nbsp;
		</td>
		<td>
			<?= ($row->self_collect == 0) ? "Self Collect" : "Collect on Behalf" ?>
		</td>
	</tr>
	<tr>
		<td>
			Counter
		</td>
		<td>
			<?= $row->counter ?>
		</td>
	<tr>
		<td>
			RPC
		</td>
		<td>
			<?= $row->created_by ?>
		</td>
	</tr>
	<tr>
		<td>
			Collection Date/Time
		</td>
		<td>			
			<?= date("d F 'y H:i:s",strtotime($row->created_date));
			
			 ?>
		</td>
	</tr>
	</table>
<?
	}
} ?>
	</div>

</div>    		
</div>	
</div>
