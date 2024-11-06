<?php
// Inclui o arquivo de conexão
require_once 'conecta.php';

// Verifica se o formulário foi enviado pelo método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura e sanitiza os dados do formulário
    $nome = $conn->real_escape_string(trim($_POST['nome']));
    $email = $conn->real_escape_string(trim($_POST['email']));

    // Prepara a consulta SQL para inserir os dados
    $sql = "INSERT INTO tbl_usuarios (usu_nome, usu_email) VALUES ('$nome', '$email')";

    // Executa a consulta e verifica o resultado
    if ($conn->query($sql) === TRUE) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o usuário: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir Usuário</title>
</head>
<body>
    <h1>Incluir Novo Usuário</h1>
    <form action="incluir_usuario.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
    <br>
    <a href="index.php">Voltar para a Tela Principal</a>
</body>
</html>
