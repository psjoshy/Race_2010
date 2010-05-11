<div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
	<h2>Skorts</h2>
	<ul>
		<? if($id == 0 )
		{
		?>
		<li><a href="<?= $base ?>/index.php/admin/init_skorts/">Initialise skorts Quantity</a></li>
		<?
		}
		?>
		<? if($id != 0 )
		{
		?>
		<li><a href="<?= $base ?>/index.php/admin/skorts_edit/<?= $id ?>">Modify skorts Quantity</a></li>
		<?
		}
		?>
			
		
		<? if($racid == 0 )
		{
		?>
		<li><a href="<?= $base ?>/index.php/admin/skorts_racepack_confrim">Confirm Race Packs</a></li>
		<?
		}
		?>
		<? if($racid !=0)
		{
		?>
		
		<li><a href="<?= $base ?>/index.php/admin/skorts_racepack_edit/<?= $racid ?>">Change Race Packs</a></li>
		<?
		}
		?>
	</ul>
</div>    		</div>	
    	</div>
