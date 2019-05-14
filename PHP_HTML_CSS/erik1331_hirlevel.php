<meta charset="utf-8">
<?php
mb_internal_encoding("utf-8");
if (isset($_POST["hirlevelOke"]))
{
	session_start();
	require_once('erik1331_functions.php');
	$connect=dbconnect();
	
	$error_hirlevel["hiremail"]=false;
	$error_hirlevel["duality"]=false;
	$error_hirlevel["insert"]=false;
	
	if (filter_var($_POST["hiremail"], FILTER_VALIDATE_EMAIL)===false || mb_strlen($_POST["hiremail"])>35) { $error_hirlevel["hiremail"]=true; }
	
	$sql='SELECT * FROM hazi_newsletter WHERE email=\''.$_POST["hiremail"].'\'';
	$query = pg_query($connect, $sql);
	if (pg_num_rows($query)!==0)
	{
		$error_hirlevel["duality"]=true;
	}
	
	if (!in_array(true, $error_hirlevel))
	{
		$karakterek='qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789';
		$hossz=mb_strlen($karakterek);
		$for = rand(30,40);
		$link = '';
		for ($i=0;$i<$for;$i++)
		{
		        $link.=mb_substr($karakterek,rand(0,$hossz-1),1);
		}
		$sql='INSERT INTO pregtemp (email, aktival) VALUES 
		(\''.$_POST["email"].'\',\''.$aktival.'\')';
		
		$sql = 'INSERT INTO hazi_newsletter (email, link) VALUES (\''.$_POST["hiremail"].'\',\''.$link.'\')';
		
		$message = "Gratulálunk, sikeresen feliratkozott az Én Kicsi Éttermem hírlevelére.\r\n
		<a href=\"http://c-ta-php.ttk.pte.hu/~erik1331/hazi_feladat/erik1331_hir_leiratkozas.php?link=$link&email=".$_POST["hiremail"]."\">
		Leiratkozás</a>\r\n";			
		$headers=array(
			'Content-type: text/html; charset="utf-8";',
			'From: Én Kicsi Éttermem <eke@eke.hu>'
		);
		$header=implode("\r\n", $headers);
		mail ($_POST["hiremail"],"Hírlevél az Én Kicsi Éttermem-ből",
		nl2br($message), $header);
		
		if (!pg_query($connect, $sql))
		{
			$error_contact["insert"]=true;
		}
	}
	$_SESSION["error_hirlevel"]=$error_hirlevel;
	
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
	
	$sql='UPDATE hazi_latogato SET email=\''.$_POST["hiremail"].'\' WHERE id=\''. $result[0]["id"] .'\'';
	$query=pg_query($connect,$sql);
	
	header("Location: erik1331_index.php");
	break;
}
if (isset($_POST["hirlevelleOke"]))
{
	session_start();
	require_once('erik1331_functions.php');
	$connect=dbconnect();
	
	$error_hirlevel_le["hiremail"]=false;
	$error_hirlevel_le["duality"]=false;
	$error_hirlevel_le["insert"]=false;
	
	if (filter_var($_POST["hiremail"], FILTER_VALIDATE_EMAIL)===false || mb_strlen($_POST["hiremail"])>35) { $error_hirlevel_le["hiremail"]=true; }
	
	$sql='SELECT * FROM hazi_newsletter WHERE email=\''.$_POST["hiremail"].'\'';
	$query = pg_query($connect, $sql);
	if (pg_num_rows($query)===0)
	{
		$error_hirlevel_le["duality"]=true;
	}
	
	if (!in_array(true, $error_hirlevel_le))
	{
		$result = pg_fetch_all($query);
		$link = $result[0]["link"];
		$message = "Ha le szeretne iratkozni az Én Kicsi Éttermem hírleveléről, kattintson a linkre.\r\n
		<a href=\"http://c-ta-php.ttk.pte.hu/~erik1331/hazi_feladat/erik1331_hir_leiratkozas.php?link=$link&email=".$_POST["hiremail"]."\">
		Leiratkozás</a>\r\n";			
		$headers=array(
			'Content-type: text/html; charset="utf-8";',
			'From: Én Kicsi Éttermem <eke@eke.hu>'
		);
		$header=implode("\r\n", $headers);
		mail ($_POST["hiremail"],"Hírlevél az Én Kicsi Éttermem-ből",
		nl2br($message), $header);
		
		if (!pg_query($connect, $sql))
		{
			$error_contact["insert"]=true;
		}
	}
	$_SESSION["error_hirlevel_le"]=$error_hirlevel_le;
	
	header("Location: erik1331_index.php");
	break;
}
header("Location: erik1331_index.php");
?>