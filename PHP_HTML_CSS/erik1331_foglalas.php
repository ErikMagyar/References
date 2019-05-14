<meta charset="utf-8">
<?php
mb_internal_encoding("utf-8");
if (isset($_POST["foglalOke"]))
{
	session_start();
	require_once('erik1331_functions.php');
	$connect=dbconnect();
	$error_contact["name"]=false;
	$error_contact["email"]=false;
	$error_contact["people"]=false;
	
	$error_contact["rdate"]=false;
	$error_contact["rtime"]=false;
	
	$error_contact["insert"]=false;
	
	if ($_POST["rdate"]=="") { $error_contact["rdate"]=true; }
	if ($_POST["rtime"]=="") { $error_contact["rtime"]=true; }
	
	if ($_POST["name"]==="" || mb_strlen($_POST["name"])>35) { $error_contact["name"]=true; }
	
	if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)===false || mb_strlen($_POST["email"])>35) { $error_contact["email"]=true; }
	
	if ( !is_numeric($_POST["people"]) || $_POST["people"]<1 ) { $error_contact["people"]=true; }
	
	if (!in_array(true, $error_contact))
	{
		$rdateplusrtime = $_POST["rdate"]." ".$_POST["rtime"];
		$state = "új foglalás";
		$sql='INSERT INTO hazi_reservation (name, email, people, regtime, state) VALUES (\''.$_POST["name"].'\', \''.$_POST["email"].'\', \''.$_POST["people"].'\', \''.$rdateplusrtime.'\', \''.$state.'\')';
		if (!pg_query($connect, $sql))
		{
			$error_contact["insert"]=true;
		}
	}
	$_SESSION["error_contact"]=$error_contact;
	
	//COOKIE
	$cookie_name = "latogato";
	$cookie_value = $_COOKIE["latogato"];
	
	$sql='SELECT * FROM hazi_latogato WHERE id='. $cookie_value;
	$query=pg_query($connect,$sql);
	$result = pg_fetch_all($query);
	
	$_SESSION["latogato_id"] = "latogato_".$cookie_value;
	$_SESSION["latogato_utolso"] = $result[0]["utolsolatogatas"];
	$_SESSION["latogato_latogatasszam"] = $result[0]["latogatasszam"];
	$_SESSION["latogato_email"] = $result[0]["email"];
	
	$sql='UPDATE hazi_latogato SET email=\''.$_POST["email"].'\' WHERE id=\''. $result[0]["id"] .'\'';
	$query=pg_query($connect,$sql);
	
	header("Location: erik1331_index.php");
	break;
}
header("Location: erik1331_index.php");
?>