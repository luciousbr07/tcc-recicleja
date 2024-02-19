<?php 
include_once "../restrito.php";
include_once "../dao/ClienteDao.php";
include_once "../model/Cliente.php";
include_once "../dao/ConteudoDAO.php";
include_once "../model/Conteudo.php";
include_once "../conexao/Conexao.php";

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
  <link rel="stylesheet" href="../src/css/style.css">
  <link rel="stylesheet" href="../src/css/cards.css">
  <link rel="shortcut icon" href="../src/imagens/logoatt.png" type="image/x-icon">
  <style>
    body{
      background-color: #E6EBF0;
      
    }
    .corbody{
      background-color: #f0f8ff;
    }
    .cor-nav{
      background-color: #f0f8ff;
    }

    .vermais{
      width: 100vw;
      display: flex;
      justify-content: center;
    }
    .vermais button{
      width: 30%;
      height: 40px;
      border-radius: 20px;
      border: none;
      background-color: rgb(96, 127, 184);
      color: white;
    }
    .vermais button a{
      text-decoration: none;
      color: white;
    }
  </style>
</head>
<body class="corbody">
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

<!--Inicio Carousel-->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

  <!-- Início indicadores para navegar nos slides do carousel -->
  <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
  </div>
  <!-- Fim indicadores para navegar nos slides do carousel -->

  <!-- Início slide carousel -->
  <div class="carousel-inner">
      <div class="carousel-item active">
          <img src="../src/imagens/banner1.png" class="d-block w-100" alt="Categoria 1">
      </div>
      <div class="carousel-item">
          <img src="../src/imagens/banner2.png" class="d-block w-100" alt="Categoria 2">
      </div>
      <div class="carousel-item">
          <img src="../src/imagens/banner3.png" class="d-block w-100" alt="Categoria 3">

      </div>
  </div>
  <!-- Fim slide carousel -->

  <!-- Início anterior e próximo slide carousel -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
  </button>
  <!-- Fim anterior e próximo slide carousel -->

</div> <!--Fim Carousel-->

<div class="container text-center mt-5"> <!--Inicio grid-conteudo -->
  <div class="row justify-content-around">

  <?php foreach ($conteudodao->read() as $conteudo) : ?>

    <?php if(($conteudo->getPagina()) == "Index e Como separar"){ ?> 

    <div class="col-5 quadro mt-3">
      <div class="container-card">
        <div class="card">
            <div class="img">
                <span><?php echo $conteudo->getTitulo() ?></span>
            </div>

            <div class="content">
                <p class="desc"><?php echo $conteudo->getConteudo() ?></p>
            </div>

        </div>
    </div>
    </div>
    <?php } ?>
    <?php endforeach ?>
    
  </div>
</div> <!--Fim grid-conteudo -->
<br><br>
<div class="vermais">
  <button><a href="comoreciclar.php">Veja mais Dicas</a></button>
</div>
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