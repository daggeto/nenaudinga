<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
	<meta name="description" content="<?php echo $conf->pobierz("description"); ?>" />
	<meta name="keywords" content="<?php echo $conf->pobierz("tags"); ?>" />
	<?php
		$ex = explode("/",$_SERVER['SCRIPT_NAME']);
		if($ex[1]='obrazek.php' || $ex[2]='obrazek.php') {
			if($img['type']=='obrazek') { echo '<meta property="og:image" content="http://'.$conf->host().'/'.$img['img'].'" />'."\n"; }
			elseif($img['type']=='film') { 
			$id_filmu=str_replace("http://www.youtube.com/watch?v=", "", $img['img']);
			echo '<meta property="og:image" content="http://i.ytimg.com/vi/'.$id_filmu.'/default.jpg" />'."\n"; 
			}
		}
	?>
	<link rel="stylesheet" href="themes/<?php echo $theme; ?>/style.css" type="text/css" />
	<title><?php echo $conf->pobierz("tytul").@$title; ?></title>
	<!-- Theme `dark_blue` by Paweł Klockiewicz -->
</head>

<body>
	<div id="header">
		<div id="logo">
			<div class="nazwa">
			<?php echo $conf->pobierz("logo"); ?>
			</div>
			<span class="like"><div id="fb-root"></div><script src="http://connect.facebook.net/pl_PL/all.js#xfbml=1"></script><fb:like href="<?php echo 'http://'.$conf->host().'/'; ?>" send="false" layout="button_count" width="140" show_faces="false" font="verdana"></fb:like></span>
			<span class="slogan"><?php echo $conf->pobierz("slogan"); ?></span>
		</div>
	</div>
	<div id="menu">
		<ul>
			<li><a href="index.php">Główna</a></li>
			<li><a href="poczekalnia.php">Poczekalnia</a></li>
			<li><a href="losuj.php">Losuj</a></li>
			<li><a href="dodaj.php">Dodaj</a></li>
			<?php
			if ($user->verifyLogin()) echo'<li><a href="profil.php">Mój Profil</a></li><li><a href="wyloguj.php">Wyloguj się</a></li>';
			else echo'<li><a href="rejestracja.php">Rejestracja</a></li><li><a href="login.php">Logowanie</a></li>';
			?>
		</ul>
	</div>
