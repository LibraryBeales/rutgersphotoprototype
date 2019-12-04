<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" Content="A prototype web portal for the Rutgers University Library Historical Photo Archive">
<title>Rutgers University Prototype Photo Archive</title>


<link href="css/cleanslate.css" rel="stylesheet" type="text/css" />
<!--COMPOUND TEST SHEET<link href="css/archiveprototype.css" rel="stylesheet" type="text/css" />-->
<link href="css/layout.css" rel="stylesheet"/>
<!--
<link href="css/type.css" rel="stylesheet"/>
<link href="css/main.css" rel="stylesheet"/>
<link href="css/intro.css" rel="stylesheet"/>
-->


<script>
function validateForm () 
{
	var valid = true;
	var msg="Incomplete form: \n";
	if (allsearch.search.value == ""){
		msg+="Please fill in a search term.\n";	
		valid = false;
}
	if (!valid) alert(msg);
	return valid;
}
</script>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>

<body>
<div id="main">
<div id="container">
<header><img src="images/banner.jpg" border="0" usemap="#Map" />
<map name="Map" id="Map">
  <area shape="rect" coords="996,17,1178,88" href="http://www.libraries.rutgers.edu/" />
  <area shape="rect" coords="21,23,566,56" href="http://www.rdavidbeales.com/archiveprototype/archiveprototypehome.html" />
  <area shape="poly" coords="790,10,789,7,789,42,806,46,828,60,834,64,928,62,927,15,926,10" href="http://www.libraries.rutgers.edu/" />
  <area shape="rect" coords="8, 14, 444, 46" href="http://www.rdavidbeales.com/archiveprototype/archiveprototypehome.html" />
</map></header>

<h1>Breadcrumbs will be here</h1>
<!--
<nav>
| <a href="archiveprototypehome.html">Home</a> | <a href="advancedsearch.html">Advanced Search</a> | <a href="assessmenttools.html">Assessment Tools<a> | <a href="http://www.libraries.rutgers.edu">Rutgers Libraries</a> | <a href="http://www.rutgers.edu">Rutgers University</a> | <a href="imagethumbnail.html">Image Thumbnail Example</a> |
</nav>
-->

<div class="sidecolumn" id="rightsidebar">
<h2>Browse</h2>
<p><a href="peoplelist.html">People and Groups</a></p>
<p><a href="buildinglist.html">Buildings and Grounds</a></p>
<p><a href="eventlist.html">Events</a></p>
<p><a href="activitylist.html">Student Activites<a></p>
<p><a href="sportslist.html">Sports</a></p>



<h2>About this Project</h2>
<p><a href="assessmenttools.html">Overview Tools</a></p>
<p>HOLDER</p>
<p>Contact</p>

</div>


<br>
<br>
<br>

<!--
<p class="blueText">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
-->

<div id="maincolumn" class="mainresultscolumn">
<?php
include 'credentials.php';

$ds = mysql_connect( "localhost", $myname, $mypassword);
$qs = mysql_select_db( $mydatabase);

if($qs == FALSE)
{
    echo 'Cannot connect to database' . mysql_error();
}
else
{
    echo 'Connected to database<br><br>';
}

$result = mysql_query("CALL CopyrightAggregate") or die("Query fail: " . mysql_error());

echo "<table BORDER=30 CELLPADDING=10 CELLSPACING=3 BORDERCOLOR=990000 align=left>
<tr> 
<th>Copy Right Status</th>
<th>Totals</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['CopyrightStatus'] . "</td>";
  echo "<td>" . $row['Copyright Status Totals'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($ds);


$ds = mysql_connect( "localhost", $myname, $mypassword);
$qs = mysql_select_db( $mydatabase);

$result2 = mysql_query("CALL CurrentWorkNotes") or die("Query fail: " . mysql_error());

echo "<table border='1' align='left'>
<tr> 
<th>Photo Title</th>
<th>Work Note</th>
<th>URL</th>
</tr>";

while($row = mysql_fetch_array($result2))
  {
  echo "<tr>";
  echo "<td>" . $row['PhotoTitle'] . "</td>";
  echo "<td>" . $row['WorkNotes'] . "</td>";
  echo "<td>" . $row['PhotoURL'] . "</td>";
  echo "</tr>";
  }
echo "</table><br>";

mysql_close($ds);


$ds = mysql_connect( "localhost", $myname, $mypassword);
$qs = mysql_select_db( $mydatabase);

$result3 = mysql_query("CALL FileTypeAggregate") or die("Query fail: " . mysql_error());

echo "<table border='1' align='left'>
<tr> 
<th>File Type</th>
<th>Total</th>
</tr>";

while($row = mysql_fetch_array($result3))
  {
  echo "<tr>";
  echo "<td>" . $row['FileTypeName'] . "</td>";
  echo "<td>" . $row['Total'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($ds);
?>

</div><!--End MainResultsColumn-->
</div><!--End ID Container-->
<footer>All Material Copyright Rutgers University Library ©2014</footer>

</div><!--End ID Main-->
</body>
</html>
