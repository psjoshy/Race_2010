<?
 if($name!="")
{

	echo $name;
	
?>

<? if($collect_it == 0)
{
 
?>
<script>
window.location="<?= $base ?>/index.php/collect/collect_merchandisepage/<?= $id ?>";
</script>
<!-- <a href="<?= $base ?>/index.php/collect/collectpage/<?= $id ?>">Collect Pack</a>  -->
<?
}
else
{
?>
<script>
window.location="<?= $base ?>/index.php/collect/collect_merchandisepage_completed/<?= $id ?>";
</script>
<?	
/*	echo "is already Collected.";
	
	if($collected_by == $this->session->userdata("name"))
	{
		echo " <a href='$base/index.php/collect/uncollect/$id'>Uncollect</a> | ";
		echo " <a href='$base/index.php/collect/collectpage/$id'>Update</a> |";
		
	}
	else
	{
		 echo "Collected By $collected_by.";
	}
	
	 echo "<a href='$base/index.php/collect/showdetail/$id'> Show Detail </a>";
*/
}
?>


<?
}
else
{
	echo "<font color='#FF3333'><strong>No such record</strong></font>";
}
?>