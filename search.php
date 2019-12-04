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
    echo 'Connected to database';
}

$nm = $_POST["search1"];
$result = mysql_query("SELECT * FROM TestTable WHERE PhotoTitle='$nm' LIMIT 1");

echo "<table border='1'>
<tr> 
<th>PhotoID</th>
<th>PhotoTitle</th>
<th>PhotographerName</th>
<th>DateCreated</th>
<th>Campus</th>
<th>PhysicalCollection</th>
<th>URL</th>
<th>Extension</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['PhotoId'] . "</td>";
  echo "<td>" . $row['PhotoTitle'] . "</td>";
  echo "<td>" . $row['PhotographerName'] . "</td>";
  echo "<td>" . $row['DateCreated'] . "</td>";
  echo "<td>" . $row['Campus'] . "</td>";
  echo "<td>" . $row['PhysicalCollection'] . "</td>";
  echo "<td>" . $row['URL'] . "</td>";
  echo "<td>" . $row['Extension'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

if (!mysql_query($row))
{
    die('Error: ' . mysql_error());
}


mysql_close($ds);

?>
<a href="http://www.rdavidbeales.com/dodge/dodgehomepage.html">Click here to go back to main page.</a>