<?php
class PageLogic
{	
	public function __construct()
	{
		$this::SetPage($this::GetParam("page"));
	}
	public static function SetPage($page)
	{
		if(!isset($page))
		{
			$page="Index";
		}
		if(file_exists(Dir."/page/".$page.".php"))
		{
			require_once(Dir."/page/".$page.".php");
			echo "<script>document.title = '".Boardname." - ".$page."';</script>";
		}
		else
		{
			System::Error("Ungültige Seite","Die Seite wurde nicht gefunden, überprüfe ob der Link falsch ist.");
			echo "<script>document.title = '".Boardname." - 404';</script>";
		}
	}
	public static function IsACP()
	{
		$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);		
		return (($page=="Acp")? 1 : 0);
	}
	public static function GetParam($name)
	{
		return filter_input(INPUT_GET, $name, FILTER_SANITIZE_SPECIAL_CHARS);		
	}
}
?>