<html lang="en">
<head>
<meta charset="utf-8" />
<title>Archives Photo Library Advanced Search</title>

<link href="archiveprototype.css" rel="stylesheet"/>

</head>
<body>
<header>Rutgers University Archive </header>
<nav>
| <a href="archiveprototypehome.html">Home</a> | <a href="advancedsearch.html">Advanced Search</a> | <a href="assessmenttools.html">Assessment Tools<a> | <a href="http://www.libraries.rutgers.edu">Rutgers Libraries</a> | <a href="http://www.rutgers.edu">Rutgers University</a> | <a href="imagethumbnail.html">Image Thumbnail Example</a>
</nav>


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

echo "<table border='1' align='left'>
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


?>
</body>
</html>