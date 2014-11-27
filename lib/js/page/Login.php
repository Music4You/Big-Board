<?php
require_once '../../../global.php';

$db = new mysqli($System['MySQL']['Host'],$System['MySQL']['User'],$System['MySQL']['Pass'],$System['MySQL']['Data']); 

$Name = $db->real_escape_string($_POST['Name']);
$Pass = $db->real_escape_string($_POST['Pass']);

$Query = $db->query("SELECT * FROM accounts WHERE `Name`='$Name' AND `Passwort`='$Pass'");
$Result = $Query->num_rows;
if($Result!=0)
{
	$ip = $_SERVER['REMOTE_ADDR'];
	$LastLogin = date("d.m.Y  H:i");
	$db->query("UPDATE accounts SET IP='$ip',LastLogin='$LastLogin' WHERE Name='$Name'");
	$_SESSION['username']=$Name;
	echo 1;
	die;
}
else
{
	echo 0;
}
die;
?>