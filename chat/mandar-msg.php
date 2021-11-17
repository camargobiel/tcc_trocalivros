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

    $id_anuncio = $_POST['id_anuncio'];
    if($id_destinatario == ''){
        $id_destinatario = $_SESSION['id_destinatario'];
    } 
    if($id_anuncio == ''){
        $id_anuncio = $_SESSION['id_anuncio'];
    }
    
    $mensagem = $_POST['msg'];
       
    include ('../sistemas/sistema_conexao.php');
    
    if($id_anuncio != ''){
    $_SESSION['id_anuncio'] = $id_anuncio;
}
    if($mensagem != "" or $id_destinatario != ""){
    $sql =  mysqli_query($conn ,"INSERT INTO chat2(remetente_id, destinatario_id, msg, cod_anuncio) VALUES('$id_remetente', '$id_destinatario', '$mensagem', '$id_anuncio')");
    }
}
    ?>
