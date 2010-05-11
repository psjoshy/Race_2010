<script>
$(document).ready(function() 
    { 
		$("#password").keyup(function()
		{
			pwd=$(this).val();
			if(pwd.length>5)
			{
				$("#pwdchk").html('<font color="green">&nbsp;OK</font>');
			}
			else
			{
				$("#pwdchk").html("<font color='red'>Require At Least 6 Character</font>");
			}
		});
		
		$("#password_confirmation").keyup(function()
		{
			if($(this).val() != $("#password").val())
			{
				$("#confirm").html("<font color='red'>Same with Password</font>");
			}
			else
			{
				$("#confirm").html('<font color="green">&nbsp;OK</font>');
			}			
		});
		
		$("#btnsubmit").click(function()
		{
			if($("#confirm").html() == '<font color="green">&nbsp;OK</font>' )
			{
				$("#message").html("<img src='<?= $base ?>/images/ajax-loader.gif' />");
				$("#message").load("<?= $base ?>/index.php/admin/editpwd_it/<?= $usrid ?>",{pwd: $("#password").val()});
			}
		});
	});
</script>
<div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
	<div class="menu_action">
		<ul class="menu">
			<li><a href="<?= $base ?>/index.php/admin">List</a></li>
		</ul>

	</div>
	<div id="message"></div>
	<div id="profile">
		<h2>Edit Password</h2>
								<form action=""  method="post">		<table>
			<tr>
				<td><label for="username">Username</label></td>
				<td><span id="element_username"><?= $username ?></span></td>

			</tr>
			<tr>
				<td><label for="password">Password</label></td>
				<td><span id="element_password"><input type="password" id="password" name="password" /></span><span id="pwdchk">* Enter At least 6 character</span></td>
			</tr>
			<tr>
				<td><label for="password_confirmation">Password Confirmation</label></td>
				<td><span id="element_password_confirmation"><input type="password" id="password_confirmation" name="password_confirmation" /></span><span id="confirm">*</span></td>

			</tr>
		</table>
		<input type="button" name="" id="btnsubmit" class="formtaghelpersubmit" value="Save" />		</form>	
		</div>
</div>    	
	</div>	
    	</div>
