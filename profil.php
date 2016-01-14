<?php
ob_start();
require_once('bootstrap.php');
require_once('include/module/index.class.php');
require_once('include/module/conf.class.php');
require_once('include/module/user.class.php');
require_once('include/module/Content.class.php');
require_once('include/module/dett.php');

	$conf = new conf();
	$conf->query(mysql_query("SELECT * FROM `".TB_CONF."` WHERE `id`='1'"));
	$user = new user();
	$user->sessionName('login','password');

        $obj = new glowna();

	$theme = $conf->pobierz("theme");
        $lang = 'lt';
        $contentFileName = 'themes/' . $theme . '/content_' . $lang .'.ini';
        $content = new Content($contentFileName, $lang);

	if($user->verifyLogin()) {
		$tentego_glowna = mysql_num_rows(mysql_query("SELECT * FROM `$img_table` WHERE `is_waiting`='0' AND `author`='".$user->userInfo('id')."'"));
		$tentego_poczekalnia = mysql_num_rows(mysql_query("SELECT * FROM `$img_table` WHERE `is_waiting`='1' AND `author`='".$user->userInfo('id')."'"));
		$tentego_last_uploaded = mysql_fetch_array(mysql_query("SELECT * FROM `$img_table` WHERE `author`='".$user->userInfo('id')."' ORDER BY `id` DESC"));
		
		if(isset($_POST['zmien'])) {
			$info = NULL;
			if(empty($_POST['stare_haslo']) || empty($_POST['nowe_haslo'])) {
				$info = $content->getValue("global", "niewypelniono") . "</span>";
			}
			else {
				$old_pass = md5($_POST['stare_haslo']);
				if(!mysql_num_rows(mysql_query("SELECT * FROM `user` WHERE `login`='".$user->userInfo('login')."' and `haslo`='".$old_pass."'"))) $info = $content->getValue("profil", "zleHaslo");
				else {
					$new_pass = md5($_POST['nowe_haslo']);
					$user_login = $user->userInfo('login');
					if(!mysql_query("UPDATE `user` SET `haslo` = '".$new_pass."' WHERE `login`='".$user_login."';")) $info = $content->getValue("profil", "nieudalosie");
					else {
						$user->sessionRelog($user_login, $_POST['nowe_haslo']);
						$info = $content->getValue("profil", "zminiono");
					}
				}
			}
		}
	}
	else header("Location: login.php");
	
require_once('themes/'.$theme.'/header.php'); //LOAD header
echo '<div id="content"  class="background">';
	require_once('themes/'.$theme.'/profil.php'); //LOAD content
echo '</div>';
require_once('themes/'.$theme.'/footer.php'); //LOAD footer
ob_end_flush();
?>


