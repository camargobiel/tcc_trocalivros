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

        $titulo_correto = $_POST["titulo_livro"];
        $strAutor = $_POST["autor"];


        $caracteres_sem_acento = array(
            'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj',''=>'Z', ''=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
            'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
            'Ï'=>'I', 'Ñ'=>'N', 'Ń'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
            'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
            'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
            'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ń'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
            'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f',
            'ă'=>'a', 'î'=>'i', 'â'=>'a', 'ș'=>'s', 'ț'=>'t', 'Ă'=>'A', 'Î'=>'I', 'Â'=>'A', 'Ș'=>'S', 'Ț'=>'T',
        );

        $armazenaTitulo = strtolower(strtr($titulo_correto, $caracteres_sem_acento));

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
            $sql = "insert into tb_livro (titulo, autor, titulo_correto) values ('$armazenaTitulo', '$strAutor', '$titulo_correto')";
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