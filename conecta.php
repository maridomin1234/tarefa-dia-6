<?php
$servername = "localhost"; 
$username = "root";        
$password = "";            
$database = "db_tarefa";   


$conn = new mysqli  ( $servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
echo "Conexão bem-sucedida!";
?>