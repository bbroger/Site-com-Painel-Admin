<?php
$senha = teste;

$password = password_hash($senha, PASSWORD_DEFAULT);
echo $password;

?>