<?
if($this->session->userdata("type")=="admin") header("Location:$base/index.php/admin/manparticipant");
?>
<script>
	$(document).ready(function() 
	{
		$("#racesearch").click(function()
		{
			$("#message").html("<img src='<?= $base ?>/images/ajax-loader.gif' />");
			$("#message").load("<?= $base ?>/index.php/collect/race_finder/"+$("#race_id").val());
		});
		
		$("#nric_search").click(function()
		{
			$("#message").html("<img src='<?= $base ?>/images/ajax-loader.gif' />");
			$("#message").load("<?= $base ?>/index.php/collect/nric_finder/"+$("#nric").val());
		});
		
	});
   
</script>
<div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
		<div class="menu_action">
		
	</div>
	<?= (isset($message)) ? $message : "" ?>
			<div id="profiles">
		<div class="searchbox">
			<div id="find_by_race_id">
			
			<strong>Race Pack Collection</strong>
		<br>
				Race ID <input type="text" name="race_id" id="race_id" /> <input type="button" value="Search" id="racesearch">
			<br />
				or
			</div>

			<div id="find_by_nric">
			
				Participant's NRIC 
				<input type="text" name="nric" id="nric" /> <input type="button" value="Search" id="nric_search">
			</div>
		</div>
			</div>
			<div id="message" style="padding-top:10px"></div>
	</div>    		
</div>
</div>
