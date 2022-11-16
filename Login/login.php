<?php

$usuario = $_POST ["user"];
$contra = $_POST ["pass"];

$checkuser ="admin";
$checkpass ="1234";

if($usuario==$checkuser && $contra==$checkpass){
  header("location: https://aulasvirtuales.bue.edu.ar/my/");
}else{
    header( "location: error.html" );
}
?>