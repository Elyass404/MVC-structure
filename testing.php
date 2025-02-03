<?php


$hello= new PDO("pgsql:host=***,dbname=***","***","****");

if($hello){
    echo "you are connected succefully!";
}


?>