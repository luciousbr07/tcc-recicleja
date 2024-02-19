<?php
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

      h2{
        color: gray;
      }

      .aviso{
        color: cornflowerblue;
        border: 1px solid black;
        padding: 5px;
        width: 700px;
        border-radius: 20px;
        text-align: center;
      }

      main{
        margin-top: 20px;
        margin-bottom: 0;
      }

    </style>
</head>
<body class="cor"> <!--bg-success bg-opacity-10-->
   <!--Inicio Navbar-->
  <header> 
    <div class="container-fluid cor-nav">
  <nav class="navbar navbar-expand-lg cor-nav">
      <a class="navbar-brand" href="../tcc-index/index.php">
        <img src="../src/imagens/logoatt.png" width="55px">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation"> 
        <span class="navbar-toggler-icon"></span>
      </button> <!--2-->
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02"> <!--1-->
        <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
          <ul class="navbar-nav ">
            <li class="nav-item active">
              <a class="nav-link" href="../tcc-index/index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../tcc-index/agendarcoleta.php">Agendar coleta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../tcc-index/comoreciclar.php">Como separar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../tcc-index/sobre.php">Sobre</a> 
            </li>
          </ul>
        </div>
        <div class="d-flex flex-column flex-lg-row align-items-center">
            <ul class="navbar-nav  ">
              <li class="nav-item">
                <a class="nav-link" href="../tcc-index/login.php">Login</a>
              </li>
              
            </ul>
        </div>
      </div>
  </nav>
  </div>
</header> <!--Fim Navbar-->
<br>
      <main>
        
            <div class="formulario">
                <h2 class="aviso">Realize o login para ter acesso</h2> <br><br>
              <h2>Agendar coleta</h2>
              <form>
              <label>Selecione os materiais a serem coletados:</label>
              <div class="materiais">
              <?php foreach ($materialdao->read() as $material) : ?>

                <input type="checkbox" id="<?php echo $material->getMaterial() ?>" name="<?php echo $material->getMaterial() ?>" value="<?php echo $material->getMaterial() ?>"  readonly>
                    <label for="<?php echo $material->getMaterial() ?>"><?php echo $material->getMaterial() ?></label>
                  
              <?php endforeach ?>
                  
              </div>
            
  
            <div class="input-single">
              <input type="date" name="data" id="data" class="input cor" readonly>
              <label class="data" for="data">Dia da Coleta:</label>
            </div>
  
            <div class="input-single">
              <input type="time" name="horainic" id="horainic" class="input cor" readonly>
              <label class="data" for="horainic">Horário Inicial</label>
            </div>
            <div class="input-single">
              <input type="time" name="horainic" id="horainic" class="input cor" readonly>
              <label class="data" for="horainic">Horário Final</label>
            </div>
  
            <div class="info">
              <label for="info">Informações adcionais:</label>
              <textarea name="info" id="info" rows="10" readonly></textarea>
            </div>
            <button class="btn btn-secondary">Finalizar</button>
          </form>
        </div>
        </main><!--Fim formulario-->

        <!--INICIO FOOTER-->
        <div class="container">
          <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-3 mb-0 text-body-secondary">&copy; 2023 TCC, Recicleja</p>
        
            <a href="/" class="col-md-3  d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
              <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            </a>
        
            <ul class="nav col-md-6 justify-content-end">
              <li class="nav-item"><a href="../tcc-index/index.php" class="nav-link px-2 text-body-secondary">Home</a></li>
              <li class="nav-item"><a href="../tcc-index/agendarcoleta.php" class="nav-link px-2 text-body-secondary">Agendar coleta</a></li>
              <li class="nav-item"><a href="../tcc-index/comoreciclar.php" class="nav-link px-2 text-body-secondary">Como reciclar</a></li>
              <li class="nav-item"><a href="../tcc-index/sobre.php" class="nav-link px-2 text-body-secondary">Sobre</a></li>
            </ul>
          </footer>
        </div>
        <!--FIM FOOTER-->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>