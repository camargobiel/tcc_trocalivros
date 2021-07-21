<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Login</title>
   <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
   <script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
   <script type="text/javascript" src="js/bootstrap.min.js"> </script>
   <script language="javascript">
    
</script>
</head>
<body>
<?php 
    $conn = mysqli_connect("localhost", "root", "", "bd_tcc");
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cep = $_POST["cep"];
    $senha = $_POST["senha"];
    
    $sql = "select * from tb_usuario where email = '$email'";
    $search = mysqli_query($conn, $sql);
    if(mysqli_num_rows($search) > 0){
        echo '
            <script type="text/javascript">
                alert("Esse Cliente já existe"); 
            </script>
        ';
        echo '<script type="text/javascript">location.replace("tela_registro.php");</script>';
        
    }else{
        $sql = "insert into tb_usuario (nome, email, senha, cep) values ('$nome', '$email', '$senha', '$cep')";
        $result = mysqli_query($conn, $sql);
        if($result==true){
            echo "
            <script type='text/javascript'>
                alert('Cadastro feito com sucesso!!'); 
            </script>
            ";
            echo '<script type="text/javascript">location.replace("tela_login.php");</script>';

        }else{
            echo '
            <script type="text/javascript">
                alert("Erro ao gravar os dados!"); 
            </script>
            ';
            echo '<script type="text/javascript">location.replace("tela_registro.php");</script>';
        }
        
        
}




    
    
        
?>
    

</body>
</html>