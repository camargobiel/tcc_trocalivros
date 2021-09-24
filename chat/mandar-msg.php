<?php
    include ('../sistemas/sistema_conexao.php');
    
    /* Pegando o ID do destinatário */
    $destinatario = $_POST['destino'];
    $busca_id_destino = mysqli_query($conn, "SELECT id_usuario from tb_usuario where nome = '$destinatario'");
    $busca = mysqli_fetch_array($busca_id_destino);
    $id_destinatario = $busca['id_usuario'];
    $_SESSION['id_destino'] = $id_destinatario;

    $mensagem = $_POST['msg'];

    if($mensagem != "" && $id_destinatario != ""){
    $sql =  mysqli_query($conn ,"INSERT INTO chat2(remetente_id, destinatario_id, msg) VALUES('$id_remetente', '$id_destinatario', '$mensagem')");
    }

	?>