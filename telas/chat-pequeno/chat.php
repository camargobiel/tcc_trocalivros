<?php
include ('../../sistemas/sistema_conexao.php');
session_start();

$id_destinatario = $_SESSION['id_destino'];

echo "<div id='topo-chat'>";
echo "<div class = 'nome_anunciane'>" . $_SESSION['nome_anunciante'] . "</div>";
echo "<span id='fechar-chat'>X</span>";
echo "</div>";

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