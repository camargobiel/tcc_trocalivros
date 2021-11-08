<?php
    include ('../sistemas/sistema_conexao.php');
    $id_remetente = $_SESSION['id'];            

    $busca_id_destino = mysqli_query($conn, "SELECT DISTINCT destinatario_id from chat2 where remetente_id = $id_remetente");
    echo "<div class = 'box_msg_geral'> ";
    while($busca = mysqli_fetch_array($busca_id_destino)){
        $id_destinatario2 = $busca['destinatario_id'];
        $busca_nome = mysqli_query($conn, "SELECT nome FROM tb_usuario where id_usuario = $id_destinatario2");
        $row = mysqli_fetch_array($busca_nome);

        echo "<div class = 'box_msg'> " . $row['nome'] . "</div>";
        

        
    };
    echo "</div>";

?>