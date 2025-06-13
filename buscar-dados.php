<?php
header('Content-Type: application/json');

$server = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'aula_formulario';

$conn = new mysqli($server, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die(json_encode(["erro" => "Erro ao conectar ao banco"]));
}

$cgm = $_GET['cgm'] ?? '';

// Verificar se a coluna 'status' existe na tabela
$checkColumn = $conn->query("SHOW COLUMNS FROM alunos LIKE 'status'");

if ($checkColumn->num_rows > 0) {
    // Se a coluna existir, buscar apenas alunos ativos ou sem status definido
    $stmt = $conn->prepare("SELECT * FROM alunos WHERE cgm = ? AND (status = 'ativo' OR status IS NULL)");
} else {
    // Se a coluna não existir, buscar todos os alunos
    $stmt = $conn->prepare("SELECT * FROM alunos WHERE cgm = ?");
}

$stmt->bind_param("s", $cgm);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode(["erro" => "Aluno não encontrado"]);
}

$stmt->close();
$conn->close();
?>
