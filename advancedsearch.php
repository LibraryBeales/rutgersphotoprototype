<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" Content="A prototype web portal for the Rutgers University Library Historical Photo Archive">
<title>Rutgers University Prototype Photo Archive Advnaced Search</title>


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
<p><a href="/peoplelist.html">People and Groups</a></p>
<p><a href="/buildinglist.html">Buildings and Grounds</a></p>
<p><a href="/eventlist.html">Events</a></p>
<p><a href="/activitylist.html">Student Activites<a></p>
<p><a href="/sportslist.html">Sports</a></p>
<br>



<h2>About this Project</h2>
<p><a href="assessmenttools.html">Overview Tools</a></p>
<p>HOLDER</p>
<p>Contact</p>
</div>
    <meta http-equiv="Content-Style-Type" content="text/css" /> 
    <title>SearchByField_1.html</title>
    <link href="/library/skin/tool_base.css" type="text/css" rel="stylesheet" media="all" />
    <link href="/library/skin/default/tool.css" type="text/css" rel="stylesheet" media="all" />
    <script type="text/javascript" language="JavaScript" src="/library/js/headscripts.js"></script>
    <style>body { padding: 5px !important; }</style>
 
<div id="maincolumn" class="mainsearchform">
<div align="left" margin="15px">
Please Select a value from the drop down menus for the fields you wish to search.
<br>    
   <br>
   
    <form method="post" action="advancedsearch.php">
    <p>Select a date:</p> 
      <select name="createddateform">
      <?php  
        // This piece of code will take all the artists in the database and will create a scroll down menu form called "artisttId" 
        // listing all the students by their first name and last name
        // the form that is created will have as values in the <option> tag is the artistID e.g. 
        // <option value="1"> Joan Miro  </option>  
        //<option value="2"> Wassily Kandinsky  </option>

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
        $query = "SELECT PhotoCreatedDate FROM Photo";
        $result = mysql_query($query);      
        if (!$result) die ("Database access failed: " . mysql_error());      
        $rows = mysql_num_rows($result);
        for ($j = 0 ; $j < $rows ; ++$j){
          $row = mysql_fetch_row($result);
          // need to consult table to identify correct index for field
          echo '<option value="'.$row[0].'">'.$row[1].' '.$row[2].'</option>';
        }
      ?>
      </select>
      <input type="submit" value="Get Information" />
    </form>
       
     
</div>  
<!--
<figure>
<tr>
<td>
<iframe width="600" height="400" src="" frameborder="0" allowfullscreen></iframe>
</td>
</tr>
</figure>
-->

</div><!--End class maincolumn-->

<!--
<p class="blueText">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
-->

</div><!--End ID Container-->
<footer>All Material Copyright Something Something Something Education Blah</footer>

</div><!--End ID Main-->
</body>
</html>
