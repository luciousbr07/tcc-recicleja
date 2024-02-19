<?php
    include_once "../conexao/Conexao.php";
    include_once "../dao/MaterialDAO.php";
    include_once "../model/Material.php";

    $material = new Material();
    $materialdao = new MaterialDao();

    $d = filter_input_array(INPUT_POST);

    if(isset($_GET['del'])){
            $material->setId_material($_GET['del']); //metodo GET pega o valor que veio com o del
            $materialdao->delete($material);
            header("Location: ../adm/MaterialAdm.php");
        }

    else if(isset($_POST["editar"])){
        $material->setMaterial($d['material']);
        $material->setId_material($d['id_material']);
        $materialdao->update($material);

        header("Location: ../adm/MaterialAdm.php");
    }

    else if(isset($_POST["enviar"])){
        $material -> setMaterial($d['material']);   

        $materialdao->create($material);

        header("Location: ../adm/MaterialAdm.php");
}
?>