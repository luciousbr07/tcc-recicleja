<?php
        include_once "../conexao/Conexao.php";
        include_once "../dao/ClienteDao.php";
        include_once "../model/Cliente.php";

        include_once "../restrito.php";


        $cliente = new Cliente();
        $clientedao = new ClienteDao();

        $d = filter_input_array(INPUT_POST);

        if(isset($_GET['del'])){
                $cliente->setId_cliente($_GET['del']); //metodo GET pega o valor que veio com o del
                $clientedao->delete($cliente);
                header("Location: ../adm/ClienteAdm.php");
            }
        else if(isset($_POST["editar"])){

                $cliente -> setNome($d['nome']);   
                $cliente -> setEmail($d['email']);
                $cliente -> setSenha($d['senha']);
                $cliente -> setCpf($d['cpf']);
                $cliente -> setData_nasc($d['data_nasc']);
                $cliente -> setTelefone($d['telefone']);
                $cliente -> setRua($d['rua']);
                $cliente -> setNumero($d['numero']);
                $cliente -> setComplemento($d['complemento']);
                $cliente -> setReferencia($d['referencia']);
                $cliente -> setBairro($d['bairro']);
                $cliente -> setCep($d['cep']);
                $cliente -> setCidade($d['cidade']);
                $cliente -> setTipo($d['tipo']);
                $cliente -> setEstado($d['estado']);
                $cliente -> setId_cliente($d['id_cliente']);

                $clientedao -> update($cliente); 

                header("Location: ../adm/ClienteAdm.php");
            }

            else if(isset($_POST["alterar"])){

                $cliente -> setNome($d['nome']);   
                $cliente -> setEmail($d['email']);
                $cliente -> setCpf($d['cpf']);
                $cliente -> setTelefone($d['telefone']);
                $cliente -> setRua($d['rua']);
                $cliente -> setNumero($d['numero']);
                $cliente -> setComplemento($d['complemento']);
                $cliente -> setReferencia($d['referencia']);
                $cliente -> setBairro($d['bairro']);
                $cliente -> setCep($d['cep']);
                $cliente -> setCidade($d['cidade']);
                $cliente -> setEstado($d['estado']);
                $cliente -> setId_cliente($_SESSION['id_cliente']);

                $clientedao -> updateCliente($cliente); 

               header("Location: ../tcc-index/login.php");

            }

        else if(isset($_POST["Cadastrar"])){
                $cliente -> setNome($d['nome']);   
                $cliente -> setEmail($d['email']);

                $senha = $d['senha'];

                $senha = password_hash($senha,PASSWORD_DEFAULT);

                $cliente -> setSenha($senha);
                $cliente -> setCpf($d['cpf']);
                $cliente -> setData_nasc($d['data_nasc']);
                $cliente -> setTelefone($d['telefone']);
                $cliente -> setRua($d['rua']);
                $cliente -> setNumero($d['numero']);
                $cliente -> setComplemento($d['complemento']);
                $cliente -> setReferencia($d['referencia']);
                $cliente -> setBairro($d['bairro']);
                $cliente -> setCep($d['CEP']);
                $cliente -> setCidade($d['cidade']);
                $cliente -> setTipo($d['conta']);
                $cliente -> setEstado($d['estado']);

                $clientedao->create($cliente);

                header("Location: ../tcc-index/login.php");
        }
?>