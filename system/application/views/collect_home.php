<div id="content-wrapper">
    		<div id="main">
            <div class="main_content">
				<h2>Race Pack Collection</h2>
				<?= (isset($res)) ? $res : "" ?>
				
<form action="<?= $base ?>/index.php/collect/collectit/<?= $id ?>" method="post" >
					<table width="100%"  cellpadding="5"  cellspacing="0" border="0">
<? foreach($query as $row) 
{
?>
  <tr>
    <td width="20%" height="39" >Race ID</td>
    <td width="38%" ><input type="text" readonly="readonly" value=<?= $row->race_id ?> size="3" />
    /     <input type="text" value="<?= $row->bib_name ?>" readonly="readonly" size="10" /></td>
    <td width="13%">Race Category</td>
    <td width="29%" ><input type="text" size="40" value="<?= $row->category ?>"  readonly="readonly"/></td>
  </tr>
  <tr>
    <td height="35">IC No</td>
    <td><input  type="text" size="15" value=<?= $row->nric ?>  readonly="readonly" /></td>
    <td>First Name</td>
    <td><input type="text" size="25" value="<?= $row->fullname ?>" readonly="readonly" /></td>
  </tr>
  <tr>
    <td height="33">&nbsp;</td>
    <td>&nbsp;</td>
    <td>Last  Name</td>
    <td><input type="text" size="25" value="<?= $row->lastname ?>" readonly="readonly" /></td>
  </tr>
    <tr>
    <td colspan="2" align="left" valign="middle">Size  </td>
    <td>&nbsp; </td>
    <td>&nbsp; </td>
  </tr>
   <tr>
    <td>Event Tee</td>
    <td><input type="text" size="10"  name="tshirt_size" readonly="readonly" value="<?= strtoupper($row->tshirt_size) ?>" /></td>
    <td>&nbsp;<input type="hidden"  name="women10k_series_cap"   value="<?= ($row->women10k_series_cap) ? "Yes" : "No" ?>" /> </td>
    <td>&nbsp;<input type="hidden"  name="women10k_series_shorts"  value="<?= $row->women10k_series_shorts ?>" /> <input type="hidden"  name="women10k_skorts"  value="<?= $row->women10k_skorts ?>" /> </td>
  </tr>
</table>
 

<p>Remark</p>
<textarea cols="60" rows="8" name="remark" ><?= $row->remark ?></textarea><br/>

<table width="100%">
<tr>
<td>
<input name="self_collect" type="radio" value="0" <?= (($row->self_collect=="0") or ($row->self_collect==""))  ? "checked" : "" ?> /> <label>Self Collect</label>
</td>
<td align="right">
<input name="self_collect" type="radio" <?= ($row->self_collect=="1") ? "checked" : "" ?> value="1"/> Collect on Behalf 
</td>
</tr>
<tr>
  <td><input type="button" onclick="javascript:window.location='<?= $base ?>/index.php/collect/search'" value="Exit" /></td>
  <td align="right"><input type="hidden" name="collect_it" value="1" />
<input type="hidden" name="created_date" value="<?= date("m-d-y h:m") ?>">
<input type="hidden" name="created_by" value="<?= $this->session->userdata("name") ?>">
<input type="hidden" name="counter" value="<?= $this->session->userdata("counter") ?>">
<input type="submit" value="Collect" /></td>
</tr>
</table>

<?
}
?>
				</div>
			</div>            
</div>

