<?php $titulo = $_GET['titulo']; ?>

<!DOCTYPE html>
<html dir="ltr" lang="pt">
  <head>
    <title> <?php echo $titulo; ?> </title>

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
        
        $capa = $_GET['capa'];
        
        
        
        $titulo = rawurlencode($titulo);
        //$capa = $_GET['capa'];
        
        $apiKey = "AIzaSyC4sWzWpIQc0ltz26lXDMxX-Wt24o4ejZ8";
            
        $url = 'https://www.googleapis.com/books/v1/volumes?q='.$titulo.'&key='.$apiKey;
        $livros = json_decode(file_get_contents($url));
        $i = 0;   
            
        
        while(isset($item->volumeInfo->description)==null){
            $item = $livros->items[$i];
            $armazenaID = $item->id."<br>"; //string
            $armazenaAutor = $item->volumeInfo->authors; //array
            $armazenaTitulo = $item->volumeInfo->title; //string
                
            $armazenaISBN = $item->volumeInfo->industryIdentifiers[0]->identifier;
            $armazenaDescricao = $item->volumeInfo->description;
            $i++;
                
        }
        
            
            
            
        $strAutor = implode(', ', $armazenaAutor);
        
    ?>

    <table>
        <tr>
            <td style = "width:250px;">
                <img class = "capa_livro" src = "<?php echo $capa; ?>"> 
            </td>
            <td>
                 <?php 
                 $autor = $_GET["autor"];
                    echo "<h1 class = 'titulo'>".$armazenaTitulo."</h1>"; echo "<br>"; 
                    echo "<h5 class = 'titulo'>"."Autor(es): ".$autor."</h5>";
                    echo "<h5 class = 'isbn'>"."ISBN: ".$armazenaISBN."</h5> <br>";
                    echo "<h3 class = 'isbn'> Descri????o: </h3>";
                    echo "
                        <div class = 'descricao'> 
                        <p style = 'margin-right:6px;'>".$armazenaDescricao."</p>
                    </div>
                    ";

                    $caracteres_sem_acento = array(
                        '??'=>'S', '??'=>'s', '??'=>'Dj','??'=>'Z', '??'=>'z', '??'=>'A', '??'=>'A', '??'=>'A', '??'=>'A', '??'=>'A',
                        '??'=>'A', '??'=>'A', '??'=>'C', '??'=>'E', '??'=>'E', '??'=>'E', '??'=>'E', '??'=>'I', '??'=>'I', '??'=>'I',
                        '??'=>'I', '??'=>'N', '??'=>'N', '??'=>'O', '??'=>'O', '??'=>'O', '??'=>'O', '??'=>'O', '??'=>'O', '??'=>'U', '??'=>'U',
                        '??'=>'U', '??'=>'U', '??'=>'Y', '??'=>'B', '??'=>'Ss','??'=>'a', '??'=>'a', '??'=>'a', '??'=>'a', '??'=>'a',
                        '??'=>'a', '??'=>'a', '??'=>'c', '??'=>'e', '??'=>'e', '??'=>'e', '??'=>'e', '??'=>'i', '??'=>'i', '??'=>'i',
                        '??'=>'i', '??'=>'o', '??'=>'n', '??'=>'n', '??'=>'o', '??'=>'o', '??'=>'o', '??'=>'o', '??'=>'o', '??'=>'o', '??'=>'u',
                        '??'=>'u', '??'=>'u', '??'=>'u', '??'=>'y', '??'=>'y', '??'=>'b', '??'=>'y', '??'=>'f',
                        '??'=>'a', '??'=>'i', '??'=>'a', '??'=>'s', '??'=>'t', '??'=>'A', '??'=>'I', '??'=>'A', '??'=>'S', '??'=>'T',
                    );
            
                    $armazenaTitulo = strtolower(strtr($armazenaTitulo, $caracteres_sem_acento));
                    
                    $pegarIDLivro = "select id_livro from tb_livro where titulo = '$armazenaTitulo'";
                    $resultadoIDLivro = mysqli_query($conn, $pegarIDLivro);
                    $row = mysqli_fetch_assoc($resultadoIDLivro);
                    $id_livro = $row['id_livro'];

                ?> 
            </td>
            <td>
            <div style = "overflow: auto; height:700px;">
            <h1 style = 'color:white;text-align:center;margin-top:40px;'> An??ncios </h1><br>
            <?php 
                $sqlTbAnuncio = "select * from tb_anuncio where cod_livro = '$id_livro'";
                $resultadoTbAnuncio = mysqli_query($conn, $sqlTbAnuncio);
                while($rowTbAnuncio= mysqli_fetch_assoc($resultadoTbAnuncio)){
                    $avaliacao = $rowTbAnuncio["avaliacao"];
                    $cod_anuncio = $rowTbAnuncio["id_anuncio"];
                    

                    $selectt = "select * from tb_foto_anuncio where cod_anuncio = '$cod_anuncio'";
                    $teste3 = mysqli_query($conn, $selectt);
                    $row3 = mysqli_fetch_assoc($teste3);
                    $foto_livro = $row3["fotos_livro"];

                    include('../sistemas/sistema_avaliacao_livro.php');

                    echo "
                    <a href = 'tela_anuncio.php?id_anuncio=$cod_anuncio&avaliacao=$avaliacao&titulo=$titulo'>
                    <div class = 'anuncio'> 
                        <table>
                            <td>
                                <img class = 'capa_livro1' src = '../fotos_livro/$foto_livro'>
                                <div style = 'font-size:20px;float:right;margin-left:20px;color:white;'> Condi????o do livro: $estrela </div>
                            </td>
                        </table>
                    </div> <br> </a>";

                    
                }
            
            ?>
            
            </td>
        </tr>
    </table>
</body>
</html>