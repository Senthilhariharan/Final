<! DOCTYPE html>
<html>
<style>
#jstwitter {
    position: relative;
}
#jstwitter .item {
width:350px;
height:400px;
    -webkit-border-radius:10px;
    -moz-border-radius:10px;
    border-radius:10px;
    -webkit-box-shadow:0 0 3px 1px rgba(100,100,100,0.2);
    -moz-box-shadow:0 0 3px 1px rgba(100,100,100,0.2);
    box-shadow:0 0 3px 1px rgba(100,100,100,0.2);
    overflow:hidden;
    background: #fff;
}

#jstwitter .item a {
    
    color: DarkBlue ;
}
body {
    background: #333;
    
}
</style>
<body>
<?php
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

    // iterate through resultset
    // fetch and parse feed

    while($row = mysql_fetch_object($result)) {

        $xml = simplexml_load_file($row->url);

        echo "<h4>$row->title</h4>";
        // print descriptions
        for ($x = 0; $x < $row->count; $x++) {

            // for RSS 0.91
            if (isset($xml->channel->item)) {
                $item = $xml->channel->item[$x];

            }
            // for RSS 1.0
            elseif (isset($xml->item)) {
                $item = $xml->item[$x];

            }
			?>
			<center>
			<div id="jstwitter">
			<div class="item">
			
			<?php
            echo "<a href=\"$item->link\">$item->title</a><br />$item->description<p />";
			?>
			
			</div>
			</div>
			</center>
			<?php
        }

        echo "<hr />";

        // reset variables
        unset($xml);
        unset($item);

    }
}
// if no records present
// display message
else {

?>

    <font size = '-1'>No feeds currently configured</font>

<?php

}



?>
</body>
</html>
