<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - 4Trade</title>
    <link href="css/estilo_chat.css" rel="stylesheet" type="text/css">
    <script src="chat-ajax.js"></script>

      <!-- TROCANDO A FOTO DO LINK DO SITE -->
      <link rel="shortcut icon" href="../imagens/celular_logo.png">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.8">

<!-- CHAMANDO ARQUIVOS .CSS -->
<link href="bootstrap_css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/navbar_items.css" rel="stylesheet" type="text/css">
<link href="css/estilo_login.css" rel="stylesheet" type="text/css">
<link href="bootstrap_css/hover.css" rel="stylesheet" type="text/css">

<!-- CHAMANDO ARQUIVOS .JS -->
<script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>
<body>
    <?php
    include_once('sistemas/sistema_navbar.php');
    ?>
    <div class="chat-estilo">
        <div id="chat">
        </div>
    </div>
   


    <form method="post" action="chat-index.php">
		<input type="text" name="mensagem" placeholder="Digite uma mensagem..." class="mensagem">
        <input type="text" name="destino" placeholder="Para quem?">
        <div class="button">
        <input type="submit" value="Enviar" name = submit class="button"><img src="imagens/ponta-de-flecha-esquerda.png" alt="">
        </div>
		
		
	</form>
	<?php
		include ('sistemas/sistema_conexao.php');
        
        /* Pegando o ID do destinatário */
        $destinatario = $_POST['destino'];
        $busca_id_destino = mysqli_query($conn, "SELECT id_usuario from tb_usuario where nome = '$destinatario'");
        $busca = mysqli_fetch_array($busca_id_destino);
        $id_destinatario = $busca['id_usuario'];
        $_SESSION['id_destino'] = $id_destinatario;
        $id_remetente = $_SESSION['id'];
		$mensagem = $_POST['mensagem'];

        if($mensagem != "" or $id_destinatario != ""){
		$sql =  mysqli_query($conn ,"INSERT INTO chat2(remetente_id, destinatario_id, msg) VALUES('$id_remetente', '$id_destinatario', '$mensagem')");
        }

	?>
</body>
</html>