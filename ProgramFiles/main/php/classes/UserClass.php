<?php 
class User{
private string $nome;
private string $cpf_cnpj;
private int $idade;
private string $endereco;
private string $email;
private int $permissao;
private string $senha;

public function __construct($nome, $cpf_cnpj, $idade, $endereco, $email, $permissao, $senha) {
    $this->nome = $nome;
    $this->cpf_cnpj = $cpf_cnpj;
    $this->idade = $idade;
    $this->endereco = $endereco;
    $this->email = $email;
    $this->permissao = $permissao;
    $this->senha = $senha;
}

/**
 * Get the value of nome
 */
public function getNome(): string
{
return $this->nome;
}

/**
 * Set the value of nome
 */
public function setNome(string $nome): self
{
$this->nome = $nome;

return $this;
}

/**
 * Get the value of cpf_cnpj
 */
public function getCpfCnpj(): string
{
return $this->cpf_cnpj;
}

/**
 * Set the value of cpf_cnpj
 */
public function setCpfCnpj(string $cpf_cnpj): self
{
$this->cpf_cnpj = $cpf_cnpj;

return $this;
}

/**
 * Get the value of idade
 */
public function getIdade(): int
{
return $this->idade;
}

/**
 * Set the value of idade
 */
public function setIdade(int $idade): self
{
$this->idade = $idade;

return $this;
}

/**
 * Get the value of endereco
 */
public function getEndereco(): string
{
return $this->endereco;
}

/**
 * Set the value of endereco
 */
public function setEndereco(string $endereco): self
{
$this->endereco = $endereco;

return $this;
}

/**
 * Get the value of email
 */
public function getEmail(): string
{
return $this->email;
}

/**
 * Set the value of email
 */
public function setEmail(string $email): self
{
$this->email = $email;

return $this;
}

/**
 * Get the value of permissao
 */
public function getPermissao(): int
{
return $this->permissao;
}

/**
 * Set the value of permissao
 */
public function setPermissao(int $permissao): self
{
$this->permissao = $permissao;

return $this;
}

/**
 * Get the value of senha
 */
public function getSenha(): string
{
return $this->senha;
}

/**
 * Set the value of senha
 */
public function setSenha(string $senha): self
{
$this->senha = $senha;

return $this;
}
}
