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

// Verifica se o código da tarefa foi passado na URL
if (isset($_GET['tar_codigo'])) {
    $tar_codigo = $_GET['tar_codigo'];

    // Consulta para buscar os dados da tarefa
    $sql = "SELECT * FROM tbl_tarefas WHERE tar_codigo = $tar_codigo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $tarefa = $result->fetch_assoc();
    } else {
        echo "Tarefa não encontrada.";
        exit;
    }
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tar_codigo = $_POST['tar_codigo'];
    $tar_setor = $_POST['setor'];
    $tar_prioridade = $_POST['prioridade'];
    $tar_descricao = $_POST['descricao'];
    $tar_status = $_POST['status'];

    // Atualiza os dados da tarefa
    $sql = "UPDATE tbl_tarefas SET tar_setor = '$tar_setor', tar_prioridade = '$tar_prioridade', tar_descricao = '$tar_descricao', tar_status = '$tar_status' WHERE tar_codigo = $tar_codigo";

    if ($conn->query($sql) === TRUE) {
        // Redireciona para a página de gerenciamento de tarefas após atualização
        header("Location: gerenciar_tarefas.php");
        exit(); // Evita que o restante do código seja executado
    } else {
        echo "Erro ao atualizar tarefa: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarefa</title>
</head>
<body>
    <h1>Editar Tarefa</h1>
    <form method="POST" action="editar_tarefa.php">
        <input type="hidden" name="tar_codigo" value="<?php echo $tarefa['tar_codigo']; ?>">
        <label for="setor">Setor:</label>
        <input type="text" id="setor" name="setor" value="<?php echo $tarefa['tar_setor']; ?>" required><br><br>

        <label for="prioridade">Prioridade:</label>
        <input type="text" id="prioridade" name="prioridade" value="<?php echo $tarefa['tar_prioridade']; ?>" required><br><br>

        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" value="<?php echo $tarefa['tar_descricao']; ?>" required><br><br>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="a fazer" <?php echo ($tarefa['tar_status'] == 'a fazer') ? 'selected' : ''; ?>>A fazer</option>
            <option value="fazendo" <?php echo ($tarefa['tar_status'] == 'fazendo') ? 'selected' : ''; ?>>Fazendo</option>
            <option value="concluido" <?php echo ($tarefa['tar_status'] == 'concluido') ? 'selected' : ''; ?>>Concluído</option> 
        </select><br><br>
        
        <input type="submit" value="Atualizar">
    </form>
    <br>
    <a href="gerenciar_tarefas.php">Voltar para Gerenciar Tarefas</a>
</body>
</html>

















