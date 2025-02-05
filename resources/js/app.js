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
        handleScroll(event) {
            const scrollTop = event.target.scrollTop;
            localStorage.setItem(`${key}-scroll`, scrollTop);
            loadMoreMessages();
        },
        removeScrollKey() {
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

// Chat Image Viewer
document.querySelectorAll(".chat-image-bubble").forEach((bubble) => {
    const viewer = document.querySelector("#chat-image-viewer");
    bubble.addEventListener("click", (event) => {
        let messageId = event.target.getAttribute("data-message-id");
        viewer.querySelector("#message-image").srcset = event.target.src;
        console.log("Id : ", messageId);
    });
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

function loadMoreMessages() {
    const chatMessages = document.getElementById("chat-messages")
    if (!chatMessages) return
    if (chatMessages.scrollTop === 0) {
        Livewire.dispatch("chat.loadMoreMessages")
    }
}

window.addEventListener("keyup", (event) => {
    const chatContent = document.getElementById("chat-content")
    const chatInput = document.getElementById("message-text")

    if (!chatContent) return

    if (event.key === "Enter" && chatInput !== document.activeElement) {
        chatInput.focus()
        return
    }

    if (event.key === "Escape") {
        deselectChat()
    }
})

window.addEventListener("message.pushed", event => {
    const intervalId = setInterval(() => {
        const messageId = event.detail[0];
        const chatContent = document.getElementById("chat-messages");
        const message = document.getElementById(`message-${messageId}`);

        if (!chatContent) {
            clearInterval(intervalId);
            return;
        }

        if (message) {
            message.scrollIntoView({ behavior: "smooth" });
            clearInterval(intervalId);
        }
    }, 100);

    setTimeout(() => clearInterval(intervalId), 5000);
});

// Expose functions
window.toggleTheme = toggleTheme;
window.logout = logout;
window.deselectChat = deselectChat;
window.scrollManager = scrollManager;
window.loadMoreMessages = loadMoreMessages;
