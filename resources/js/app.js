import "./bootstrap"

import Alpine from "alpinejs"

window.Alpine = Alpine

Alpine.start()

const axios = window.axios

// set theme
let darkMode = localStorage.getItem("theme") === "dark"
if (darkMode) document.documentElement.classList.add("dark")
else document.documentElement.classList.remove("dark")

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

window.toggleTheme = toggleTheme
window.logout = logout
