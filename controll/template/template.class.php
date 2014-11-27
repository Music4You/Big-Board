<?php
System::LoadClass('template','page');
class Template
{
	public function __construct()
	{
		echo "<!DOCTYPE html><html><meta charset='UTF-8'</meta>";
		$this::Includes();
		$this::SetTitle();
		echo "<body class='metro'>";
		$this::SetHeader();
		$this::SetPage();
		$this::SetFooter();
		echo "</body></html>";
	}
	public static function Includes()
	{
		echo "<head>
			<link rel='stylesheet' href='lib/css/bootstrap.min.css'>
			<link rel='stylesheet' href='lib/css/metro-bootstrap.css'>
			<link rel='stylesheet' href='lib/css/style.css'>
			<script src='lib/js/jquery.min.js'></script>
			<script src='lib/js/jquery.widget.min.js'></script>
			<script src='lib/js/metro.min.js'></script>
		";
	}
	public static function SetTitle()
	{
		echo "<title>".Boardname."</title></head>";
	}
	public static function SetHeader()
	{
		if(PageLogic::IsACP()==0)
		{
			require_once('view/header.php');
		}
		else
		{
			require_once('view/acp-header.php');
		}
	}
	public static function SetPage()
	{
		new PageLogic();
	}
	public static function SetFooter()
	{
		require_once('view/footer.php');
	}
}
?>