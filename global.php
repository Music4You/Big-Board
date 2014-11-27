<?php
session_start();
define('Dir',__DIR__);
require_once(Dir.'/controll/system/ini.class.php');

$mysql = new Ini(Dir.'/controll/config/sql-config.ini');
$System['MySQL']['Host'] = $mysql->host;
$System['MySQL']['User'] = $mysql->user;
$System['MySQL']['Pass'] = $mysql->pass;
$System['MySQL']['Data'] = $mysql->data;
?>