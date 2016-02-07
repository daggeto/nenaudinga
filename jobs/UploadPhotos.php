<?php
  require_once('connect.php');

  if (sizeof($argv) < 4) return ;

  $folder = $argv[1];
  $author_id = $argv[2];
  $type = $argv[3];

  $uploads = new UploadPhotos($folder, $author_id, $type, $db);

  $uploads->run();

  class UploadPhotos {

    const SHITY_INSERT =  "INSERT INTO `shity` ( `content`, `title` , `img`, `source`, `author`, `data`, `type`, `is_waiting`) VALUES ('%s', '%s' , '%s', '%s', '%d', '%s', '%s', 0)";

    var $folder;
    var $author_id;
    var $type;
    var $db;

    function __construct($folder, $author_id, $type, $db) {
      $this->folder = $folder;
      $this->author_id = $author_id;
      $this->type = $type;
      $this->db = $db;
    }

    function run () {
      $files = array_diff(scandir($this->folder), array('.', '..'));

      foreach($files as $file) {
        $this->uploadFile($file);
      }
    }

    private function uploadFile($filename) {
      $params = [
        null,
        null,
        $this->folder . '/' . $filename,
        'nenaudinga',
        $this->author_id,
        date('Y-m-d H:i:s'),
        $this->type
      ];

      $query = vsprintf(self::SHITY_INSERT, $params);

      $this->db->query($query);
    }

  }
?>