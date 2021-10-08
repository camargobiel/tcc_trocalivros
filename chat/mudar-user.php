<?php
include ('../sistemas/sistema_conexao.php');
session_start();

$nome_selecionado = $_POST['data_nome'];

$busca_id_destino = mysqli_query($conn, "SELECT id_usuario from tb_usuario where nome = '$nome_selecionado'");
$busca = mysqli_fetch_array($busca_id_destino);

$_SESSION['id_destino'] = $busca['id_usuario'];

?>