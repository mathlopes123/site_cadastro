document.addEventListener("DOMContentLoaded", gerarCodigoAluno);

function gerarCodigoAluno() {
  const codigo = Math.floor(Math.random() * 1000000000);
  document.getElementById("codigo").value = codigo;
}

function validarCGM(event) {
  let cgm = event.target.value.replace(/\D/g, "");
  if (cgm.length > 10) cgm = cgm.slice(0, 10);
  event.target.value = cgm;
}

function validarEmail(event) {
  const email = event.target.value;
  if (!email.includes("@")) {
    exibirPopup("❌ O e-mail deve conter '@' obrigatoriamente.");
    return false;
  }
  exibirPopup("✅ E-mail válido!");
  return true;
}

function formatarCelular(event) {
  let v = event.target.value.replace(/\D/g, ""); // Remove tudo que não for número
  if (v.length > 12) v = v.slice(0, 12); // Limita a exatamente 12 dígitos
  
  // Aplica a máscara correta (XX)XXXXX-XXXX
  if (v.length >= 2 && v.length <= 7) {
    v = `(${v.slice(0,2)})${v.slice(2)}`;
  } else if (v.length > 7) {
    v = `(${v.slice(0,2)})${v.slice(2,7)}-${v.slice(7)}`;
  }
  
  event.target.value = v;

  if (v.length !== 15) { // 15 porque inclui os parênteses e hífen
    exibirPopup("❌ O celular deve ter exatamente 12 números, no formato correto: (XX)XXXXX-XXXX.");
    return false;
  }
  
  exibirPopup("✅ Celular válido!");
  return true;
}

function validarFormulario(event) {
  event.preventDefault();

  const cgm = document.getElementById("cgm").value;
  const email = document.getElementById("email").value;
  const celular = document.getElementById("celular").value;

  if (cgm.length !== 10) {
    exibirPopup("❌ O CGM deve conter exatamente 10 números.");
    return false;
  }

  if (!email.includes("@")) {
    exibirPopup("❌ O e-mail deve conter '@' obrigatoriamente.");
    return false;
  }

  if (!/^\(\d{2}\)\d{5}-\d{4}$/.test(celular)) {
    exibirPopup("❌ O celular deve estar no formato correto.");
    return false;
  }

  exibirPopup("✅ Cadastro realizado com sucesso!", true);
  return true;
}

function exibirPopup(mensagem, sucesso = false) {
  const popup = document.createElement("div");
  popup.classList.add("popup");
  if (sucesso) popup.classList.add("sucesso");
  popup.innerHTML = mensagem;

  document.body.appendChild(popup);
  
  setTimeout(() => {
    popup.remove();
  }, 3000);
}

async function buscarEndereco() {
  const cep = document.getElementById("cep").value.replace(/\D/g, "");
  if (cep.length !== 8) return;

  try {
    const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
    if (!response.ok) throw new Error("Erro na requisição");

    const data = await response.json();

    if (data.erro) {
      exibirPopup("❌ CEP inválido!");
      return;
    }

    document.getElementById("endereco").value = data.logradouro || "";
    document.getElementById("bairro").value = data.bairro || "";
    document.getElementById("cidade").innerHTML = `<option>${data.localidade}</option>`;
    document.getElementById("estado").innerHTML = `<option>${data.uf}</option>`;
    exibirPopup("✅ Endereço carregado com sucesso!", true);
  } catch (error) {
    exibirPopup("❌ Erro ao buscar o endereço. Tente novamente.");
  }
}

document.querySelector("form").addEventListener("submit", validarFormulario);
document.getElementById("email").addEventListener("input", validarEmail);
document.getElementById("celular").addEventListener("input", formatarCelular);
document.getElementById("cep").addEventListener("input", buscarEndereco);
