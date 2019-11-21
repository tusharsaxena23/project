<?php
$id = $_GET['id'];
//Connect DB
//Create query based on the ID passed from you table
//query : delete where Staff_id = $id
// on success delete : redirect the page to original page using header() method
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 
// sql to delete a record
$sql = "DELETE FROM items WHERE id = $id"; 
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Result Deleted Successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}

?>