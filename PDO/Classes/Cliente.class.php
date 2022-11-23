<?php

class Cliente extends Crud{
    protected $tabela = 'Cliente';
    private $idCliente;
    private $nomeCliente;
    private $enderecoCliente;
    private $telefoneCliente;
    private $nascimentoCliente;
    private $bairroCliente;
    private $cidadeCliente;
    private $estadoCliente;

    #metodos set's
    public function setId($id){
        $this->idCliente = $id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
    
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    
    public function setNascimento($nascimento){
        $this->nascimento = $nascimento;
    }

    public function setBairro($bairro){
        $this->bairro = $bairro;
    }
    
    public function setCidade($cidade){
        $this->cidade = $cidade;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    #métodos Gets
    public function getId(){
        return $this->idCliente;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getEndereco(){
        return $this->endereco;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function getNascimento(){
        return $this->nascimento;
    }

    public function getBairro(){
        return $this->bairro;
    }
    
    public function getCidade(){
        return $this->cidade;
    }

    public function getEstado(){
        return $this->estado;
    }

    #Implementando a Função Abstrata

    public function Inserir(){
        $sqlInserir = "INSERT INTO $this->tabela (nomeCliente, enderecoCliente, telefoneCliente, nascimentoCliente, bairroCliente, cidadeCliente, estadoCliente) VALUES (:nome, :endereco, :telefone, :nascimento, :bairro, :cidade, :estado)";
        $stmt= Conexao::prepare($sqlInserir);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':endereco', $this->endereco, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(':nascimento', $this->nascimento, PDO::PARAM_STR);
        $stmt->bindParam(':bairro', $this->bairro, PDO::PARAM_STR);
        $stmt->bindParam(':cidade', $this->cidade, PDO::PARAM_STR);
        $stmt->bindParam(':estado', $this->estado, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function Atualizar($campo,$id)
    {
        $sqlAtualizar = "UPDATE $this->tabela SET nomeCliente = :nome, enderecoCliente = :endereco, telefoneCliente = :telefone, nascimentoCliente = :nascimento, bairroCliente = :bairro, cidadeCliente = :cidade, estadoCliente = :estado where $campo=:idAtt" ;
        $stmt= Conexao::prepare($sqlAtualizar);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':endereco', $this->endereco, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(':nascimento', $this->nascimento, PDO::PARAM_STR);
        $stmt->bindParam(':bairro', $this->bairro, PDO::PARAM_STR);
        $stmt->bindParam(':cidade', $this->cidade, PDO::PARAM_STR);
        $stmt->bindParam(':estado', $this->estado, PDO::PARAM_STR);
        $stmt->bindParam(':idAtt', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
}