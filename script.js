/**
 * Rexo Agency - Interactive JavaScript
 * Scroll animations, ROI Calculator, Chatbot, and more
 */

document.addEventListener("DOMContentLoaded", () => {
  // Initialize all components
  initScrollAnimations()
  initLiveTicker()
  initROICalculator()
  initChatbot()
  initNavbar()
  initCounters()
  initFormValidation()
  initFilterTabs()
})

/**
 * Scroll Animations - Fade in elements as they enter viewport
 */
function initScrollAnimations() {
  const animatedElements = document.querySelectorAll(".fade-in, .slide-in-left, .slide-in-right, .scale-in")

  if (!("IntersectionObserver" in window)) {
    animatedElements.forEach((el) => el.classList.add("visible"))
    return
  }

  const observerOptions = {
    root: null,
    rootMargin: "0px",
    threshold: 0.1,
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("visible")
        observer.unobserve(entry.target)
      }
    })
  }, observerOptions)

  animatedElements.forEach((el) => observer.observe(el))
}

/**
 * Live Ticker - Continuous scrolling animation
 */
function initLiveTicker() {
  const ticker = document.querySelector(".ticker-wrapper")
  if (ticker) {
    // Clone ticker items for seamless loop
    const tickerContent = ticker.innerHTML
    ticker.innerHTML = tickerContent + tickerContent
  }
}

/**
 * ROI Calculator
 */
function initROICalculator() {
  const calcForm = document.getElementById("roi-calculator-form")
  const budgetInput = document.getElementById("calc-budget")
  const platformSelect = document.getElementById("calc-platform")
  const campaignType = document.getElementById("calc-type")
  const calculateBtn = document.getElementById("calc-btn")

  if (calculateBtn) {
    calculateBtn.addEventListener("click", () => {
      calculateROI()
    })
  }
  // Also calculate on input change
  ;[budgetInput, platformSelect, campaignType].forEach((el) => {
    if (el) {
      el.addEventListener("change", calculateROI)
    }
  })
}

function calculateROI() {
  const budget = Number.parseFloat(document.getElementById("calc-budget")?.value) || 0
  const platform = document.getElementById("calc-platform")?.value || "instagram"
  const type = document.getElementById("calc-type")?.value || "awareness"

  if (budget < 50000) {
    alert("Minimum budget is ₹50,000")
    return
  }

  // Platform multipliers
  const platformMultipliers = {
    instagram: { reach: 150, engagement: 3.5, cpm: 80 },
    youtube: { reach: 100, engagement: 5, cpm: 120 },
    twitter: { reach: 200, engagement: 2, cpm: 60 },
    all: { reach: 180, engagement: 4, cpm: 90 },
  }

  // Campaign type multipliers
  const typeMultipliers = {
    awareness: { reachBoost: 1.5, engBoost: 0.8 },
    engagement: { reachBoost: 1, engBoost: 1.5 },
    conversion: { reachBoost: 0.8, engBoost: 1.2 },
    ugc: { reachBoost: 1.2, engBoost: 1.3 },
  }

  const pm = platformMultipliers[platform] || platformMultipliers["instagram"]
  const tm = typeMultipliers[type] || typeMultipliers["awareness"]

  // Calculate metrics
  const estimatedReach = Math.round((budget / pm.cpm) * 1000 * pm.reach * tm.reachBoost)
  const estimatedEngagement = pm.engagement * tm.engBoost
  const estimatedViews = Math.round(estimatedReach * 0.6)
  const estimatedConversions = Math.round(estimatedReach * 0.002)
  const estimatedROI = Math.round(((estimatedConversions * 500) / budget) * 100)

  // Update results
  updateCalcResult("result-reach", formatNumber(estimatedReach))
  updateCalcResult("result-engagement", estimatedEngagement.toFixed(1) + "%")
  updateCalcResult("result-views", formatNumber(estimatedViews))
  updateCalcResult("result-roi", estimatedROI + "%")

  // Show results section
  const resultsSection = document.querySelector(".calc-results")
  if (resultsSection) {
    resultsSection.style.display = "block"
  }
}

function updateCalcResult(id, value) {
  const element = document.getElementById(id)
  if (element) {
    element.textContent = value
    element.classList.add("updated")
    setTimeout(() => element.classList.remove("updated"), 500)
  }
}

function formatNumber(num) {
  if (num >= 1000000000) {
    return (num / 1000000000).toFixed(1) + "B"
  } else if (num >= 1000000) {
    return (num / 1000000).toFixed(1) + "M"
  } else if (num >= 1000) {
    return (num / 1000).toFixed(1) + "K"
  }
  return num.toLocaleString()
}

/**
 * Chatbot Functionality
 */
