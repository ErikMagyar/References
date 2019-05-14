<?php
session_start();
if(isset($_SESSION["admin"]))
{
	require_once("erik1331_functions.php");
	$connect = dbconnect();
	if (isset($_GET["key"]) && isset($_GET["field"]) && isset($_GET["table"]))
	{
		//if($_GET["email"]!==$_SESSION["admin"])
		//{
			$sql='DELETE FROM '.$_GET["table"].' WHERE '.$_GET["field"].'=\''.$_GET["key"].'\'';
			pg_query($connect,$sql);
		//}
	}
	header("Location: erik1331_admin.php");
}
else
{
	header("Location: erik1331_login.php");
}
?>