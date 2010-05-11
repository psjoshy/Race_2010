<div id="content-wrapper">
    		<div id="main">
            <div class="main_content">
				<h2>Merchandise Collection Completed </h2>
				<br />
				<div align="center" ><font color="#CC0000" ><? $msg ?> </font> </div>
				<?= (isset($res)) ? $res : "" ?>
				
<form action="<?= $base ?>/index.php/collect/collect_merchandisepage/<?= $id ?>" method="post" >
					<table width="100%"  cellpadding="3"  cellspacing="0" border="0">
					  <!--DWLayoutTable-->
					  
<? foreach($query as $row) 
{
?>
 
  <tr>
    <td width="194" align="left" valign="middle">Name</td>
    <td width="383" align="left" valign="middle"><input  type="text" value="<?= $row->fullname ?>  <?= $row->lastname ?> " size="25" readonly="readonly" /></td>
    <td width="240" align="left" valign="middle"  >Email</td>
    <td width="459" align="left" valign="middle"><input type="text" value="<?= $row->email ?>" size="25" readonly="readonly" /></td>
  </tr>
  <tr>
    <td height="41" colspan="2" align="left" valign="middle"><p>Supporting Parent Tee&#13;</p></td>
    <td colspan="2" align="left" valign="middle"><p>Looney Tunes Kids Festive T&#13;</p>  </td>
    </tr>
    <tr>
    <td height="38" colspan="2" valign="top"> <table width="90%" border="1" cellpadding="3" cellspacing="1"  bgcolor="#DEFEE7">
      
      <tr>
        <td width="107" height="29" align="center" valign="middle">XS</td>
          <td width="109" align="center" valign="middle">S</td>
          <td width="128" align="center" valign="middle">M</td>
          <td width="107" align="center" valign="middle">L</td>
          <td width="136" align="center" valign="middle">XL</td>
        </tr>
      <tr>
        <td width="107" height="19" align="center" valign="middle"><?= $row->size_XS  ?></td>
          <td width="109" align="center" valign="middle"><?= $row->size_S  ?></td>
          <td width="128" align="center" valign="middle"><?= $row->size_M  ?></td>
          <td width="107" align="center" valign="middle"><?= $row->size_L  ?></td>
          <td width="136" align="center" valign="middle"><?= $row->size_XL  ?></td>
        </tr>
    </table></td>
	<?
}	
					  
 foreach($query2 as $row2) 
{
?>
    <td colspan="2" valign="top" ><table width="95%" border="1" cellpadding="3" cellspacing="1"  bgcolor="#DEFEE7">
       
      <tr>
        <td width="112" height="30" align="center" valign="middle">XS</td>
          <td width="106" align="center" valign="middle">S</td>
          <td width="120" align="center" valign="middle">M</td>
          <td width="121" align="center" valign="middle">L</td>
          <td width="133" align="center" valign="middle">XL</td>
        <td width="121" align="center" valign="middle">XXL</td>
        </tr>
      <tr>
        <td width="112" height="19" align="center" valign="middle"><?= $row2->size_XS  ?></td>
          <td width="106" align="center" valign="middle"><?= $row2->size_S  ?></td>
          <td width="120" align="center" valign="middle"><?= $row2->size_M  ?></td>
          <td width="121" align="center" valign="middle"><?= $row2->size_L  ?></td>
          <td align="center" valign="middle"><?= $row2->size_XL  ?></td>
        <td align="center" valign="middle"><?= $row2->size_XXL  ?></td>
        </tr>
    </table></td>
    </tr>
	<?
	} 
	 foreach($query3 as $row3 ) 
	{
	?>
    <tr>
      <td height="30" colspan="2" align="left" valign="middle"><p>Carnival Ticket</p></td>
      <td colspan="2" align="left" valign="middle"><p>Looney Tunes Stationery Set</p></td>
      </tr>
    <tr>
      <td height="25" colspan="2" align="left" valign="middle"><input type="text" size="10"   readonly="readonly" value="<?= $row3->item_1 ?>" /></td>
      <td colspan="2" align="left" valign="middle"><input type="text" size="10"   readonly="readonly" value="<?= $row3->item_2 ?>" /></td>
      </tr>
 
	    <tr>
      <td height="30" colspan="2" align="left" valign="middle"><p>Tweety Shoulder Bag</p></td>
      <td colspan="2" align="left" valign="middle"><p>Bugs Bunny Shopping Bag</p></td>
      </tr>
    <tr>
      <td height="25" colspan="2" align="left" valign="middle"><input type="text" size="10"    readonly="readonly" value="<?= $row3->item_3 ?>" /></td>
      <td colspan="2" align="left" valign="middle"><input type="text" size="10"   readonly="readonly" value="<?= $row3->item_4 ?>" /></td>
      </tr>
    <tr>
	
	    <tr>
      <td height="30" colspan="2" align="left" valign="middle"><p>Looney Tunes Frosted Glass Mug</p></td>
      <td colspan="2" align="left" valign="middle"><p>Looney Tunes Clear Glass Mug</p></td>
      </tr>
    <tr>
      <td height="25" colspan="2" align="left" valign="middle"><input type="text" size="10"    readonly="readonly" value="<?= $row3->item_5 ?>" /></td>
      <td colspan="2" align="left" valign="middle"><input type="text" size="10"    readonly="readonly" value="<?= $row3->item_6 ?>" /></td>
      </tr>
	  
	  	    <tr>
      <td height="30" colspan="2" align="left" valign="middle"><p>Tweety Mug in Savings Tin</p></td>
      <td colspan="2" align="left" valign="middle"><p>Counter :  <?= $row3->merchandise_counter ?>  </p></td>
      </tr>
    <tr>
      <td height="25" colspan="2" align="left" valign="middle"><input type="text" size="10"   readonly="readonly" value="<?= $row3->item_7 ?>" /></td>
      <td colspan="2" align="left" valign="middle">Staff Name :   <?= $row3->merchandise_created_by ?> </td>
    </tr>
    <tr>
      <td height="15"></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  
</table>
 

<p>Remark</p>
<textarea cols="60" rows="8" name="merchandise_remarks"  readonly="readonly"><?= $row3->merchandise_remarks ?></textarea><br/>
<br/>
<input type="button" value="Back"  onClick="history.go(-1)" />



<?
}
?>
				</div>
			</div>            
</div>

