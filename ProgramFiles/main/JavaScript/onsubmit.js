function onSubmitForm() {
    var tipoFormulario = document.getElementById("tipoFormulario").value;
    var formularioValido = false;

    if (tipoFormulario === "cliente") {
        formularioValido = validarFormCliente();
    } else if (tipoFormulario === "farmacia") {
        formularioValido = validarFormFarmacia();
    } else if (tipoFormulario === "medico") {
        formularioValido = validarFormMedico();
    }
    
    if (formularioValido) {
        var senhaValida = validarSenhas();
        var cpfValido = validarCPF();

        if (senhaValida && cpfValido) {
            return true; // Ambos são válidos, pode prosseguir com o envio do formulário
        } else {
            if (!senhaValida) {
                // Senhas inválidas, exibe os avisos para senha
                var senha1Input = document.getElementById("senha1");
                var senha2Input = document.getElementById("senha2");

                // Limpa os campos de senha
                senha1Input.value = '';
                senha2Input.value = '';

                // Adiciona as classes de erro e define os placeholders
                senha1Input.classList.add("invalid-senha");
                senha1Input.placeholder = "Senhas não coincidem. Por favor, verifique as senhas.";
                senha2Input.classList.add("invalid-senha");
                senha2Input.placeholder = "Senhas não coincidem. Por favor, verifique as senhas.";
            }

            if (!cpfValido) {
                // CPF inválido, exibe os avisos para CPF
                var cpfInput = document.getElementById("CPF");
                var cpfWarning = document.getElementById("cpfWarning");

                // Limpa o campo CPF
                cpfInput.value = '';

                // Adiciona a classe de erro e define o placeholder
                cpfInput.classList.add("invalid-cpf");
                cpfInput.style.border = "2px solid red"; 
                cpfInput.placeholder = "CPF inválido. Por favor, verifique o CPF.";
            }

            return false; // Pelo menos uma das validações falhou, impede o envio do formulário
        }
    } else {
        return false; // A validação do formulário falhou, impede o envio do formulário
    }

    
}
