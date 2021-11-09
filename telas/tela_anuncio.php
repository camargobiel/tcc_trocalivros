<!DOCTYPE html>
<html dir="ltr" lang="pt">
<?php $titulo = $_GET["titulo"]; ?>
  <head>
    <title> <?php echo $titulo; ?> - Anúncio </title>

    <!-- TROCANDO A FOTO DO LINK DO SITE -->
    <link rel="shortcut icon" href="../imagens/celular_logo.png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">

    <!-- CHAMANDO ARQUIVOS  .CSS -->
    <link href="../bootstrap_css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/estilo_tela_livro.css" rel="stylesheet" type="text/css">
    <link href="../bootstrap_css/hover.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">>

    <!-- CHAMANDO ARQUIVOS .JS -->
    <script type="text/javascript" src="../js/jquery-3.5.1.min.js"> </script>
    <script type="text/javascript" src="../js/bootstrap.min.js"> </script>
  </head>
<body>
    <?php 
    
    include('../sistemas/sistema_conexao.php');
    include('../sistemas/sistema_navbar.php');

    $id_anuncio = $_GET["id_anuncio"];
    $avaliacao = $_GET["avaliacao"];



    $busca_id_anunciante = mysqli_query($conn, "SELECT cod_usuario from tb_anuncio where id_anuncio = '$id_anuncio';");
    $busca = mysqli_fetch_array($busca_id_anunciante);
    $id_anunciante = $busca['cod_usuario']; 
    
    $busca_email_anunciante = mysqli_query($conn, "SELECT email from tb_usuario where id_usuario = '$id_anunciante';");
    $busca = mysqli_fetch_array($busca_email_anunciante);
    $email_anunciante = $busca['email']; 

    $_SESSION['id_destino'] = $id_anunciante;

    $_SESSION['id_anuncio'] = $id_anuncio;
    
    $sql = "select fotos_livro,
    cod_anuncio,
    cod_usuario,
    cod_livro,
    descricao_anuncio,
    avaliacao
    from tb_foto_anuncio
    inner join tb_anuncio on id_anuncio = cod_anuncio
    where cod_anuncio = '$id_anuncio'";
    $indice_foto = -1;
    $resultado = mysqli_query($conn,$sql);
    if($resultado-> num_rows > 0){
      echo "
      <table>
      <tr>
        <td style = 'width:27%;'>";
      echo "
      <div id='carouselExampleControls' class='carousel slide' data-ride='carousel'  style = 'width:100%;margin-top:50px;margin-left:50px;'>
        <div class='carousel-inner'>
          
      ";
        while($row = mysqli_fetch_assoc($resultado)){
          $fotoAnuncio[] = $row["fotos_livro"];
          $indice_foto++;
          $descricao_anuncio = $row["descricao_anuncio"];

          if($indice_foto == 0){
            echo "
              <div class='carousel-item active'>
                <img class='d-block w-100' src='../fotos_livro/$fotoAnuncio[$indice_foto]' style = 'width:300px;height:600px; '>
              </div>
            ";
          }else{
            echo "
              <div class='carousel-item'>
                <img class='d-block w-100' src='../fotos_livro/$fotoAnuncio[$indice_foto]' style = 'width:400px;height:600px; '>
              </div>
            ";
          }
            
          
           
          
        }
    }

    $selectUsuario = "select * from tb_usuario where email = '$email_anunciante'";
    $resultadoUsuario = mysqli_query($conn, $selectUsuario);
    $rowUsuario = mysqli_fetch_assoc($resultadoUsuario);
    $nome = $rowUsuario["nome"];
    $cep = $rowUsuario["cep"];
    $_SESSION['nome_anunciante'] = $nome;

    include('../sistemas/sistema_avaliacao_livro.php'); 
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

<?php 

  $url = 'https://viacep.com.br/ws/'.$cep.'/json/';
  $end = json_decode(file_get_contents($url));
  $end = $end -> bairro;

  echo "
  
  <td> 
    <h1 style = 'margin-bottom:100px;color:white;margin-left:100px;'> $titulo </h1>
    <div style = 'font-size:20px;margin-left:100px;color:white;' id ='nome_anunciante' data-id='$id_anunciante'> <b> Nome: </b> $nome </div>
    <div style = 'font-size:20px;margin-left:100px;color:white;'> <b> E-mail para contato: </b> $email_anunciante </div> 
    <div style = 'font-size:20px;margin-left:100px;color:white;'> <b> Bairro: </b> $end <a href = 'https://www.google.com.br/maps/search/$cep/' target='_blank'> Abrir no maps </a></div><br>
    <div style = 'font-size:20px;margin-left:100px;color:white;'> <b> Descrição do anúncio: </b> </div> <br>
    <div style = 'font-size:20px;margin-left:120px;color:white; width:460px;'> $descricao_anuncio </div>
    <div style = 'font-size:20px;margin-left:100px;color:white;margin-top:50px;'> <b> Condição do livro: </b> $estrela </div>
    <button style = 'font-size:20px;margin-left:210px;margin-top:20px;' class'button-chat' id = 'button-chat'><img src='../imagens/messenger.png'>Chat</button>
    </td>
  
  
  ";
?>
<td>
<div id="chat-geral">
  <div class='chat-pequeno' style='display: none; '>
    <?php include_once('chat-pequeno/chat-index-pequeno.php');  ?>
  </div>  
</div>  
</td>
</tr>
</table> 

<script src="../js/notify.js"></script>

<script>
var botao = document.getElementById('button-chat')
var chat_pequeno = document.querySelector(".chat-pequeno")
var c = 0
var id_anunciante = document.getElementById('nome_anunciante').dataset.id
console.log(<?=$_SESSION["id"]?>)
botao.addEventListener("click", function(){
  if(id_anunciante == <?=$_SESSION["id"]?>){
    console.log('NÃO VAI ABRIR, TU É O DONO DO ANÚNCIO')
    $.notify("Você é o anunciante, não é possível conversar com você mesmo!", "error")
  }
  else if(c == 1){
    chat_pequeno.setAttribute('style', 'visibility: hidden')
    c = 0
  }
  else if(c == 0){
    chat_pequeno.setAttribute('style', 'visibility: visible')
    c = 1

  console.log(c)
  }
})

$(document).ready(function (){
    $(document).on('click', '#fechar-chat', function(){
      chat_pequeno.setAttribute('style', 'visibility: hidden')
      c = 0
    })
})
</script>

<script>
        $.notify.defaults({position: "right bottom"})
</script>

</body>
</html>