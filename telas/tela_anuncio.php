<!DOCTYPE html>
<html dir="ltr" lang="pt">
  <head>
    <title> Tela anúncio </title>

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
  <style>table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}</style>
    <?php 
    
    include('../sistemas/sistema_conexao.php');
    include('../sistemas/sistema_navbar.php');

    $id_anuncio = $_GET["id_anuncio"];
    $avaliacao = $_GET["avaliacao"];

    $sql = "select fotos_livro,
    cod_anuncio,
    cod_usuario,
    cod_livro,
    avaliacao
    from tb_foto_anuncio
    inner join tb_anuncio on id_anuncio = cod_anuncio
    where cod_anuncio = '$id_anuncio'";
    $indice_foto = -1;
    $resultado = mysqli_query($conn,$sql);
    if($resultado-> num_rows > 0){
      echo "<table>
      <tr>
        <td style = 'width:22%;'>";
      echo "
      <div id='carouselExampleControls' class='carousel slide' data-ride='carousel'  style = 'width:100%;margin-top:50px;margin-left:50px;'>
        <div class='carousel-inner'>
      ";
        while($row = mysqli_fetch_assoc($resultado)){
          $fotoAnuncio[] = $row["fotos_livro"];
          $indice_foto++;

          if($indice_foto == 0){
            echo "
              <div class='carousel-item active'>
                <img class='d-block w-100' src='../fotos_livro/$fotoAnuncio[$indice_foto]' style = 'width:250px;height:600px; '>
              </div>
            ";
          }else{
            echo "
              <div class='carousel-item'>
                <img class='d-block w-100' src='../fotos_livro/$fotoAnuncio[$indice_foto]' style = 'width:250px;height:600px; '>
              </div>
            ";
          }
            
          
           
          
        }
        

          

          
    }
    ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</td>

<?php include('../sistemas/sistema_avaliacao.php'); 
  echo "<td> <div style = 'font-size:20px;margin-left:100px;color:white;'> Condição do livro: $estrela </div> </td>";
?>
</tr>
</table>


    
</body>
</html>