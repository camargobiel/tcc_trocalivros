<!DOCTYPE html>
<html dir="ltr" lang="pt">
<head>
    <title> Login </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/navbar_items.css" rel="stylesheet" type="text/css">
    <link href="css/estilo_anuncio.css" rel="stylesheet" type="text/css">
    <link href="css/hover.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="js/scripts.js" type="text/javascript"> </script>
</head>
<body> 

<?php
        include ('navbar.php');
        include ('conexao.php');
        $email = $_SESSION["email"];
        $pegarID = "select * from tb_usuario where email = '$email'";
        $resultado = mysqli_query($conn, $pegarID);
        if($resultado->num_rows > 0){
            while($row = mysqli_fetch_assoc($resultado)){
                $id = $row["id_usuario"];
            }
        }

        $sql = "select * from tb_anuncio where cod_usuario = '$id'";
        $resultado = mysqli_query($conn, $sql);
        if($resultado-> num_rows > 0){
            while($row = mysqli_fetch_assoc($resultado)){
                $id_anuncio = $row["id_anuncio"];
            }
        }
        
        if(isset($_POST['enviarFoto'])){
            if(($_FILES["arquivo"]["name"]!="")){
                $pastaArquivos = 'fotos_livro/';
                $nomeArquivo = $_FILES["arquivo"]["name"];
                $nomeTemporario = $_FILES["arquivo"]["tmp_name"];
      
                if(move_uploaded_file($nomeTemporario,$pastaArquivos.$nomeArquivo)){
                    include "conexao.php";
                }

                $sql = "insert into tb_foto_anuncio (fotos_livro, cod_anuncio) values ('$nomeArquivo', '$id_anuncio')";
                $resultado = mysqli_query($conn, $sql);

            }
        }
        $sql = "select * from tb_foto_anuncio where cod_anuncio = '$id_anuncio'";
        $resultado = mysqli_query($conn, $sql);
        if($resultado-> num_rows > 0){
            while($row = mysqli_fetch_assoc($resultado)){
                $foto_livro = $row["fotos_livro"];
                echo "<img name = 'foto_livro' class = 'foto_livro' src = 'fotos_livro/". $foto_livro ."'>";
            }
            
        }
        

?>

    <h1 class = "titulo texto"> Enviar fotos do livro </h1>
    <form action="tela_anuncio_foto_livro.php" method = "POST"  enctype="multipart/form-data">
        <input type = "file" id = "arquivo" name = "arquivo">
        <button type = "submit" id = "enviarFoto" name = "enviarFoto"> aaaa </button>
    </form>

</body>
</html>