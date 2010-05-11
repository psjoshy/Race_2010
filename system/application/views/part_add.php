<script src="<?= $base ?>/js/metadata.js" type="text/javascript"></script>
<script src="<?= $base ?>/js/jquery.validate.js" type="text/javascript"></script>
  
  
 <script language = "Javascript">
/**
 * DHTML date validation script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)
 */
// Declaring valid date character, minimum year and maximum year
var dtCh= "-";
var minYear=1900;
var maxYear=2100;

function isInteger(s){
	var i;
    for (i = 0; i < s.length; i++){   
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}

function stripCharsInBag(s, bag){
	var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++){   
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}

function daysInFebruary (year){
	// February has 29 days in any year evenly divisible by four,
    // EXCEPT for centurial years which are not also divisible by 400.
    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
}
function DaysArray(n) {
	for (var i = 1; i <= n; i++) {
		this[i] = 31
		if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
		if (i==2) {this[i] = 29}
   } 
   return this
}

function isDate(dtStr){
/*
	var daysInMonth = DaysArray(12)
	var pos1=dtStr.indexOf(dtCh)
	var pos2=dtStr.indexOf(dtCh,pos1+1)
	var strMonth=dtStr.substring(0,pos1)
	var strDay=dtStr.substring(pos1+1,pos2)
	var strYear=dtStr.substring(pos2+1)
	strYr=strYear
	if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
	if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
	for (var i = 1; i <= 3; i++) {
		if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
	}
	month=parseInt(strMonth)
	day=parseInt(strDay)
	year=parseInt(strYr)
	if (pos1==-1 || pos2==-1){
		alert("The date format should be : mm/dd/yyyy")
		return false
	}
	if (strMonth.length<1 || month<1 || month>12){
		alert("Please enter a valid month")
		return false
	}
	if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
		alert("Please enter a valid day")
		return false
	}
	if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
		alert("Please enter a valid 4 digit year between "+minYear+" and "+maxYear)
		return false
	}
	if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
		alert("Please enter a valid date")
		return false
	}
*/
return true
}

function ValidateForm(){
	var dt=document.part_add.dob;
	
	if (isDate(dt.value)==false){
		dt.focus()
		return false
	}
    return true
 }

</script>

<div id="content-wrapper">
<div id="main">
<div class="main_content">
<div class="menu_action">
<ul class="menu">
<li><a href="<?= $base ?>/index.php/admin/manparticipant">Search</a></li>
		</ul>
	</div>
	<div id="profile">
<h2>Add Participant</h2>
<?php
if(isset($err))
{
echo "<font color='red'>$err</font>";
}
?>	
<div id="container" class="containter"></div>
<form action="<?= $base ?>/index.php/admin/participants_add/" id="part_add" name="part_add"   method="post">
<table>
<tr>
<td>Race ID</td>
<td><input type="text" name="race_id" value="" > </td>
</tr>
<tr>
<td>Category</td>
<td><input type="text" name="category" value="" ></td>
</tr>
<tr>
<td>Bib Name</td>
<td><input type="text" name="bib_name" value="" ></td>
</tr>
<tr>
<td>Gold Series Choice</td>
<td><input type="text" name="gold_series_choice" value="" ></td>
</tr>
<tr>
<td>Gold Series Size</td>
<td><input type="text" name="gold_series_size" value="" ></td>
</tr><tr>
<td>Emergency Contact Person</td>
<td><input type="text" name="emergency_contact_person" value=""></td>
</tr><tr>
<td>Emergency Contact No</td>
<td><input type="text" name="emergency_contact_no" value=""></td>
</tr>
<tr>
<td>Emergency Relationship</td>
<td><input type="text" name="relationship" value=""></td>
</tr>
<tr>
<td>Date Signed up (yyyy-mm-dd hh:mm:ss)</td>
<td><input type="text" name="date_signed_up" value=""></td>
</tr>
<tr>
<td>Date Time Paid (yyyy-mm-dd hh:mm:ss)</td>
<td><input type="text" name="date_time_paid" value=""></td>
</tr>

<tr>
<td>Promo Code</td>
<td><input type="text" name="promo_code" value="" ></td>
</tr>

<tr>
<td>Payment Mode</td>
<td><input type="text" name="payment_mode" value="" ></td>
</tr>
<tr>
<td>Admin Track</td>
<td><input type="text" name="admin_track" value=""></td>
</tr>

<tr>
<td>First Name</td>
<td><input type="text" name="fullname" value=""></td>
</tr>

<tr>
<td>Last Name</td>
<td><input type="text" name="lastname" value=""></td>
</tr>

<tr>
<td>Nric</td>
<td><input type="text" name="nric" value=""></td>
</tr>

<tr>
<td>Date Of Birth</td>
<td><input type="text" name="dob" value=""></td>
</tr>

<tr>
<td>Age</td>
<td><input type="text" name="age" value=""></td>
</tr>

<tr>
<td>Organization</td>
<td><input type="text" name="organization" value=""></td>
</tr>

<tr>
<td>Occupation</td>
<td><input type="text" name="occupation" value=""></td>
</tr>

<tr>
<td>Tshirt Size</td>
<td><input type="text" name="tshirt_size" value=""></td>
</tr>

<tr>
<td>Address</td>
<td><input type="text" name="address" value=""></td>
</tr>

<tr>
<td>Country</td>
<td><input type="text" name="country" value=""></td>
</tr>

<tr>
<td>Postal Code</td>
<td><input type="text" name="postal_code" value=""></td>
</tr>

<tr>
<td>Email</td>
<td><input type="text" name="email" value=""></td>
</tr>

<tr>
<td>Home No</td>
<td><input type="text" name="home_no" value=""></td>
</tr>

<tr>
<td>Mobile No</td>
<td><input type="text" name="mobile_no" value=""></td>
</tr>

<tr>
<td>Medical Allergies</td>
<td><input type="text" name="medical_allergies" value=""></td>
</tr>

<tr>
<td>Medical Conditions</td>
<td><input type="text" name="medical_conditions" value=""></td>
</tr>
<!-- 
<tr>
<td>Merchandise</td>
<td><input type="text" name="merchandise" value=""></td>
</tr>

<tr>
<td>Women10k Series Cap</td>
<td><input type="text" name="women10k_series_cap" value=""></td>
</tr>

<tr>
<td>Women10k Series Shorts</td>
<td><input type="text" name="women10k_series_shorts" value=""></td>
</tr>

<tr>
<td>Women10k Skorts</td>
<td><input type="text" name="women10k_skorts" value=""></td>
</tr>
 -->
<tr>
<td>Remark</td>
<td><input type="text" name="remark" value=""></td>
</tr>
</table>

<input type="submit" name="" class="formtaghelpersubmit" value="Save" />
		</form>
        
	</div>
</div>
</div>	
</div>
