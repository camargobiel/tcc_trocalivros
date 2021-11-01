<!DOCTYPE html>
<html dir="ltr" lang="pt">
  <head>
    <title> Meus anúncios </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">

    <!-- TROCANDO A FOTO DO LINK DO SITE -->
    <link rel="shortcut icon" href="../imagens/celular_logo.png">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../css/estilo_meus_anuncios.css" rel="stylesheet" type="text/css">
    <link href="../css/hover.css" rel="stylesheet" type="text/css">

  </head>
<body> 

    <?php 
    
    include ('../sistemas/sistema_navbar.php'); 
    include ('../sistemas/sistema_conexao.php'); 

    ?>
    
    <h1 class = "titulo"> Meus anúncios </h1>

    <div class="row cards-teste" >
        <div class='card card-teste'>
            <a href = 'tela_cadastro_livro.php'>
                <img src='../imagens/foto_adicionar.png' class='card-img-top' style = "margin-top: 20px;">
                <div class='card-body' style = "text-align:center;">
                    <h5 class='card-title'>Adicionar anúncio</h5>
                    <p class='card-text'> Clique aqui para adicionar um anúncio de seu livro </p>
                </div>
            </a>
        </div>
    
    <?php   
        $email = $_SESSION["email"];  
        
        //pegar id_usuario
        $pegarIdUsuario = "select * from tb_usuario where email = '$email'";
        $resultadoIdUsuario = mysqli_query($conn, $pegarIdUsuario);
        $rowIdUsuario = mysqli_fetch_assoc($resultadoIdUsuario);
        $id_usuario = $rowIdUsuario["id_usuario"];

        //pegar id_anuncio
        $pegarCodUsuario = "select * from tb_anuncio where cod_usuario = '$id_usuario'";
        $resultadoCodUsuario = mysqli_query($conn, $pegarCodUsuario);
        $rowCodUsuario = mysqli_fetch_assoc($resultadoCodUsuario);
        $id_anuncio = $rowCodUsuario["id_anuncio"];

        //pegar foto_livro
        $pegarCodAnuncio = "select * from tb_foto_anuncio where cod_anuncio = '$id_anuncio'";
        $resultadoCodAnuncio = mysqli_query($conn, $pegarCodAnuncio);
        $rowCodAnuncio = mysqli_fetch_assoc($resultadoCodAnuncio);
        $foto_livro = $rowCodAnuncio["fotos_livro"];  

        $sql = "select id_livro, titulo,titulo_correto, autor, id_anuncio, cod_livro from tb_livro inner join tb_anuncio on id_livro = cod_livro where cod_usuario = '$id_usuario'";
        $resultado = mysqli_query($conn, $sql);
        if($resultado-> num_rows > 0){
            while($row = mysqli_fetch_assoc($resultado)){
                $id_anuncio = $row["id_anuncio"];
                $cod_livro = $row['cod_livro'];
                $titulo = $row['titulo_correto'];
                $autor = $row['autor'];


                $pegarFoto = "select * from tb_foto_anuncio where cod_anuncio = '$id_anuncio' order by cod_anuncio";
                $resultadoFoto = mysqli_query($conn, $pegarFoto);
                $rowFoto = mysqli_fetch_assoc($resultadoFoto);
                $foto_livro = $rowFoto['fotos_livro']; 

                echo " 
                <div class='card card-teste' id = 'tabela'>
                    <img src='../fotos_livro/$foto_livro' class='card-img-top'>
                    <div class='card-body'>
                        <h5 class='card-title'>$titulo</h5>
                        <p class='card-text'> $autor </p>
                        <button type='button' id = 'botao' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modalFinalizar'>
                            Finalizar Anúncio
                        </button>
                        <a href = 'tela_editar_livro.php?id_anuncio=$id_anuncio' style = 'color:white;' class='btn btn-primary'>
                            Editar
                        </a>
                    </div>
                </div>
                ";


            echo "
                <div class='modal' tabindex='-1' role='dialog' id = 'modalFinalizar'>
                    <div class='modal-dialog' role='document'>
                        <div class='modal-content' style = 'background-color:#4c00ff;'>
                            <div class='modal-header'>
                                <h5 class='modal-title' style = 'color:white;'> Tem certeza que deseja finalizar esse anúncio? </h5>
                                <button type='button' class='close' data-bs-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            
                            <div class='modal-body' style = 'color:white;'>
                                <p> Finalize o anúncio caso a troca já tenha sido efetuada ou você não quer mais trocar seu livro </p>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'> Cancelar </button>
                                <a id = 'botao2' class = 'btn btn-warning' href = '../sistemas/sistema_excluir_anuncio.php?id=$id_anuncio'> Finalizar anúncio </a>
                            </div>
                        </div>
                    </div>
                </div>
            ";
                                      
            }
        }  

            
    ?>
    </div>
    
    <!-- MODAL -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>