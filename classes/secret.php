<?php
  class secret {
    public $id;
    public $userid;
    public $groupid;
    public $name;
    public $username;
    public $password;
    
    public function __construct($id, $userid, $groupid, $name, $username, $password) {
      $this->id = $id;
      $this->userid = $userid;
      $this->groupid = $groupid;
      $this->name = $name;
      $this->username = $username;
      $this->password = $password;
    }
  }
?>