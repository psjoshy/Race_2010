<div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
	<h2>Caps</h2>
	<ul>
		<? if($id == 0 )
		{
		?>
		<li><a href="<?= $base ?>/index.php/admin/init_caps/">Initialise Caps Quantity</a></li>
		<?
		}
		?>
		<? if($id != 0 )
		{
		?>
		<li><a href="<?= $base ?>/index.php/admin/caps_edit/<?= $id ?>">Modify Caps Quantity</a></li>
		<?
		}
		?>
		
		<? if($racid == 0 )
		{
		?>
		<li><a href="<?= $base ?>/index.php/admin/caps_racepack_confrim">Confirm Race Packs</a></li>
		<?
		}
		?>
		<? if($racid !=0)
		{
		?>
		
		<li><a href="<?= $base ?>/index.php/admin/caps_racepack_edit/<?= $racid ?>">Change Race Packs</a></li>
		<?
		}
		?>
	</ul>
</div>    		</div>	
    	</div>
