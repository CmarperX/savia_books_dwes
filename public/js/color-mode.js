const btn = document.getElementById("themeToggleBtn");
const icon = document.getElementById("themeIcon");

btn.addEventListener("click", () => {
const currentTheme = document.documentElement.getAttribute("data-bs-theme");

if (currentTheme === "dark") {
    // Cambiamos a modo claro
    document.documentElement.setAttribute("data-bs-theme", "light");
    // Icono del sol
    icon.innerHTML = '<use href="#moon-stars-fill"></use>';
    // Color del icono luna cuando estamos en modo claro
    icon.querySelector("use").setAttribute("fill", "#ffffffff");
    // Cambiamos color del botón en modo claro
    btn.style.backgroundColor = "#000000ff";
} else {
    // Cambiamos a modo oscuro
    document.documentElement.setAttribute("data-bs-theme", "dark");
    // Icono de la luna
    icon.innerHTML = '<use href="#sun-fill"></use>';
    // Color del icono sol cuando estamos en modo oscuro
    icon.querySelector("use").setAttribute("fill", "#000000ff");
    // Cambiamos color del botón en modo oscuro
    btn.style.backgroundColor = "#ffffffff";
  }
});
