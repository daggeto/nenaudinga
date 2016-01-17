<?php

	class conf {
		
		var $db_query;
		var $pobierz;
		
		function query($q) {
			$this->db_query = $q;
			$this->pobierz = mysqli_fetch_array($this->db_query);
		}
		function pobierz($row) {
			return $this->pobierz[$row];
		}
		function host() {
			return $_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		}
				
	}
	
?>
