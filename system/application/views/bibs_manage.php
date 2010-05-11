<div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
	<h2>Bibs</h2>
	<ul>
		<? if($id == 0 )
		{
		?>
		<li><a href="<?= $base ?>/index.php/admin/init_bibs/">Initialise Bibs Quantity</a></li>
		<?
		}
		?>
		<? if($id != 0 )
		{
		?>
		<li><a href="<?= $base ?>/index.php/admin/bibs_edit/<?= $id ?>">Modify Bibs Quantity</a></li>
		<?
		}
		?>
		<li><a href="<?= $base ?>/index.php/admin/participants/lists/">Change Participant's Caps</a></li>
	</ul>
</div>    		</div>	
    	</div>
