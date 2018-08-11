<?php
session_start();
if( $_POST["train"]!='')
{
	//$selecttrain = $_POST["select-tarin"];
	$trainno = $_POST["train"];

	$conn = new mysqli("localhost","root","","rss");
	//echo "connection established<br>";
	$sql = "DELETE FROM train_details WHERE TRAINNO=$trainno";

	$res = $conn->query($sql);
	//var_dump($res);


	$_SESSION['alert']="Train Deleted";
        header("location:addtrainview.php");
}else
    {
    	$_SESSION['alert']="Not Deleted";
        header("location:addtrainview.php");
    }
?>