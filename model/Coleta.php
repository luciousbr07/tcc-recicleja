<?php
    class Coleta{
        private $id_coleta;
        private $data_cadastro;
        private $data_coleta;
        private $status;
        private $id_cliente;
        private $info_adicionais;
        private $hr_disp_inicial;
        private $hr_disp_final; 
        private $id_catador; 
        private $id_material;
        private $plastico;
        private $vidro;
        private $madeira;
        private $metal;
        private $papel;
        private $papelao;
        private $rua; 
        private $numero; 
        private $bairro; 
        private $cidade;
        private $estado;
        private $referencia;
        private $nome;
        private $telefone;

        function getId_coleta(){
            return $this->id_coleta;
        }

        function getData_cadastro(){
            return $this->data_cadastro;
        }

        function getData_coleta(){
            return $this->data_coleta;
        }

        function getStatus(){
            return $this->status;
        }

        function getId_cliente(){
            return $this->id_cliente;
        }

        function getInfo_adicionais(){
            return $this->info_adicionais;
        }

        function getHr_disp_inicial(){
            return $this->hr_disp_inicial;
        }

        function getHr_disp_final(){
            return $this->hr_disp_final;
        }

        function getId_catador(){
            return $this->id_catador;
        }

        function getId_material(){
            return $this->id_material;
        }

        function getPlastico(){
            return $this->plastico;
        }
        
        function getVidro(){
            return $this->vidro;
        }

        function getMadeira(){
            return $this->madeira;
        }

        function getMetal(){
            return $this->metal;
        }

        function getPapel(){
            return $this->papel;
        }

        function getPapelao(){
            return $this->papelao;
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
        function getEstado(){
            return $this->estado;
        }
        function getReferencia(){
            return $this->referencia;
        }
        function getNome(){
            return $this->nome;
        }
        function getTelefone(){
            return $this->telefone;
        }

        //set

        function setId_coleta($id_coleta){
            $this->id_coleta = $id_coleta;
        }
        
        function setData_cadastro($data_cadastro){
            $this->data_cadastro = $data_cadastro;
        }
        
        function setData_coleta($data_coleta){
            $this->data_coleta = $data_coleta;
        }
        
        function setStatus($status){
            $this->status = $status;
        }
        
        function setId_cliente($id_cliente){
            $this->id_cliente = $id_cliente;
        }
        
        function setInfo_adicionais($info_adicionais){
            $this->info_adicionais = $info_adicionais;
        }
        
        function setHr_disp_inicial($hr_disp_inicial){
            $this->hr_disp_inicial = $hr_disp_inicial;
        }
        
        function setHr_disp_final($hr_disp_final){
            $this->hr_disp_final = $hr_disp_final;
        }
        
        function setId_catador($id_catador){
            $this->id_catador = $id_catador;
        }
        
        function setId_material($id_material){
            $this->id_material = $id_material;
        }
        
        function setPlastico($plastico){
            $this->plastico = $plastico;
        }
        
        function setVidro($vidro){
            $this->vidro = $vidro;
        }
        
        function setMadeira($madeira){
            $this->madeira = $madeira;
        }
        
        function setMetal($metal){
            $this->metal = $metal;
        }
        
        function setPapel($papel){
            $this->papel = $papel;
        }
        
        function setPapelao($papelao){
            $this->papelao = $papelao;
        }
        function setRua($rua){
            $this->rua = $rua;
        }
        function setNumero($numero){
            $this->numero = $numero;
        }
        function setBairro($bairro){
            $this->bairro = $bairro;
        }
        function setCidade($cidade){
            $this->cidade = $cidade;
        }
        function setEstado($estado){
            $this->estado = $estado;
        }
        function setReferencia($referencia){
            $this->referencia = $referencia;
        }
        function setNome($nome){
            $this->nome = $nome;
        }
        function setTelefone($telefone){
            $this->telefone = $telefone;
        }
    }
?>