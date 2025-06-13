<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar Aluno - Biblioteca</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="navbar-brand">
      <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/barbosa-G02Bc5OAkzXQf7KvlRTFnxCFllVB04.png" alt="Logo Colégio Estadual Barbosa Ferraz">
      <h1>Biblioteca Escolar</h1>
    </div>
    <div class="navbar-nav">
      <a href="index.html" class="nav-link">
        <i class="fas fa-user-plus"></i> Cadastrar
      </a>
      <a href="busca.php" class="nav-link active">
        <i class="fas fa-search"></i> Buscar
      </a>
    </div>
  </nav>

  <!-- Container principal -->
  <div class="container">
    <div class="card fade-in">
      <div class="card-header">
        <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/barbosa-G02Bc5OAkzXQf7KvlRTFnxCFllVB04.png" alt="Logo Colégio">
        <h2 class="card-title">Buscar e Atualizar Aluno</h2>
      </div>
      <div class="card-body">
        <div class="search-container">
          <input type="text" id="cgm" class="form-control" placeholder="Digite o CGM do aluno (10 dígitos)" maxlength="10">
          <button type="button" id="buscarAluno" class="btn btn-primary">
            <i class="fas fa-search"></i> Buscar
          </button>
        </div>
        
        <form id="atualizarForm" action="atualizar-dados.php" method="GET">
          <div class="form-grid">
            <div class="form-group">
              <label for="codigo" class="form-label">Código do Aluno</label>
              <input type="text" name="codigo" id="codigo" class="form-control readonly" readonly>
            </div>
            
            <div class="form-group">
              <label for="cgmHidden" class="form-label">CGM</label>
              <input type="text" name="cgm" id="cgmHidden" class="form-control readonly" readonly>
            </div>
            
            <div class="form-group">
              <label for="nome" class="form-label">Nome Completo</label>
              <input type="text" name="nome" id="nome" class="form-control" required>
            </div>
            
            <div class="form-group">
              <label for="email" class="form-label">E-mail</label>
              <input type="email" name="email" id="email" class="form-control" required>
            </div>
            
            <div class="form-group">
              <label for="celular" class="form-label">Celular</label>
              <input type="text" name="celular" id="celular" class="form-control" maxlength="15" required>
            </div>
            
            <div class="form-group">
              <label for="serie" class="form-label">Série</label>
              <input type="text" name="serie" id="serie" class="form-control" required>
            </div>
            
            <div class="form-group">
              <label for="turma" class="form-label">Turma</label>
              <input type="text" name="turma" id="turma" class="form-control" required>
            </div>
            
            <div class="form-group">
              <label for="cep" class="form-label">CEP</label>
              <div class="d-flex gap-2">
                <input type="text" name="cep" id="cep" class="form-control" maxlength="9" required>
                <button type="button" id="buscarCep" class="btn btn-secondary btn-sm">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
            
            <div class="form-group">
              <label for="endereco" class="form-label">Endereço</label>
              <input type="text" name="endereco" id="endereco" class="form-control" required>
            </div>
            
            <div class="form-group">
              <label for="bairro" class="form-label">Bairro</label>
              <input type="text" name="bairro" id="bairro" class="form-control" required>
            </div>
            
            <div class="form-group">
              <label for="cidade" class="form-label">Cidade</label>
              <input type="text" name="cidade" id="cidade" class="form-control" required>
            </div>
            
            <div class="form-group">
              <label for="estado" class="form-label">Estado</label>
              <input type="text" name="estado" id="estado" class="form-control" required>
            </div>
          </div>
          
          <div class="d-flex justify-content-center gap-3 mt-4">
            <button type="submit" class="btn btn-primary" id="btnAtualizar" disabled>
              <i class="fas fa-save"></i> Atualizar Dados
            </button>
            <button type="button" class="btn btn-secondary" id="limparForm">
              <i class="fas fa-eraser"></i> Limpar Campos
            </button>
            <button type="button" class="btn btn-danger" id="inativarAluno" disabled>
              <i class="fas fa-user-slash"></i> Inativar Aluno
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer-content">
      <div>
        <div class="footer-logo">
          <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/barbosa-G02Bc5OAkzXQf7KvlRTFnxCFllVB04.png" alt="Logo Colégio">
          <h2>Biblioteca Escolar</h2>
        </div>
        <p>Sistema de cadastro e gerenciamento de alunos da biblioteca escolar.</p>
      </div>
      
      <div class="footer-links">
        <h3>Links Úteis</h3>
        <ul>
          <li><a href="index.html">Cadastrar Aluno</a></li>
          <li><a href="busca.php">Buscar Aluno</a></li>
        </ul>
      </div>
      
      <div class="footer-links">
        <h3>Contato</h3>
        <ul>
          <li><a href="mailto:contato@colegiobarbosa.edu.br">contato@colegiobarbosa.edu.br</a></li>
          <li><a href="tel:+554436531234">(44) 3653-1234</a></li>
        </ul>
      </div>
    </div>
    
    <div class="footer-bottom">
      <p>&copy; 2023 Colégio Estadual Barbosa Ferraz - Todos os direitos reservados</p>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="components/toast.js"></script>
  <script src="components/form-validator.js"></script>
  <script src="components/cep-service.js"></script>
  <script>
    // Função para converter códigos de curso para nomes completos
    function formatarCurso(codigo) {
      const cursos = {
        'A': 'A',
        'B': 'B',
        'C': 'C',
        'D': 'D',
        'E': 'E',
        'DS': 'Desenvolvimento de Sistemas',
        'FD': 'Formação de Docentes',
        'EST': 'Estética',
        'ADM': 'Administração',
        'ENF': 'Enfermagem'
      };
      
      return cursos[codigo] || codigo;
    }
    document.addEventListener("DOMContentLoaded", () => {
      // Inicializar validador de formulário
      const validator = new FormValidator(document.getElementById('atualizarForm'));
      
      // Buscar aluno
      document.getElementById('buscarAluno').addEventListener('click', async () => {
        const cgmInput = document.getElementById('cgm');
        const cgm = cgmInput.value.trim();
        
        if (cgm.length !== 10) {
          toast.show('Insira um CGM válido com 10 dígitos!', 'error');
          return;
        }
        
        try {
          const response = await fetch(`buscar-dados.php?cgm=${cgm}`);
          const data = await response.json();
          
          if (data.erro) {
            toast.show('Aluno não encontrado!', 'error');
            return;
          }
          
          // Preencher formulário com dados do aluno
          document.getElementById('codigo').value = data.codigo || "";
          document.getElementById('cgmHidden').value = data.cgm || "";
          document.getElementById('nome').value = data.nome || "";
          document.getElementById('email').value = data.email || "";
          document.getElementById('celular').value = data.celular || "";
          document.getElementById('serie').value = data.serie || "";
          document.getElementById('turma').value = formatarCurso(data.turma) || "";
          document.getElementById('cep').value = data.cep || "";
          document.getElementById('endereco').value = data.endereco || "";
          document.getElementById('bairro').value = data.bairro || "";
          document.getElementById('cidade').value = data.cidade || "";
          document.getElementById('estado').value = data.estado || "";
          
          // Habilitar botões
          document.getElementById('btnAtualizar').disabled = false;
          document.getElementById('inativarAluno').disabled = false;
          
          toast.show('Dados do aluno carregados com sucesso!', 'success');
        } catch (error) {
          toast.show('Erro ao buscar aluno. Tente novamente.', 'error');
        }
      });
      
      // Buscar CEP
      document.getElementById('buscarCep').addEventListener('click', async () => {
        const cepInput = document.getElementById('cep');
        const cep = cepInput.value;
        
        try {
          const endereco = await CEPService.buscarEndereco(cep);
          
          document.getElementById('endereco').value = endereco.logradouro;
          document.getElementById('bairro').value = endereco.bairro;
          document.getElementById('cidade').value = endereco.cidade;
          document.getElementById('estado').value = endereco.estado;
          
          toast.show('Endereço preenchido automaticamente!', 'success');
        } catch (error) {
          toast.show(error.message, 'error');
        }
      });

      // Limpar formulário
      document.getElementById('limparForm').addEventListener('click', () => {
        document.getElementById('atualizarForm').reset();
        document.getElementById('btnAtualizar').disabled = true;
        document.getElementById('inativarAluno').disabled = true;
        toast.show('Campos limpos com sucesso!', 'success');
      });

      // Inativar aluno
      document.getElementById('inativarAluno').addEventListener('click', async () => {
        const cgm = document.getElementById('cgmHidden').value;
        
        if (!cgm) {
          toast.show('Nenhum aluno selecionado!', 'error');
          return;
        }
        
        if (confirm('Tem certeza que deseja inativar este aluno?')) {
          try {
            const response = await fetch(`inativar-aluno.php?cgm=${cgm}`);
            const data = await response.json();
            
            if (data.success) {
              toast.show('Aluno inativado com sucesso!', 'success');
              document.getElementById('atualizarForm').reset();
              document.getElementById('btnAtualizar').disabled = true;
              document.getElementById('inativarAluno').disabled = true;
            } else {
              toast.show(data.message || 'Erro ao inativar aluno!', 'error');
            }
          } catch (error) {
            toast.show('Erro ao inativar aluno. Tente novamente.', 'error');
          }
        }
      });
    });
  </script>
</body>
</html>
