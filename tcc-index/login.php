<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../src/css/loginCSS.css" type="text/css">
    <link rel="shortcut icon" href="../src/imagens/logoatt.png" type="image/x-icon">
</head>
<body>
    <section class="area-login">
        <div class="login">
            <div>
                <img src="../src/imagens/rec.png">
            </div>
			
        <form method="post" name="form" action="loginverificar.php">
            <input type="text" name="email" placeholder="Digite seu e-mail" autofocus>
            <input type="password" name="senha" placeholder="Digite sua senha">
            <input type="submit" value="Entrar" name="entrar">
        </form>
        <p>Ainda não tem conta?<a href="../tcc-index/logincreate.php">Criar conta</a></p>
		

        </div>
    </section> 
	
	

</body>
</html>