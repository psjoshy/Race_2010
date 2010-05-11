<div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
	<h2>Event tee and Race Packs</h2>
	<ul>
		<? if($id == 0 )
		{
		?>
		<li><a href="<?= $base ?>/index.php/admin/init_tshirts/">Initialise T-Shirts Quantity</a></li>
		<?
		}
		?>
		<? if($id != 0 )
		{
		?>
		<li><a href="<?= $base ?>/index.php/admin/tshirts_edit/<?= $id ?>">Modify T-Shirts Quantity</a></li>
		<?
		}
		?>

		<? if($racid == 0 )
		{
		?>
		<li><a href="<?= $base ?>/index.php/admin/tshirt_racepack_confrim">Confirm Race Packs</a></li>
		<?
		}
		?>
		<? if($racid !=0)
		{
		?>
		
		<li><a href="<?= $base ?>/index.php/admin/tshirt_racepack_edit/<?= $racid ?>">Change Race Packs</a></li>
		<?
		}
		?>
	</ul>
</div>    		</div>	
    	</div>
