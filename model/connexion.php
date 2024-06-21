<?php
function dbconnect()
{
    static $connect = null;
    if ($connect === null) {
        $user = 'liantsoa';
        $pass = '1943';
        $dsn = 'pgsql:host=localhost;port=5432;dbname=Restaurant_sig';
        try {
            $connect = new PDO($dsn, $user, $pass);
            // print"connecte";
            return $connect;
        } catch (PDOException $e) {
            print "Erreur ! : " . $e->getMessage();
            die();
        }
    }
}
