class Toast {
  constructor() {
    this.container = null
    this.init()
  }

  init() {
    if (!document.querySelector(".toast-container")) {
      this.container = document.createElement("div")
      this.container.className = "toast-container"
      document.body.appendChild(this.container)
    } else {
      this.container = document.querySelector(".toast-container")
    }
  }

  show(message, type = "success", duration = 3000) {
    const toast = document.createElement("div")
    toast.className = `toast toast-${type}`
    toast.innerHTML = `
      <span>${type === "success" ? "✅" : "❌"}</span>
      <span>${message}</span>
    `

    this.container.appendChild(toast)

    setTimeout(() => {
      toast.style.opacity = "0"
      toast.style.transform = "translateX(100%)"
      setTimeout(() => {
        this.container.removeChild(toast)
      }, 300)
    }, duration)
  }
}

// Exportar uma instância única
const toast = new Toast()
