<?php
class Settings 
{
	public static function GetSystemData($table,$param)
	{
		$Query = System::GetDB()->SendQuery("SELECT * FROM $table");
		$Data = System::GetDB()->FetchObject($Query);
		return $Data->$param;
	}
	public static function SetSystemData($table,$param,$arg)
	{
		$args = System::GetDB()->EscapeString($arg);
		System::GetDB()->SendQuery("UPDATE $table SET `$param`='$args'");
	}
	public static function GetSystemDataFromFile($file,$arg)
	{
		if(file_exists('controll/config/'.$file))
		{
			$data = new Ini('controll/config/'.$file);
			$tmp = $data->$arg;
			$data->close();
			return $tmp;
		}
		else
		{
			die('Die Board Config Datei wurde nicht gefunden');
		}
	}
	public static function SetSystemDataToFile($file,$arg,$value)
	{
		if(file_exists('controll/config/'.$file))
		{
			$data = new Ini('controll/config/'.$file);
			$data->$arg = $value;
			$data->close();
		}
		else
		{
			die('Die Board Config Datei wurde nicht gefunden');
		}
	}
}
?>