<?php

$servername="mysql";
$username="user";
$password="password";
$dbname="appdb";

try {
  
  $pdo = new PDO("mysql:host=$servername;dbname=$dbname;",$username,$password);

} catch (PDOException $e) {
  echo "Error: " . $e -> getMessage();
}