function initChatbot() {
  const trigger = document.querySelector(".chatbot-trigger")
  const panel = document.querySelector(".chatbot-panel")
  const closeBtn = document.querySelector(".chatbot-close")
  const sendBtn = document.querySelector(".chatbot-send")
  const input = document.querySelector(".chatbot-input")
  const body = document.querySelector(".chatbot-body")

  if (!trigger || !panel) return

  trigger.addEventListener("click", () => {
    panel.classList.toggle("active")
    if (panel.classList.contains("active") && body && body.children.length === 0) {
      addBotMessage("Hi there! 👋 I'm Rexo Bot. How can I help you today?")
      addQuickReplies(["Tell me about services", "Pricing information", "Talk to a human"])
    }
  })

  if (closeBtn) {
    closeBtn.addEventListener("click", () => {
      panel.classList.remove("active")
    })
  }

  if (sendBtn && input) {
    sendBtn.addEventListener("click", () => sendMessage())
    input.addEventListener("keypress", (e) => {
      if (e.key === "Enter") sendMessage()
    })
  }
}

function sendMessage() {
  const input = document.querySelector(".chatbot-input")
  const message = input?.value?.trim()

  if (!message) return

  addUserMessage(message)
  input.value = ""

  // Process message
  setTimeout(() => {
    processUserMessage(message)
  }, 500)
}

function addBotMessage(text) {
  const body = document.querySelector(".chatbot-body")
  if (!body) return

  const div = document.createElement("div")
  div.className = "chat-message bot"
  div.innerHTML = `<div class="message-content">${text}</div>`
  body.appendChild(div)
  body.scrollTop = body.scrollHeight
}

function addUserMessage(text) {
  const body = document.querySelector(".chatbot-body")
  if (!body) return

  const div = document.createElement("div")
  div.className = "chat-message user"
  div.innerHTML = `<div class="message-content">${text}</div>`
  body.appendChild(div)
  body.scrollTop = body.scrollHeight
}

function addQuickReplies(replies) {
  const body = document.querySelector(".chatbot-body")
  if (!body) return

  const div = document.createElement("div")
  div.className = "quick-replies"
  div.style.display = "flex"
  div.style.flexWrap = "wrap"
  div.style.gap = "8px"
  div.style.marginTop = "10px"

  replies.forEach((reply) => {
    const btn = document.createElement("button")
    btn.textContent = reply
    btn.style.cssText =
      "padding: 8px 15px; border: 2px solid #1a1a1a; background: #FFD700; font-size: 0.85rem; cursor: pointer;"
    btn.addEventListener("click", () => {
      addUserMessage(reply)
      div.remove()
      setTimeout(() => processUserMessage(reply), 500)
    })
    div.appendChild(btn)
  })

  body.appendChild(div)
}

function processUserMessage(message) {
  const lowerMessage = message.toLowerCase()

  if (lowerMessage.includes("service") || lowerMessage.includes("offer")) {
    addBotMessage(
      "We offer comprehensive influencer marketing services including: Instagram/YouTube Marketing, Meme Marketing, UGC Production, Gaming User Acquisition (CPI/CPA), CGI Ads, and AI-Driven Analytics. Would you like details on any specific service?",
    )
  } else if (lowerMessage.includes("price") || lowerMessage.includes("cost") || lowerMessage.includes("budget")) {
    addBotMessage(
      "Our campaigns start from ₹50,000 for micro-influencer campaigns and can go up based on your goals. For a custom quote, I recommend filling out our service request form or talking to our team directly.",
    )
    addQuickReplies(["Request a quote", "See case studies"])
  } else if (lowerMessage.includes("human") || lowerMessage.includes("talk") || lowerMessage.includes("contact")) {
    addBotMessage(
      "You can reach our team at hello@rexoagency.com or call us at +91 98765 43210. You can also use the WhatsApp button on this page for instant support! 📱",
    )
  } else if (lowerMessage.includes("case") || lowerMessage.includes("example") || lowerMessage.includes("portfolio")) {
    addBotMessage(
      "We've delivered amazing results! Our recent Gaming App Launch campaign generated 500M+ views and 12.5M app installs with a 60% reduction in CPI. Check our homepage for the full case study!",
    )
  } else {
    addBotMessage("Thanks for your message! For specific inquiries, our team would love to help. Would you like to:")
    addQuickReplies(["Request a callback", "See our services", "View pricing"])
  }
}

/**
 * Navbar Scroll Effect
 */
function initNavbar() {
  const navbar = document.querySelector(".navbar-brutal")
  if (!navbar) return

  let lastScroll = 0

  window.addEventListener("scroll", () => {
    const currentScroll = window.pageYOffset

    if (currentScroll > 100) {
      navbar.style.boxShadow = "0 5px 0 #1a1a1a"
    } else {
      navbar.style.boxShadow = "none"
    }

    lastScroll = currentScroll
  })
}

/**
 * Animated Counters
 */
