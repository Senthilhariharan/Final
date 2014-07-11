<html>
<head><link rel="stylesheet" type="text/css" href="styles.css"></head>
<body>
    <div id="wrapper">
      <nav>
        <ul class="menu">
          <li class="home current"><a href="#"><span>Home</span></a></li>
          <li><a href="about.html"><span>About</span></a></li>
          <li><a href="admin.php"><span>Manage Feeds</span></a>
          
             
          </li>
          <li><a href="#"><span>Application Form</span></a></li>
          <li><a href="#"><span>Blog</span></a></li>
          <li><a href="#"><span>Contacts</span></a></li>
        </ul>
      </nav>
    </div>
<h2>Feed Manager</h2>

<?php

// PHP 5

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // include configuration file

    $con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('datrss') or die("cannot select DB");

    // generate and execute query
    $query = "DELETE FROM rss WHERE id = '".$_GET['id']."'";
    $result = mysql_query($query) or die("ERROR: $query. ".mysql_error_string(mysql_last_error($handle)));

    
    // close connection
   

    // print success message
    echo "Item successfully removed from the database! Click <a href = 'admin.php'>here</a> to return to the main page";

}
else {
    die('ERROR: Data not correctly submitted');
}

?>

</body>
</html>