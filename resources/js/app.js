import "./bootstrap";
import "flowbite";

const axios = window.axios;

function toggleTheme(darkMode) {
    if (darkMode === undefined)
        darkMode = !(localStorage.getItem("theme") === "dark");

    localStorage.setItem("theme", darkMode ? "dark" : "light");
    document.documentElement.classList.toggle("dark");
}
// set theme
let darkMode = localStorage.getItem("theme") === "dark";
if (darkMode) document.documentElement.classList.add("dark");
else document.documentElement.classList.remove("dark");

function logout() {
    axios
        .post(`/logout`)
        .then(() => setTimeout(() => (window.location.href = "/"), 0))
        .catch((error) => console.error(error));
}

function scrollManager(element) {
    const key = element.getAttribute("data-scroll-key");

    return {
        initScroll() {
            const savedPosition = sessionStorage.getItem(`${key}-scroll`);
            if (savedPosition) {
                this.$el.scrollTop = parseInt(savedPosition, 10);
            } else {
                this.$el.scrollTop = this.$el.scrollHeight;
            }
        },
        handleScroll(event) {
            const scrollTop = event.target.scrollTop;
            sessionStorage.setItem(`${key}-scroll`, scrollTop);
            loadMoreMessages();
        },
        removeScrollKey() {
            sessionStorage.removeItem(`${key}-scroll`);
        },
    };
}

// Profile Image Preview Update Listener
document.querySelector("#avatar")?.addEventListener("input", (event) => {
    const new_avatar = event.target.files[0];
    if (new_avatar) {
        document.querySelector("#avatar_preview").src =
            URL.createObjectURL(new_avatar);
    }
});

// Chat Image Viewer
window.addEventListener("image.open", (event) => {
    const viewer = document.querySelector("#chat-image-viewer");
    viewer.querySelector("#message-image").srcset = event.target.src;
    document.dispatchEvent(new Event("open-image-viewer", { bubbles: true }));
});

// Dashboard Drawer Toggle : Small Screen
document
    .querySelector("#drawer-toggle-button")
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

const chatCanvas = document.getElementById("chat-canvas");
if (chatCanvas) {
    chatCanvas.scrollTop = chatCanvas.scrollHeight;
}

function deselectChat() {
    Livewire.dispatch("chat.deselect");
}

// to prevent multiple loading of more messages
let loadingMoreMessages = false;

function loadMoreMessages() {
    if (loadingMoreMessages) return;
    const chatMessages = document.getElementById("chat-messages");
    if (!chatMessages) return;
    if (chatMessages.scrollTop === 0) {
        loadingMoreMessages = true;
        Livewire.dispatch("chat.scrollUpdate", {
            scrollHeight: chatMessages.scrollHeight,
        });
        Livewire.dispatch("chat.loadMoreMessages");
    }
}

function updateChatScroll(data, el) {
    setTimeout(() => {
        const topMessage = document.getElementById(
            `message-${data.topMessageId}`
        );
        if (!topMessage) return;
        el.scrollTop = el.scrollHeight - data.scrollHeight;
        loadingMoreMessages = false;
    }, 0);
}

window.addEventListener("keyup", (event) => {
    const chatContent = document.getElementById("chat-content");
    const chatInput = document.getElementById("message-text");

    if (!chatContent) return;

    if (event.key === "Enter" && chatInput !== document.activeElement) {
        chatInput.focus();
        return;
    }

    if (event.key === "Escape") {
        deselectChat();
    }
});

window.addEventListener("message.pushed", (event) => {
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

window.addEventListener("chat.moreMessagesLoaded", (event) => {
    const chatMassages = document.getElementById("chat-messages");
    updateChatScroll(event.detail[0], chatMassages);
});

// Expose functions
window.toggleTheme = toggleTheme;
window.logout = logout;
window.deselectChat = deselectChat;
window.scrollManager = scrollManager;
window.loadMoreMessages = loadMoreMessages;
