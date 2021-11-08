<?php 
include_once('../../sistemas/sistema_conexao.php');
if(!isset($_SESSION)){
    session_start();
}
    if(isset($_POST['id_destino'])){      
        $id_destinatario = $_POST['id_destino'];
        $_SESSION['id_destino'] = $id_destinatario;
        $id_remetente = $_SESSION['id'];
        print_r('ID REMETENTE: ' . $id_remetente);

        
        $mensagem = $_POST['msg'];

        }
        
        if($mensagem != "" or $id_destinatario != ""){
        $sql =  mysqli_query($conn ,"INSERT INTO chat2(remetente_id, destinatario_id, msg) VALUES('$id_remetente', '$id_destinatario', '$mensagem')");
        }


    ?>
