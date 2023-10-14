function autoSuggestDomain(suggestion) {
    // Preenche o campo de e-mail com a sugestão clicada
    document.getElementById('email').value = suggestion;

    // Limpa a lista de sugestões
    document.getElementById('suggestions').innerHTML = "";
}

function showSuggestions() {
    const inputValue = document.getElementById('email').value;
    const suggestionDiv = document.getElementById('suggestions');
    suggestionDiv.innerHTML = ""; // Limpa a lista de sugestões

    // Verifica se o valor digitado contém o caractere "@"
    if (!inputValue.includes('@')) {
        // Cria uma lista de sugestões de domínio
        const domainSuggestions = ["@gmail.com", "@outlook.com", "@yahoo.com", "@hotmail.com", "@example.com"];

        // Exibe as sugestões no campo de e-mail
        domainSuggestions.forEach(domain => {
            const suggestionElement = document.createElement('div');
            suggestionElement.textContent = inputValue + domain;
            suggestionElement.addEventListener('click', function () {
                autoSuggestDomain(inputValue + domain);
            });
            suggestionDiv.appendChild(suggestionElement);
        });
    }
}