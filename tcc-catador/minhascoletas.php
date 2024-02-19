<?php
    include_once "../restrito.php";
    include_once "../conexao/Conexao.php";
    include_once "../dao/ClienteDAO.php";
    include_once "../model/Cliente.php";
    include_once "../dao/ColetaDAO.php";
    include_once "../model/Coleta.php";

    $coleta = new Coleta();
    $coletadao = new ColetaDao();

    $cliente = new Cliente();
    $clientedao = new ClienteDao();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas coletas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/css/style.css">
  
    <link rel="shortcut icon" href="../src/imagens/logoatt.png" type="image/x-icon">
    <style>
      .input-single{
        width: 100%;
        margin: 40px 0;
        position: relative;
      }
      h2{
    color: cornflowerblue;
    font-size: 20px;
    font-weight: strong;
  }
      .cor, .cor-nav{
        background-color: #f0f8ff;
      }

      /* Estilo para telas menores (tablets e celulares) */
      @media (max-width: 768px) {
        /* Adicione regras de estilo específicas para telas menores aqui */
        body {
          font-size: 16px; /* Tamanho de fonte maior para legibilidade */
        }

        .navbar {
          padding: 10px; /* Espaçamento interno menor para a barra de navegação */
        }

        .input-single {
          margin: 20px 0; /* Margens menores para os campos de entrada */
        }

        /* Outras regras de estilo específicas para telas menores */
      }

      main{
        display: flex;
        width: 100vw;
        height: 100vh;
        flex-direction: column;
        align-items: center;
        margin-top: 10px;
      }
      .bloco{
        width: 80%;
        height: 300px;
        border: 1px solid #02ba26;
        border-radius: 20px;
        margin: 5px;
        display: flex;
        flex-direction: row;
        
      }

      .conteudo{
        
        margin: 10px;
        width: 20%;
        display: flex;
        flex-direction: column;
       
        align-items: center;
      }

    </style>
</head>
<body class="cor"> <!--bg-success bg-opacity-10-->
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
<br>
<main>
  <h2>Minhas Coletas</h2>
  
  <?php foreach ($coletadao->minhasColetas() as $coleta) : ?>                    
    <div class="bloco">
      <div class="conteudo endereco">
        <h2>Endereço</h2>
              <p><?= $coleta->getRua() ?>, <?= $coleta->getNumero() ?></p>
              <p><?= $coleta->getBairro() ?></p>
              <p><?= $coleta->getCidade() ?>-<?= $coleta->getEstado() ?></p>    
      </div>

      <div class="conteudo material">
        <h2>Material</h2>
              <p><?= $coleta->getPlastico() ?></p>
              <p><?= $coleta->getMadeira() ?></p>
              <p><?= $coleta->getVidro() ?></p>
              <p><?= $coleta->getPapel() ?></p>
              <p><?= $coleta->getMetal() ?></p>
              <p><?= $coleta->getPapelao() ?></p>
      </div>

      <div class="conteudo horario">
        <h2>Horario inicial disponivel</h2>
        <p><?= $coleta->getHr_disp_inicial()?></p>
      </div>
      <div class="conteudo horario">
        <h2>Horario final disponivel</h2>
        <p><?= $coleta->getHr_disp_final()?></p>
      </div>
      <div class="conteudo infoad">
      <h2>Informações Adicionais</h2>
      <p><?= $coleta->getInfo_adicionais()?></p>
      <p><?= $coleta->getReferencia()?></p>
      <p><?= $coleta->getNome()?></p>
      <p><?= $coleta->getTelefone()?></p>
    </div>
      <div class="conteudo acao">
        <h2>Ação</h2>
        <a href="../controller/ColetaController.php?con=<?php echo $coleta->getId_coleta() ?>"><button type="button" class="btn btn-warning">Marcar como concluída</button></a><br>
      </div>
  </div>
  <?php endforeach ?>

  </div>
  <h2>Coletas Concluídas</h2>
  
  <?php foreach ($coletadao->historicoColetas() as $coleta) : ?>                    
    <div class="bloco">
      <div class="conteudo endereco">
        <h2>Endereço</h2>
              <p><?= $coleta->getRua() ?>, <?= $coleta->getNumero() ?></p>
              <p><?= $coleta->getBairro() ?></p>
              <p><?= $coleta->getCidade() ?>-<?= $coleta->getEstado() ?></p>    
      </div>

      <div class="conteudo material">
        <h2>Material</h2>
              <p><?= $coleta->getPlastico() ?></p>
              <p><?= $coleta->getMadeira() ?></p>
              <p><?= $coleta->getVidro() ?></p>
              <p><?= $coleta->getPapel() ?></p>
              <p><?= $coleta->getMetal() ?></p>
              <p><?= $coleta->getPapelao() ?></p>
      </div>

      <div class="conteudo horario">
        <h2>Horario inicial disponivel</h2>
        <p><?= $coleta->getHr_disp_inicial()?></p>
      </div>
      <div class="conteudo horario">
        <h2>Horario final disponivel</h2>
        <p><?= $coleta->getHr_disp_final()?></p>
      </div>
      <div class="conteudo infoad">
      <h2>Informações Adicionais</h2>
      <p><?= $coleta->getInfo_adicionais()?></p>
      <p><?= $coleta->getReferencia()?></p>
      <p><?= $coleta->getNome()?></p>
      <p><?= $coleta->getTelefone()?></p>
    </div>
      <div class="conteudo acao">
        <h2>Ação</h2>
        <button type="button" class="btn btn-success">Concluída</button><br>
      </div>
  </div>
  <?php endforeach ?>

  </div>
</main>

<!--INICIO FOOTER-->
<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-3 mb-0 text-body-secondary">&copy; 2023 TCC, Recicleja</p>

    <a href="/" class="col-md-3  d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
    </a>

    <ul class="nav col-md-6 justify-content-end">
      <li class="nav-item"><a href="../tcc-catador/index.php" class="nav-link px-2 text-body-secondary">Home</a></li>
      <li class="nav-item"><a href="../tcc-catador/dadospessoais.php" class="nav-link px-2 text-body-secondary">Meu perfil</a></li>
      <li class="nav-item"><a href="../tcc-catador/minhascoletas.php" class="nav-link px-2 text-body-secondary">Minhas coleta</a></li>
      <li class="nav-item"><a href="../tcc-catador/comoreciclar.php" class="nav-link px-2 text-body-secondary">Como reciclar</a></li>
      <li class="nav-item"><a href="../tcc-catador/sobre.php" class="nav-link px-2 text-body-secondary">Sobre</a></li>
    </ul>
  </footer>
</div>
<!--FIM FOOTER-->

            
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>