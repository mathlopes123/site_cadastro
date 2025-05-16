CREATE DATABASE escola;

USE escola;

CREATE TABLE alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,                -- Identificador único do aluno
    codigo_requisicao VARCHAR(50) NOT NULL,            -- Código gerado para a requisição
    cgm INT NOT NULL,                                  -- Número do CGM
    nome VARCHAR(255) NOT NULL,                        -- Nome do aluno
    email VARCHAR(255) NOT NULL,                       -- E-mail do aluno
    telefone VARCHAR(20),                              -- Telefone do aluno
    serie VARCHAR(50),                                 -- Série do aluno
    turma VARCHAR(50),                                 -- Turma do aluno
    cep VARCHAR(10),                                   -- CEP do aluno
    endereco VARCHAR(255),                             -- Endereço do aluno
    bairro VARCHAR(100),                               -- Bairro do aluno
    cidade VARCHAR(100),                               -- Cidade do aluno
    estado VARCHAR(2),                                 -- Estado do aluno (2 caracteres, ex: SP)
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- Data de cadastro (automático)
);
