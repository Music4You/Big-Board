<?php
System::LoadClass('template','template');
System::LoadClass('system','mysqli');
System::LoadClass('system','settings');
System::LoadClass('user','user');
System::LoadClass('user','usergroups');

class System
{
	static protected $DB;
	static protected $User;
	static protected $UserGroup;
	
	public function  __construct()
	{
		self::SetDB();
		self::SetUser();
		self::SetUserGroups();
		define('Boardname',Settings::GetSystemData('settings','BoardName'));
		new Template();
	}
	
	public static function LoadClass($location,$name)
	{
		if(file_exists("controll/".$location."/".$name.".class.php"))
		{
			require_once("controll/".$location."/".$name.".class.php");
		}
		else
		{
			die("Die Klasse '$name' wurde nicht gefunden");
		}
	}
	
	public static function LoadPostFile($location,$name)
	{
		if(file_exists("page/$location/Post/".$name.".php"))
		{
			require_once("page/$location/Post/".$name.".php");
		}
		else
		{
			die("Die Post Datei '$name' wurde nicht gefunden");
		}
	}
	
	public static function Error($Error,$Text)
	{
		echo "<center><h2><b>
			$Error</h2></b><h4><br/>$Text</h4></center>";
	}
	
	public static function GetDB()
	{
		return self::$DB;
	}
	
	public static function SetDB()
	{
		self::$DB = new Database();
	}
	
	public static function User()
	{
		return self::$User;
	}
	
	public static function SetUser()
	{
		self::$User = new User();
	}
	
	public static function UserGroup()
	{
		return self::$UserGroup;
	}
	
	public static function SetUserGroups()
	{
		self::$UserGroup = new UserGroup();
	}
	
}
?>