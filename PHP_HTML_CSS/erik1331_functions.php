<?php
function dbconnect()
{
	$host='localhost';
	$port='5432';
	$dbname='erik1331';
	$user='erik1331';
	$password='kiewaé38956tjanl aywjkf39ö23[łäp';
	$connect=pg_connect('host=\''.$host.'\' port=\''.$port.'\' dbname=\''.$dbname.'\' user=\''.$user.'\' password=\''.$password.'\'');
	
	return ($connect);
}
?>