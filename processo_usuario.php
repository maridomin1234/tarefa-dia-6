<?php
// Dados de conexão
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_tarefa";

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Recebendo os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];

// Preparando o comando SQL para inserção
$sql = "INSERT INTO tbl_usuarios (usu_nome, usu_email) VALUES ('$nome', '$email')";

// Executando o comando SQL
if ($conn->query($sql) === TRUE) {
    echo "Usuário cadastrado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Fechando a conexão
$conn->close();
?>
<a href="index.php">Voltar para a Tela Principal</a>