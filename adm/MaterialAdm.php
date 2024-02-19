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
    <title>Área Administrastiva</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="../src/imagens/logoatt.png" type="image/x-icon">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f0f8ff;;
            color: black;
        }

        nav {
            position: fixed;
            height: 350px;
            left: 20px;
            top: 0;
            bottom: 0;
            margin: auto 0;
            background-color: #f0f8ff;
            padding: 20px 10px;
            border-radius: 30px;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-flow: column;
            height: 100%;
        }

        nav ul li {
            width: 100%;
        }

        nav ul li a {
            text-decoration: none;
            color: #1a2238;
            display: flex;
            align-items: center;
            cursor: pointer;
            width: 100%;
            transition: 0.2s all ease;
        }

        nav ul li a svg {
            width: 30px;
            height: 30px;
        }

        nav ul li a svg path {
            transition: 0.2s all ease;
        }

        nav ul li a span {
            position: absolute;
            background-color: #f0f8ff;
            padding: 2px 15px;
            border-radius: 30px;
            margin-left: 10px;
            font-weight: 500;
            font-size: 15px;
            visibility: hidden;
            opacity: 0;
            transition: 0.2s all ease;
        }

        nav ul li a.active,
        nav ul li a:hover {
            color: #f15627;
        }

        nav ul li a.active span,
        nav ul li a:hover span {
            opacity: 1;
            visibility: visible;
            margin-left: 50px;
        }

        nav.active ul li a span {
            position: relative;
            opacity: 1;
            visibility: visible;
            margin-left: 0;
        }

        nav.active ul li a:hover span {
            margin-left: 0;
        }
    </style>
    <script>
        function toggleMenu() {
            var menuBar = document.getElementById('menuBar');
            menuBar.classList.toggle('active');
        }
    </script>
</head>
<body>
<nav id="menuBar" class="">
        <ul>
            <li>
                <a href="javascript:toggleMenu()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" /></svg>
                    <span>Menu</span>
                </a>
            </li>
            <li>
                <a href="ClienteAdm.php">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" /></svg>
                    <span>Cliente</span>
                </a>
            </li>
            <li>
                <a href="ColetaAdm.php">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                    <span>Coleta</span>
                </a>
            </li>
            <li>
                <a href="MaterialAdm.php">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 2a2 2 0 00-2 2v14l3.5-2 3.5 2 3.5-2 3.5 2V4a2 2 0 00-2-2H5zm2.5 3a1.5 1.5 0 100 3 1.5 1.5 0 000-3zm6.207.293a1 1 0 00-1.414 0l-6 6a1 1 0 101.414 1.414l6-6a1 1 0 000-1.414zM12.5 10a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" clip-rule="evenodd" /></svg>
                    <span>Material</span>
                </a>
            </li>
            <li>
                <a href="ConteudoAdm.php">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15M9 12l3 3m0 0l3-3m-3 3V2.25" />
                    </svg>

                    <span>Novo Conteúdo</span>
                </a>
            </li>
            <li>
                <a href="AltConteudoAdm.php">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" /></svg>
                    <span>Alterar Conteúdo</span>
                </a>
            </li>
            <li>
                <a href="../sair.php">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd" /></svg>
                    <span>Sair</span>
                </a>
            </li>
        </ul>
    </nav>

<div class="container">
  <div class="row">
    <div class="col-2"></div>
    <div class="col-10 mt-5">

    <h3>Lista de Materiais</h3>
<!--Tabela-->

<table class="table table-xs table-hover">
            <thead>
                <tr>
                    <th>Id_material</th>
                    <th>material</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($materialdao->read() as $material) : ?>
                    <tr>
                        <td><?= $material->getId_Material() ?></td>
                        <td><?= $material->getMaterial() ?></td>
                        <td class="">
                            <button class="btn  btn-warning" data-toggle="modal" data-target="#editar><?= $material->getId_Material() ?>">
                                Editar
                            </button>
                            <a href="../controller/MaterialController.php?del=<?= $material->getId_Material() ?>">
                            <button class="btn  btn-danger" type="button">Excluir</button>
                            </a>
                        </td>
                    </tr>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="editar><?= $material->getId_material() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../controller/MaterialController.php" method="POST">
                                           <div class="row"> 
                                                <div class="col-md-4"> 
                                                <label>Material: </label>
                                                    <input type="text" name="material" value="<?= $material->getMaterial() ?>" class="form-control"  />
                                                </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <br>
                                                    <input type="hidden" name="id_material" value="<?= $material->getId_material() ?>" />
                                                    <button class="btn btn-primary" type="submit" name="editar">Cadastrar</button>
                                                </div>
                                                </div>
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<br>
<form action="../controller/MaterialController.php" method="POST">
    <h4>Cadastro de Novo Material</h4>
    <label>Material: </label> 
       <input type="text" name="material" class="form-control "/><br>
             <button class="btn btn-primary" type="submit" name="enviar">Enviar</button>
      </form> 
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>