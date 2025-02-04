import "./bootstrap";

const axios = window.axios;

function toggleTheme(darkMode) {
    if (darkMode === undefined)
        darkMode = !(localStorage.getItem("theme") === "dark");

    localStorage.setItem("theme", darkMode ? "dark" : "light");
    document.documentElement.classList.toggle("dark");
}

function logout() {
    axios
        .post(`/logout`)
        .then(() => (window.location.href = "/"))
        .catch((error) => console.error(error));
}

function scrollManager(element) {
    const key = element.getAttribute("scroll-key");

    return {
        initScroll() {
            const savedPosition = localStorage.getItem(`${key}-scroll`);
            if (savedPosition) {
                this.$el.scrollTop = parseInt(savedPosition, 10);
            } else {
                this.$el.scrollTop = this.$el.scrollHeight;
            }
        },
        saveScroll(event) {
            const scrollTop = event.target.scrollTop;
            localStorage.setItem(`${key}-scroll`, scrollTop);
        },
        removeScroll() {
            localStorage.removeItem(`${key}-scroll`);
        },
    };
}

// Profile Image Preview Update Listener
document.querySelector("#avatar")
    ?.addEventListener("input", (event) => {
        const new_avatar = event.target.files[0];
        if (new_avatar) {
            document.querySelector("#avatar_preview").src =
                URL.createObjectURL(new_avatar);
        }
    });

// Dashboard Drawer Toggle : Small Screen
document.querySelector("#drawer-toggle-button")
    ?.addEventListener("click", () => {
        const drawer = document.querySelector("#chat-sidebar");
        if (drawer.classList.contains("max-sm:-translate-x-full")) {
            drawer.classList.remove("max-sm:-translate-x-full");
            drawer.classList.add("max-sm:translate-x-0");
        } else {
            drawer.classList.remove("max-sm:translate-x-0");
            drawer.classList.add("max-sm:-translate-x-full");
        }
    });

// set theme
let darkMode = localStorage.getItem("theme") === "dark";
if (darkMode) document.documentElement.classList.add("dark");
else document.documentElement.classList.remove("dark");

const chatCanvas = document.getElementById("chat-canvas");
if (chatCanvas) {
    chatCanvas.scrollTop = chatCanvas.scrollHeight;
}

function deselectChat() {
    Livewire.dispatch("chat.deselect")
}

window.addEventListener("keyup", (event) => {
    const chatContent = document.getElementById("chat-content")
    if (!chatContent) return
    if (event.key === "Escape") {
        deselectChat()
    }
})

window.addEventListener("message.sent", event => {
    const intervalId = setInterval(() => {
        const chatContent = document.getElementById("chat-messages");
        const messageId = JSON.parse(event.detail).id;
        const message = document.getElementById(`message-${messageId}`);
        if (!chatContent) {
            clearInterval(intervalId);
            return;
        }

        if (message) {
            message.scrollIntoView({ behavior: "smooth" });
            clearInterval(intervalId);
        }
    }, 50);

    setTimeout(() => clearInterval(intervalId), 5000);
});

// Expose functions
window.toggleTheme = toggleTheme;
window.logout = logout;
window.deselectChat = deselectChat;
window.scrollManager = scrollManager;
