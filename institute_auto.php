<?php
 require_once("config.php");
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die ("connection failed");
    $searchTerm = $_GET['term'];
    
    $query = mysqli_query($mysqli, "SELECT * FROM institutes WHERE institute_name LIKE '%".$searchTerm."%' ORDER BY institute_name ASC");
    while ($row = mysqli_fetch_array($query)) {
        $data[] = $row['institute_name'];
    }
      echo json_encode( $data );
?>