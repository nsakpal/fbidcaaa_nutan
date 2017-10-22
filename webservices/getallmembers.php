<?php
//This file gets memmbers from the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "calendar";
$mysqli = new mysqli($servername, $username, $password, $dbname);
$rows = [];
$query = "SELECT  m_email FROM members ";

//$sql = "SELECT m_first_name as name, m_email as id FROM members WHERE name LIKE '%%%s%%' ORDER BY popularity DESC LIMIT 10";

$result = $mysqli->query($query);

echo "[";
while ($row = $result->fetch_assoc()) {
    $rows[] = $row['m_email'];
    foreach($rows as $item){
        echo "'".$item."',";
    }
   
    
}

 echo "'nope']";
?>