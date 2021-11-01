<!DOCTYPE html>
<html dir="ltr" lang="pt">
  <head>
    <title> Tela de registro </title>

    <!-- TROCANDO A FOTO DO LINK DO SITE -->
    <link rel="shortcut icon" href="../imagens/celular_logo.png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">

    <!-- CHAMANDO ARQUIVOS .CSS -->
    <link href="../bootstrap_css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/navbar_items.css" rel="stylesheet" type="text/css">
    <link href="../css/estilo_login.css" rel="stylesheet" type="text/css">
    <link href="../bootstrap_css/hover.css" rel="stylesheet" type="text/css">

    <!-- CHAMANDO ARQUIVOS .JS -->
    <script type="text/javascript" src="../js/jquery-3.5.1.min.js"> </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <!-- CHAMANDO ARQUIVOS SWEET ALERT -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </head>
<body>

<?php 
    include ('sistema_conexao.php');
    
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $cep = $_POST["cep"];
        $senha = $_POST["senha"];
        

        
        $sql = "select * from tb_usuario where email = '$email'"; //PEGAR DADOS DO USUARIO
        $search = mysqli_query($conn, $sql);
        if(mysqli_num_rows($search) > 0){
            echo "<script>
            $(document).ready(function(){
              $('#myModal').modal('show');
            });
          </script>";
            
        }else{
            $sql = "insert into tb_usuario (nome, email, senha, cep) values ('$nome', '$email', '$senha', '$cep')";
            $result = mysqli_query($conn, $sql);
            if($result==true){
                echo "
                <script type='text/javascript'>
                    alert('cadastrado'); 
                </script>
                ";
                
                echo '<script type="text/javascript">location.replace("../telas/tela_login.php");</script>';
            }else{
                echo "
                <script type='text/javascript'>
                    alert('Erro ao gravar os dados!'); 
                </script>
                ";
                echo '<script type="text/javascript">location.replace("../telas/tela_registro.php");</script>';
            }
            
            
        }
    
     
?>

    <div style = 'background-image: url("../imagens/fundo.png");' class="modal fade show" id="myModal" tabindex="-1" role="dialog" style="display: block;" data-keyboard="false" data-backdrop="static">
        <div class='modal-dialog' role='document'>
            <div class='modal-content' style = 'background-color:#4c00ff;'>
                <div class='modal-header'>
                    <h5 class='modal-title' id="staticBackdropLabel" style = "color:white;"> <b> E-mail já cadastrado! </b> </h5>
                </div>
                <div class='modal-body' style = "color:white;">
                    <p> Tente novamente com outro E-mail ou faça o login </p>
                </div>
                <div class='modal-footer'>
                    <a class = 'btn btn-dark' href = '../telas/tela_login.php'> Ir a tela de login </a>
                    <a class = 'btn btn-warning' href = '../telas/tela_registro.php'> Voltar a tela de cadastro </a>
                </div>
            </div>
        </div>
    </div>


</body>
</html>