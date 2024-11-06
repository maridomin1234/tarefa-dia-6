<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "db_tarefa";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$setor = $_POST['setor'];
$prioridade = $_POST['prioridade'];
$descricao = $_POST['descricao'];

$sql = $conn->prepare("INSERT INTO tbl_tarefas (tar_setor, tar_prioridade, tar_descricao, tar_status) 
                       VALUES (?, ?, ?, 'a fazer')");  


$sql->bind_param("sss", $setor, $prioridade, $descricao);

if ($sql->execute()) {
    echo "Tarefa cadastrada com sucesso!";
} else {
    echo "Erro ao cadastrar tarefa: " . $sql->error;
}


$sql->close();
$conn->close();
?>
<a href="index.php">Voltar para a Tela Principal</a>