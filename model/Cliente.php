<?php
    class Cliente
    {
        private $id_cliente;
        private $nome;
        private $email;
        private $senha;
        private $cpf;
        private $data_nasc; 
        private $telefone; 
        private $rua; 
        private $numero; 
        private $bairro; 
        private $cidade;
        private $complemento; 
        private $referencia; 
        private $tipo; 
        private $estado; 
        private $cep;
        
        //GET
        function getId_cliente(){
            return $this->id_cliente;
        }
        function getNome(){
            return $this->nome;
        }
        function getEmail(){
            return $this->email;
        }
        function getSenha(){
            return $this->senha;
        }
        function getCpf(){
            return $this->cpf;
        }
        function getData_nasc(){
            return $this->data_nasc;
        }
        function getTelefone(){
            return $this->telefone;
        }
        function getRua(){
            return $this->rua;
        }
        function getNumero(){
            return $this->numero;
        }
        function getBairro(){
            return $this->bairro;
        }
        function getCidade(){
            return $this->cidade;
        }
        function getComplemento(){
            return $this->complemento;
        }
        function getReferencia(){
            return $this->referencia;
        }
        function getTipo(){
            return $this->tipo;
        }
        function getEstado(){
            return $this->estado;
        }
        function getCep(){
            return $this->cep;
        }

        function getEmailDadosPessoais(){
            return $this->email;
        }

        // SET
        function setId_cliente($id_cliente){
            $this->id_cliente = $id_cliente;
        }
        function setNome($nome){
            $this->nome = $nome;
        }
        function setEmail($email){
            $this->email = $email;
        }
        function setSenha($senha){
            $this->senha = $senha;
        }
        function setCpf($cpf){
            $this->cpf = $cpf;
        }
        function setData_nasc($data_nasc){
            $this->data_nasc = $data_nasc;
        }
        function setTelefone($telefone){
            $this->telefone = $telefone;
        }
        function setRua($rua){
            $this->rua = $rua;
        }
        function setNumero($numero){
            $this->numero = $numero;
        }
        function setComplemento($complemento){
            $this->complemento = $complemento;
        }
        function setReferencia($referencia){
            $this->referencia = $referencia;
        }
        function setBairro($bairro){
            $this->bairro = $bairro;
        }
        function setCidade($cidade){
            $this->cidade = $cidade;
        }
        function setTipo($tipo){
            $this->tipo = $tipo;
        }
        function setEstado($estado){
            $this->estado = $estado;
        }
        function setCep($cep){
            $this->cep = $cep;
        }

        function setEmailDadosPessoais($email){
            $this->email = $email;
        }
    }
?>