<?php
        include_once "../conexao/Conexao.php";
        include_once "../dao/ConteudoDao.php";
        include_once "../model/Conteudo.php";


        $conteudo = new Conteudo();
        $conteudodao = new ConteudoDao();

        $d = filter_input_array(INPUT_POST);

        if(isset($_GET['del'])){
                $conteudo->setId_conteudo($_GET['del']); //metodo GET pega o valor que veio com o del
                $conteudodao->delete($conteudo);
                header("Location: ../adm/AltConteudoAdm.php");
            }
        else if (isset($_POST["editar"])) {
            $conteudo->setTitulo($_POST['titulo']);   
            $conteudo->setConteudo($_POST['conteudo']);
            $conteudo->setPagina($_POST['pagina']);
            $conteudo->setId_conteudo($_POST['id_conteudo']);
        
            // Lidando com a imagem
            if ($_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
                $nome_arquivo = $_FILES['imagem']['name'];
                $caminho_arquivo = '../src/imagens/' . $nome_arquivo; // Defina o caminho correto
        
                if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_arquivo)) {
                    // Atualizar o caminho da imagem no modelo
                    $conteudo->setCaminho_img($caminho_arquivo);
                } else {
                    echo "Erro ao mover o arquivo para a pasta desejada.";
                    // Tratar o erro conforme necessário
                }
            }
        
            // Atualização no banco de dados
            $conteudodao->update($conteudo); 
        
            header("Location: ../adm/AltConteudoAdm.php");
        }

        else if(isset($_POST["enviar"])){
            $conteudo -> setTitulo($d['titulo']);   
            $conteudo -> setConteudo($d['conteudo']);
            $conteudo -> setPagina($d['pagina']);
            $conteudo -> setCaminho_img($d['cpf']);

             // Lidando com a imagem
             if ($_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
                $nome_arquivo = $_FILES['imagem']['name'];
                $caminho_arquivo = '../src/imagens/' . $nome_arquivo; // Defina o caminho correto
        
                if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_arquivo)) {
                    // Atualizar o caminho da imagem no modelo
                    $conteudo->setCaminho_img($caminho_arquivo);
                } else {
                    echo "Erro ao mover o arquivo para a pasta desejada.";
                    // Tratar o erro conforme necessário
                }
            }

            $conteudodao->create($conteudo);

            header("Location: ../adm/AltConteudoAdm.php");
    }
        

?>