<?php
if(System::User()->IsLogged()==0)header('Location: ?page=Index');
$acp_page = filter_input(INPUT_GET, 'show', FILTER_SANITIZE_SPECIAL_CHARS);	
if(!isset($acp_page))
{
	require_once(Dir.'/page/Acp/Index.php');
}
else
{
	if(!file_exists(Dir."/page/Acp/$acp_page.php"))
	{
		System::Error("Ungültige Seite","Die Seite wurde nicht gefunden, überprüfe ob der Link falsch ist.");
	}
	else
	{	
		require_once(Dir."/page/Acp/$acp_page.php");
	}
}
?>