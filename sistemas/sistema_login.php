<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Login</title>
   <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
   <script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
   <script type="text/javascript" src="js/bootstrap.min.js"> </script>
     
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
                    header ("location:tela_login.php");		
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
 </body>
 </html>