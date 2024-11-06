<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "db_tarefa";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Tarefas</title>
</head>
<body>
    <h1>Cadastro de Tarefas</h1>
    <form action="processa_tarefa.php" method="POST">
        <label for="setor">Setor:</label>
        <input type="text" id="setor" name="setor" required><br><br>

        <label for="prioridade">Prioridade:</label>
        <select id="prioridade" name="prioridade" required>
            <option value="Alta">Alta</option>
            <option value="Média">Média</option>
            <option value="Baixa">Baixa</option> 
        </select><br><br>

        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" required><br><br>
        
        <label for="usuario">Usuário:</label>
        <select name="usu_codigo" id="usu_codigo" required>
            <option value=""></option>
            <?php
              
                $sqlusuarios = "SELECT * FROM tbl_usuarios ORDER BY usu_nome";
                $queryusuarios = mysqli_query($conn, $sqlusuarios);
                $resultu = mysqli_num_rows($queryusuarios); 

                if ($resultu > 0) {
                    while ($linhausuario = mysqli_fetch_array($queryusuarios)) {
                        
                        echo "<option value=\"" . $linhausuario['usu_codigo'] . "\">" . $linhausuario['usu_nome'] . "</option>";
                    }
                }
            ?>
        </select><br><br>

        <input type="submit" value="Cadastrar">
    </form>
    <br>
    <a href="index.php">Voltar para a Tela Principal</a>
</body>
</html>

<?php

$conn->close();
?>