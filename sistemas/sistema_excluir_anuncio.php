<?php 
    include('sistema_conexao.php');
    $pastaArquivos = "../fotos_livro/";
    $id_anuncio = $_GET['id'];
    $delete = "DELETE from tb_anuncio WHERE id_anuncio ='$id_anuncio'";
    $resultadoDELID = mysqli_query($conn, $delete);

    $select = "select * from tb_foto_anuncio where cod_anuncio = '$id_anuncio'";
    $resultadoSELECT = mysqli_query($conn, $select);
    $dados = mysqli_fetch_assoc($resultadoSELECT);
    $i = $dados['fotos_livro'];

    if($resultadoSELECT==True){
        $deleteImagens = "delete from tb_foto_anuncio where cod_anuncio = '$id_anuncio'";
        $resultado = mysqli_query($conn, $deleteImagens);
        
        unlink($pastaArquivos.$i);
        header('location:../telas/tela_meus_anuncios.php');
    }else{
        echo "eita";
    }
    
?>