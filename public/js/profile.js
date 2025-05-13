document.addEventListener('DOMContentLoaded', function () {
    const nameInput = document.getElementById('name');
    const saveReminder = document.getElementById('saveReminder');

    nameInput.addEventListener('input', function () {
        saveReminder.classList.remove('d-none');
    });
});