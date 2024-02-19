<?php
        include_once "../conexao/Conexao.php";
        include_once "../dao/ClienteDao.php";
        include_once "../model/Cliente.php";
    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="logincreate.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <link rel="shortcut icon" href="../src/imagens/logoatt.png" type="image/x-icon">
</head>
<body>
    <section class="area-login">
        <div class="login">
            <div>
                <img src="rec.png">
            </div>

        <form name="form" method="post" action="../controller/ClienteController.php">

        <div class="row mt-2"> 
                <div class="col-md-5"></div> 
            <div class="col-md-2">
                <input type="radio" id="cliente" value="cliente" name="conta" value="cliente">
                <label for="cliente">Cliente</label>
    
                <input type="radio" id="catador" value="catador" name="conta" value="catador">
                <label for="catador">Catador</label>
            </div> 
            <div class="col-md-5"></div>  
        </div>

            <div class="row"> 
                <div class="col-md-4"> 
                <label>Nome: </label>
                    <input type="text" name="nome" class="form-control"  />
                </div>

                <div class="col-md-4">
                    <label>Email: </label>
                    <input type="text" name="email" class="form-control"  />
                </div>

                <div class="col-md-2">
                    <label>Senha: </label>
                    <input type="password" name="senha"  class="form-control"  />
                </div>
                <div class="col-md-2">
                    <label>Data de Nascimento: </label>
                    <input type="date" name="data_nasc"  class="form-control"  />
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <label>CPF: </label>
                    <input type="text" name="cpf"  class="form-control"  />
                </div>
                <div class="col-md-2"> 
                <label>Telefone: </label>
                    <input type="text" name="telefone" class="form-control"  />
                </div>
                <div class="col-md-2">
                    <label>CEP: </label>
                    <input type="text" name="CEP" id="cep" maxlength="9"    class="form-control"  />
                </div>
                <div class="col-md-4">
                    <label>Rua: </label>
                    <input type="text" name="rua" id="endereco" class="form-control"  />
                </div>
                <div class="col-md-2">
                    <label>Número: </label>
                    <input type="text" name="numero"  class="form-control"  />
                </div>
            </div>

            <div class="row">


                <div class="col-md-3">
                    <label>Bairro: </label>
                    <input type="text" name="bairro" id="bairro"  class="form-control"  />
                </div>

                <div class="col-md-2">
                    <label>Complemento: </label>
                    <input type="text" name="complemento"  class="form-control"  />
                </div>
                <div class="col-md-3">
                    <label>Referência: </label>
                    <input type="text" name="referencia"  class="form-control"  />
                </div>
                <div class="col-md-3">
                    <label>Cidade: </label>
                    <input type="text" name="cidade" id="cidade"  class="form-control"  />
                </div>
                <div class="col-md-1">
                    <label>Estado: </label>
                    <input type="text" name="estado" id="uf" class="form-control"  />
                </div>
            </div>

            <div class="row"> 
            <div class="col-md-5"></div>    
            <div class="col-md-2 mt-2">
                <input type="submit" name="Cadastrar" class="form-control" value="Cadastrar">
            </div>
            <div class="col-md-5"></div>
            </div>
           
            
        </form>
        
		

        </div>
    </section> 
	

    <script>
        $("#cep").blur(function(){
            var cep = this.value.replace(/[^0-9]/,"");
            if(cep.length != 8){
                return false;
            }

            var url = "https://viacep.com.br/ws/" + encodeURIComponent(cep) + "/json/";
            $.getJSON(url, function(dadosRetorno){
                try{
                    $("#endereco").val(dadosRetorno.logradouro);
                    $("#bairro").val(dadosRetorno.bairro);
                    $("#cidade").val(dadosRetorno.localidade);
                    $("#uf").val(dadosRetorno.uf.toUpperCase());
                } catch(ex) {
                    console.log("Erro ao processar dados do CEP.");
                }
            });
        });
    </script>
	

</body>
</html>