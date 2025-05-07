const hamburger = document.querySelector(".burger-icon");
const menu = document.querySelector(".off-screen-nav");

hamburger.addEventListener("click", () => {
    console.log("Tes");
    // hamburger.classList.toggle('active');
    menu.classList.toggle("active");
});
