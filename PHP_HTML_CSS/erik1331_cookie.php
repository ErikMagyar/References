<meta charset="utf-8">
<?php
function vanCookie()
{
	require_once("erik1331_functions.php");
	mb_internal_encoding("utf-8");
	$connect = dbconnect();
	//session_start();
	$cookie_name = "latogato";
	$cookie_value = $_COOKIE["latogato"];
	
	//setcookie($cookie_name, $cookie_value, time()-20, "/");
	//return 0;
	
	$sql='SELECT * FROM hazi_latogato WHERE id='. $cookie_value;
	$query=pg_query($connect,$sql);
	$result = pg_fetch_all($query);
	//var_dump($result);
	
	$_SESSION["latogato_id"] = "latogato_".$cookie_value;
	//$_SESSION["latogato_elso"] = $result[0]["elsolatogatas"];
	$_SESSION["latogato_utolso"] = $result[0]["utolsolatogatas"];
	$_SESSION["latogato_latogatasszam"] = $result[0]["latogatasszam"];
	$_SESSION["latogato_email"] = $result[0]["email"];
	
	$dat=getDate();
	$datt = $dat["year"]."-".$dat["mon"]."-".$dat["mday"];
	$timm = ($dat["hours"]+1).":".$dat["minutes"].":".$dat["seconds"];
	$rdateplusrtime = $datt." ".$timm;
	$lato = $result[0]["latogatasszam"]+1;
	
	$sql='UPDATE hazi_latogato SET latogatasszam='. $lato .', utolsolatogatas=\''. $rdateplusrtime .'\' WHERE id=\''. $result[0]["id"] .'\'';
	$query=pg_query($connect,$sql);
}

function nincsCookie()
{
	require_once("erik1331_functions.php");
	mb_internal_encoding("utf-8");
	$connect = dbconnect();
	
	$cookie_name = "latogato";
	
	$dat=getDate();
	$datt = $dat["year"]."-".$dat["mon"]."-".$dat["mday"];
	$timm = ($dat["hours"]+1).":".$dat["minutes"].":".$dat["seconds"];
	$rdateplusrtime = $datt." ".$timm;
	
	$sql='SELECT id FROM hazi_latogato WHERE id=(SELECT max(id) as maxid FROM hazi_latogato)';
	$query=pg_query($connect,$sql);
	$result = pg_fetch_all($query);

	if ($result==false)	
	{
		$latogatocount = 1;
	}
	else
	{
		$latogatocount = $result[0]["id"]+1;
	}
	
	$cookie_value = $latogatocount;
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30 * 365), "/"); // 86400 = 1 day
	
	$sql='INSERT INTO hazi_latogato (elsolatogatas, utolsolatogatas, latogatasszam) VALUES ( \''. $rdateplusrtime . '\', \''. $rdateplusrtime .'\', 1 )';
	$query=pg_query($connect,$sql);
	
	//print $latogatocount;
}
function osszesLatogatas()
{
	require_once("erik1331_functions.php");
	mb_internal_encoding("utf-8");
	$connect = dbconnect();
	
	$dat=getDate();
	$datt = $dat["year"]."-".$dat["mon"]."-".$dat["mday"];
	$timm = ($dat["hours"]+1).":".$dat["minutes"].":".$dat["seconds"];
	$rdateplusrtime = $datt." ".$timm;
	
	$sql = 'INSERT INTO hazi_ossz_latogatas (latogato_id, timestamp) VALUES ( '. $_COOKIE["latogato"] .', \''. $rdateplusrtime .'\' )';
	$query=pg_query($connect,$sql);
}
?>