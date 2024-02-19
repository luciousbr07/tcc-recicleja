<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="shortcut icon" href="../src/imagens/logoatt.png" type="image/x-icon">
    <style>
  
       main{
         width: 100vw;
         height: 675px;
         display: flex;
         flex-direction: row;
         align-items: center;
         justify-content: center;
         margin-bottom: 80px;
       }

       .conteudo{
      
          width: 800px;
          margin-right: 30px;
       }
          
       .cor{
        background-color: #f0f8ff;
      }

      @media (max-width: 1200px) { 
        main{
          flex-direction: column;
        }

        .conteudo{
          margin-bottom: 30px;
        }
      }
    </style>
</head>
<body class="cor">
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
<main>
  <div class="conteudo">
    <h2>Quem somos?</h2>
    <p>Bem-vindo ao nosso site dedicado à reciclagem, criado com paixão por um grupo de cinco estudantes dedicados em seu Trabalho de Conclusão de Curso (TCC)! <br> Nossa equipe, formada por cinco mentes inovadoras, uniu esforços para desenvolver este espaço prático e informativo sobre reciclagem. Cada um de nós contribuiu com habilidades únicas para trazer conteúdo valioso, dicas práticas e recursos envolventes que ajudarão você a incorporar a reciclagem em seu dia a dia.</p>
  </div>

  <div class="imagem">
    <img src="../src/imagens/grupo.jfif" width="600px"  alt="">
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