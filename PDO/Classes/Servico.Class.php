<?php

class Servico extends Crud{
    protected $tabela = 'Servico';
    private $idServico;
    private $nomeServico;
    private $descricaoServico;
    private $precoServico;

    #metodos set's

    public function setId($id){
        $this->id = $id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    
    public function setPreco($preco){
        $this->preco = $preco;
    }

    #métodos Gets
    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function getPreco(){
        return $this->preco;
    }

    #Implementando a Função Abstrata

    public function inserir(){
        $sqlInserir = "INSERT INTO $this->tabela (nomeServico, descricaoServico, precoServico) VALUES (:nome, :descricao, :preco)";
        $stmt= Conexao::prepare($sqlInserir);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        $stmt->bindParam(':preco', $this->preco, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function atualizar($campo,$id)
    {
        $sqlAtualizar = "UPDATE $this->tabela SET nomeServico = :nome, descricaoServico = :descricao, precoServico = :preco where $campo=:idAtt" ;
        $stmt= Conexao::prepare($sqlAtualizar);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        $stmt->bindParam(':preco', $this->preco, PDO::PARAM_STR);
        $stmt->bindParam(':idAtt', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
}