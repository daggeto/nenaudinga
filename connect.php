<?php
	session_start(); // rospoczęcie sesji.

	$db =  Database::getConnection(); //łącze z bazą [serwer bazy,użytkownik,hasło]

  mysqli_query($db, "SET NAMES utf8mb4"); //kodowanie znaków

  $img_table = "shity"; //tabela z tentegowcami

	$version = 'Rozwojowa (1.1)';

	class Database {
		private static $db;
		private $connection;

		private function __construct() {
			$this->connection = mysqli_connect("localhost", "root", "", "nenaudinga");
		}

		function __destruct() {
			$this->connection->close();
		}

		public static function getConnection() {
			if (self::$db == null) {
				self::$db = new Database();
			}
			return self::$db->connection;
		}
	}
?>
