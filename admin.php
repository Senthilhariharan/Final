<html>
<style>
body{
background-color:#333;
color: white;
}
</style>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div id="wrapper">
      <nav>
        <ul class="menu">
          <li class="home current"><a href="#" > <span>Home</span></a></li>
          <li><a href="about.html"><span>About</span></a></li>
          <li><a href="admin.php"><span>Manage Feeds</span></a>
          
             
          </li>
          <li><a href="#"><span>Application Form</span></a></li>
          <li><a href="#"><span>Blog</span></a></li>
          <li><a href="#"><span>Contacts</span></a></li>
        </ul>
      </nav>
    </div>
	<div>
<h2>Feed Manager</h2>

<h4>Current Feeds:</h4>
<table border = '0' cellspacing = '10'>

<?php
error_reporting(0);
// PHP 5

// include configuration file
$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('datrss') or die("cannot select DB");

// open database file


// generate and execute query
$query = "SELECT id, title, url, count FROM rss";

$result = mysql_query($query) or die("$query. ".mysql_error_string(mysql_last_error($handle)));

// if records present
if (mysql_num_rows($result) > 0) {

   

    while ($row = mysql_fetch_object($result)) {
    ?>

        <tr>
        <td><?php echo $row->title; ?> (<?php echo $row->count; ?>)</td>

        <td><font size = '-2'><a href="delete.php?id=<?php echo $row->id; ?>">delete</a></font></td>
        </tr><br/>

    <?php
    }
}

// if there are no records present, display message
else {
?>

    <font size = '-1'>No feeds currently configured</font>

<?php
}

// close connection


?>

</table>

<h4>Add New Feed:</h4>
<form action = 'add.php' method = 'post'>
<table border = '0' cellspacing = '5'>
<tr>
    <td>Title</td>

    <td><input type = 'text' name = 'title'></td>
</tr>
<tr>
    <td>Feed URL</td>
    <td><input type = 'text' name = 'url'></td>
</tr>
<tr>
<td>Genre</td>
<td>
<select>
  <option value="" ></option>
  <option value="International" name="I">International</option>
  <option value="National" name="N">National</option>
  <option value="Tech" name="Tech">Tech</option>
  <option value="Sports" name="sports">Sports</option>
</select>
</td>
</tr>
<tr>
    <td>Stories to display</td>
    <td><input type = 'text' name = 'count' size = '2'></td>
</tr>
<tr>
    <td colspan = '2' align = 'right'><input type = 'submit' name = 'submit' value = 'Add RSS Feed'></td>

</tr>
</table>
</form>

 

  </body>

</html>