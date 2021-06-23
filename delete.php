<?php
include 'conn.php';
extract($_GET);
$query="DELETE FROM mumbai WHERE ID='$id'";
mysqli_query($conn,$query);
header('location:display.php');
?>