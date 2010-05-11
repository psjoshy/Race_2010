<script>
	$(document).ready(function() 
	{
		$(".del").click(function()
		{
			res=confirm("Do you want to Delete ?");
			if(res)
			{
				$("#message").html("<img src='<?= $base ?>/images/ajax-loader.gif' />");
				$("#message").load("<?= $base ?>/index.php/admin/del/"+this.id);
				$("#userlst_"+this.id).fadeOut("slow");
			}
		});
	});
   
</script>
<div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
	<span><h2>Manage Administrators</h2></span>
	<div class="menu_action">
		<ul class="menu">
			<li><a href="<?= $base ?>/index.php/admin/add_admin">Add</a></li>
		</ul>
	</div>
	<div id="message"></div>
	<div id="profiles">
		<?php 
		foreach($query as $row)
		{
		?>
			<div id="userlst_<?= $row->id ?>">
		<?
			echo $row->name;
		?>
			<a href="<?= $base ?>/index.php/admin/editname/<?= $row->id ?>">Edit Name</a>	
			<a href="<?= $base ?>/index.php/admin/editpwd/<?= $row->id ?>">Edit Password</a>
		<? 	if($this->session->userdata("id")!= $row->id)
			{
		?>
				<a href="#" id="<?= $row->id ?>" class="del">Delete</a>
		<?
			}
		?>
			</div>
			
		
		<?
		}
		?>
		
	</div>
</div>    		
</div>
</div>