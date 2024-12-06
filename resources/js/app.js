import "./bootstrap"

const axios = window.axios

function toggleTheme() {
    darkMode = localStorage.getItem("theme") === "dark"
    darkMode = !darkMode
    localStorage.setItem("theme", darkMode ? "dark" : "light")
    document.documentElement.classList.toggle("dark")
}

function logout() {
    axios.post(`/logout`)
        .then(() => (window.location.href = "/"))
        .catch((error) => console.error(error))
}

function showChatList() {
    console.log("showChatList")
    document.getElementById("chat-sidebar").classList.remove("hidden")
    document.getElementById("chat-content").classList.add("hidden")
}

// set theme
let darkMode = localStorage.getItem("theme") === "dark"
if (darkMode) document.documentElement.classList.add("dark")
else document.documentElement.classList.remove("dark")

const chatCanvas = document.getElementById("chat-canvas-area")
chatCanvas.scrollTop = chatCanvas.scrollHeight

// Expose functions
window.toggleTheme = toggleTheme
window.logout = logout
window.showChatList = showChatList
