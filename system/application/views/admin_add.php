<script>
$(document).ready(function() 
    { 
        $("#username").keyup(function()
		{
				$("#chkusr").load("<?= $base ?>/index.php/admin/chkusr/"+$(this).val());
		});
		
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
		
		$("#name").keyup(function()
		{
			if($(this).val() != "")
			{
				$("#namereq").html('<font color="green">&nbsp;OK</font>');
			}
			else
			{
				$("#namereq").html("<font color='red'>Required</font>");
			}			
		});
		
		$("#submit").click(function(){
				
				if($("#chkusr").html() == '<font color="green">&nbsp;OK</font>' )
				{
					if($("#confirm").html() == '<font color="green">&nbsp;OK</font>' )
					{
							if($("#namereq").html() == '<font color="green">&nbsp;OK</font>' )
							{
								$("#message").html("<img src='<?= $base ?>/images/ajax-loader.gif' />");
								$("#message").load("<?= $base ?>/index.php/admin/addnew",{username:$("#username").val(),password:$("#password").val(),name:$("#name").val(),created_date:$("#created_date").val(),created_by:$("#created_by").val(),modified_date:$("#modified_date").val(),modified_by:$("#modified_by").val()});
								
								$("#username").val("");
								$("#password").val("");
								$("#password_confirmation").val("");
								$("#name").val("");
								
								//AJAX Message
								$("#chkusr").html("*");
								$("#pwdchk").html("* Enter At least 6 character");
								$("#confirm").html("*");
								$("#namereq").html("*");
								
							}
					}
				}
				
				
		});
    } 
);
</script>
<div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
	<div class="menu_action">
		<ul class="menu">
			<li><a href="<?= $base ?>/index.php/admin/">List</a></li>
		</ul>

	</div>
	<div id="profile">
	<div id="message"></div>
		<h2>Add Administrator</h2>
								<form action="<?= $base ?>/index.php/admin/addit"  method="post">				
<table id="tbl_admins">
<tr>
<td><label for="username">Username</label></td><td><span id="element_username"><input type="text" id="username" name="username" value="" /></span><span id="chkusr">*</span></td>
</tr>
<tr>
<td><label for="password">Password</label></td><td><span id="element_password"><input type="password" id="password" name="password" /></span><span id="pwdchk">* Enter At least 6 character</span> </td>

</tr><tr>
<td><label for="password_confirmation">Confirm Password</label></td><td><span for="element_password_confirmation"><input type="password" id="password_confirmation" /></span><span id="confirm">*</span></td>
</tr>
<tr>
<td><label for="name">Name</label></td><td><span id="element_name"><input type="text" id="name" name="name" value="" /></span><span id="namereq">*</span></td>
</tr>
</table>
<input type="hidden" id="created_date" name="created_date" value="<?= date("Y-m-d h:i:s") ?>" />
<input type="hidden" id="created_by" name="created_by" value="<?= $this->session->userdata('id') ?>" />
<input type="hidden" id="modified_date" name="modified_date" value="<?= date("Y-m-d h:i:s") ?>" />
<input type="hidden" id="modified_by" name="modified_by" value="<?= $this->session->userdata('id') ?>"/>

		<input type="button" name="submit" class="formtaghelpersubmit" id="submit" value="Save" />		</form>	</div>
</div>    		</div>	
    	</div>
