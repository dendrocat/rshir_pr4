<?php
class Database {

    private $host = "db";
    private $user = "user";
    private $pass = "password";
    private $db_name = "appDB";

    public $mysql;

    public function getConnection() {
        $this->mysql = null;
        
        $this->mysql = new mysqli(
                                $this->host, 
                                $this->user, 
                                $this->pass, 
                                $this->db_name);
        return $this->mysql;
    }

    
    function __destruct() {
        $this->mysql->close();
    }
}
?>