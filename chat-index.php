<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - 4Trade</title>
    <script src="chat-ajax.js"></script>
</head>
<body>
    <div id="chat">
    </div>


    <form method="post" action="chat-index.php">
		<input type="text" name="mensagem" placeholder="mensagem">
        <input type="text" name="destino" placeholder="para quem?">
		<input type="submit" value="Enviar" name = submit>
		
	</form>
	<?php
		include_once("conexao.php");
        session_start();
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