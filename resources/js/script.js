const logoutBtn = document.getElementById("logout-btn");

logoutBtn?.addEventListener("click", () => {
    post(`${ROOT}/logout`, {});
});

let darkMode = localStorage.getItem("theme") === "dark";
if (darkMode) document.documentElement.classList.add("dark");
else document.documentElement.classList.remove("dark");

function toggleDarkMode() {
    darkMode = localStorage.getItem("theme") === "dark";
    darkMode = !darkMode;
    localStorage.setItem("theme", darkMode ? "dark" : "light");
    document.documentElement.classList.toggle("dark");
}

