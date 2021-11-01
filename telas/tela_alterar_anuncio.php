<!DOCTYPE html>
<html dir="ltr" lang="pt">
  <head>
    <title> Editar anúncio </title>
    <!-- TROCANDO A FOTO DO LINK DO SITE -->
    <link rel="shortcut icon" href="../imagens/celular_logo.png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../css/estilo_alterar_anuncio.css" rel="stylesheet" type="text/css">
    <link href="../css/estilo_anuncio.css" rel="stylesheet" type="text/css">
    <link href="../css/hover.css" rel="stylesheet" type="text/css">

  </head>
<body> 
    

    <?php 
    
    include_once("../sistemas/sistema_conexao.php");
    include_once("../sistemas/sistema_navbar.php");

    echo "<h1 class = 'titulo'> Alterar dados do anúncio </h1>";
    
    $id_anuncio = $_GET["id_anuncio"]; 
    $sql = "select 
    avaliacao, fotos_livro, descricao_anuncio, id_foto
    from tb_anuncio 
    inner join tb_foto_anuncio on tb_foto_anuncio.cod_anuncio = tb_anuncio.id_anuncio
    where tb_anuncio.id_anuncio = $id_anuncio";

    $resultado = mysqli_query($conn, $sql);

    echo "<table class = 'container_alterar'>";

    while($row = mysqli_fetch_array($resultado)){
        $avaliacao = $row["avaliacao"];
        $fotos_livro = $row["fotos_livro"];
        $descricao_anuncio = $row["descricao_anuncio"];
        $id_foto = $row["id_foto"];

        echo "
        <td>
            <div> <img name = 'foto_livro' class = 'foto_livro' src = '../fotos_livro/$fotos_livro'> </div>
            <div> <a style = 'margin-left:10px;' href = '../sistemas/sistema_excluir_foto_anuncio.php?id=$id_foto'> Remover imagem </a> </div>             
        </td>";
    }

    echo "</table>";
    


    
    
    
    ?>

<form class = "enviarArquivo" action="tela_alterar_anuncio.php" method = "POST"  enctype="multipart/form-data"> 
    <input style = 'margin-top:30px;'accept="image/*" type = "file" id = "arquivo" name = "arquivo[]" class = "arquivo" multiple/> <br>
    <button type="submit" class="btn" id = "enviarFoto" name = "enviarFoto" style="width: 10%; background-color: #301b3f;color:white;margin-top:10px;margin-bottom:10px;"> Enviar fotos </button>
</form>

</body>
</html>