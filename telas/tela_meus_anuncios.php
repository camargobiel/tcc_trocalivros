<!DOCTYPE html>
<html dir="ltr" lang="pt">
  <head>
    <title> Tela principal </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    
    <link href="../css/estilo_anuncio.css" rel="stylesheet" type="text/css">
    <link href="../css/hover.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../js/jquery-3.5.1.min.js"> </script>
    <script type="text/javascript" src="../js/bootstrap.min.js"> </script>
  </head>
<body> 
    <?php include ('../sistemas/sistema_navbar.php'); 
    include ('../sistemas/sistema_conexao.php'); 
    ?>

    <h1 class = "titulo_anuncios"> Meus anúncios </h1>
    <table class = "grupo_card">
        <tr>
            <td>
                <a class="card card_anuncios" href = "tela_cadastro_livro.php" style = "color:black;"> <br><br>
                    <center> <img style = "margin-top:20px; width: 70%; " src="../imagens/foto_adicionar.png" class="card-img-top"></center>
                    <div class="card-body"><br><br><br><br>
                        <h5 class="card-title"> Criar um anúncio </h5>
                        <p class="card-text"> aqui é onde você pode criar anúncios de livros que você tem o interesse de trocar</p>
                    </div>
                </a> 
            </td> 
            <?php 

$email = $_SESSION["email"];
$pegarID = "select * from tb_usuario where email = '$email'";
$resultado = mysqli_query($conn, $pegarID);
if($resultado->num_rows > 0){
    while($row = mysqli_fetch_assoc($resultado)){
        $id = $row["id_usuario"];
    }
}
            
$sql = "select * from tb_foto_anuncio where cod_anuncio = '$id'";
$resultado = mysqli_query($conn, $sql);
if($resultado->num_rows > 0){
    while($row = mysqli_fetch_assoc($resultado)){
        $foto_livro = $row["fotos_livro"];
    }
}

$sql = "select * from tb_anuncio where cod_usuario = '$id'";
    $resultado = mysqli_query($conn, $sql);
    if($resultado-> num_rows > 0){
        while($row = mysqli_fetch_assoc($resultado)){
            $id_anuncio = $row["id_anuncio"];
        }
    }

                $pegarID = "select * from tb_usuario where email = '$email'";
                $resultado = mysqli_query($conn, $pegarID);
                if($resultado-> num_rows > 0){
                    while($row = mysqli_fetch_assoc($resultado)){
                        $id = $row["id_usuario"];
                    }
                }

                

                $sql = "select
                id_livro, 
                titulo,
                autor,
                id_anuncio,
                cod_livro 
                from tb_livro 
                inner join tb_anuncio on id_livro = cod_livro
                where cod_usuario = '$id'";

                $resultado = mysqli_query($conn, $sql);
                if($resultado-> num_rows > 0){
                    while($row = mysqli_fetch_assoc($resultado)){
                        $id_anuncio = $row["id_anuncio"];
                        $cod_livro = $row['cod_livro'];
                        $titulo = $row['titulo'];
                        $autor = $row['autor'];

                        /*
                        $titulo = rawurlencode($titulo);
                        $url = 'https://serpapi.com/search.json?q='.$titulo.'&tbm=isch&ijn=0&api_key=8f46ed9a3176f2e7a114f81ad9385f04958e2d567b08c732f5a57f8e69a8cf5a';
                        $capa_livros = json_decode(file_get_contents($url));
                        $capa = $capa_livros->images_results[0]->thumbnail;

                        $titulo = rawurldecode($titulo);*/

                        $sqle = "select * from tb_foto_anuncio where cod_anuncio = '$id_anuncio' order by cod_anuncio";
                        $result = mysqli_query($conn, $sqle);
                        $row = mysqli_fetch_assoc($result);
                        $foto = $row['fotos_livro'];
                            
                        
                        
                        echo "
                        <td>
                        <div class = 'card card_anuncios'>
                            <a href = 'tela_anuncio_livro.php' style = 'color:black;'> 
                                <img style = 'border-radius: 20px;margin-top:20px; width: 250px; height:350px; margin-left:auto;margin-right:auto;' src='../fotos_livro/$foto' class='card-img-top'>
                                <div class='card-body'>
                                    <h5 class='card-title'> $titulo </h5>
                                    <p class='card-text'> $autor </p>
                                    
                                </div>
                            </a> 
                            
                        </div>
                        </td> 
                        "; 
                            
                    }

                    
                }

                

                
            
            ?>
        </tr>
    </table>

    <?php 
            
    ?>
    
</body>
</html>