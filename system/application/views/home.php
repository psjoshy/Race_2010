<? if($this->session->userdata("type")=="admin")
	{
		header("Location:".$base."/index.php/admin/");
		exit();
	}
	elseif($this->session->userdata("type")=="collector")
	{
		header("Location:".$base."/index.php/collect/search");
		exit();
	}
?>
 <div id="content-wrapper">
    		<div id="main">
			<?php if(isset($err)) 
				{
				?>
					<div class="notices" style="width: 90%; text-align: center;"><?= $err ?></div>
				<?php
				}
				?>
				<div class="main_content">
	<div class="admin_login">
		<p><strong>Administrator</strong></p>
		<form name="admin_login" action="<?= $base ?>/index.php/usr/login" method="post">
			<table >
				<tr>
					<td>Login</td><td><input type="text" name="username" id="username" /></td>
				</tr>
				<tr>
					<td>Password</td><td><input type="password" name="password" id="password" /></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" id="submit" value="Login" /></td>

				</tr>
			</table>
		</form>
	</div>
	<div class="asst_login">
		<p><strong>RPC Assistant</strong></p>
		<form name="asst_login" action="<?= $base ?>/index.php/usr/ass_login" method="post">
			<table>

				<tr>
			 
					<td>Counter</td><td><select name="counter"  style="overflow-x:scroll; overflow: -moz-scrollbars-horizontal; width:100px;margin:5px 0 5px 0;">
					<?php
					for($i=1;$i<=20;$i++)
					{
						echo "<option>$i</option>";
					}
					?><br/>
					</td>

				</tr>
				<tr>
					<td>Name</td><td><input type="text" name="name" id="password" /></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="" id="submit" value="Login" /></td>
				</tr>
			</table>

		</form>
	</div>
</div>
    		</div>	
    	</div>
    	