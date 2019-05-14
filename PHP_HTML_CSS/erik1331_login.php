<meta charset="utf-8">
<?php
session_start();
mb_internal_encoding("utf-8");
require_once("erik1331_functions.php");
print '<form name="login" method="post" action="">';
print 'Email: <input name="email" type="text"><br>';
print 'Password: <input name="password" type="password"><br>';
print '<input name="oke" value="Login" type="submit">';
print '</form>';
if (isset($_POST["oke"]))
{
	$connect=dbconnect();
	$sql='SELECT * FROM hazi_admin WHERE email=\''.$_POST["email"].'\' AND password=\''.md5($_POST["password"]).'\'';
	$query=pg_query($connect, $sql);
	//print $sql;
	if (pg_num_rows($query)===1)
	{
		$admin = pg_fetch_all($query);
		$_SESSION["admin"] = $admin[0]["email"];
		header("Location: erik1331_admin.php");
	}
	else 
	{
		unset($_SESSION["admin"]);
		print "sikertelen belépés";
	}
}
?>