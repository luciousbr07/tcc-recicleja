<?php
        include_once "../restrito.php";
        include_once "../dao/ClienteDAO.php";
        include_once "../model/Cliente.php";
        include_once "../conexao/Conexao.php";
        include_once "../dao/ColetaDAO.php";
        include_once "../model/Coleta.php";
    
        $coleta = new Coleta();
        $coletadao = new ColetaDao(); 
        
        include_once "../conexao/Conexao.php";
        include_once "../dao/MaterialDAO.php";
        include_once "../model/Material.php";

        $material = new Material();
        $materialdao = new MaterialDao();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar coleta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="../src/css/formularios.css">
    <link rel="shortcut icon" href="../src/imagens/logoatt.png" type="image/x-icon">
    <style>
      .input-single{
        width: 100%;
        margin: 40px 0;
        position: relative;
      }

      .cor, .cor-nav{
        background-color: #f0f8ff;
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
    <main>
          <div class="formulario">
            <h2>Agendar coleta</h2>
            <form action="../controller/ColetaController.php" method="post">
            <label>Selecione os materiais a serem coletados:</label>
              <div class="materiais">
              <?php foreach ($materialdao->read() as $material) : ?>

                <input type="checkbox" name="<?php echo $material->getMaterial(); ?>" value="<?php echo $material->getMaterial(); ?>" />
                    <label for="<?php echo $material->getMaterial() ?>"><?php echo $material->getMaterial() ?></label>
                  
              <?php endforeach ?>
                  
              </div>
          

          <div class="input-single">
            <input type="date" name="data" id="data" class="input cor" required>
            <label class="data" for="data">Dia da Coleta:</label>
          </div>

          <div class="input-single">
            <input type="time" name="horainic" id="horainic" class="input cor" required>
            <label class="data" for="horainic">Horário Inicial</label>
          </div>
          <div class="input-single">
            <input type="time" name="horafin" id="horainic" class="input cor" required>
            <label class="data" for="horafin">Horário Final</label>
          </div>

          <div class="input-single">
            <input type="text" name="info" id="info" class="input cor" required>
            <label for="info">Informações adcionais:</label>
          </div>
          
          <input type="submit" name="Finalizar" value="Finalizar" class="btn btn-primary">
        </form>
      </div>
      </main><!--Fim formulario-->

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