<?php
	class user {
		
		var $s_login;
		var $s_pass;
		

		function sessionName($login, $pass) {
				$this->s_login = $login;
				$this->s_pass = $pass;
		}
		
		function sessionSet($login, $pass, $submit) {
			if(isset($_POST[$submit])) {
				$_SESSION[$this->s_login] = mysql_real_escape_string($_POST[$login]);
				$_SESSION[$this->s_pass] = md5(mysql_real_escape_string($_POST[$pass]));
			}
		}
			
		function verifyLogin() {
			if(isset($_SESSION[$this->s_login]) && isset($_SESSION[$this->s_pass])) {
				$query = mysql_query("SELECT * FROM `user` WHERE `login`='".$_SESSION[$this->s_login]."' AND `haslo`='".$_SESSION[$this->s_pass]."' AND `code`='0'");
					if(mysql_num_rows($query) == 0) {
						unset($_SESSION[$this->s_login]);
						unset($_SESSION[$this->s_pass]);
						return 0;
					}
					else if(mysql_num_rows($query) == 1) return 1;
			}
		}
		function userInfo($col) {
			if(isset($_SESSION[$this->s_login]) && isset($_SESSION[$this->s_pass])) {
				$query = mysql_fetch_array(mysql_query("SELECT * FROM `user` WHERE `login`='".$_SESSION[$this->s_login]."' AND `haslo`='".$_SESSION[$this->s_pass]."'"));
				return $query[$col];
			}
		}
		function sessionRelog($login, $pass) {
				$_SESSION[$this->s_login] = mysql_real_escape_string($login);
				$_SESSION[$this->s_pass] = md5(mysql_real_escape_string($pass));
		}
	}
?>
