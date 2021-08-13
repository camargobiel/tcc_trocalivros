<!DOCTYPE html>
<html dir="ltr" lang="pt">
<head>
    <title> Login </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <link href="css/navbar_items.css" rel="stylesheet" type="text/css">
    <link href="css/estilo_anuncio.css" rel="stylesheet" type="text/css">
    <link href="css/hover.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
    <script type="text/javascript" src="js/bootstrap.min.js"> </script>
    <script src="js/scripts.js" type="text/javascript"> </script>
</head>
<body> 
<?php 
    
    include ('conexao.php');
    include ('navbar.php');
    include('codAnuncio_idAnuncio.php');
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
    
        ?>
    <h1 class = "titulo texto"> Cadastrar livro </h1>
    <form action="tela_anuncio_livro.php" method = "POST">
        <div class = "container_cadastro">
            <div class="mb-3"> 
                <label for="titulo" class="form-label titulo_livro_input texto"> Título do livro </label> 
                <input type="text" class="form-control" name = "titulo">
            </div>
            <button type="submit" class="btn" style="width: 100%; background-color: #301b3f;color:white;margin-bottom:10px;" id = "enviarLivro"> Buscar livro </button>
    </div>
    </form>

    

    <form action = "sistema_cadastrar_livro.php" method = "POST">
        <div class = "container_cadastro">  
        <div class="mb-3"> 
                <label for="titulo_livro" class="form-label texto"> Titulo </label> 
                <input id = "titulo_livro" type="text" class="form-control" name = "titulo_livro" value = "<?php if(!empty($_POST['titulo'])){echo $armazenaTitulo;} ?>">
            </div>
            <div class="mb-3"> 
                <label for="autor" class="form-label texto"> Autor(es) </label> 
                <input id = "autor" type="text" class="form-control" name = "autor" value = "<?php if(!empty($_POST['titulo'])){print $strAutor;} ?>">
            </div>
            <button type="submit" class="btn" style="width: 100%; background-color: #301b3f;color:white;"> Próximo </button>
        </div>
    </form>

</body>
</html>
