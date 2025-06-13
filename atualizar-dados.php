<?php
$server = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'aula_formulario';

$conn = new mysqli($server, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha ao conectar ao banco de dados: " . $conn->connect_error);
}

$smtp = $conn->prepare("UPDATE alunos SET codigo=?, nome=?, email=?, celular=?, serie=?, turma=?, cep=?, endereco=?, bairro=?, cidade=?, estado=? WHERE cgm=?");
$smtp->bind_param(
    "ssssssssssss", 
    $_GET['codigo'], 
    $_GET['nome'], 
    $_GET['email'], 
    $_GET['celular'], 
    $_GET['serie'], 
    $_GET['turma'], 
    $_GET['cep'], 
    $_GET['endereco'], 
    $_GET['bairro'], 
    $_GET['cidade'], 
    $_GET['estado'], 
    $_GET['cgm']
);

if ($smtp->execute()) {
    echo "<script>
        alert('✅ Dados atualizados com sucesso!');
        window.location.href='busca.php';
    </script>";
} else {
    echo "<script>
        alert('❌ Erro ao atualizar os dados: ".$smtp->error."');
        window.history.back();
    </script>";
}

$smtp->close();
$conn->close();
?>
