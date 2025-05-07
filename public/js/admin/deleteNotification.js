const deleteBtn = document.querySelector(".delete-btn");
const deleteOption = document.querySelector(".deleteOption");
deleteBtn.addEventListener("click", () => {
    deleteOption.classList.toggle("active");
});
