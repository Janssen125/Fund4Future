document.addEventListener("DOMContentLoaded", function () {
    const hamburger = document.querySelector(".burger-icon");
    const menu = document.querySelector(".off-screen-nav");
    const theSection = document.querySelector("h1").textContent.trim();

    const listItems = document.querySelectorAll(".off-screen-nav li");

    hamburger.addEventListener("click", () => {
        menu.classList.toggle("active");

        listItems.forEach((item) => {
            if (menu.classList.contains("active")) {
                item.style.display = "none";
            } else {
                item.style.display = "block";
            }
        });
    });

    const links = document.querySelectorAll(".off-screen-nav a");
    links.forEach((link) => {
        link.addEventListener("click", () => {
            menu.classList.remove("active");
            listItems.forEach((item) => (item.style.display = "none"));
        });

        const linkText = link.querySelector("li") ? link.querySelector("li").textContent.trim() : link.textContent.trim();

        if (linkText === theSection) {
            link.querySelector("li").classList.add("active");
        } else {
            link.querySelector("li").classList.remove("active");
        }
    });
});