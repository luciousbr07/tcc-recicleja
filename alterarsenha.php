<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Senha</title>
    <link rel="stylesheet" href="src/css/loginCSS.css" type="text/css">
    <link rel="shortcut icon" href="src/imagens/logoatt.png" type="image/x-icon">
    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
</head>
<body>
    <section class="area-login">
        <div class="login">
        <form method="post" name="form" action="alterarsenha.php">
            <input type="password" name="senha" MAXLENGTH=255 placeholder="Digite sua senha atual" autofocus><br>      
            <input type="password" name="nova_senha" MAXLENGTH=255 placeholder="Informe sua nova senha" autofocus><br>
            <input type="password" name="conf_senha" MAXLENGTH=255 placeholder="Confirme sua nova senha" autofocus><br>
            
            <input type="submit" name="alt" value="Alterar">
        </form>
    
        </div>
    </section> 
	
    <?php
require_once "./conexao/conexao.php";
require_once "restrito.php";
try{
    if(isset($_REQUEST["alt"])){
        $senha = $_REQUEST["senha"];
        $nova_senha = $_REQUEST["nova_senha"];
        $conf_senha = $_REQUEST["conf_senha"];
        $email = $_SESSION["email"];

        $hash = password_hash($nova_senha, PASSWORD_DEFAULT);

        $sqlConsulta = "select senha from cliente where email = :email";

        $p_sql = Conexao::getConexao()->prepare($sqlConsulta);

        $p_sql->bindValue(":email",$email);
        $p_sql->execute();

        $row = $p_sql->fetch(PDO::FETCH_ASSOC);

        if(($nova_senha == $conf_senha)and(password_verify($senha, $row["senha"]))){
            $sqlUpdate = "update cliente set senha = :senha where email = :email";

            $p_sql = Conexao::getConexao()->prepare($sqlUpdate);

            $p_sql->bindValue(":senha", $hash);
            $p_sql->bindValue(":email", $email);

            $p_sql->execute();

            echo "<script language=javascript>
			alert('Senha alterada com sucesso!!!');
			location.href='tcc-index/index.php';
		    </script>";
        }
        else{
            echo "<script language=javascript>
			alert('Ops! Algo deu errado na sua alteração de senha, verifique seus dados e tente novamente');
			location.href='alterarsenha .php';
		    </script>";
        }
    }
}
    catch(PDOException $erro){
        echo $erro->getMessage();
    }
    $conn = null;

?>

</body>

</html>