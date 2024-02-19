<?php
    class ClienteDao{
        public function read(){
            try{
                $sql = "SELECT * FROM cliente order by id_cliente asc";
                $result = Conexao::getConexao()->query($sql);
                $lista = $result->fetchALL(PDO::FETCH_ASSOC);
                $f_lista = array();
                
                foreach($lista as $l){
                    $f_lista[] = $this->listaCliente($l);
                }
                
                return $f_lista;
            }
            catch(Exception $e){
                print "Ocorreu um erro ao buscar todos os clientes <br>". $e ."<br>";
            }
        }

        private function listaCliente($row){
            $cliente = new Cliente();
            $cliente->setId_cliente($row['id_cliente']);
            $cliente->setNome($row['nome']);
            $cliente->setEmail($row['email']);
            $cliente->setSenha($row['senha']);
            $cliente->setCpf($row['cpf']);
            $cliente->setData_nasc($row['data_nasc']);
            $cliente->setTelefone($row['telefone']);
            $cliente->setRua($row['rua']);
            $cliente->setNumero($row['numero']);
            $cliente->setComplemento($row['complemento']);
            $cliente->setReferencia($row['referencia']);
            $cliente->setBairro($row['bairro']);
            $cliente->setCep($row['CEP']);
            $cliente->setCidade($row['cidade']);
            $cliente->setTipo($row['tipo']);
            $cliente->setEstado($row['estado']);

            return $cliente;
        }

        public function delete(Cliente $cliente){
            try{
                $sql = "DELETE FROM cliente where id_cliente = :id_cliente";
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":id_cliente",$cliente->getId_cliente());
                
                return $p_sql->execute();

            }
            catch(Exception $e){
                print "Erro ao excluir o cursado <br>". $e ."<br>";
            }
        }

        public function update(Cliente $cliente){ // altera o usuario

            try{
                $sql = "UPDATE cliente SET nome = :nome, email = :email, senha = :senha, cpf = :cpf, data_nasc = :data_nasc, telefone = :telefone, rua = :rua, numero = :numero, complemento = :complemento, referencia = :referencia, bairro = :bairro, cep = :cep, cidade = :cidade, tipo = :tipo, estado = :estado where id_cliente = :id_cliente";

                    $p_sql = Conexao::getConexao()->prepare($sql);
                    $p_sql->bindValue(":nome",$cliente->getNome());
                    $p_sql->bindValue(":email",$cliente->getEmail());
                    $p_sql->bindValue(":senha",$cliente->getSenha());
                    $p_sql->bindValue(":cpf",$cliente->getCpf());
                    $p_sql->bindValue(":data_nasc",$cliente->getData_nasc());
                    $p_sql->bindValue(":telefone",$cliente->getTelefone());
                    $p_sql->bindValue(":rua",$cliente->getRua());
                    $p_sql->bindValue(":numero",$cliente->getNumero());
                    $p_sql->bindValue(":complemento",$cliente->getComplemento());
                    $p_sql->bindValue(":referencia",$cliente->getReferencia());
                    $p_sql->bindValue(":bairro",$cliente->getBairro());
                    $p_sql->bindValue(":cep",$cliente->getCep());
                    $p_sql->bindValue(":cidade",$cliente->getCidade());
                    $p_sql->bindValue(":tipo",$cliente->getTipo());
                    $p_sql->bindValue(":estado",$cliente->getEstado());
                    $p_sql->bindValue(":id_cliente",$cliente->getId_cliente());
                    
                    return $p_sql->execute();
            }

            catch(Exception $erro){
                print "Ocorreu um erro ao tentar atualizar o usuários <br>". $erro ."br";
            }
        }

        public function updateCliente(Cliente $cliente){ // altera o usuario

            try{
                $sql = "UPDATE cliente SET nome = :nome, email = :email, cpf = :cpf, telefone = :telefone, rua = :rua, numero = :numero, complemento = :complemento, referencia = :referencia, bairro = :bairro, cep = :cep, cidade = :cidade, estado = :estado where id_cliente = :id_cliente";

                    $p_sql = Conexao::getConexao()->prepare($sql);
                    $p_sql->bindValue(":nome",$cliente->getNome());
                    $p_sql->bindValue(":email",$cliente->getEmail());
                    $p_sql->bindValue(":cpf",$cliente->getCpf());
                    $p_sql->bindValue(":telefone",$cliente->getTelefone());
                    $p_sql->bindValue(":rua",$cliente->getRua());
                    $p_sql->bindValue(":numero",$cliente->getNumero());
                    $p_sql->bindValue(":complemento",$cliente->getComplemento());
                    $p_sql->bindValue(":referencia",$cliente->getReferencia());
                    $p_sql->bindValue(":bairro",$cliente->getBairro());
                    $p_sql->bindValue(":cep",$cliente->getCep());
                    $p_sql->bindValue(":cidade",$cliente->getCidade());
                    $p_sql->bindValue(":estado",$cliente->getEstado());
                    $p_sql->bindValue(":id_cliente",$cliente->getId_cliente());
                    
                    return $p_sql->execute();
            }
            catch(Exception $erro){
                print "Ocorreu um erro ao tentar atualizar o usuários <br>". $erro ."br";
            }
        }

        public function create(Cliente $cliente){
            try{
                $sql = "INSERT into cliente (id_cliente, nome, email, senha, cpf, data_nasc, telefone, rua, numero, complemento, referencia, bairro, CEP, cidade, tipo, estado) values (:id_cliente, :nome, :email, :senha, :cpf, :data_nasc, :telefone, :rua, :numero, :complemento, :referencia, :bairro, :CEP, :cidade, :tipo, :estado)";

                $p_sql = Conexao::getConexao()->prepare($sql);

                $p_sql ->bindValue(":id_cliente", null);
                $p_sql ->bindValue(":nome", $cliente->getNome());
                $p_sql ->bindValue(":email", $cliente->getEmail());
                $p_sql ->bindValue(":senha", $cliente->getSenha());
                $p_sql ->bindValue(":cpf", $cliente->getCpf());
                $p_sql ->bindValue(":data_nasc", $cliente->getData_nasc());
                $p_sql ->bindValue(":telefone", $cliente->getTelefone());
                $p_sql ->bindValue(":rua", $cliente->getRua());
                $p_sql ->bindValue(":numero", $cliente->getNumero());
                $p_sql ->bindValue(":complemento", $cliente->getComplemento());
                $p_sql ->bindValue(":referencia", $cliente->getReferencia());
                $p_sql ->bindValue(":bairro", $cliente->getBairro());
                $p_sql ->bindValue(":CEP", $cliente->getCep());
                $p_sql ->bindValue(":cidade", $cliente->getCidade());
                $p_sql ->bindValue(":tipo", $cliente->getTipo());
                $p_sql ->bindValue(":estado", $cliente->getEstado());

                return $p_sql->execute();
            }

            catch(Exception $erro){
                print "Ocorreu um erro ao tentar atualizar o usuários <br>". $erro ."br";
            }
        }
    }
?>