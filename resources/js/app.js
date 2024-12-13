import "./bootstrap"

const axios = window.axios

function toggleTheme(darkMode) {
    if (darkMode === undefined)
        darkMode = !(localStorage.getItem("theme") === "dark")

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

function scrollManager(key) {
    return {
        initScroll() {
            const savedPosition = localStorage.getItem(`${key}-scroll`);
            if (savedPosition) {
                this.$el.scrollTop = parseInt(savedPosition, 10);
                console.log("scroll to", savedPosition);
            }
        },
        saveScroll(event) {
            const scrollTop = event.target.scrollTop;
            localStorage.setItem(`${key}-scroll`, scrollTop);
        },
        removeScroll() {
            localStorage.removeItem(`${key}-scroll`);
        }
    };
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
window.scrollManager = scrollManager
window.openModal = openModal
window.backModal = backModal
