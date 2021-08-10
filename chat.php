<?php
include_once('conexao.php');
session_start();

$id_destinatario = $_SESSION['id_destino'];
$id_remetente = $_SESSION['id'];
$sql =  mysqli_query($conn ,"SELECT * from chat2 where remetente_id = '$id_remetente' and destinatario_id = '$id_destinatario'");

while ($key = mysqli_fetch_assoc($sql))
{

    print_r("<p>" . $key['msg'] . "</p>");

}

?>