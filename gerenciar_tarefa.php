<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "db_tarefa";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


$sql = "SELECT * FROM tbl_tarefas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Tarefas</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Gerenciar Tarefas</h1>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Setor</th>
                <th>Prioridade</th>
                <th>Descrição</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['tar_codigo'] . "</td>";
                    echo "<td>" . $row['tar_setor'] . "</td>";
                    echo "<td>" . $row['tar_prioridade'] . "</td>";
                    echo "<td>" . $row['tar_descricao'] . "</td>";
                    echo "<td>" . $row['tar_status'] . "</td>";
                    echo "<td>
                            <a href='editar_tarefa.php?tar_codigo=" . $row['tar_codigo'] . "'>Editar</a> |
                            <a href='excluir_tarefa.php?tar_codigo=" . $row['tar_codigo'] . "' onclick='return confirm(\"Tem certeza que deseja excluir esta tarefa?\")'>Excluir</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhuma tarefa encontrada.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <a href="index.php">Voltar para a Tela Principal</a>
</body>
</html>

<?php

$conn->close();
?>