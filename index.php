<?php
ob_start();

require_once('bootstrap.php');
require_once('include/add-ons/adModule.php');

use Nenaudinga\Main;

$page_config = $entityManager->find('Nenaudinga\Config', 1);

$obj = new Main();

//require_once('include/module/index.class.php');
//require_once('include/module/conf.class.php');
//require_once('include/module/user.class.php');
//require_once('include/module/Content.class.php');
//require_once('include/module/dett.php');
//	$obj = new glowna();
//	$user = new user();
//	$user->sessionName('login','password');
//
//	$theme = $conf->pobierz("theme");
//	$lang = 'lt';
//	$contentFileName = 'themes/' . $theme . '/content_' . $lang .'.ini';
//	$content = new Content($contentFileName, $lang);
//
//
//require_once('themes/'.$theme.'/header.php'); //LOAD header
//echo '<div id="content">';
//	require_once('themes/'.$theme.'/index.php'); //LOAD content
//echo '</div>';
//require_once('themes/'.$theme.'/footer.php'); //LOAD footer


ob_end_flush();
?>


