<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Atualizar Cadastro de Aluno</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div style="background-color: #333; padding: 10px; text-align: center; border-radius: 5px; display: flex; justify-content: center; gap: 20px; position: fixed; top: 0; width: 100%;">
  <a href="index.html" style="color: white; text-decoration: none; font-size: 16px; padding: 8px 12px; background-color: #555; border-radius: 5px;">📚 Cadastrar Aluno</a>
  <a href="busca.php" style="color: white; text-decoration: none; font-size: 16px; padding: 8px 12px; background-color: #555; border-radius: 5px;">🔍 Buscar Aluno</a>
</div>

<div class="container">
  <table class="topo">
    <tr>
      <td><img src="img/barbosa.png" alt=""></td>
      <td class="cada"><h2>Buscar Aluno 📖</h2></td>
    </tr>
  </table>

  <form action="atualizar-dados.php" method="GET">
    <table>
      <tr>
  <td><label for="cgm">CGM</label></td>
  <td>
    <div class="cgm-container">
      <input type="text" name="cgm" id="cgm" maxlength="10" style="width: 250px; font-size: 18px;" required>
      <button type="button" onclick="buscarAluno()">🔍 Buscar</button>
    </div>
  </td>
</tr>
      <tr>
        <td><label for="codigo">Código do Aluno</label></td>
        <td><input name="codigo" id="codigo" readonly></td>
      </tr>
      <tr>
        <td><label for="nome">Nome</label></td>
        <td><input name="nome" id="nome" required></td>
      </tr>
      <tr>
        <td><label for="email">E-mail</label></td>
        <td><input name="email" id="email" required></td>
      </tr>
      <tr>
        <td><label for="celular">Celular</label></td>
        <td><input name="celular" id="celular" maxlength="14" required></td>
      </tr>
      <tr>
        <td><label for="serie">Série</label></td>
        <td><input name="serie" id="serie" required></td>
      </tr>
      <tr>
        <td><label for="turma">Turma</label></td>
        <td><input name="turma" id="turma" required></td>
      </tr>
      <tr>
        <td><label for="cep">CEP</label></td>
        <td><input type="text" name="cep" id="cep" maxlength="9" required></td>
      </tr>
      <tr>
        <td><label for="endereco">Endereço</label></td>
        <td><input name="endereco" type="text" id="endereco" required></td>
      </tr>
      <tr>
        <td><label for="bairro">Bairro</label></td>
        <td><input name="bairro" type="text" id="bairro" required></td>
      </tr>
      <tr>
        <td><label for="cidade">Cidade</label></td>
        <td><input name="cidade" type="text" id="cidade" required></td>
      </tr>
      <tr>
        <td><label for="estado">Estado</label></td>
        <td><input name="estado" type="text" id="estado" required></td>
      </tr>
    </table>
    <div class="botao-container">
      <button type="submit">💾 Atualizar</button>
    </div>
  </form>
</div>

<script>
async function buscarAluno() {
  const cgm = document.getElementById("cgm").value.trim();
  if (cgm.length !== 10) {
    alert("❌ Insira um CGM válido!");
    return;
  }

  try {
    const response = await fetch(`buscar-dados.php?cgm=${cgm}`);
    const data = await response.json();

    if (data.erro) {
      alert("❌ Aluno não encontrado!");
      return;
    }

    document.getElementById("codigo").value = data.codigo || "";
    document.getElementById("nome").value = data.nome || "";
    document.getElementById("email").value = data.email || "";
    document.getElementById("celular").value = data.celular || "";
    document.getElementById("serie").value = data.serie || "";
    document.getElementById("turma").value = data.turma || "";
    document.getElementById("cep").value = data.cep || "";
    document.getElementById("endereco").value = data.endereco || "";
    document.getElementById("bairro").value = data.bairro || "";
    document.getElementById("cidade").value = data.cidade || "";
    document.getElementById("estado").value = data.estado || "";
  } catch (error) {
    alert("❌ Erro ao buscar aluno. Tente novamente.");
  }
}
</script>

</body>
</html>
