<?php
include ('../sistemas/sistema_conexao.php');
session_start();

if(isset($_POST['data_id'])){
    $id_destinatario = $_POST['data_id'];
    $_SESSION['id_destinatario'] = $_POST['data_id'];
}else{
    if(isset($_SESSION['id_destinatario'])){
    $id_destinatario = $_SESSION['id_destinatario'];
}else{
    $id_destinatario = '';
}
}
$id_remetente = $_SESSION['id'];

/* $query = "SELECT * from chat2 where remetente_id in ('$id_remetente','$id_destinatario') and destinatario_id in ('$id_remetente','$id_destinatario');"; */

$sql =  mysqli_query($conn ,"SELECT * from chat2 where remetente_id in ('$id_remetente','$id_destinatario') and destinatario_id in ('$id_remetente','$id_destinatario');");

while ($key = mysqli_fetch_assoc($sql))
{
    if($key['remetente_id'] == $id_remetente){
    echo "<div class = 'mandando'>";
    echo $key['msg'];
    echo "</div>";  
    }
    else{
    echo "<div class = 'recebendo'>";
    echo $key['msg'];
    echo "</div>";
    }
}

?>