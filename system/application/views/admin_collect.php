<div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
				
<form action="<?= $base ?>/index.php/collect/collectit" >
					<table width="100%">
  <tr>
    <td width="8%">Race ID</td>
    <td width="45%">Bi No.<input type="text" name="bi_number" /> / Bi Name <input type="text" name="bi_name" /></td>
    <td width="26%">Race Category</td>
    <td width="21%"><input type="text" name="race_cat" /></td>
  </tr>
  <tr>
    <td>IC No</td>
    <td><input type="text" name="ic_no" /></td>
    <td>Name</td>
    <td><input type="text" name="name" /></td>
  </tr>
</table>

 
<b>Size </b>
<table width="100%">
  <tr>
    <td>Event Tee</td>
    <td>Cap</td>
    <td>Shorts</td>
    <td>Skort</td>
  </tr>
  <tr>
    <td><input type="text" name="event_tee" /></td>
    <td><input type="text" name="cap" /></td>
    <td><input type="text" name="short" /></td>
    <td><input type="text" name="skort" /></td>
  </tr>
</table>

<p>Remark</p>
<textarea name="remark"></textarea><br/>
<input name="collect" type="radio" value="1" /> Self Collect <br/>
<input name="collect" type="radio" value="0"/> Collect on Behalf <br/>
<input type="submit" value="Collect" />
			
				</div>
			</div>
</div>
