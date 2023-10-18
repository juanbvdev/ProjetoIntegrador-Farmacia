document.addEventListener('DOMContentLoaded', function() {
    if (cpfEmailInUse) {
        const errorMessage = document.querySelector('.error-message');
        errorMessage.style.display = 'block';

        const cpfInput = document.getElementById("cpf");
        const emailInput = document.getElementById("email");


        cpfInput.classList.add("input-error");
        emailInput.classList.add("input-error");


        cpfInput.placeholder = "CPF já em uso";
        emailInput.placeholder = "Email já em uso";
    }
});
