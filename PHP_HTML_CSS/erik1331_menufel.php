<meta charset="utf-8">
<?php
session_start();
if (isset($_SESSION["admin"]))
{
	mb_internal_encoding("utf-8");
	require_once("erik1331_functions.php");
	$connect = dbconnect();
	//ez nem lett a legjobb
	
	if (isset($_POST["oke"]))
	{
		//Hétfő
		if (!is_numeric($_POST["hetfo_ar"])) $_POST["hetfo_ar"]=0;
		$sql = 'UPDATE hazi_menu SET amenu=\''.$_POST["hetfo_A"].'\', bmenu=\''.$_POST["hetfo_B"].'\', ar=\''.$_POST["hetfo_ar"].'\' WHERE id=1';
		$query = pg_query($connect, $sql);
		//Kedd
		if (!is_numeric($_POST["kedd_ar"])) $_POST["kedd_ar"]=0;
		$sql = 'UPDATE hazi_menu SET amenu=\''.$_POST["kedd_A"].'\', bmenu=\''.$_POST["kedd_B"].'\', ar=\''.$_POST["kedd_ar"].'\' WHERE id=2';
		$query = pg_query($connect, $sql);
		//Szerda
		if (!is_numeric($_POST["szerda_ar"])) $_POST["szerda_ar"]=0;
		$sql = 'UPDATE hazi_menu SET amenu=\''.$_POST["szerda_A"].'\', bmenu=\''.$_POST["szerda_B"].'\', ar=\''.$_POST["szerda_ar"].'\' WHERE id=3';
		$query = pg_query($connect, $sql);
		//Csütörtök
		if (!is_numeric($_POST["csutortok_ar"])) $_POST["csutortok_ar"]=0;
		$sql = 'UPDATE hazi_menu SET amenu=\''.$_POST["csutortok_A"].'\', bmenu=\''.$_POST["csutortok_B"].'\', ar=\''.$_POST["csutortok_ar"].'\' WHERE id=4';
		$query = pg_query($connect, $sql);
		//Péntek
		if (!is_numeric($_POST["pentek_ar"])) $_POST["pentek_ar"]=0;
		$sql = 'UPDATE hazi_menu SET amenu=\''.$_POST["pentek_A"].'\', bmenu=\''.$_POST["pentek_B"].'\', ar=\''.$_POST["pentek_ar"].'\' WHERE id=5';
		$query = pg_query($connect, $sql);
		//Szombat
		if (!is_numeric($_POST["szombat_ar"])) $_POST["szombat_ar"]=0;
		$sql = 'UPDATE hazi_menu SET amenu=\''.$_POST["szombat_A"].'\', bmenu=\''.$_POST["szombat_B"].'\', ar=\''.$_POST["szombat_ar"].'\' WHERE id=6';
		$query = pg_query($connect, $sql);
		//Vasárnap
		if (!is_numeric($_POST["vasarnap_ar"])) $_POST["vasarnap_ar"]=0;
		$sql = 'UPDATE hazi_menu SET amenu=\''.$_POST["vasarnap_A"].'\', bmenu=\''.$_POST["vasarnap_B"].'\', ar=\''.$_POST["vasarnap_ar"].'\' WHERE id=7';
		$query = pg_query($connect, $sql);
		
		print "MENTVE";
	}
	
	print '<h1>Az eheti menü szerkeztése</h1>';
	
	print '<form name="form" action="" method="post">';
	print "<table border=1>";
	
	print "<tr>";
	print "<td> </td>";
	print '<td>A menü</td>';
	print '<td>B menü</td>';
	print '<td>Ár</td>';
	print "</tr>";
	
	print "<tr>";
	print "<td>Hétfő</td>";
	$sql = 'SELECT * FROM hazi_menu WHERE id=1';
	$query = pg_query($connect, $sql);
	$napok = pg_fetch_all($query);
	print '<td><input type="text" name="hetfo_A" value="'.$napok[0]["amenu"].'"></td>';
	print '<td><input type="text" name="hetfo_B" value="'.$napok[0]["bmenu"].'"></td>';
	print '<td><input type="text" name="hetfo_ar" value="'.$napok[0]["ar"].'"></td>';
	print "</tr>";
	
	print "<tr>";
	print "<td>Kedd</td>";
	$sql = 'SELECT * FROM hazi_menu WHERE id=2';
	$query = pg_query($connect, $sql);
	$napok = pg_fetch_all($query);
	print '<td><input type="text" name="kedd_A" value="'.$napok[0]["amenu"].'"></td>';
	print '<td><input type="text" name="kedd_B" value="'.$napok[0]["bmenu"].'"></td>';
	print '<td><input type="text" name="kedd_ar" value="'.$napok[0]["ar"].'"></td>';
	print "</tr>";
	
	print "<tr>";
	print "<td>Szerda</td>";
	$sql = 'SELECT * FROM hazi_menu WHERE id=3';
	$query = pg_query($connect, $sql);
	$napok = pg_fetch_all($query);
	print '<td><input type="text" name="szerda_A" value="'.$napok[0]["amenu"].'"></td>';
	print '<td><input type="text" name="szerda_B" value="'.$napok[0]["bmenu"].'"></td>';
	print '<td><input type="text" name="szerda_ar" value="'.$napok[0]["ar"].'"></td>';
	print "</tr>";
	
	print "<tr>";
	print "<td>Csütörtök</td>";
	$sql = 'SELECT * FROM hazi_menu WHERE id=4';
	$query = pg_query($connect, $sql);
	$napok = pg_fetch_all($query);
	print '<td><input type="text" name="csutortok_A" value="'.$napok[0]["amenu"].'"></td>';
	print '<td><input type="text" name="csutortok_B" value="'.$napok[0]["bmenu"].'"></td>';
	print '<td><input type="text" name="csutortok_ar" value="'.$napok[0]["ar"].'"></td>';
	print "</tr>";
	
	print "<tr>";
	print "<td>Péntek</td>";
	$sql = 'SELECT * FROM hazi_menu WHERE id=5';
	$query = pg_query($connect, $sql);
	$napok = pg_fetch_all($query);
	print '<td><input type="text" name="pentek_A" value="'.$napok[0]["amenu"].'"></td>';
	print '<td><input type="text" name="pentek_B" value="'.$napok[0]["bmenu"].'"></td>';
	print '<td><input type="text" name="pentek_ar" value="'.$napok[0]["ar"].'"></td>';
	print "</tr>";
	
	print "<tr>";
	print "<td>Szombat</td>";
	$sql = 'SELECT * FROM hazi_menu WHERE id=6';
	$query = pg_query($connect, $sql);
	$napok = pg_fetch_all($query);
	print '<td><input type="text" name="szombat_A" value="'.$napok[0]["amenu"].'"></td>';
	print '<td><input type="text" name="szombat_B" value="'.$napok[0]["bmenu"].'"></td>';
	print '<td><input type="text" name="szombat_ar" value="'.$napok[0]["ar"].'"></td>';
	print "</tr>";
	
	print "<tr>";
	print "<td>Vasárnap</td>";
	$sql = 'SELECT * FROM hazi_menu WHERE id=7';
	$query = pg_query($connect, $sql);
	$napok = pg_fetch_all($query);
	print '<td><input type="text" name="vasarnap_A" value="'.$napok[0]["amenu"].'"></td>';
	print '<td><input type="text" name="vasarnap_B" value="'.$napok[0]["bmenu"].'"></td>';
	print '<td><input type="text" name="vasarnap_ar" value="'.$napok[0]["ar"].'"></td>';
	print "</tr>";
	
	print "</table>";
	print '<br><input type="submit" value="Mentés" name="oke">';
	print "<br><br><h2><a href=\"erik1331_admin.php\">Vissza</a></h2>";
	print '</form>';
	

}
else
{
	header("Location: erik1331_login.php");
}
?>