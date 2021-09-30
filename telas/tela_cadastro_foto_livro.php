<!DOCTYPE html>
<html dir="ltr" lang="pt">
<head>
    <title> Login </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/navbar_items.css" rel="stylesheet" type="text/css">
    <link href="../css/estilo_anuncio.css" rel="stylesheet" type="text/css">
    <link href="../css/hover.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="../js/scripts.js" type="text/javascript"> </script>
</head>
<body> 
    <?php
        include ('../sistemas/sistema_navbar.php'); 
        include ('../sistemas/sistema_conexao.php');
    ?>

    <h1 class = "titulo texto"> Enviar fotos do livro </h1>


    <?php
    $email = $_SESSION["email"];  
        
    //pegar id_usuario
    $pegarIdUsuario = "select * from tb_usuario where email = '$email'";
    $resultadoIdUsuario = mysqli_query($conn, $pegarIdUsuario);
    $rowIdUsuario = mysqli_fetch_assoc($resultadoIdUsuario);
    $id_usuario = $rowIdUsuario["id_usuario"];
                
    //pegar id_anuncio
    $pegarCodUsuario = "select * from tb_anuncio where cod_usuario = '$id_usuario' ORDER BY id_anuncio DESC";
    $resultadoCodUsuario = mysqli_query($conn, $pegarCodUsuario);
    $rowCodUsuario = mysqli_fetch_assoc($resultadoCodUsuario);
    $id_anuncio = $rowCodUsuario["id_anuncio"];
        
    if(isset($_POST['enviarFoto'])){
        if(($_FILES["arquivo"]["name"]!="")){
            $pastaArquivos = '../fotos_livro/';
            $nomeArquivo = $_FILES["arquivo"]["name"];
            $nomeTemporario = $_FILES["arquivo"]["tmp_name"];
      
            if(move_uploaded_file($nomeTemporario,$pastaArquivos.$nomeArquivo)){
                include "../sistemas/sistema_conexao.php";
            }

            $sql = "insert into tb_foto_anuncio (fotos_livro, cod_anuncio) values ('$nomeArquivo', '$id_anuncio')";
            $resultado = mysqli_query($conn, $sql);

        }
    }

    //pegar foto_livro
    $pegarCodAnuncio = "select * from tb_foto_anuncio where cod_anuncio = '$id_anuncio'";
    $resultadoCodAnuncio = mysqli_query($conn, $pegarCodAnuncio);
    echo "
    <table class = 'fotos_livros'> 
        <tr>";

    if($resultadoCodAnuncio-> num_rows > 0){
        while($rowCodAnuncio = mysqli_fetch_assoc($resultadoCodAnuncio)){
            $id_foto = $rowCodAnuncio["id_foto"];
            $foto_livro = $rowCodAnuncio["fotos_livro"]; 

            echo "
            <td>
                <img name = 'foto_livro' class = 'foto_livro' src = '../fotos_livro/". $foto_livro ."'>                  
            </td>";
        }
    }

    echo "
        </tr>
    </table>";

?>
<br><br>
<form class = "enviarArquivo" action="tela_cadastro_foto_livro.php" method = "POST"  enctype="multipart/form-data">
    <input type = "file" id = "arquivo" name = "arquivo" class = "arquivo" multiple> <br>
    <button type="submit" class="btn" id = "enviarFoto" name = "enviarFoto" style="width: 10%; background-color: #301b3f;color:white;margin-top:10px;margin-bottom:10px;"> Enviar fotos </button>
</form>

<form class = "enviarArquivo" action = "../sistemas/sistema_avaliacao_livro.php" method = "POST">
    <h4 class = "titulo texto"> Qual o estado do livro de (1-5) </h4>
    <input type = "radio" id = "estrela_1" name = "avaliacao" value = "1" required>
    <label for="estrela_1" class = "estrelas" > 1  </label> 
    <input type = "radio"  id = "estrela_2"  name = "avaliacao" value = "2" required>
    <label for="estrela_2" class = "estrelas"> 2  </label> 
    <input type = "radio" id = "estrela_3"  name = "avaliacao" value = "3" required>
    <label for="estrela_3" class = "estrelas" > 3  </label> 
    <input type = "radio" id = "estrela_4"  name = "avaliacao" value = "4" required>
    <label for="estrela_4" class = "estrelas" > 4  </label> 
    <input type = "radio" id = "estrela_5"  name = "avaliacao" value = "5" required>
    <label for="estrela_5" class = "estrelas" > 5  </label> 
    <br>
    <button type="submit" class="btn" style="width: 10%; background-color: #301b3f;color:white;margin-top:10px;margin-bottom:10px;"> Finalizar anúncio </button>
</form>

</body>
</html>