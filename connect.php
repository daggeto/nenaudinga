<?php
	session_start(); // rospoczęcie sesji.
	mysql_connect ("localhost","root","IiNogVCJBj"); //łącze z bazą [serwer bazy,użytkownik,hasło]
	mysql_select_db ("nenaudinga"); //nazwa bazy

	//PONIŻEJ NIC NIE ZMIENIAĆ!
	mysql_query ("SET NAMES utf8"); //kodowanie znaków 
	error_reporting (E_ALL ^ E_NOTICE);
	$img_table = "shity"; //tabela z tentegowcami
	
	$version = '1.2';
?>
