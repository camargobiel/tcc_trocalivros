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
            /*pegando os dados vindos do formulario */
                $email = $_POST["email"];
                $senha = $_POST["senha"];
			 
            /*1- definindo a conexao - local, usuario, senha e banco de dados*/
			$conn=mysqli_connect("localhost", "root", "","bd_tcc");
        
            /*2- verificando se a conexao foi estabelecida */
             if($conn==true){
            
			    $sql="select email, senha from tb_usuario where email='$email' 
                and senha='$senha'";
           	    $verifica=mysqli_query($conn, $sql);
			              
            /*5- verificando se encontrou registro */  
                if(mysqli_num_rows($verifica)<=0) {
                    //echo "Usuário nao encontrado"; 
                    header ("location:tela_login.php");		
                }else{
                    //echo "Usuário encontrado";
                    if ($dados=mysqli_fetch_assoc($verifica)) {
                        $n=$dados["email"];
                        
                        session_start();
                        
                        $_SESSION["email"]=$n;
                        header("location:index.php");
                    }
				 
			    }		
            }

 
		 	  
  
?>
 </body>
 </html>