<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
 <?php   

        include ('sistema_conexao.php');
            /*pegando os dados vindos do formulario */
                $email = $_POST["email"];
                $senha = $_POST["senha"];
			 
            /*1- definindo a conexao - local, usuario, senha e banco de dados*/
        
            /*2- verificando se a conexao foi estabelecida */
             if($conn==true){
            
			    $sql="select * from tb_usuario where email='$email' 
                and senha='$senha'";
           	    $verifica=mysqli_query($conn, $sql);
			              
            /*5- verificando se encontrou registro */  
                if(mysqli_num_rows($verifica)<=0) {
                    //echo "Usuário nao encontrado"; 
                    echo "<script>
                    $(document).ready(function(){
                      $('#myModal').modal('show');
                    });
                  </script>";
                	
                }else{
                    //echo "Usuário encontrado";
                    if ($dados=mysqli_fetch_assoc($verifica)) {
                        $email=$dados["email"];
                        session_start();
                        $_SESSION["id"] = $dados["id_usuario"];
                        $_SESSION["email"]=$email;
                       
                        
                        $id_destinatario = $busca['id_usuario'];

                        header("location:../telas/index.php");
                    }
				 
			    }		
            }

 
		 	  
  
?>


    <div style = 'background-image: url("../imagens/fundo.png");' class="modal fade show" id="myModal" tabindex="-1" role="dialog" style="display: block;" data-keyboard="false" data-backdrop="static">
        <div class='modal-dialog' role='document'>
            <div class='modal-content' style = 'background-color:#4c00ff;'>
                <div class='modal-header'>
                    <h5 class='modal-title' id="staticBackdropLabel" style = "color:white;"> <b> Usuário não encontrado! </b> </h5>
                </div>
                <div class='modal-body' style = "color:white;">
                    <p> Crie uma conta ou tente novamente </p>
                </div>
                <div class='modal-footer'>
                    <a class = 'btn btn-dark' href = '../telas/tela_login.php'> Voltar a tela de login </a>
                    <a class = 'btn btn-warning' href = '../telas/tela_registro.php'> Criar uma conta </a>
                </div>
            </div>
        </div>
    </div>
</body>
 </html>