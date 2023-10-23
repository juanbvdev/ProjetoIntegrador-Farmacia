# ProjetoIntegrador-Farmacia
Projeto integrador, módulo D do curso Técnico em Informática no Senac.

Este projeto consiste em desenvolver um sistema da rede de farmacias populares. Onde será possível
utilizar o software como paciente, médico e farmacêutico.
Podendo ver suas receitas que estão disponiveis para a retirada.
Ver a disponibilidade de medicamentos.
Receber noticifação do vencimento da receita.

---Cadastro--- 

Médico

Paciente

Farmácia

---Farmácia---

 Endereço

 Horário de Funcionamento

 Cadastro de Medicamento

---Remédio---

 Disponibilidade em farmácia

---Médico---

Receita Médica

---Paciente---

 Histórico de pesquisa
 
 Histórico de retiradas
 
 Histórico de receitas
 
 Alerta de Receitas

---Classes---

Pai:

  usuário-padrão (nome, cpf_cnpj, idade, endereço, celular, email, permissão)

Filho:

  Médico (idMedico, registro, prescrições)
  
  Paciente (idCliente, retiradas, receitas)
