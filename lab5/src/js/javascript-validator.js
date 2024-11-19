document.getElementById('formJS').addEventListener('submit', function (event) {
    let valid = true;

    const name = document.getElementById('nameJS').value.trim();
    const email = document.getElementById('emailJS').value.trim();
    const question = document.getElementById('questionJS').value.trim();
    const type = document.getElementById('typeJS').value;
    const role = document.querySelector('input[name="role"]:checked');
    const copy = document.getElementById('copyJS').checked;

    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

    if (
        !name || name.length < 2 ||
        !emailRegex.test(email) ||
        !question || question.length < 50 ||
        !type ||
        !role
    ) {
        valid = false;
    }

    if (!valid) {
        event.preventDefault();
        alert("Будь ласка, заповніть всі поля коректно!");
    }
});
