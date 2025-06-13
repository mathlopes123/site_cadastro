class CEPService {
  static async buscarEndereco(cep) {
    try {
      const cepLimpo = cep.replace(/\D/g, "")

      if (cepLimpo.length !== 8) {
        throw new Error("CEP inválido! Insira um CEP com 8 números.")
      }

      const response = await fetch(`https://viacep.com.br/ws/${cepLimpo}/json/`)
      const data = await response.json()

      if (data.erro) {
        throw new Error("CEP não encontrado!")
      }

      return {
        logradouro: data.logradouro || "",
        bairro: data.bairro || "",
        cidade: data.localidade || "",
        estado: data.uf || "",
      }
    } catch (error) {
      throw error
    }
  }
}
