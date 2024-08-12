<?php 

define('POSTGRESQL_USER','postgres');
define('POSTGRESQL_HOST','localhost');
define('POSTGRESQL_PORT','5432');
define('POSTGRESQL_PASSWORD','admin1234');
define('POSTGRESQL_DATABASE','todo');

try{

    $dsn = "pgsql:host=".POSTGRESQL_HOST.";port=".POSTGRESQL_PORT.";dbname=".POSTGRESQL_DATABASE;

    $pdo = new PDO($dsn, POSTGRESQL_USER, POSTGRESQL_PASSWORD);

    if($pdo){
        echo "Connected Successfully";
    }

}catch(PDOException $e){

echo $e->getMessage();

}


/*
 for mysql 
define('MYSQL_USER','root');
define('MYSQL_PASSWORD','');
define('MYSQL_HOST','localhost');
define('MYSQL_DATABASE','todo_app');


$dsn = "mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DATABASE;

try{
    $pdo = new PDO($dsn , MYSQL_USER , MYSQL_PASSWORD );
   
   return $pdo;
}catch(PDOException $e){
    echo $e->getMessage();
}
    */