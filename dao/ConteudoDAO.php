<?php
    class ConteudoDao{
        public function read(){
            try{
                $sql = "SELECT * FROM conteudo order by id_conteudo asc";
                $result = Conexao::getConexao()->query($sql);
                $lista = $result->fetchALL(PDO::FETCH_ASSOC);
                $f_lista = array();
                
                foreach($lista as $l){
                    $f_lista[] = $this->listaConteudo($l);
                }
                
                return $f_lista;
            }
            catch(Exception $e){
                print "Ocorreu um erro ao buscar todos os clientes <br>". $e ."<br>";
            }
        }
        

        private function listaConteudo($row){
            $conteudo = new Conteudo();
            $conteudo->setId_conteudo($row['id_conteudo']);
            $conteudo->setTitulo($row['titulo']);
            $conteudo->setConteudo($row['conteudo']);
            $conteudo->setPagina($row['pagina']);
            $conteudo->setImagem($row['imagem']);
            $conteudo->setCaminho_img($row['caminho_img']);
            
            return $conteudo;
        }

        public function delete(Conteudo $conteudo){
            try{
                $sql = "DELETE FROM conteudo where id_conteudo = :id_conteudo";
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":id_conteudo",$conteudo->getId_conteudo());
                
                return $p_sql->execute();

            }
            catch(Exception $e){
                print "Erro ao excluir o conteudo <br>". $e ."<br>";
            }
        }

        public function update(Conteudo $conteudo){ // altera o usuario

            try{
                $sql = "UPDATE conteudo SET titulo = :titulo, conteudo = :conteudo, pagina = :pagina, imagem = :imagem, caminho_img = :caminho_img where id_conteudo = :id_conteudo";

                    $p_sql = Conexao::getConexao()->prepare($sql);
                    $p_sql->bindValue(":titulo",$conteudo->getTitulo());
                    $p_sql->bindValue(":conteudo",$conteudo->getConteudo());
                    $p_sql->bindValue(":pagina",$conteudo->getPagina());
                    $p_sql->bindValue(":imagem",$conteudo->getImagem());
                    $p_sql->bindValue(":caminho_img",$conteudo->getCaminho_img());
                    $p_sql->bindValue(":id_conteudo",$conteudo->getId_conteudo());
                    
                    return $p_sql->execute();
            }

            catch(Exception $erro){
                print "Ocorreu um erro ao tentar atualizar o usuários <br>". $erro ."br";
            }
        }

        public function create(Conteudo $conteudo){
            try{
                $sql = "INSERT into conteudo (id_conteudo, titulo, conteudo, pagina, imagem, caminho_img) values (:id_conteudo, :titulo, :conteudo, :pagina, :imagem, :caminho_img)";

                $p_sql = Conexao::getConexao()->prepare($sql);

                $p_sql ->bindValue(":id_conteudo", null);
                $p_sql ->bindValue(":titulo", $conteudo->getTitulo());
                $p_sql ->bindValue(":conteudo", $conteudo->getConteudo());
                $p_sql ->bindValue(":pagina", $conteudo->getPagina());
                $p_sql ->bindValue(":imagem", $conteudo->getImagem());
                $p_sql ->bindValue(":caminho_img", $conteudo->getCaminho_img());

                return $p_sql->execute();
            }

            catch(Exception $erro){
                print "Ocorreu um erro ao tentar atualizar o conteúdo <br>". $erro ."br";
            }
        }
    }
?>