<?php
$usuario = $_POST ["user"];
$contra = $_POST ["pass"];
session_start();
$_SESSION['usuario']=$usuario;

$checkuser ="admin";
$checkpass ="1234";


if($usuario==$checkuser && $contra==$checkpass){

  header("location: ../index.php");
}else{
    header( "location: ./error.html" );
}
?>