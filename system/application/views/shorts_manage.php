<div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
	<h2>Shorts</h2>
	<ul>
		<? if($id == 0 )
		{
		?>
		<li><a href="<?= $base ?>/index.php/admin/init_shorts/">Initialise shorts Quantity</a></li>
		<?
		}
		?>
		<? if($id != 0 )
		{
		?>
		<li><a href="<?= $base ?>/index.php/admin/shorts_edit/<?= $id ?>">Modify Shorts Quantity</a></li>
		<?
		}
		?>
			

		<? if($racid == 0 )
		{
		?>
		<li><a href="<?= $base ?>/index.php/admin/shorts_racepack_confrim">Confirm Race Packs</a></li>
		<?
		}
		?>
		<? if($racid !=0)
		{
		?>
		
		<li><a href="<?= $base ?>/index.php/admin/shorts_racepack_edit/<?= $racid ?>">Change Race Packs</a></li>
		<?
		}
		?>
	</ul>
</div>    		</div>	
    	</div>
