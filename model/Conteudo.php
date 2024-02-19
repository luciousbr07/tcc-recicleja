<?php
    class Conteudo{
        private $id_conteudo;
        private $titulo;
        private $conteudo;
        private $pagina;
        private $imagem;
        private $caminho_img;
/////////////////////////////////////////////////////
        function getId_conteudo(){
            return $this->id_conteudo;
        }
        function getTitulo(){
            return $this->titulo;
        }
        function getConteudo(){
            return $this->conteudo;
        }
        function getPagina(){
            return $this->pagina;
        }
        function getImagem(){
            return $this->imagem;
        }
        function getCaminho_img(){
            return $this->caminho_img;
        }
///////////////////////////////////////////////////////
        function setId_conteudo($id_conteudo){ 
            $this->id_conteudo = $id_conteudo;
        }
        function setTitulo($titulo){ 
            $this->titulo = $titulo;
        }
        function setConteudo($conteudo){ 
            $this->conteudo = $conteudo;
        }
        function setPagina($pagina){ 
            $this->pagina = $pagina;
        }
        function setImagem($imagem){ 
            $this->imagem = $imagem;
        }
        function setCaminho_img($caminho_img){ 
            $this->caminho_img = $caminho_img;
        }
    }
?>