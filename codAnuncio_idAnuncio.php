<?php 

    $email = $_SESSION["email"];
    $pegarID = "select * from tb_usuario where email = '$email'";
    $resultado = mysqli_query($conn, $pegarID);
    if($resultado->num_rows > 0){
        while($row = mysqli_fetch_assoc($resultado)){
            $id = $row["id_usuario"];
        }
    }
                
    $sql = "select * from tb_foto_anuncio where cod_anuncio = '$id'";
    $resultado = mysqli_query($conn, $sql);
    if($resultado->num_rows > 0){
        while($row = mysqli_fetch_assoc($resultado)){
            $foto_livro = $row["fotos_livro"];
        }
    }

    $sql = "select * from tb_anuncio where cod_usuario = '$id'";
        $resultado = mysqli_query($conn, $sql);
        if($resultado-> num_rows > 0){
            while($row = mysqli_fetch_assoc($resultado)){
                $id_anuncio = $row["id_anuncio"];
            }
        }

    

?>