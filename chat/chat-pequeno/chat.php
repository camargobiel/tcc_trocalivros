<?php
include ('../sistemas/sistema_conexao.php');
if(!isset($_SESSION)){
session_start();
}
if(isset($_SESSION['id_destino'])){
$id_destinatario = $_SESSION['id_destino'];
}
print_r('MEU PAU' . $id_destinatario);

$id_remetente = $_SESSION['id'];

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