<?php
//adModule.php
function adModule() {
	global $int_i;
	if(!isset($int_i)) $int_i = 1;
	$query = mysql_query("SELECT * FROM `reklama` WHERE `pod_obrazkiem`='".$int_i."'");
	if(mysql_num_rows($query) > 0) {
		while($ad = mysql_fetch_array($query)) {
			echo '<div class="shit">'.$ad['kod'].'</div>';
		}
	}
	$int_i++;
}

?>
