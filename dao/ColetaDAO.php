<?php
    include_once "../restrito.php";
    Class ColetaDao{
        public function historico(){
            try{
                $sql = "SELECT * FROM coleta where id_cliente = :id_cliente";

                $p_sql = Conexao::getConexao()->prepare($sql);
                
                $p_sql->bindValue(":id_cliente", $_SESSION["id_cliente"]);
        
                $p_sql->execute();
        
                $lista = $p_sql->fetchAll(PDO::FETCH_ASSOC); // Fix here
                
                $f_lista = array();
                
                foreach($lista as $l){
                    $f_lista[] = $this->listaColeta($l);
                }
                
                return $f_lista;
            }
            catch(Exception $e){
                print "Ocorreu um erro ao buscar todas as coletas <br>". $e ."<br>";
            }
        }

        public function read(){
            try{
                $sql = "SELECT * FROM coleta  order by status asc";
                $result = Conexao::getConexao()->query($sql);
                $lista = $result->fetchALL(PDO::FETCH_ASSOC);
                $f_lista = array();
                
                foreach($lista as $l){
                    $f_lista[] = $this->listaColeta($l);
                }
                
                return $f_lista;
            }
            catch(Exception $e){
                print "Ocorreu um erro ao buscar todos os clientes <br>". $e ."<br>";
            }
        }



        public function minhasColetas(){
            try{
                $sql = "SELECT * FROM coleta where status = 2 and id_catador = :id_catador";

                $p_sql = Conexao::getConexao()->prepare($sql);
                
                $p_sql->bindValue(":id_catador", $_SESSION["id_cliente"]);
        
                $p_sql->execute();
        
                $lista = $p_sql->fetchAll(PDO::FETCH_ASSOC); // Fix here
                
                $f_lista = array();
                
                foreach($lista as $l){
                    $f_lista[] = $this->listaColeta($l);
                }
                
                return $f_lista;
            }
            catch(Exception $e){
                print "Ocorreu um erro ao buscar todas as coletas <br>". $e ."<br>";
            }
        }

        public function historicoColetas(){
            try{
                $sql = "SELECT * FROM coleta where status = 3 and id_catador = :id_catador";
                $p_sql = Conexao::getConexao()->prepare($sql);
                
                $p_sql->bindValue(":id_catador", $_SESSION["id_cliente"]);
        
                $p_sql->execute();
        
                $lista = $p_sql->fetchAll(PDO::FETCH_ASSOC); // Fix here
                
                $f_lista = array();
                
                foreach($lista as $l){
                    $f_lista[] = $this->listaColeta($l);
                }
                
                return $f_lista;
            }
            
            catch(Exception $e){
                print "Ocorreu um erro ao buscar todas as coletas <br>". $e ."<br>";
            }
        }


        public function novaColeta(){
            try{
                $sql = "SELECT * FROM coleta where status = 1 order by id_coleta desc ";
                $result = Conexao::getConexao()->query($sql);
                $lista = $result->fetchALL(PDO::FETCH_ASSOC);
                $f_lista = array();
                
                foreach($lista as $l){
                    $f_lista[] = $this->listaColeta($l);
                }
                
                return $f_lista;
            }
            catch(Exception $e){
                print "Ocorreu um erro ao buscar todas as coletas <br>". $e ."<br>";
            }
        }

        private function listaColeta($row){
            $coleta = new Coleta();
            $coleta->setId_coleta($row['id_coleta']);
            $coleta->setData_cadastro($row['data_cadastro']);
            $coleta->setData_coleta($row['data_coleta']);
            $coleta->setStatus($row['status']);
            $coleta->setId_cliente($row['id_cliente']);
            $coleta->setInfo_adicionais($row['info_adicionais']);
            $coleta->setHr_disp_inicial($row['hr_disp_inicial']);
            $coleta->setHr_disp_final($row['hr_disp_final']);
            $coleta->setId_catador($row['id_catador']);
            $coleta->setPlastico($row['plastico']);
            $coleta->setPapel($row['papel']);
            $coleta->setPapelao($row['papelao']);
            $coleta->setMadeira($row['madeira']);
            $coleta->setVidro($row['vidro']);
            $coleta->setMetal($row['metal']);
            $coleta->setRua($row['rua']);
            $coleta->setNumero($row['numero']);
            $coleta->setBairro($row['bairro']);
            $coleta->setCidade($row['cidade']);
            $coleta->setEstado($row['estado']);
            $coleta->setReferencia($row['referencia']);
            $coleta->setNome($row['nome']);
            $coleta->setTelefone($row['telefone']);

            return $coleta;
        }

        public function delete(Coleta $coleta){
            try{
                $sql = "DELETE FROM coleta where id_coleta = :id_coleta";
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":id_coleta",$coleta->getId_coleta());
                
                return $p_sql->execute();

            }
            catch(Exception $e){
                print "Erro ao excluir o cursado <br>". $e ."<br>";
            }
        }

        public function update(Coleta $coleta){ // altera o usuario

            try{ 
                $sql = "UPDATE coleta SET status = :status where id_coleta = :id_coleta";

                    $p_sql = Conexao::getConexao()->prepare($sql);
                    $p_sql->bindValue(":status",$coleta->getStatus());   
                    $p_sql->bindValue(":id_coleta", $coleta->getId_coleta());
                    
                    
                    return $p_sql->execute();
            }

            catch(Exception $erro){
                print "Ocorreu um erro ao tentar atualizar o usuários <br>". $erro ."br";
            }
        }

        public function aceitar(Coleta $coleta){
            try{
                $sql = "update coleta set id_catador = :id_catador, status = :status where id_coleta = :id_coleta";

                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":id_catador",$coleta ->getId_catador());
                $p_sql->bindValue(":status",2);      
                $p_sql->bindValue(":id_coleta", $coleta->getId_coleta());
                    
                return $p_sql->execute();
            }

            catch(Exception $erro){
                print "Ocorreu um erro ao tentar agendar uma coleta <br>". $erro ."br";
            }
        }
        public function recusar(Coleta $coleta){
            try{
                $sql = "update coleta set id_catador = :id_catador, status = :status where id_coleta = :id_coleta";

                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":id_catador",$coleta ->getId_catador());
                $p_sql->bindValue(":status",4);      
                $p_sql->bindValue(":id_coleta", $coleta->getId_coleta());
                    
                return $p_sql->execute();
            }

            catch(Exception $erro){
                print "Ocorreu um erro ao tentar agendar uma coleta <br>". $erro ."br";
            }
        }
        public function agendar(Coleta $coleta){
            try{
                $sql = "INSERT into coleta (id_coleta, data_cadastro, id_cliente, info_adicionais, hr_disp_inicial, hr_disp_final, plastico, vidro, madeira, metal, papel, papelao, rua, numero, bairro, cidade, estado, referencia, nome, telefone) values (:id_coleta, current_date(), :id_cliente, :info_adicionais, :hr_disp_inicial, :hr_disp_final, :plastico, :vidro, :madeira, :metal, :papel, :papelao, :rua, :numero, :bairro, :cidade, :estado, :referencia, :nome, :telefone)";
                $p_sql = Conexao::getConexao()->prepare($sql);

                $p_sql -> bindValue(":id_coleta", null);
                $p_sql -> bindValue(":id_cliente", $coleta->getId_cliente());
                $p_sql -> bindValue(":info_adicionais", $coleta->getInfo_adicionais());
                $p_sql -> bindValue(":hr_disp_inicial", $coleta->getHr_disp_inicial());
                $p_sql -> bindValue(":hr_disp_final", $coleta->getHr_disp_final());
                $p_sql -> bindValue(":plastico", $coleta->getPlastico());
                $p_sql -> bindValue(":vidro", $coleta->getVidro());
                $p_sql -> bindValue(":madeira", $coleta->getMadeira());
                $p_sql -> bindValue(":metal", $coleta->getMetal());
                $p_sql -> bindValue(":papel", $coleta->getPapel());
                $p_sql -> bindValue(":papelao", $coleta->getPapelao());
                $p_sql -> bindValue(":rua", $coleta->getRua());
                $p_sql -> bindValue(":numero", $coleta->getNumero());
                $p_sql -> bindValue(":bairro", $coleta->getbairro());
                $p_sql -> bindValue(":cidade", $coleta->getCidade());
                $p_sql -> bindValue(":estado", $coleta->getEstado());
                $p_sql -> bindValue(":referencia", $coleta->getReferencia());
                $p_sql -> bindValue(":nome", $coleta->getNome());
                $p_sql -> bindValue(":telefone", $coleta->getTelefone());

                return $p_sql->execute();
            }

            catch(Exception $erro){
                print "Ocorreu um erro ao tentar agendar uma coleta <br>". $erro ."br";
            }
        }
    }
?>