<?php
session_start();
if(isset($_SESSION["admin"]))
{
	require_once("erik1331_functions.php");
	$connect = dbconnect();
	if (isset($_GET["dontes"]) && isset($_GET["id"]))
	{
		if ($_GET["dontes"]=="elf")
		{
			$sql='UPDATE hazi_reservation SET state=\'elfogadva\' WHERE id=\''.$_GET["id"].'\'';
			pg_query($connect,$sql);
			
			$sql='SELECT * FROM hazi_reservation WHERE id=\''.$_GET["id"].'\'';
			$query = pg_query($connect, $sql);
			$result = pg_fetch_all($query);
			$record = $result[0];
			
			$message = "Tájékoztatjuk, hogy az alábbi asztalfoglalása az Én Kicsi Éttermem-ben elfogadásra került.\r\n
						Név: ".$record["name"]." | Fő: ".$record["people"]." | Időpont: ".$record["regtime"]."";
			$headers=array(
				'Content-type: text/html; charset="utf-8";',
				'From: Én Kicsi Éttermem <eke@eke.hu>'
			);
			$header=implode("\r\n", $headers);
			mail ($record["email"],"Asztalfoglalás az Én Kicsi Éttermem-ben",
			nl2br($message), $header);
		}
		else if ($_GET["dontes"]=="elu")
		{
			$sql='UPDATE hazi_reservation SET state=\'elutasítva\' WHERE id=\''.$_GET["id"].'\'';
			pg_query($connect,$sql);
						
			$sql='SELECT * FROM hazi_reservation WHERE id=\''.$_GET["id"].'\'';
			$query = pg_query($connect, $sql);
			$result = pg_fetch_all($query);
			$record = $result[0];
			
			$message = "Tájékoztatjuk, hogy az alábbi asztalfoglalása az Én Kicsi Éttermem-ben elutasításra került.\r\n
						Név: ".$record["name"]." | Fő: ".$record["people"]." | Időpont: ".$record["regtime"]."";
			$headers=array(
				'Content-type: text/html; charset="utf-8";',
				'From: Én Kicsi Éttermem <eke@eke.hu>'
			);
			$header=implode("\r\n", $headers);
			mail ($record["email"],"Asztalfoglalás az Én Kicsi Éttermem-ben",
			nl2br($message), $header);
		}
	}
	header("Location: erik1331_admin.php");
}
else
{
	header("Location: erik1331_login.php");
}
?>