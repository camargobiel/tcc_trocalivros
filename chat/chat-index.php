    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - 4Trade</title>
    <link href="../css/estilo_chat.css" rel="stylesheet" type="text/css">
    <script src="chat-ajax.js"></script>

      <!-- TROCANDO A FOTO DO LINK DO SITE -->
      <link rel="shortcut icon" href="../imagens/celular_logo.png">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.8">

<!-- CHAMANDO ARQUIVOS .CSS -->
<link href="../bootstrap_css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../css/navbar_items.css" rel="stylesheet" type="text/css">
<link href="../css/estilo_login.css" rel="stylesheet" type="text/css">
<link href="../bootstrap_css/hover.css" rel="stylesheet" type="text/css">

<!-- CHAMANDO ARQUIVOS .JS -->
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>
<body>
    <?php
    include_once('../sistemas/sistema_navbar.v2.php');
    ?>
    <div class="chat-estilo">


    <?php
    include ('../sistemas/sistema_conexao.php');
    $id_remetente = $_SESSION['id'];
          

    $busca_id_destino = mysqli_query($conn, "SELECT DISTINCT destinatario_id, remetente_id, cod_anuncio from chat2 where remetente_id = $id_remetente or destinatario_id = $id_remetente");
    echo "<div class = 'box_msg_geral'> ";
    $c = 0;
    $lista_pessoas_conversas = array();
    while($busca = mysqli_fetch_array($busca_id_destino)){
        $c = $c + 1;
        $id_destinatario2 = $busca['destinatario_id'];
        $cod_anuncio = $busca['cod_anuncio'];

        //Buscando info do anúncio
        $busca_info_ad = mysqli_query($conn, "SELECT cod_livro, avaliacao FROM tb_anuncio where id_anuncio = '$cod_anuncio'");
        $buscando = mysqli_fetch_array($busca_info_ad);
        $cod_livro = $buscando['cod_livro'];

        $avaliacao = $buscando['avaliacao'];

        $busca_info_livro = mysqli_query($conn, "SELECT titulo_correto FROM tb_livro where id_livro = '$cod_livro'");
        $busco = mysqli_fetch_array($busca_info_livro);
        $nome_livro = $busco['titulo_correto'];

        $busca_imagem_ad = mysqli_query($conn, "SELECT fotos_livro from tb_foto_anuncio where cod_anuncio = '$cod_anuncio';");
        $searching = mysqli_fetch_array($busca_imagem_ad);
        $nome_imagem = $searching['fotos_livro'];
               
        if($id_destinatario2 == $id_remetente){
            $id_destinatario2 = $busca['remetente_id'];
        }
        $busca_nome = mysqli_query($conn, "SELECT nome FROM tb_usuario where id_usuario = $id_destinatario2");
        $row = mysqli_fetch_array($busca_nome);
        $nome_msg = $row['nome'];
        $ja_tem = False;
        
        if(in_array($nome_msg, $lista_pessoas_conversas)) {
            $ja_tem = True;
        } 
        if($ja_tem == False){
        echo "<div class = 'box_msg' data-img = '$nome_imagem' id='$id_destinatario2' data-nome = '$nome_msg' data-id='$id_destinatario2' data-cod_anuncio = '$cod_anuncio' data-nome_livro = '$nome_livro'> " .  "<img src='../fotos_livro/$nome_imagem' class='img-chat'>" . "<a target='_blank' href='../telas/tela_anuncio.php?id_anuncio=$cod_anuncio&avaliacao=$avaliacao&titulo=$nome_livro'><img src='../imagens/share.png' class='link-externo'></a> " . "<div class = 'segunda-box'>" . "<div class='nome-box-msg'>" . $row['nome'] . "</div>" . "<div = class= 'nome_livro'>" . $nome_livro . "</div></div></div>";    
    }
    array_push($lista_pessoas_conversas, $nome_msg);   
    };
    echo "</div>";

    ?>
        <div id="chat">
        </div>
    
    </div>

    <form class='form-msg' onsumbit='return False;'>
		<input type="text" name="mensagem" placeholder="Digite uma mensagem..." class="mensagem" id = "mensagem">
        <span id='submit'><img src="../imagens/send.png" alt=""></span>

    </form>
    <?php    include_once('mandar-msg.php')          ?>

   
<script src="chat.js"></script>
<script src="mostrar-conversa.js"></script>

<?php if (isset($_SESSION['id_destinatario'])): ?>
<?php ob_start() ?>
<script>
    const box_selecionado = document.getElementById('<?=$_SESSION['id_destinatario']?>');
    console.log(box_selecionado)
    $(box_selecionado).addClass('selecionado')

</script>
<?php 
   $buffer_js = ob_get_clean();
    var_dump($buffer_js);
    endif;
?>


</body>
</html>