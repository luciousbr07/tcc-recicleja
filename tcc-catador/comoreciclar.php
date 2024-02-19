<?php
    include_once "../conexao/Conexao.php";
    include_once "../dao/ConteudoDAO.php";
    include_once "../model/Conteudo.php";

    $conteudo = new Conteudo();
    $conteudodao = new ConteudoDao(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recicle já</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="../src/css/formularios.css">
  <link rel="shortcut icon" href="../src/imagens/logoatt.png" type="image/x-icon">
 <style>
  body{
    height: 100vh;
    width: 100%;
    background-color: #f0f8ff;
  }
  
      .col{
          margin-top: 15px;
  
      }
    
  .card img{
     width: 350px;
     height: 200px;
  }
  
  .nav-item{
    padding: 10px;
    transform: 1s;
  }
 
  .nav-item:hover{
    border-bottom: 2px solid cornflowerblue;
  }

  .cor-nav{
    background-color: #f0f8ff;
  }

  .center{
    color: cornflowerblue;
    font-size: 23px;
  }

</style>
</head>
<body>
 <!--Inicio Navbar-->
 <header> 
  <div class="container-fluid cor-nav">
<nav class="navbar navbar-expand-lg cor-nav">
    <a class="navbar-brand" href="../tcc-catador/index.php">
      <img src="../src/imagens/logoatt.png" width="55px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation"> 
      <span class="navbar-toggler-icon"></span>
    </button> <!--2-->
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02"> <!--1-->
      <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
        <ul class="navbar-nav ">
          <li class="nav-item active">
            <a class="nav-link" href="../tcc-catador/index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../tcc-catador/dadospessoais.php">Dados Pessoais</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../tcc-catador/minhascoletas.php">Minhas coletas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../tcc-catador/novacoleta.php">Novas coletas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../tcc-catador/comoreciclar.php">Como separar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../tcc-catador/sobre.php">Sobre</a> 
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
  <!--textos informativos-->
  <div class="container text-center">
  <div class="row align-items-center">

  <?php foreach ($conteudodao->read() as $conteudo) : ?>

    <div class="col">
    <div class="card" style="width: 22rem;">
    <img src="<?php echo $conteudo->getCaminho_img() ?>" class="card-img-top" alt="descarte">
    <div class="card-body">
    <p class="card-text center"><?php echo $conteudo->getTitulo() ?></p>
    <p class="card-text"><?php echo $conteudo->getConteudo() ?></p>
    </div>
  </div>
 </div>

  <?php endforeach ?>

</div>
  </div>

<!--INICIO FOOTER-->
<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-3 mb-0 text-body-secondary"><img src="../src/imagens/logoatt.png" width="55px"></p>

    <a href="/" class="col-md-3  d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
    </a>

    <ul class="nav col-md-6 justify-content-end">
      <li class="nav-item"><a href="../tcc-catador/index.php" class="nav-link px-2 text-body-secondary">Home</a></li>
      <li class="nav-item"><a href="../tcc-catador/dadospessoais.php" class="nav-link px-2 text-body-secondary">Meu perfil</a></li>
      <li class="nav-item"><a href="../tcc-catador/minhascoletas.php" class="nav-link px-2 text-body-secondary">Minhas coleta</a></li>
      <li class="nav-item"><a href="../tcc-catador/comoreciclar.php" class="nav-link px-2 text-body-secondary">Como separar</a></li>
      <li class="nav-item"><a href="../tcc-catador/sobre.php" class="nav-link px-2 text-body-secondary">Sobre</a></li>
    </ul>
  </footer>
</div>
<!--FIM FOOTER-->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>