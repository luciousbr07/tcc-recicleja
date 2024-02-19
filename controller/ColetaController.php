<?php
    include_once "../restrito.php";
    include_once "../conexao/Conexao.php";
    include_once "../dao/ColetaDao.php";
    include_once "../model/Coleta.php";

    $coleta = new Coleta();
    $coletadao = new ColetaDao();

    $d = filter_input_array(INPUT_POST);

    if(isset($_GET['del'])){
            $coleta->setId_coleta($_GET['del']); //metodo GET pega o valor que veio com o del
            $coletadao->delete($coleta);
            header("Location: ../adm/ColetaAdm.php");
        }

       else if(isset($_GET['rec'])){
            $coleta->setId_coleta($_GET['rec']); //metodo GET pega o valor que veio com o del
            $coletadao->recusar($coleta);
            header("Location: ../tcc-catador/novacoleta.php");
        }

        // else if(isset($_GET['ac'])){
        //     $coleta->setId_coleta($_GET['ac']); 
        //     $coleta -> setStatus(2);
        //     $coletadao -> update($coleta); 
        //     header("Location: ../tcc-catador/minhascoletas.php");
        // }

        else if(isset($_GET['con'])){
            $coleta->setId_coleta($_GET['con']); //metodo GET pega o valor que veio com o del
            $coleta -> setStatus(3);
            $coletadao -> update($coleta); 
            header("Location: ../tcc-catador/minhascoletas.php");
        }

        else if(isset($_POST["editar_adm"])){
  
            $coleta -> setData_cadastro($d['data_cadastro']);
            $coleta -> setData_coleta($d['data_coleta']);
            $coleta -> setStatus($d['status']);
            $coleta -> setInfo_adicionais($d['info_adicionais']);
            $coleta -> setHr_disp_inicial($d['hr_disp_inicial']);
            $coleta -> setHr_disp_final($d['hr_disp_final']);
            $coleta -> setId_coleta($d['id_coleta']);

            $coletadao -> update_adm($coleta); 

            header("Location: ../adm/ColetaAdm.php");
        }

    else if(isset($_POST["editar"])){
            $coleta -> setStatus($d['status']);
           
            $coletadao -> update($coleta); 

            header("Location: ../adm/ColetaAdm.php");
        }

    else if(isset($_POST["Finalizar"])){
        $coleta -> setId_cliente($_SESSION["id_cliente"]);
        $coleta -> setRua($_SESSION["rua"]);
        $coleta -> setNumero($_SESSION["numero"]);
        $coleta -> setBairro($_SESSION["bairro"]);
        $coleta -> setCidade($_SESSION["cidade"]);
        $coleta -> setEstado($_SESSION["estado"]);
        $coleta -> setInfo_adicionais($d["info"]);
        $coleta -> setHr_disp_inicial($d["horainic"]);
        $coleta -> setHr_disp_final($d["horafin"]);
        $coleta -> setReferencia($_SESSION["referencia"]);
        $coleta -> setNome($_SESSION["nome"]);
        $coleta -> setTelefone($_SESSION["telefone"]);
        $coleta ->setData_cadastro($d["data"]);

        if(isset($d["Plástico"])){
            $coleta ->setPlastico("Plástico");
        }

        else{
            $coleta ->setPlastico("");
        }

        if(isset($d["Vidro"])){
            $coleta ->setVidro("Vidro");
        }

        else{
            $coleta ->setVidro("");
        }

        if(isset($d["Metal"])){
            $coleta ->setMetal("Metal");
        }

        else{
            $coleta ->setMetal("");
        }

        if(isset($d["Papel"])){
            $coleta ->setPapel("Papel");
        }

        else{
            $coleta ->setPapel("");
        }

        if(isset($d["Papelão"])){
            $coleta ->setPapelao("Papelão");
        }

        else{
            $coleta ->setPapelao("");
        }

        if(isset($d["Madeira"])){
            $coleta ->setMadeira("Madeira");
        }

        else{
            $coleta ->setMadeira("");
        }

        $coletadao->agendar($coleta);

        header("Location: ../tcc-usuario/historico.php");
    }

    else if(isset($_REQUEST["ac"])){
        $coleta ->setId_coleta($_REQUEST["ac"]);
        $coleta ->setId_catador($_SESSION["id_cliente"]);

        $coletadao ->aceitar($coleta);

        header("Location: ../tcc-catador/minhascoletas.php");

    }
?>