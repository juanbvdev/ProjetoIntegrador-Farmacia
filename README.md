# ProjetoIntegrador-Farmacia
Projeto integrador, módulo D do curso Técnico em Informática no Senac.

Este projeto consiste em desenvolver um sistema de rede de farmácias. Onde será possível
utilizar o software como usuário (cliente), médico e farmacêutico.

---Cadastro---
Médico
Cliente
Farmácia

---Farmácia---
Endereço
Horário de Funcionamento
Cadastro de Medicamento
Cadastro de Funcionário
Cadastro de Cliente

---Remédio---
Preço
 Promoção
 Histórico de valor
Disponibilidade em farmácia

---Funcionário---
Realizar venda
Consultar medicamentos
Consultar estoque
Cadastrar cliente

---Médico---
Receita Médica

---Cliente---
Histórico de pesquisa
Histórico de compras
Histórico de receitas
Pagamento Digital (PIX/cartão de crédito)
Alerta de Promoção

---Classes---
Pai:
  usuário-padrão (nome, cpf, idade, endereço, celular, email, permissão)
Filho:
  Médico (registro, prescrições)
  Farmácia (CNPJ)
  Funcionário (vendas, idFuncionário)
  Cliente (cartões, compras, idCliente, receitas)
