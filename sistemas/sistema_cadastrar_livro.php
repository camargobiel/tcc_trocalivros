<?php 
        include ('sistema_conexao.php');
        session_start();
        $email = $_SESSION["email"];
        
        $pegarID = "select * from tb_usuario where email = '$email'";
        $resultado = mysqli_query($conn, $pegarID);
        if($resultado-> num_rows > 0){
            while($row = mysqli_fetch_assoc($resultado)){
                $id = $row["id_usuario"];
            }
        }

        

        $armazenaTitulo = $_POST["titulo_livro"];
        $strAutor = $_POST["autor"];

        $pegarRepetido = "select * from tb_livro where titulo = '$armazenaTitulo' and autor = '$strAutor'";
        $resultadoRepetido = mysqli_query($conn, $pegarRepetido);
        
        if(mysqli_num_rows($resultadoRepetido)>0){
            $pegarIDLivro = "select id_livro from tb_livro where titulo = '$armazenaTitulo' and autor = '$strAutor'";
            $consultarLivro = mysqli_query($conn, $pegarIDLivro);
            while($row2 = mysqli_fetch_assoc($consultarLivro)){
                $id_livro = $row2["id_livro"];
            }

            $inserirIDLivro = "insert into tb_anuncio (cod_livro,cod_usuario) values ('$id_livro','$id')";
            $InserirLivro = mysqli_query($conn, $inserirIDLivro);
            header('location: ../telas/tela_cadastro_foto_livro.php');
        }else{
            $sql = "insert into tb_livro (titulo, autor) values ('$armazenaTitulo', '$strAutor')";
            $result = mysqli_query($conn, $sql);
            
            if($result==true){
                $pegarIDLivro = "select id_livro from tb_livro";
                $consultarLivro = mysqli_query($conn, $pegarIDLivro);
                while($row1 = mysqli_fetch_assoc($consultarLivro)){
                    $id_livro = $row1["id_livro"];
                    
                }

                $inserirIDLivro = "insert into tb_anuncio (cod_livro,cod_usuario) values ('$id_livro','$id')";
                $InserirLivro = mysqli_query($conn, $inserirIDLivro);
                header('location: ../telas/tela_cadastro_foto_livro.php');
                
            }else{
                echo "nao foi possivel cadastrar";
            }
        }
        
?>