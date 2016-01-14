<?php
ob_start();
require_once('../bootstrap.php');
require_once('../include/module/admin/conf.class.php');
require_once('../include/module/admin/user.class.php');

	//Nazwa strony
	$title = 'Reklama';

	$conf = new conf();
	$conf->query(mysql_query("SELECT * FROM `conf` WHERE `id`='1'"));
	$user = new user();
	$user->sessionName('login','password');
	
	if($user->verifyLogin()) {
		$ranga = $user->userInfo('ranga');
		if($ranga!=2) {
			header("Location: login.php");
			}
		else {
			if(isset($_POST['save']) && ($_POST['token'] == $_SESSION['token'])) { 
			$licz = mysql_num_rows(mysql_query("SELECT * FROM `reklama`"));
			for($l = 0; $l<$licz; $l++) {
			mysql_query("UPDATE `reklama` SET `kod` = '".$_POST['kod_reklamy_'.$l]."', `pod_obrazkiem` = '".$_POST['pod_obrazkiem_'.$l]."' WHERE `id`='".$_POST['id_'.$l]."'");
			}
			mysql_query("UPDATE `conf` SET `reklama`='".$_POST['reklama']."'");
			$msg = 'Reklama została zaktualizowana.';
			header('Location: reklama.php?msg='.$msg);
			}
			else if(isset($_GET['del'])) {
				mysql_query("DELETE FROM `reklama` WHERE `id`='".$_GET['del']."'");
				$msg = 'Reklama została usunięta.';
				header('Location: reklama.php?msg='.$msg);
			}
			else {
			if(isset($_POST['add_next'])) {
				mysql_query("INSERT INTO `reklama` (`kod`,`pod_obrazkiem`) VALUES ('',0)");
				$msg = 'Reklama została dodana.';
				header('Location: reklama.php?msg='.$msg);
			}
					
			}
			}
		}
	else header("Location: login.php");
	
require_once('../themes/admin/header.php'); //LOAD header
echo '<div id="content">';
	require_once('../themes/admin/reklama.php'); //LOAD content
echo '</div>';
require_once('../themes/admin/footer.php'); //LOAD footer
ob_end_flush();
?>
