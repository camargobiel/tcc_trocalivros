<?php 
        include ('conexao.php');
        session_start();
        $email = $_SESSION["email"];
        echo $id = $row["id_usuario"];
        $pegarID = "select * from tb_usuario where email = '$email'";
        $resultado = mysqli_query($conn, $pegarID);
        if($resultado-> num_rows > 0){
            while($row = mysqli_fetch_assoc($resultado)){
                $id = $row["id_usuario"];
            }
        }

        $armazenaTitulo = $_POST["titulo_livro"];
        $strAutor = $_POST["autor"];
        $sql = "insert into tb_anuncio (titulo, autor, cod_usuario) values ('$armazenaTitulo', '$strAutor', '$id')";
        $result = mysqli_query($conn, $sql);
        if($result==true){
            header('location: tela_anuncio_foto_livro.php');
        }else{
            echo "nao foi possivel cadastrar";
        }
?>