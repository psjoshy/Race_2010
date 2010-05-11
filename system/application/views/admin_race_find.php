<script>
//<?= $base ?>/index.php/admin/uncollect/
$(document).ready(function() {
//$base/index.php/admin/uncollect/ 

	$(".uncollect_lst").click(function()
	{
		<?php
		if(!isset($m))
		{
		?>
		$("#message").load("<?= $base ?>/index.php/admin/uncollect/"+this.id);
		<?php
		}
		else
		{
		?>
		$("#message").load("<?= $base ?>/index.php/admin/muncollect/"+this.id);
		<?php
		}
		?>
		$("#part_"+this.id).fadeOut("normal");
		
		
	});
});
</script>
<div id="message"></div>
<div id="part_<?= $id ?>">
<? if($name!="")
{

	echo $name;
?>
<?php if(!isset($m))
{
?>
	<a href="<?= $base ?>/index.php/admin/participants_show/<?= $id ?>"> Show Participant</a> 
<?php
}
else
{
?>
	<a href="<?= $base ?>/index.php/collect/collect_merchandisepage_completed/<?= $id ?>"> Show Participant</a> 
<?php
}
?>
<? if ($collect_it==1) 
{ 
?>
<a href="#" id="<?= $id ?>" class="uncollect_lst">Uncollect</a>
<?
}
?>
	<?php if(!isset($m))
	{
	?>
	<a href="<?= $base ?>/index.php/admin/part_edit/<?= $id ?>">Edit Participant</a>					
	<a href="<?= $base ?>/index.php/admin/part_del/<?= $id ?>">Delete Participant</a> 
	<?
	}
	?>
<?
}
else
{
	echo "<font color='#FF3333'><strong>No such record</strong></font>";
}
?>
</div>