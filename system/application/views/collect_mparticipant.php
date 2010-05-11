<?
if($this->session->userdata("type")=="admin") header("Location:$base/index.php/admin/manparticipant");
?>
<script>
	$(document).ready(function() 
	{
		$("#racesearch").click(function()
		{
			$("#message").html("<img src='<?= $base ?>/images/ajax-loader.gif' />");
			$("#message").load("<?= $base ?>/index.php/collect/mrace_finder/"+$("#race_id").val());
		});
		
		$("#nric_search").click(function()
		{
			$("#message").html("<img src='<?= $base ?>/images/ajax-loader.gif' />");
			$("#message").load("<?= $base ?>/index.php/collect/nric_mfinder/"+$("#nric").val());
		});
		
		$("#email_search").click(function()
		{
			$("#message").html("<img src='<?= $base ?>/images/ajax-loader.gif' />");
			$("#message").load("<?= $base ?>/index.php/collect/email_mfinder/"+$("#email").val());
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
			<div align="center" ><font color="#CC0000" > <?= $msg ?></font> </div>
		<div class="searchbox">
			<div id="find_by_race_id">
			
			<strong>Merchandise Collection</strong>
		<br>
				ID <input type="text" name="race_id" id="race_id" /> <input type="button" value="Search" id="racesearch">
			<br />
				or
			</div>

			<div id="find_by_nric">
			
				Participant's NRIC 
				<input type="text" name="nric" id="nric" /> <input  type="button" value="Search" id="nric_search">
				<br/>
				or
			</div>
			<div id="find_by_nric">
			
				Email
				<input type="text" name="email" id="email" /> <input  type="button" value="Search" id="email_search">
			</div>
		</div>
			</div>
			<div id="message" style="padding-top:10px"></div>
	</div>    		
</div>
</div>
