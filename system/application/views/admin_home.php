 <div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
	<p><span class="welcome">Hi  <?= $this->session->userdata('name') ?></span></p>
	<p>Choose an action

		<ul>
			<li><a href="<?= $base ?>/index.php/admin/manage">Manage Administrators</a></li>

			<li><a href="<?= $base ?>/index.php/admin/manparticipant">Manage Participants</a></li>
			<li><a href="<?= $base ?>/index.php/admin/manMparticipant">Manage Merchandise</a></li>
			<li><a href="<?= $base ?>/index.php/admin/merchandise">Manage Merchandise Collection</a></li>
			<li><a href="<?= $base ?>/index.php/admin/inventory">Manage Inventory</a></li>			
			<li><a href="<?= $base ?>/index.php/admin/reports/">Reports</a></li>
		</ul>
</p>
	</div>
</div>
</div>

    	