// Função para verificar se as senhas coincidem
function validarSenhas() {
    var senha1Input = document.getElementById("senha1");
    var senha2Input = document.getElementById("senha2");
    var senhaError = document.querySelector('.password-error');

    if (senha1Input.value === senha2Input.value) {
        senhaError.textContent = ''; // Senhas coincidem, limpa a mensagem de erro
        senha1Input.classList.remove('error'); // Remove a classe de erro do campo senha1
        senha2Input.classList.remove('error'); // Remove a classe de erro do campo senha2
        return true; // Permite o envio do formulário
    } else {
        senha1Input.classList.add('error'); // Adiciona a classe de erro ao campo senha1
        senha2Input.classList.add('error'); // Adiciona a classe de erro ao campo senha2
        return false; // Impede o envio do formulário
    }
}

document.querySelectorAll('.password-form').forEach(function(form) {
    form.addEventListener('submit', function(event) {
        if (!validarSenhas()) {
            event.preventDefault();
        }
    });
});

document.querySelectorAll('.password-form input[type="password"]').forEach(function(input) {
    input.addEventListener('input', function() {
        validarSenhas();
    });
});
