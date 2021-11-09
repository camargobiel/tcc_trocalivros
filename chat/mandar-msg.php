<?php 
include ('../sistemas/sistema_conexao.php');
if(!isset($_SESSION)) {
    session_start();
}
    if(isset($_POST['msg'])){
    /* $busca_id_destino = mysqli_query($conn, "SELECT id_usuario from tb_usuario where nome = '$destinatario'");
    $busca = mysqli_fetch_array($busca_id_destino);
    $id_destinatario = $busca['id_usuario']; */
    $id_destinatario = $_POST['id_conversador'];
    $_SESSION['id_destino'] = $id_destinatario;
    $id_remetente = $_SESSION['id'];
    print_r('ID REMETENtE: ' . $id_remetente);
    
    $mensagem = $_POST['msg'];
       
    include ('../sistemas/sistema_conexao.php');

    if($mensagem != "" or $id_destinatario != ""){
    $sql =  mysqli_query($conn ,"INSERT INTO chat2(remetente_id, destinatario_id, msg) VALUES('$id_remetente', '$id_destinatario', '$mensagem')");
    }
}
    ?>
