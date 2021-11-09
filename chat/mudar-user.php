<?php
include ('../sistemas/sistema_conexao.php');
session_start();

if(isset($_POST['data_id'])){
$_SESSION['id_destino'] = $_POST['data_id'];
}
?>