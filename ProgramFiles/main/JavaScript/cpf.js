function onSubmitForm() {
    var cpfInput = document.getElementById("CPF");
    var cpf = cpfInput.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos

    if (validarCPF(cpf)) {
        cpfInput.value = formatarCPF(cpf); // Formata o CPF antes de enviar
        return true; // CPF válido, pode prosseguir com o envio do formulário
    } else {
        // CPF inválido, remove os números e exibe a mensagem de aviso
        cpfInput.value = ''; // Limpa o campo CPF
        cpfInput.classList.add("invalid-cpf"); // Adiciona a classe
        cpfInput.placeholder = "CPF inválido. Por favor, verifique o CPF.";
        cpfInput.onfocus = function () { cpfInput.placeholder = "Digite o CPF"; }; // Define o placeholder ao focar
        return false; // CPF inválido
    }
}

function limparAvisoCPF() {
    var cpfWarning = document.getElementById("cpfWarning");
    cpfWarning.textContent = ""; // Limpa a mensagem de aviso
}

function formatarCPF(cpf) {
    cpf = cpf.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona o primeiro ponto
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona o segundo ponto
    cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Adiciona o traço
    return cpf;
}

function atualizarCampoCPF() {
    var cpfInput = document.getElementById("CPF");
    cpfInput.value = formatarCPF(cpfInput.value);
}

function validarCPF(cpf) {
    cpf = cpf.replace(/\D/g, ''); // Remove todos os caracteres não numéricos

    if (cpf.length !== 11) {
        return false; // O CPF deve ter 11 dígitos
    }

    // Verifica se todos os dígitos são iguais; se sim, o CPF é inválido
    if (/^(\d)\1+$/.test(cpf)) {
        return false;
    }

    // Calcula o primeiro dígito verificador
    var soma = 0;
    for (var i = 0; i < 9; i++) {
        soma += parseInt(cpf.charAt(i)) * (10 - i);
    }
    var resto = 11 - (soma % 11);
    var digitoVerificador1 = (resto === 10 || resto === 11) ? 0 : resto;

    // Verifica o primeiro dígito verificador
    if (digitoVerificador1 !== parseInt(cpf.charAt(9))) {
        return false;
    }

    // Calcula o segundo dígito verificador
    soma = 0;
    for (var i = 0; i < 10; i++) {
        soma += parseInt(cpf.charAt(i)) * (11 - i);
    }
    resto = 11 - (soma % 11);
    var digitoVerificador2 = (resto === 10 || resto === 11) ? 0 : resto;

    // Verifica o segundo dígito verificador
    if (digitoVerificador2 !== parseInt(cpf.charAt(10))) {
        return false;
    }

    return true; // O CPF é válido
}