function initCounters() {
  const counters = document.querySelectorAll(".counter-value")

  if (!("IntersectionObserver" in window)) {
    counters.forEach((counter) => animateCounter(counter))
    return
  }

  const observerOptions = {
    root: null,
    rootMargin: "0px",
    threshold: 0.5,
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        animateCounter(entry.target)
        observer.unobserve(entry.target)
      }
    })
  }, observerOptions)

  counters.forEach((counter) => observer.observe(counter))
}

function animateCounter(element) {
  const target = Number.parseInt(element.getAttribute("data-target")) || 0
  const suffix = element.getAttribute("data-suffix") || ""
  const duration = 2000
  const step = target / (duration / 16)
  let current = 0

  const timer = setInterval(() => {
    current += step
    if (current >= target) {
      element.textContent = formatCounterValue(target) + suffix
      clearInterval(timer)
    } else {
      element.textContent = formatCounterValue(Math.floor(current)) + suffix
    }
  }, 16)
}

function formatCounterValue(num) {
  if (num >= 1000000) {
    return (num / 1000000).toFixed(0) + "M"
  } else if (num >= 1000) {
    return (num / 1000).toFixed(0) + "K"
  }
  return num.toString()
}

/**
 * Form Validation
 */
function initFormValidation() {
  const forms = document.querySelectorAll("form[data-validate]")

  forms.forEach((form) => {
    form.addEventListener("submit", (e) => {
      let isValid = true
      const inputs = form.querySelectorAll("[required]")

      inputs.forEach((input) => {
        if (!validateInput(input)) {
          isValid = false
        }
      })

      if (!isValid) {
        e.preventDefault()
      }
    })

    // Real-time validation
    const inputs = form.querySelectorAll("input, select, textarea")
    inputs.forEach((input) => {
      input.addEventListener("blur", () => validateInput(input))
      input.addEventListener("input", () => {
        if (input.classList.contains("is-invalid")) {
          validateInput(input)
        }
      })
    })
  })
}

function validateInput(input) {
  const value = input.value.trim()
  const type = input.type
  let isValid = true
  let errorMessage = ""

  // Remove existing error
  const existingError = input.parentNode.querySelector(".form-error")
  if (existingError) existingError.remove()
  input.classList.remove("is-invalid")

  // Required check
  if (input.hasAttribute("required") && !value) {
    isValid = false
    errorMessage = "This field is required"
  }

  // Email validation
  if (isValid && type === "email" && value) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    if (!emailRegex.test(value)) {
      isValid = false
      errorMessage = "Please enter a valid email address"
    }
  }

  // Phone validation
  if (isValid && type === "tel" && value) {
    const phoneRegex = /^[0-9]{10}$/
    if (!phoneRegex.test(value.replace(/\D/g, ""))) {
      isValid = false
      errorMessage = "Please enter a valid 10-digit phone number"
    }
  }

  // Min length
  if (isValid && input.hasAttribute("minlength")) {
    const minLength = Number.parseInt(input.getAttribute("minlength"))
    if (value.length < minLength) {
      isValid = false
      errorMessage = `Minimum ${minLength} characters required`
    }
  }

  // Show error
  if (!isValid) {
    input.classList.add("is-invalid")
    const errorDiv = document.createElement("div")
    errorDiv.className = "form-error"
    errorDiv.textContent = errorMessage
    input.parentNode.appendChild(errorDiv)
  }

  return isValid
}

/**
 * Filter Tabs for Dashboard
 */
function initFilterTabs() {
  const filterTabs = document.querySelectorAll(".filter-tab")

  filterTabs.forEach((tab) => {
    tab.addEventListener("click", function () {
      const filter = this.getAttribute("data-filter")
      const container = this.closest(".filter-section")?.querySelector(".filter-content")

      // Update active tab
      filterTabs.forEach((t) => t.classList.remove("active"))
      this.classList.add("active")

      // Filter items
      if (container) {
        const items = container.querySelectorAll("[data-category]")
        items.forEach((item) => {
          if (filter === "all" || item.getAttribute("data-category") === filter) {
            item.style.display = ""
          } else {
            item.style.display = "none"
          }
        })
      }
    })
  })
}

/**
 * Smooth Scroll for anchor links
 */
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    const targetId = this.getAttribute("href")
    if (targetId === "#") return

    const target = document.querySelector(targetId)
    if (target) {
      e.preventDefault()
      const navbarHeight = document.querySelector(".navbar-brutal")?.offsetHeight || 0
      const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - navbarHeight - 20

      window.scrollTo({
        top: targetPosition,
        behavior: "smooth",
      })
    }
  })
})

/**
 * Mobile Menu Toggle - Removed duplicate since Bootstrap handles this
 */

/**
 * Alert Auto-dismiss
 */
const alerts = document.querySelectorAll(".alert-dismissible")
alerts.forEach((alert) => {
  setTimeout(() => {
    alert.style.opacity = "0"
    setTimeout(() => alert.remove(), 300)
  }, 5000)
})
