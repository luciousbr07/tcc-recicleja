<?php
include_once "../conexao/Conexao.php";

try {
    if (isset($_POST["entrar"])) { // Alterei para verificar o método POST
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $sqlconsulta = "SELECT * FROM cliente WHERE email = :email";

        $p_sql = Conexao::getConexao()->prepare($sqlconsulta);

        $p_sql->bindValue(":email", $email);
        $p_sql->execute();

        $row = $p_sql->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            echo "<script language=javascript>
                    alert('Usuário não encontrado!');
                    location.href='login.php';
                </script>";
            exit;
        }

        if ($row["situacao"] == 0) {
            echo "<script language=javascript>
                    alert('Usuário inativo!');
                    location.href='acesso.php';
                </script>";
            exit;
        }

        if (password_verify($senha, $row["senha"])) {
            session_start();
            $_SESSION["id_cliente"] = $row["id_cliente"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["senha"] = $row["senha"];
            $_SESSION["nome"] = $row["nome"];
            $_SESSION["tipo"] = $row["tipo"];
            $_SESSION["data_nasc"] = $row["data_nasc"];
            $_SESSION["cpf"] = $row["cpf"];
            $_SESSION["telefone"] = $row["telefone"];
            $_SESSION["cep"] = $row["cep"];
            $_SESSION["numero"] = $row["numero"];
            $_SESSION["bairro"] = $row["bairro"];
            $_SESSION["complemento"] = $row["complemento"];
            $_SESSION["referencia"] = $row["referencia"];
            $_SESSION["cidade"] = $row["cidade"];
            $_SESSION["estado"] = $row["estado"];
            $_SESSION["rua"] = $row["rua"];
            

            if ($row["tipo"] == "administrador")    {
                header("Location: ../adm/ClienteAdm.php");
                exit; // Adicionado para evitar execução posterior
            } else if ($row["tipo"] == "cliente") {
                header("Location: ../tcc-usuario/index.php");
                exit; // Adicionado para evitar execução posterior
            } else if ($row["tipo"] == "catador") {
                header("Location: ../tcc-catador/index.php");
                exit; 
            } 

        }
            
            else {
            echo "<script language=javascript>
                    alert('Erro ao efetuar o login!');
                    location.href='login.php';
                </script>";
            exit;
        }
    }
} 

catch (PDOException $erro) {
    echo "Erro no banco de dados: " . $erro->getMessage();
}
?>
