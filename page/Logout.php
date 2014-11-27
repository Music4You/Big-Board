<?php
if(System::User()->IsLogged()==0){header('Location: ?page=Index');}
session_destroy();
header('Location: ?page=Index');
?>