<?php
    class MaterialDao{
        public function read(){
            try{
                $sql = "SELECT * FROM material";
                $result = Conexao::getConexao()->query($sql);
                $lista = $result->fetchALL(PDO::FETCH_ASSOC);
                $f_lista = array();
                
                foreach($lista as $l){
                    $f_lista[] = $this->listaMaterial($l);
                }
                
                return $f_lista;
            }
            catch(Exception $e){
                print "Ocorreu um erro ao buscar todos os clientes <br>". $e ."<br>";
            }
        }

        private function listaMaterial($row){
            $material = new Material();
            $material->setId_Material($row['id_material']);
            $material->setMaterial($row['material']);
            

            return $material;
        }

        public function delete(Material $material){
            try{
                $sql = "DELETE FROM material where id_material = :id_material";
                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":id_material",$material->getId_material());
                
                return $p_sql->execute();

            }
            catch(Exception $e){
                print "Erro ao excluir o material <br>". $e ."<br>";
            }
        }

        public function update(Material $material){
            try{
                $sql = "UPDATE material set material = :material where id_material = :id_material";

                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":material",$material->getMaterial());
                $p_sql->bindValue(":id_material",$material->getId_material());

                return $p_sql->execute();
            }

            catch(Exception $e){
                print "Erro ao editar o material <br>". $e ."<br>";
            }
        }

        public function create(Material $material){
            try{
                $sql = "INSERT into material (id_material, material) values (:id_material, :material)";

                $p_sql = Conexao::getConexao()->prepare($sql);

                $p_sql ->bindValue(":id_material", null);
                $p_sql ->bindValue(":material", $material->getMaterial());
               

                return $p_sql->execute();
            }

            catch(Exception $erro){
                print "Ocorreu um erro ao tentar atualizar o material <br>". $erro ."br";
            }
        }
    }
?>