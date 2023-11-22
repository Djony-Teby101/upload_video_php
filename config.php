<?php
$sname="localhost";
$uname="root";
$password="";
$dbname="upload_video";

$dbb=mysqli_connect($sname,$uname,$password,$dbname);
if(!$dbb){
    die('Erreur lors de la connexion à la dbase.');
}

?>