<?php
    class DB {
        private static $server = "localhost";
        private static $user = "root";
        private static $pass = "";
        private static $database = "class_ranks";

        public static $koneksi;
        
        public static function connect(){
            self::$koneksi = mysqli_connect(self::$server, self::$user, self::$pass, self::$database);
            return self::$koneksi;
        }
    }
?>