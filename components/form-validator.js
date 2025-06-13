class FormValidator {
  constructor(form) {
    this.form = form
    this.errors = {}
    this.setupEventListeners()
  }

  setupEventListeners() {
    // Validar email quando o campo perder o foco
    const emailField = this.form.querySelector("#email")
    if (emailField) {
      emailField.addEventListener("blur", (e) => this.validateEmail(e.target))
    }

    // Validar celular quando o campo perder o foco
    const celularField = this.form.querySelector("#celular")
    if (celularField) {
      celularField.addEventListener("input", (e) => this.formatCelular(e.target))
      celularField.addEventListener("blur", (e) => this.validateCelular(e.target))
    }

    // Validar CGM quando o campo perder o foco
    const cgmField = this.form.querySelector("#cgm")
    if (cgmField) {
      cgmField.addEventListener("input", (e) => this.allowOnlyNumbers(e))
      cgmField.addEventListener("blur", (e) => this.validateCGM(e.target))
    }

    // Validar CEP quando o campo perder o foco
    const cepField = this.form.querySelector("#cep")
    if (cepField) {
      cepField.addEventListener("input", (e) => this.formatCEP(e.target))
      cepField.addEventListener("blur", (e) => this.validateCEP(e.target))
    }

    // Validar formulário no envio
    this.form.addEventListener("submit", (e) => {
      if (!this.validateForm()) {
        e.preventDefault()
      }
    })
  }

  validateEmail(field) {
    const value = field.value.trim()
    const errorElement = this.getErrorElement(field)

    if (!value) {
      this.setError(field, "O e-mail é obrigatório", errorElement)
      return false
    }

    if (!value.includes("@") || !value.includes(".")) {
      this.setError(field, "Digite um e-mail válido", errorElement)
      return false
    }

    this.clearError(field, errorElement)
    return true
  }

  validateCelular(field) {
    const value = field.value.replace(/\D/g, "")
    const errorElement = this.getErrorElement(field)

    if (!value) {
      this.setError(field, "O celular é obrigatório", errorElement)
      return false
    }

    if (value.length !== 11) {
      this.setError(field, "O celular deve ter 11 dígitos", errorElement)
      return false
    }

    this.clearError(field, errorElement)
    return true
  }

  validateCGM(field) {
    const value = field.value.trim()
    const errorElement = this.getErrorElement(field)

    if (!value) {
      this.setError(field, "O CGM é obrigatório", errorElement)
      return false
    }

    if (value.length !== 10) {
      this.setError(field, "O CGM deve ter 10 dígitos", errorElement)
      return false
    }

    this.clearError(field, errorElement)
    return true
  }

  validateCEP(field) {
    const value = field.value.replace(/\D/g, "")
    const errorElement = this.getErrorElement(field)

    if (!value) {
      this.setError(field, "O CEP é obrigatório", errorElement)
      return false
    }

    if (value.length !== 8) {
      this.setError(field, "O CEP deve ter 8 dígitos", errorElement)
      return false
    }

    this.clearError(field, errorElement)
    return true
  }

  formatCelular(field) {
    let value = field.value.replace(/\D/g, "")

    if (value.length > 0) {
      value = `(${value.substring(0, 2)}${value.length > 2 ? ") " : ""}${value.substring(2, 7)}${value.length > 7 ? "-" : ""}${value.substring(7, 11)}`
    }

    field.value = value
  }

  formatCEP(field) {
    let value = field.value.replace(/\D/g, "")

    if (value.length > 5) {
      value = `${value.substring(0, 5)}-${value.substring(5, 8)}`
    }

    field.value = value
  }

  allowOnlyNumbers(event) {
    if (
      !/[0-9]/.test(event.key) &&
      event.key !== "Backspace" &&
      event.key !== "Tab" &&
      event.key !== "ArrowLeft" &&
      event.key !== "ArrowRight"
    ) {
      event.preventDefault()
    }
  }

  getErrorElement(field) {
    let errorElement = field.nextElementSibling

    if (!errorElement || !errorElement.classList.contains("form-error")) {
      errorElement = document.createElement("div")
      errorElement.className = "form-error"
      field.parentNode.insertBefore(errorElement, field.nextSibling)
    }

    return errorElement
  }

  setError(field, message, errorElement) {
    field.classList.add("error")
    errorElement.textContent = message
    this.errors[field.id] = message
  }

  clearError(field, errorElement) {
    field.classList.remove("error")
    errorElement.textContent = ""
    delete this.errors[field.id]
  }

  validateForm() {
    const requiredFields = this.form.querySelectorAll("[required]")
    let isValid = true

    requiredFields.forEach((field) => {
      if (!field.value.trim()) {
        const errorElement = this.getErrorElement(field)
        this.setError(field, `O campo ${field.previousElementSibling.textContent} é obrigatório`, errorElement)
        isValid = false
      } else if (field.id === "email") {
        isValid = this.validateEmail(field) && isValid
      } else if (field.id === "celular") {
        isValid = this.validateCelular(field) && isValid
      } else if (field.id === "cgm") {
        isValid = this.validateCGM(field) && isValid
      } else if (field.id === "cep") {
        isValid = this.validateCEP(field) && isValid
      }
    })

    return isValid
  }
}
