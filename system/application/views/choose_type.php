<?
if($this->session->userdata("type")=="admin") header("Location:$base/index.php/admin/manparticipant");
?>
 
<div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
		<div class="menu_action">
		
	</div>
	<?= (isset($message)) ? $message : "" ?>
			<div id="profiles">
		<div class="searchbox">
			<div id="find_by_race_id">
			
			<strong><a href="search/1" >Race Pack Collection </a></strong>
		    </div>

			<div id="find_by_nric">
			<strong><a href="search/2" >Merchandise Collection</a></strong>
				</div>
		</div>
			</div>
			<div id="message" style="padding-top:10px"></div>
	</div>    		
</div>
</div>
