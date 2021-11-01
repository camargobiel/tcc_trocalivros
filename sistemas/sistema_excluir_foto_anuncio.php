<?php 
    include('sistema_conexao.php');
    $id_foto = $_GET["id"];
    $id_anuncio = $_GET["id_anuncio"];

    $sql = "delete from tb_foto_anuncio where id_foto = '$id_foto'";
    $resultado = mysqli_query($conn, $sql);

    header("location: ../telas/tela_cadastro_foto_livro.php?id_anuncio=$id_anuncio");

?>