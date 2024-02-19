<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginCSS.css" type="text/css">
</head>
<body>
    <section class="area-login">
        <div class="login">
            <div>
                <img src="imagens/rec.png">
            </div>
			
        <form method="post">
		<div class="radio">
			<input type="radio" id="cliente" name="conta" value="cliente">
			<label for="cliente">Cliente</label>

            <input type="radio" id="catador" name="conta" value="catador">
			<label for="catador">Catador</label>
            
        </div>
            <input type="text" name="nome" placeholder="Nome do usuario" autofocus>
            <input type="password" name="senha" placeholder="Digite sua senha">
            <input type="password" name="senha" placeholder="Confirme sua senha">
            <input type="submit" value="Entrar" href="../tcc-front/login.html">
        </form>
        
		

        </div>
    </section> 
	
	

</body>
</html>