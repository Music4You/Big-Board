<?php
/**
 * Class Database
 * Provides functionality to database
 * @author Lukas Kämmerling 13.01.2013
 * @Editor Florian Gerhardt
 */
class Database {

    public $mySQLi;
    public $result;

    public function __construct() {
        $this->Connect();
		$this->CreateTables();
    }
    public function __destruct() {
        $this->DisConnect();
    }
    public function Connect() {
		global $System;
		$this->mySQLi = new mysqli($System['MySQL']['Host'],$System['MySQL']['User'],$System['MySQL']['Pass'],$System['MySQL']['Data']); 
        $this->mySQLi->set_charset("utf8");
        if($this->mySQLi->connect_errno){
            System::Error("MySQL..","Verbindung zum MySQL Server gescheitert");
        } 
    }
	public function CreateTables() {	
		$this->SendQuery("CREATE TABLE IF NOT EXISTS `accounts` (`id` int(11) NOT NULL AUTO_INCREMENT, `Name` varchar(30), `Passwort` varchar(30), `IP` varchar(20), `Adminlevel` int(1),`LastLogin` varchar(25),`Email` varchar(30),`RegisterDate` varchar(30), PRIMARY KEY (`id`)) ENGINE=MyISAM DEFAULT CHARSET=latin1;");
		$this->SendQuery("CREATE TABLE IF NOT EXISTS `settings` (`id` int(11) NOT NULL AUTO_INCREMENT, `BoardName` varchar(30), PRIMARY KEY (`id`)) ENGINE=MyISAM DEFAULT CHARSET=latin1;");
		$this->SendQuery("CREATE TABLE IF NOT EXISTS `impressum` (`id` int(11) NOT NULL AUTO_INCREMENT, `Name` varchar(30), `Anschrift` varchar(50),`Email` varchar(30),`Ort` varchar(50),`Telefon` varchar(40), PRIMARY KEY (`id`)) ENGINE=MyISAM DEFAULT CHARSET=latin1;");
		$this->SendQuery("CREATE TABLE IF NOT EXISTS `user_groups` (`id` int(11) NOT NULL AUTO_INCREMENT, `Name` varchar(30), `Admin` varchar(30), PRIMARY KEY (`id`)) ENGINE=MyISAM DEFAULT CHARSET=latin1;");
		
		if(!$this->NumRows($this->SendQuery("SELECT * FROM `user_groups`"))) {
			$this->SendQuery("INSERT INTO user_groups (`Name`,`Admin`) VALUES ('Administrator','System')");
			$this->SendQuery("INSERT INTO user_groups (`Name`,`Admin`) VALUES ('Registriert','System')");
		}
	}
    private function DisConnect() {
        $this->result = null;
        $this->mySQLi->close();
    }
    public function SendQuery($query){
        try{
            return $this->DoQuery($query);
        } 
        catch (Exception $e) {
            die($e);
        }
    }
    private function DoQuery($query) {
        $this->result = $this->mySQLi->query($query);
        return $this->result;
    }
    public function FetchObject($result) {
        if ($result !== null)
            $this->result = $result;

        return $this->result->fetch_object();
    }
    public function NumRows($result) {
        if ($result !== null)
            $this->result = $result;
        return $this->result->num_rows;
    }
    public function GetLastInsertID() {
        return $this->mySQLi->insert_id;
    }
    public function EscapeString($string) {
        return $this->mySQLi->real_escape_string($string);
    }
}
