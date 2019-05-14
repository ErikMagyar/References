<meta charset="utf-8">
<?php
session_start();
if (isset($_SESSION["admin"]))
{
	mb_internal_encoding("utf-8");
	require_once("erik1331_functions.php");
	$connect = dbconnect();
	print $_SESSION["admin"];
	print '<br>';
	print '<a href="erik1331_logout.php">Kijelentkezés </a>';
	print '<br>';
	print '<br>';
	print "<a href=\"erik1331_menufel.php\">Menü feltöltése</a>";
	
	print '<br>';
	
	print "<h1>Asztalfoglalások</h1>";
	$sql = 'SELECT * FROM hazi_reservation ORDER BY id';
	$query = pg_query($connect, $sql);
	$result = pg_fetch_all($query);
	if ($result!==false)
	{
		print "<table border=1>";
		
		print "<tr>";
		print "<td>";
			print "ID";
		print "</td>";
		print "<td>";
			print "Név";
		print "</td>";
		print "<td>";
			print "Email";
		print "</td>";
		print "<td>";
			print "Hány főre";
		print "</td>";
		print "<td>";
			print "Mikor foglalt";
		print "</td>";
		print "<td>";
			print "Mikorra foglalt";
		print "</td>";
		print "<td>";
			print "Állapot";
		print "</td>";		
		print "</tr>";
		
		foreach($result as $record)
		{
			print "<tr>";
			foreach($record as $field)
			{
				print "<td>";
				print $field;
				print "</td>";
			}
	
			if ($record["state"]=="új foglalás")
			{
				print "<td>";
				print "<a href=\"erik1331_elfvelu.php?id=".$record["id"]."&dontes=elf\">Elfogadás</a>";
				print "</td>";
				
				print "<td>";
				print "<a href=\"erik1331_elfvelu.php?id=".$record["id"]."&dontes=elu\">Elutasítás</a>";
				print "</td>";
			}
			else
			{
				print "<td>";
					print "<a href=\"erik1331_torol.php?table=hazi_reservation&field=id&key=".$record["id"]."\">Törlés</a>";
				print "</td>";
			}
			print "</tr>";
		}
		print "</table>";
	}
	else print "egyenlőre nincs :/";
	
	print "<br>";
	print '<hr>';
	
	print "<h1>Felhasználókövetés</h1>";
	$sql = 'SELECT * FROM hazi_latogato ORDER BY id';
	$query = pg_query($connect, $sql);
	$result = pg_fetch_all($query);
	if ($result!==false)
	{
		print "<table border=1>";
		
		print "<tr>";
		print "<td>";
			print "ID";
		print "</td>";
		print "<td>";
			print "Email vagy látogató azonosító";
		print "</td>";
		print "<td>";
			print "Látogatások száma";
		print "</td>";
		print "<td>";
			print "Első látogatás";
		print "</td>";
		print "<td>";
			print "Utolsó látogatás";
		print "</td>";	
		print "</tr>";
		
		foreach($result as $record)
		{
			print "<tr>";
			print "<td>";
				print $record["id"];
			print "</td>";
			print "<td>";
				if ( !$record["email"] )
				{
					print "látogató_".$record["id"];
				}
				else print $record["email"];
			print "</td>";
			print "<td>";
				print $record["latogatasszam"];
			print "</td>";
			print "<td>";
				print $record["elsolatogatas"];
			print "</td>";
			print "<td>";
				print $record["utolsolatogatas"];
			print "</td>";
			print "</tr>";
		}
		print "</table>";
	}
	else print "egyenlőre nincs :/";
	print "<br>";
	print '<hr>';
	
	print "<h1>Összes látogatás</h1>";
	/*if (isset($_POST["torol"]))
	{
		$sql='DELETE FROM hazi_ossz_latogatas';
		$query = pg_query($connect, $sql);
		unset($_POST["torol"]);
	}
	print '<form name="latogatok_torles" method="post" action="">';
	print '<input name="torol" value="Összes látogató törlése" type="submit">';
	print '</form>';*/

	$sql = 'SELECT hazi_ossz_latogatas.id, hazi_ossz_latogatas.latogato_id, hazi_latogato.email, hazi_ossz_latogatas.timestamp FROM hazi_ossz_latogatas, hazi_latogato WHERE hazi_ossz_latogatas.latogato_id=hazi_latogato.id';
	$query = pg_query($connect, $sql);
	$result = pg_fetch_all($query);
	if ($result!==false)
	{
		print "<table border=1>";
		
		print "<tr>";
		print "<td>";
			print "ID";
		print "</td>";
		print "<td>";
			print "Látogató_ID";
		print "</td>";
		print "<td>";
			print "Email";
		print "</td>";
		print "<td>";
			print "Idő";
		print "</td>";		
		print "</tr>";
		
		foreach($result as $record)
		{
			print "<tr>";
			print "<td>";
				print $record["id"];
			print "</td>";
			print "<td>";
				print $record["latogato_id"];
			print "</td>";
			print "<td>";
				if ( !$record["email"] )
				{
					print "látogató_".$record["latogato_id"];
				}
				else print $record["email"];
			print "</td>";
			print "<td>";
				print $record["timestamp"];
			print "</td>";
			print "</tr>";
		}
		print "</table>";
	}
	else print "egyenlőre nincs :/";
	
	print "<br>";
	print '<hr>';
	
	print "<h1>Adminok</h1>";
	if (isset($_POST["newAdminOke"]))
	{
		$newAdminEmail = $_POST["adminEmail"];
		$newAdminPassword = $_POST["adminPassword"];
		$sql='SELECT * FROM hazi_admin WHERE email=\''.$newAdminEmail.'\'';
		$query = pg_query($connect, $sql);
		if (pg_num_rows($query)===0)
		{
			$sqlNew = 'INSERT INTO hazi_admin VALUES (\''.$newAdminEmail.'\',\''.md5($newAdminPassword).'\')';
			if (pg_query($connect, $sqlNew))
			{
				print "Sikeres hozzáadás";
			}
			else
			{
				print "Sikertelen hozzáadás";
			}
		}
		else
		{
			print "Ez az admin már létezik";
		}
	}
	$sql = 'SELECT * FROM hazi_admin';
	$query = pg_query($connect, $sql);
	$admins = pg_fetch_all($query);
	print "<table border=1>";
	foreach($admins as $admin)
	{
		print "<tr>";
		foreach($admin as $ertek)
		{
			print "<td>";
			print $ertek;
			print "</td>";
		}
		print "<td>";
		if($_SESSION["admin"]!==$admin["email"])
		{
			print "<a href=\"erik1331_torol.php?table=hazi_admin&field=email&key=".$admin["email"]."\">Törlés</a>";
		}
		print "</td>";
		print "</tr>";
	}
	
	print "</table>";
	print '<br>';
	print '<form name="newAdmin" method="post" action="">';
	print 'Email: <input name="adminEmail" type="text">';
	print 'Password: <input name="adminPassword" type="password">';
	print '<input name="newAdminOke" value="New Admin" type="submit">';
	print '</form>';
	
	print '<br>';
	print '<hr>';
	
	print "<h1>Hírlevélre feliratkozottak</h1>";
	$sql = 'SELECT * FROM hazi_newsletter';
	$query = pg_query($connect, $sql);
	$result = pg_fetch_all($query);
	if ($result!==false)
	{
		print "<table border=1>";
		foreach($result as $record)
		{
			print "<tr>";
			foreach($record as $field)
			{
				print "<td>";
				print $field;
				print "</td>";
			}
			print "<td>";
			$link = $record["link"];
			$email = $record["email"];
			print "<a href=\"erik1331_hir_leiratkozas.php?link=$link&email=$email\">Leiratkoztatás</a>";
			print "</td>";
			print "</tr>";
		}
		print "</table>";
	}
	else print "egyenlőre nincs :/";
	
	print '<br>';
	print '<hr>';
}
else
{
	header("Location: erik1331_login.php");
}
?>