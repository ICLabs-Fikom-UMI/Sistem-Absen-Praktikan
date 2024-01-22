<?php

class connect {
    private const serverName = "localhost";
    private const username = "root";
    private const password = "";
    private const dbName = "tubes";



    public function getDB(){
        $conn = mysqli_connect(self::serverName, self::username, self::password, self::dbName);

        return $conn;
    }
} 

?>