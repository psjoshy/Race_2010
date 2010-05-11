<div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
	<div class="menu_action">
		<ul class="menu">
			<li><a href="<?= $base ?>/index.php/admin/manage">List</a></li>
		</ul>
	</div>
	<div id="profile">
		<h2>Edit Administrator</h2>
								<form action="<?= $base ?>/index.php/admin/editit/" method="post">		<table>
			<tr>
				<td><label for="username">Username</label></td>

				<td><span id="element_username"><?= $username ?></span></td>
			</tr>
			<tr>
				<td><label for="password">Name</label></td>
				<td><span id="element_name"><input type="text" id="name" name="name" /><input type="hidden" id="id" name="id" value="10" /></span></td>
			</tr>
		</table>
		<input type="hidden" name="id" value="<?= $userid ?>">
		<input type="submit" name="submit" class="formtaghelpersubmit" value="Save" />		</form>	</div>

</div>    		</div>	
</div>
    	