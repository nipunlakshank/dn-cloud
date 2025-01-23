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

function showChatList() {
    console.log("showChatList");
    document.getElementById("chat-sidebar").classList.remove("hidden");
    document.getElementById("chat-content").classList.add("hidden");
}

function scrollManager(element) {
    const key = element.getAttribute("key");

    return {
        initScroll() {
            const savedPosition = localStorage.getItem(`${key}-scroll`);
            if (savedPosition) {
                this.$el.scrollTop = parseInt(savedPosition, 10);
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
document.querySelector("#avatar").addEventListener("input", (event) => {
    const new_avatar = event.target.files[0];
    if (new_avatar) {
        document.querySelector("#avatar_preview").src =
            URL.createObjectURL(new_avatar);
    }
});

// set theme
let darkMode = localStorage.getItem("theme") === "dark";
if (darkMode) document.documentElement.classList.add("dark");
else document.documentElement.classList.remove("dark");

const chatCanvas = document.getElementById("chat-canvas");
chatCanvas.scrollTop = chatCanvas.scrollHeight;

// Expose functions
window.toggleTheme = toggleTheme;
window.logout = logout;
window.showChatList = showChatList;
window.scrollManager = scrollManager;
