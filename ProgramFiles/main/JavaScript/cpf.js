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

function validarCPF() {
    var cpfInput = document.getElementById("CPF");
    var cpfWarning = document.getElementById("cpfWarning");
    var cpf = cpfInput.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos

    if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) {
        // CPF inválido, exibe a mensagem de aviso e muda a cor do input
        cpfInput.classList.add("invalid-cpf");
        cpfInput.style.border = "2px solid red"; 
        cpfInput.placeholder = "CPF inválido. Por favor, verifique o CPF.";
        return false; // CPF inválido
    }

    // Validação do primeiro dígito verificador
    var sum = 0;
    for (var i = 0; i < 9; i++) {
        sum += parseInt(cpf.charAt(i)) * (10 - i);
    }
    var remainder = (sum * 10) % 11;

    if (remainder === 10 || remainder === 11) {
        remainder = 0;
    }

    if (remainder !== parseInt(cpf.charAt(9))) {
        // Primeiro dígito verificador inválido
        cpfInput.classList.add("invalid-cpf");
        cpfInput.style.border = "2px solid red"; 
        cpfInput.placeholder = "CPF inválido. Por favor, verifique o CPF.";
        return false; // CPF inválido
    }

    // Validação do segundo dígito verificador
    sum = 0;
    for (var i = 0; i < 10; i++) {
        sum += parseInt(cpf.charAt(i)) * (11 - i);
    }
    remainder = (sum * 10) % 11;

    if (remainder === 10 || remainder === 11) {
        remainder = 0;
    }

    if (remainder !== parseInt(cpf.charAt(10))) {
        // Segundo dígito verificador inválido
        cpfInput.classList.add("invalid-cpf");
        cpfInput.style.border = "2px solid red"; 
        cpfInput.placeholder = "CPF inválido. Por favor, verifique o CPF.";
        return false; // CPF inválido
    }

    // CPF válido, limpa a mensagem de aviso e restaura a cor do input
    cpfInput.classList.remove("invalid-cpf");
    cpfInput.placeholder = "Digite o CPF";
    cpfWarning.textContent = "";
    return true; // CPF válido
}


