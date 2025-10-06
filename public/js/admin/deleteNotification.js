const deleteBtn = document.querySelector(".delete-btn");
const deleteOption = document.getElementsByClassName("deleteOption");
deleteBtn.addEventListener("click", () => {
    for(let i = 0; i < deleteOption.length; i++){
        deleteOption[i].classList.toggle("active");
        console.log(deleteOption[i]);
    }
});

// Add event listeners to each deleteOption button
Array.from(deleteOption).forEach((button) => {
    button.addEventListener("click", (event) => {
        const card = button.closest(".my-card"); // Find the closest parent with the class 'my-card'
        card.remove(); // Remove the card element
    });
});
