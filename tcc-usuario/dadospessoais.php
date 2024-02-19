<?php
    include_once "../restrito.php";
    include_once "../conexao/Conexao.php";
    include_once "../dao/ClienteDAO.php";
    include_once "../model/Cliente.php";

    $cliente = new Cliente();
    $clientedao = new ClienteDao(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recicle já</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="../src/css/style.css">
  <link rel="stylesheet" href="../src/css/formularios.css">
  <link rel="shortcut icon" href="../src/imagens/logoatt.png" type="image/x-icon">
  <style>
  .input-single{
    width: 100%;
    margin: 30px 0;
  }

  .cor{
    background-color: #f0f8ff;
  }

  .cor-nav{
    background-color: #f0f8ff
  }
  </style>
</head>
<body class="cor"> <!--bg-success bg-opacity-10-->
  <!--Inicio Navbar-->
  <header> 
    <div class="container-fluid cor-nav">
  <nav class="navbar navbar-expand-lg cor-nav">
      <a class="navbar-brand" href="../tcc-usuario/index.php">
        <img src="../src/imagens/logoatt.png" width="55px">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation"> 
        <span class="navbar-toggler-icon"></span>
      </button> <!--2-->
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02"> <!--1-->
        <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
          <ul class="navbar-nav ">
            <li class="nav-item active">
              <a class="nav-link" href="../tcc-usuario/index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Meu perfil
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../tcc-usuario/dadospessoais.php">Dados pessoais</a></li>
                <li><a class="dropdown-item" href="../tcc-usuario/historico.php">Histórico</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../tcc-usuario/agendarcoleta.php">Agendar coleta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../tcc-usuario/comoreciclar.php">Como separar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../tcc-usuario/sobre.php">Sobre</a> 
            </li>
          </ul>
        </div>
        <div class="d-flex flex-column flex-lg-row align-items-center">
            <ul class="navbar-nav  ">
              <li class="nav-item">
                <a class="nav-link" href="../sair.php">Sair</a>
              </li>
              
            </ul>
        </div>
      </div>
  </nav>
  </div>
</header> <!--Fim Navbar-->
<!--Inicio formulario-->
<main class="cor">
    <div class="formulario">
    <h2>Dados pessoais</h2>
    <form action="../controller/ClienteController.php" method="POST">
      <div class="input-single">
        <input type="text" name="nome" id="nome" class="input cor" value="<?php echo $_SESSION['nome']; ?>" required>
        <label for="nome">Nome:</label>
      </div>
      <div class="input-single">
        <input type="text" name="email" id="email" class="input cor" value="<?php echo $_SESSION['email']; ?>" required>
        <label for="email">E-Mail</label>
      </div>
      <div class="input-single">
        <input type="text" name="cpf" id="cpf" class="input cor" value="<?php echo $_SESSION['cpf']; ?>" required>
        <label for="cpf">CPF:</label>
      </div>
      <div class="input-single">
        <input type="date" name="data" id="data" class="input cor" value="<?php echo $_SESSION['data_nasc']; ?>" required>
        <label class="data" for="data">Data de nascimento:</label>
      </div>
      <div class="input-single">
        <input type="text" name="telefone" id="telefone" class="input cor"value="<?php echo $_SESSION['telefone']; ?>" required>
        <label for="telefone">Telefone:</label>
      </div>
      <div class="input-single">
        <input type="text" name="cep" id="referencia" class="input cor" value="<?php echo $_SESSION['cpf']; ?>" required>
        <label for="referencia">CEP:</label>
      </div>
  </div>

  <div class="formulario">
      <div class="input-single">
        <input type="text" name="rua" id="rua" class="input cor" value="<?php echo $_SESSION['rua']; ?>" required>
        <label for="rua">Rua:</label>
      </div>
      <div class="input-single">
        <input type="text" name="numero" id="numero" class="input cor" value="<?php echo $_SESSION['numero']; ?>" required>
        <label for="numero">Número:</label>
      </div>
      <div class="input-single">
        <input type="text" name="bairro" id="bairro" class="input cor" value="<?php echo $_SESSION['bairro']; ?>" required>
        <label for="bairro">Bairro:</label>
      </div>
      <div class="input-single">
        <input type="text" name="complemento" id="complemento" class="input cor" value="<?php echo $_SESSION['complemento']; ?>" >
        <label for="complemento">Complemento (opcional):</label>
      </div>
      <div class="input-single">
        <input type="text" name="referencia" id="referencia" class="input cor" value="<?php echo $_SESSION['referencia']; ?>" required>
        <label for="referencia">Referencia:</label>
      </div>
      <div class="input-single">
        <input type="text" name="cidade" id="cidade" class="input cor" value="<?php echo $_SESSION['cidade']; ?>" required>
        <label for="cidade">Cidade:</label>
      </div>
      <div class="input-single">
        <input type="text" name="estado" id="estado" class="input cor"  value="<?php echo $_SESSION['estado']; ?>" required>
        <label for="estado">Estado:</label>
      </div>
      <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
    </form>

    
    <div class="row pt-2">
      <form action="../alterarsenha.php">
        <input type="submit" name="alterarsenha" value="Alterar Senha" class="btn btn-primary">
      </form>
    </div>

   
      
    
    
  </div>
  </div>
  </main>
    <!--INICIO FOOTER-->
    <div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-3 mb-0 text-body-secondary"><img src="../src/imagens/logoatt.png" width="55px"></p>

    <a href="/" class="col-md-3  d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
    </a>

    <ul class="nav col-md-6 justify-content-end">
      <li class="nav-item"><a href="../tcc-usuario/index.php" class="nav-link px-2 text-body-secondary">Home</a></li>
      <li class="nav-item"><a href="../tcc-usuario/dadospessoais.php" class="nav-link px-2 text-body-secondary">Meu perfil</a></li>
      <li class="nav-item"><a href="../tcc-usuario/agendarcoleta.php" class="nav-link px-2 text-body-secondary">Agendar coleta</a></li>
      <li class="nav-item"><a href="../tcc-usuario/comoreciclar.php" class="nav-link px-2 text-body-secondary">Como separar</a></li>
      <li class="nav-item"><a href="../tcc-usuario/sobre.php" class="nav-link px-2 text-body-secondary">Sobre</a></li>
    </ul>
  </footer>
</div>
<!--FIM FOOTER-->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
