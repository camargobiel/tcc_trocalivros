<?php 
    include('conexao.php');
    $id_anuncio = $_POST['id_anuncio'];
    $delete = "DELETE from tb_anuncio WHERE id_anuncio='$id_anuncio' and cod_livro = '$cod_livro'";
    $resultado = mysqli_query($conn, $delete);

?>