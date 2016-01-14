<?php
ob_start();
require_once('bootstrap.php');
//require_once('include/module/index.class.php');
//require_once('include/module/conf.class.php');
//require_once('include/module/user.class.php');
//require_once('include/module/Content.class.php');
//require_once('include/module/dett.php');
//
//require_once('include/add-ons/adModule.php');
//
//	$conf = new conf();
//	$conf->query(mysql_query("SELECT * FROM `".TB_CONF."` WHERE `id`='1'"));
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

$config = new Config();
$config->setName('Name');
$config->setEmail('a@a.com');
$config->setDescription('Descritopn');
$config->setTytul('Tytul');
$config->setSlogan('Slogan');
$config->setLogo('logo');
$config->setTags('tags');
$config->setImgNaStrone(1);
$config->setRegulamin(1);
$config->setKomentarze(1);
$config->setImgTitle('title');
$config->setReqCode(1123);
$config->setMaxFileSize(200);
$config->setReklama('reklama');
$config->setTheme('nenaudinga');



$entityManager->persist($config);
$entityManager->flush();

ob_end_flush();
?>


