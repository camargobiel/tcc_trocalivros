<!DOCTYPE html>
<html dir="ltr" lang="pt">
  <head>
    <title> Tela principal </title>

    <!-- TROCANDO A FOTO DO LINK DO SITE -->
    <link rel="shortcut icon" href="../imagens/celular_logo.png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">

    <!-- CHAMANDO ARQUIVOS .CSS -->
    <link href="../bootstrap_css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/estilo_tela_livro.css" rel="stylesheet" type="text/css">
    <link href="../bootstrap_css/hover.css" rel="stylesheet" type="text/css">

    <!-- CHAMANDO ARQUIVOS .JS -->
    <script type="text/javascript" src="../js/jquery-3.5.1.min.js"> </script>
    <script type="text/javascript" src="../js/bootstrap.min.js"> </script>
  </head>
<body>
    <?php 
        include ('../sistemas/sistema_navbar.php'); 
        include ('../sistemas/sistema_conexao.php'); 
        $titulo = $_GET['titulo'];
        $capa = $_GET['capa'];
        
        $pegarIDLivro = "select id_livro from tb_livro where titulo = '$titulo'";
        $resultadoIDLivro = mysqli_query($conn, $pegarIDLivro);
        $row = mysqli_fetch_assoc($resultadoIDLivro);
        $id_livro = $row['id_livro'];

        $titulo = rawurlencode($titulo);
        //$capa = $_GET['capa'];
        
        $apiKey = "AIzaSyC4sWzWpIQc0ltz26lXDMxX-Wt24o4ejZ8";
            
        $url = 'https://www.googleapis.com/books/v1/volumes?q='.$titulo.'&key='.$apiKey;
        $livros = json_decode(file_get_contents($url));
        $item = $livros->items[0];
        $armazenaID = $item->id."<br>"; //string
        $armazenaAutor = $item->volumeInfo->authors; //array
        $armazenaTitulo = $item->volumeInfo->title; //string
        $armazenaDescricao = $item->volumeInfo->description; //string
        $armazenaISBN = $item->volumeInfo->industryIdentifiers[1]->identifier;
        $strAutor = implode(', ', $armazenaAutor);
    ?>

    <table>
        <tr>
            <td style = "width:250px;">
                <img class = "capa_livro" src = "<?php echo $capa; ?>"> 
            </td>
            <td>
                 <?php 
                    echo "<h1 class = 'titulo'>".$armazenaTitulo."</h1>"; echo "<br>"; 
                    echo "<h5 class = 'titulo'>"."Autor(es): ".$strAutor."</h5>";
                    echo "<h5 class = 'isbn'>"."ISBN: ".$armazenaISBN."</h5> <br>";
                    echo "<h3 class = 'isbn'> Descrição: </h3>";
                    echo "
                        <div class = 'descricao'> 
                        <p style = 'margin-right:6px;'>".$armazenaDescricao."</p>
                    </div>
                    ";
                ?> 
            </td>
            <td>
            <div style = "overflow: auto; height:700px;">
            <h1 style = 'color:white;text-align:center;margin-top:40px;'> Anúncios </h1><br>
            <?php 

                $sql = "select fotos_livro,
                cod_anuncio,
                cod_usuario,
                cod_livro,
                avaliacao
                from tb_foto_anuncio
                inner join tb_anuncio on id_anuncio = cod_anuncio
                where cod_livro = '$id_livro'";
                $resultado = mysqli_query($conn, $sql);
                if($resultado-> num_rows > 0){
                    while($row = mysqli_fetch_assoc($resultado)){
                        $foto_livro = $row["fotos_livro"];
                        $avaliacao = $row["avaliacao"];
                        
                        if($avaliacao==5){
                            $estrela = "<img style = 'width:20px;' src = '../imagens/star.png' ?>
                            <img style = 'width:20px;' src = '../imagens/star.png' ?>
                            <img style = 'width:20px;' src = '../imagens/star.png' ?>
                            <img style = 'width:20px;' src = '../imagens/star.png' ?>
                            <img style = 'width:20px;' src = '../imagens/star.png' ?>
                            ";
                        }else if($avaliacao==4){
                            $estrela = "<img style = 'width:20px;' src = '../imagens/star.png' ?>
                            <img style = 'width:20px;' src = '../imagens/star.png' ?>
                            <img style = 'width:20px;' src = '../imagens/star.png' ?>
                            <img style = 'width:20px;' src = '../imagens/star.png' ?>
                            <img style = 'width:20px;' src = '../imagens/star1.png' ?>
                            ";
                        }else if($avaliacao==3){
                            $estrela = "<img style = 'width:20px;' src = '../imagens/star.png' ?>
                            <img style = 'width:20px;' src = '../imagens/star.png' ?>
                            <img style = 'width:20px;' src = '../imagens/star.png' ?>
                            <img style = 'width:20px;' src = '../imagens/star1.png' ?>
                            <img style = 'width:20px;' src = '../imagens/star1.png' ?>
                            ";
                        }else if($avaliacao==2){
                            $estrela = "<img style = 'width:20px;' src = '../imagens/star.png' ?>
                            <img style = 'width:20px;' src = '../imagens/star.png' ?>
                            <img style = 'width:20px;' src = '../imagens/star1.png' ?>
                            <img style = 'width:20px;' src = '../imagens/star1.png' ?>
                            <img style = 'width:20px;' src = '../imagens/star1.png' ?>
                            ";
                        }else{
                            $estrela = "<img style = 'width:20px;' src = '../imagens/star.png' ?>
                            <img style = 'width:20px;' src = '../imagens/star1.png' ?>
                            <img style = 'width:20px;' src = '../imagens/star1.png' ?>
                            <img style = 'width:20px;' src = '../imagens/star1.png' ?>
                            <img style = 'width:20px;' src = '../imagens/star1.png' ?>
                            ";
                        }
                        
                        
                        echo "
                        
                            <div class = 'anuncio'> 
                                <table>
                                    <td>
                                        <img class = 'capa_livro1' src = '../fotos_livro/$foto_livro'>
                                        <div style = 'font-size:20px;float:right;margin-left:20px;color:white;'> Condição do livro: $estrela  </div>
                                    </td>
                                </table>
                            </div> <br>";
                    }
                }
            
            ?>
            
            </td>
        </tr>
    </table>

   





</body>
</html>