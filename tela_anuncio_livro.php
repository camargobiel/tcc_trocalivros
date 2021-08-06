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
    include ('conexao.php');
    include ('navbar.php');
    $email = $_SESSION["email"];

    if (!empty($_POST['titulo'])) {
        $titulo = rawurlencode($_POST["titulo"]);
        $url = 'https://www.googleapis.com/books/v1/volumes?q='.$titulo.'&key=AIzaSyC4sWzWpIQc0ltz26lXDMxX-Wt24o4ejZ8';
        $livros = json_decode(file_get_contents($url));

        
            $item = $livros->items[0];
            $armazenaID = $item->id."<br>"; //string
            $armazenaAutor = $item->volumeInfo->authors; //array
            $armazenaTitulo = $item->volumeInfo->title; //string
            $armazenaDescricao = $item->volumeInfo->description; //string
            $strAutor = implode(', ', $armazenaAutor);
    } 
    
        $pegarID = "select * from tb_usuario where email = '$email'";
        $resultado = mysqli_query($conn, $pegarID);
        if($resultado->num_rows > 0){
            while($row = mysqli_fetch_assoc($resultado)){
                $id = $row["id_usuario"];
            }
        }
                
?>

    <form action="tela_cadastro_anuncio.php" method = "POST"  enctype="multipart/form-data">
        <div class = "container_cadastro">
            <div class="mb-3"> 
                <label for="titulo" class="form-label titulo_livro_input texto"> Título do livro </label> 
                <input type="text" class="form-control" name = "titulo">
            </div>
            <button type="submit" class="btn" style="width: 100%; background-color: #301b3f;color:white;margin-bottom:10px;" id = "enviarLivro"> Buscar livro </button>
            <div class="mb-3"> 
                <label for="titulo_livro" class="form-label texto"> Titulo </label> 
                <input type="text" class="form-control" name = "titulo_livro" value = "<?php if(!empty($_POST['titulo'])){echo $armazenaTitulo;} ?>">
            </div>
            <div class="mb-3"> 
                <label for="autor" class="form-label texto"> Autor(es) </label> 
                <input type="text" class="form-control" name = "autor" value = "<?php if(!empty($_POST['titulo'])){print $strAutor;} ?>">
            </div>
            
                <p class = "texto"> Adicione fotos do livro</p>
                <input type="file" class="texto" id="arquivo" name = "arquivo">
                <button type="submit" class="btn" name = "enviarFoto" style="width: 100%; background-color: #301b3f;color:white;margin-top:20px;" id = "enviarFoto"> Enviar foto </button>
        
    <?php 
        if(isset($_POST['enviarFoto'])){
            if(($_FILES["arquivo"]["name"]!="")){
                $pastaArquivos = 'fotos_livro/';
                $nomeArquivo = $_FILES["arquivo"]["name"];
                $nomeTemporario = $_FILES["arquivo"]["tmp_name"];
      
                if(move_uploaded_file($nomeTemporario,$pastaArquivos.$nomeArquivo)){
                  include "conexao.php";
                }

                $sql = "insert into tb_anuncio (fotos_livro,cod_usuario) values ('$nomeArquivo','$id')";
                $resultado = mysqli_query($conn, $sql);

            }
        }

        $sql = "select * from tb_anuncio where cod_usuario = '$id'";
        $resultado = mysqli_query($conn, $sql);
        if($resultado->num_rows > 0){
            while($row = mysqli_fetch_assoc($resultado)){
                $foto_livro = $row["fotos_livro"];
                echo "<img name = 'foto_livro' class = 'foto_livro' src = 'fotos_livro/". $foto_livro ."'>";
            }
            
        }
        

    ?>
    </div>
    </form>

    <form action = "sistema_cadastro_anuncio.php" method = "POST">
        <div class = "container_cadastro">  
            <button type="submit" class="btn" style="width: 100%; background-color: #301b3f;color:white;margin-top:20px;"> Cadastrar </button>
        </div>
    </form>

</body>
</html>
