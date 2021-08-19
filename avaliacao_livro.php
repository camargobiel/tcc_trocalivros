<?php 
    include('conexao.php');
    session_start();
    $avaliacao = $_POST["avaliacao"];
    $id_foto = $_POST["id_foto"];

    $email = $_SESSION["email"];
        $pegarID = "select * from tb_usuario where email = '$email'";
        $resultado = mysqli_query($conn, $pegarID);
        if($resultado->num_rows > 0){
            while($row = mysqli_fetch_assoc($resultado)){
                $id = $row["id_usuario"];
            }
        }

    $sql = "select * from tb_anuncio where cod_usuario = '$id'";
    $resultado = mysqli_query($conn, $sql);
    if($resultado-> num_rows > 0){
        while($row = mysqli_fetch_assoc($resultado)){
            echo $id_anuncio = $row["id_anuncio"];
        }
    }

    $sql = "update tb_anuncio set avaliacao = '$avaliacao' where id_anuncio = '$id_anuncio'";
    $resultado = mysqli_query($conn, $sql);

    if($resultado==true){
        header('location: index.php');
    }else{
        header('location: tela_anuncio_livro.php');
    }


?>