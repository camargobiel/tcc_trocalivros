<!DOCTYPE html>
<html dir="ltr" lang="pt">
  <head>
    <title> Tela principal </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    
    <link href="css/estilo_anuncio.css" rel="stylesheet" type="text/css">
    <link href="css/hover.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
    <script type="text/javascript" src="js/bootstrap.min.js"> </script>
  </head>
<body> 
    <?php include('navbar.php'); include('conexao.php'); include('codAnuncio_idAnuncio.php');?>

    <h1 class = "titulo_anuncios"> Meus anúncios </h1>
    <table class = "grupo_card">
        <tr>
            <td>
                <a class="card card_anuncios" href = "tela_anuncio_livro.php" style = "color:black;"> <br><br>
                    <img style = "margin-top:20px; width: 100%; " src="imagens/foto_adicionar.png" class="card-img-top">
                    <div class="card-body"><br><br><br><br>
                        <h5 class="card-title"> Criar um anúncio </h5>
                        <p class="card-text"> aqui é onde você pode criar anúncios de livros que você tem o interesse de trocar</p>
                    </div>
                </a> 
            </td> 
            <?php 

                $sql = "select * from tb_anuncio where cod_usuario = '$id'";
                $resultado = mysqli_query($conn, $sql);
                if($resultado-> num_rows > 0){
                    while($row = mysqli_fetch_assoc($resultado)){
                        $id_anuncio = $row["id_anuncio"];
                        $cod_usuario = $row['cod_usuario'];
                        $titulo = $row['titulo'];
                        $autor = $row['autor'];
                        $avaliacao = $row['avaliacao'];
                        /*
                        $titulo = rawurlencode($titulo);
                        $url = 'https://serpapi.com/search.json?q='.$titulo.'&tbm=isch&ijn=0&api_key=8f46ed9a3176f2e7a114f81ad9385f04958e2d567b08c732f5a57f8e69a8cf5a';
                        $capa_livros = json_decode(file_get_contents($url));
                        $capa = $capa_livros->images_results[0]->thumbnail;

                        $titulo = rawurldecode($titulo);*/

                        $sqle = "select * from tb_foto_anuncio where cod_anuncio = '$id_anuncio'";
                        $result = mysqli_query($conn, $sqle);
                        $row = mysqli_fetch_assoc($result);
                        $foto = $row['fotos_livro'];
                            
                        
                        
                        echo "
                        <td>
                            <a class='card card_anuncios' href = 'tela_anuncio_livro.php' style = 'color:black;'> 
                                <img style = 'border-radius: 20px;margin-top:20px; width: 250px; height:350px; margin-left:auto;margin-right:auto;' src='fotos_livro/$foto' class='card-img-top'>
                                <div class='card-body'>
                                    <h5 class='card-title'> $titulo </h5>
                                    <p class='card-text'> $autor </p>
                                    
                                </div>
                            </a> 
                        </td> 
                        "; 
                            

                        //echo $id_anuncio;
                    }

                    
                }

                

                
            
            ?>
        </tr>
    </table>

    <?php 
            
    ?>
    
</body>
</html>