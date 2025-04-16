<?php 
$host = 'localhost';
$dbname = 'login';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco: " . $conn->connect_error);
}


?>