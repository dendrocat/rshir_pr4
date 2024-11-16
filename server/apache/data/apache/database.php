<?php
    class Database {
        private static $host = "db";
        private static $user = "user";
        private static $pass = "password";
        private static $db_name = "appDB";

        public static function query($q) {
            $mysql = new mysqli(self::$host, 
                                self::$user, 
                                self::$pass, 
                                self::$db_name);
            if (!$mysql) {
                echo "Connection failed";
                return "";
            }

            $res = $mysql->query($q);
            $mysql->close();
            return $res;
        }
    }
?>