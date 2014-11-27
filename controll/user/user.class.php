<?php
class User 
{
	private $Name;
	private $Data = array();
	
	public function __construct()
	{
		$this->Name = $_SESSION['username'];
		self::GetUserData();
	}
	
	public function IsLogged()
	{
		return ((isset($_SESSION['username']))? "1" : "0");
	}
	
	public function Name() 
	{
		return $this->Name;
	}
	
	public function __get($Data) 
    {
		return $this->Data[$Data];
	}
	
	public function GetUserData()
	{
		$query = System::GetDB()->SendQuery("SELECT * FROM accounts WHERE Name = '".$this->Name."'");
		while($query_data = System::GetDB()->FetchObject($query))
		{
			$this->Data["id"] = $query_data->id;
			$this->Data["Name"] = $query_data->Name;
			$this->Data["IP"] = $query_data->IP;
			$this->Data["Adminlevel"] = $query_data->Adminlevel;
			$this->Data["LastLogin"] = $query_data->LastLogin;
			$this->Data["Email"] = $query_data->Email;
			$this->Data["RegisterDate"] = $query_data->RegisterDate;
			$this->Data["Geburtstag"] = $query_data->Geburtstag;
		}
	}
	
	public function GetUsersData() 
	{
		$query = System::GetDB()->SendQuery("SELECT * FROM accounts");
		$data = array();
		$i = 0;
		while($query_data = System::GetDB()->FetchObject($query))
		{
			$data[$i]["id"] = $query_data->id;
			$data[$i]["Name"] = $query_data->Name;
			$data[$i]["IP"] = $query_data->IP;
			$data[$i]["Adminlevel"] = $query_data->Adminlevel;
			$data[$i]["LastLogin"] = $query_data->LastLogin;
			$data[$i]["Email"] = $query_data->Email;
			$data[$i]["RegisterDate"] = $query_data->RegisterDate;
			$data[$i]["Geburtstag"] = $query_data->Geburtstag;
			$i++;
		}
		return $data;
	}
	
	public function Create($Name,$Pass,$Email)
	{
		$date = date("d.m.Y");
		$ip = $_SERVER['REMOTE_ADDR'];
		System::GetDB()->SendQuery("INSERT INTO accounts (`Name`,`Passwort`,`Email`,`RegisterDate`,`IP`) VALUES ('$Name','$Pass','$Email','$date','$ip')");
	}
}
?>