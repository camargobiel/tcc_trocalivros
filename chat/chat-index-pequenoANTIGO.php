<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - 4Trade</title>
    <link href="../css/estilo_chat_pequeno.css" rel="stylesheet" type="text/css">
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
    <div class="chat-estilo">


    <?php
    include ('../sistemas/sistema_conexao.php');
    $id_remetente = $_SESSION['id'];            

    $busca_id_destino = mysqli_query($conn, "SELECT DISTINCT destinatario_id from chat2 where remetente_id = $id_remetente");
    echo "<div class = 'box_msg_geral'> ";
    while($busca = mysqli_fetch_array($busca_id_destino)){
        $id_destinatario2 = $busca['destinatario_id'];
        $busca_nome = mysqli_query($conn, "SELECT nome FROM tb_usuario where id_usuario = $id_destinatario2");
        $row = mysqli_fetch_array($busca_nome);

        echo "<div class = 'box_msg'> " . $row['nome'] . "</div>";
        

        
    };
    echo "</div>";

    ?>
        <div id="chat">
        </div>
    
    </div>
   


    <form>
		<input type="text" name="mensagem" placeholder="Digite uma mensagem..." class="mensagem" id = "mensagem">
        <input type="text" name="destino" placeholder="Para quem?" id = "destino">
        <div class="button">
        <input type="submit" id = "submit" value="Enviar" name = submit class="button"><img src="imagens/ponta-de-flecha-esquerda.png" alt="">
        </div>
		
		
	</form>
    <?php    include_once('mandar-msg.php')          ?>


<script src="chat.js"></script>
<script src="mostrar-conversa.js"></script>

</body>
</html>