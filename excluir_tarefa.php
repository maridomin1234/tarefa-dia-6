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

// Verifica se o código da tarefa foi passado na URL e é numérico
if (isset($_GET['tar_codigo']) && is_numeric($_GET['tar_codigo'])) {
    $tar_codigo = $_GET['tar_codigo'];  // Pegando o código da tarefa

    // Verificando se existe o parâmetro id para excluir
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        if (!empty($id)) {
            
            include("conecta.php");

           
            $sqlexc = "DELETE FROM tbl_tarefas WHERE tar_codigo = '$tar_codigo'";
            $queryexc = mysqli_query($conn, $sqlexc);

            if ($queryexc) {
                
                header("Location: gerenciar_tarefas.php"); 
                exit();  
            } else {
                echo "Erro ao excluir a tarefa: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Código da tarefa não fornecido ou inválido.";
    }
} else {
    echo "Código da tarefa não fornecido ou inválido.";
}

$conn->close();
?>