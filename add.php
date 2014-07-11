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

if (isset($_POST['submit'])) {
    // check form input for errors
    
    // check title
    if (trim($_POST['title']) == '') {

        die('ERROR: Please enter a title');
    }

    // check URL
    if ((trim($_POST['url']) == '') || !ereg("^http\://[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(:[a-zA-Z0-9]*)?/?([a-zA-Z0-9\._\?\,\'/\\\+&%\$#\=~\-])*$", $_POST['url'])) {

        die('ERROR: Please enter a valid URL');
    }

    // check story number
    if (!is_numeric($_POST['count'])) {

        die('ERROR: Please enter a valid story count');
    }

    // include configuration file
    $con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('datrss') or die("cannot select DB");

    
    // generate and execute query
    $query = "INSERT INTO rss (title, url, count) VALUES ('".$_POST['title']."', '".$_POST['url']."', '".$_POST['count']."')";

    $result = mysql_query($query) or die("ERROR: $query. ".mysql_error_string(mysql_last_error($handle)));

    // close connection
    

    // print success message
    echo "Item successfully added to the database! Click <a href = 'admin.php'>here</a> to return to the main page";

}
else {
    die('ERROR: Data not correctly submitted');
}

?>

</body>
</html>