<script>
$(document).ready(function() {
//$base/index.php/admin/uncollect/ 

	$(".uncollect_lst").click(function()
	{
		<?php
			if(isset($m))
			{
		?>
				$("#message").load("<?= $base ?>/index.php/admin/muncollect/"+this.id);
		<?php
			}
			else
			{
		?>
				$("#message").load("<?= $base ?>/index.php/admin/uncollect/"+this.id);
		<?php
			}
		?>
		$("#part_"+this.id).fadeOut("normal");
		
		
	});
});

</script>
 <div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
	<h2>
	Collected List 
<?	if(!isset($m)){
	echo "(Race Pack)";
	}else{
	echo "(Merchandise)";
	}
	
	?>
	
	</h2>
	<div id="message"></div>
<ol style="padding-left:25px;">
	<?
	foreach($query as $row)
	{
		if(!isset($m))
		{
			echo "<li id='part_$row->S_N'>{$row->fullname}> <a href='$base/index.php/collect/showdetail/$row->S_N'>Show Detail</a>";
		}
		else
		{
			echo "<li id='part_$row->S_N'>{$row->fullname}> <a href='$base/index.php/collect/collect_merchandisepage_completed/$row->S_N'>Show Detail</a>";
			
		}
		if($this->session->userdata('type')=='admin')
		{
			echo " | <a href='#' id='$row->S_N' class='uncollect_lst'>Uncollect</a>";
		}
		if($this->session->userdata('name')==$row->created_by)
		{
			echo " | <a href='$base/index.php/collect/uncollect/$row->S_N'>Uncollect</a>";
			echo " | <a href='$base/index.php/collect/collectpage/$row->S_N'>Update</a>";
		}
		
		echo "</li>";
	}
	?>
</ol>
	</div>
</div>
</div>
