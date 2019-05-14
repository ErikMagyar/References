<meta charset="utf-8">
<?php
require_once("erik1331_functions.php");
$connect = dbconnect();
if (isset($_GET["link"]) && isset($_GET["email"]))
{
	$sql='SELECT * FROM hazi_newsletter WHERE link=\''.$_GET["link"].'\'
		and email=\''.$_GET["email"].'\'';
	$query=pg_query($connect,$sql);
	if (pg_numrows($query)===1)
	{
		$sql='DELETE FROM hazi_newsletter WHERE email=\''.$_GET["email"].'\'';
		pg_query($connect,$sql);
		print "Sikeresen leiratkozott";
	}
	else print "A leiratkozás nem sikerült.";
}
else
{
	header('Location: index.php');
}
?>