<?php
header('Content-Type: application/json');

$server = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'aula_formulario';

$conn = new mysqli($server, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die(json_encode([
        "success" => false,
        "message" => "Erro ao conectar ao banco de dados"
    ]));
}

$cgm = $_GET['cgm'] ?? '';

if (empty($cgm)) {
    echo json_encode([
        "success" => false,
        "message" => "CGM não fornecido"
    ]);
    exit;
}

// Verificar se a coluna 'status' existe na tabela
$checkColumn = $conn->query("SHOW COLUMNS FROM alunos LIKE 'status'");

// Se a coluna não existir, criá-la
if ($checkColumn->num_rows == 0) {
    $alterTable = $conn->query("ALTER TABLE alunos ADD COLUMN status VARCHAR(20) DEFAULT 'ativo'");
    
    if (!$alterTable) {
        echo json_encode([
            "success" => false,
            "message" => "Erro ao criar coluna de status: " . $conn->error
        ]);
        exit;
    }
}

// Atualizar o status do aluno para inativo
$stmt = $conn->prepare("UPDATE alunos SET status = 'inativo' WHERE cgm = ?");
$stmt->bind_param("s", $cgm);

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Aluno inativado com sucesso"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Erro ao inativar aluno: " . $stmt->error
    ]);
}

$stmt->close();
$conn->close();
?>
