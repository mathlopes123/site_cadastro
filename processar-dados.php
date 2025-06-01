<?php

$codigo = $_POST['codigo'];
$cgm = $_POST['cgm'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$serie = $_POST['serie'];
$turma = $_POST['turma'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

$server = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'aula_formulario';


$conn = new mysqli($server, $usuario, $senha, $banco);

if($conn->connect_error){
    die("Falha ao se comunicar com banco de dados: ".$conn->connect_error);
}
 
$smtp = $conn->prepare("INSERT INTO alunos (codigo, cgm, nome, email, celular, serie, turma, cep, endereco, bairro, cidade, estado) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
$smtp->bind_param("ssssssssssss",$codigo, $cgm, $nome, $email, $celular, $serie, $turma, $cep, $endereco, $bairro, $cidade, $estado);

if ($smtp->execute()) {
    echo "Cadastrado";
    # code...
}else {
    echo "Erro no envio dos dados: ".$smtp->error;
}

$smtp->close();
$conn->close();

?>