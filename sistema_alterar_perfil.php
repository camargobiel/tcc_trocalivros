<?php
    session_start();
    $email = $_SESSION["email"];
    $nome = $_POST["nome"];
    $cep = $_POST["cep"];
    $senha = $_POST["senha"];

    include_once ('conexao.php');
    $upd = "update tb_usuario set nome = '$nome', cep = '$cep', senha = '$senha' where email = '$email'";
    $result = mysqli_query($conn, $upd);

    if($result==true){
        echo "
        <script type='text/javascript'>
            alert('Dados alterados com sucesso!!'); 
        </script>
        ";
        echo '<script type="text/javascript">location.replace("tela_perfil.php");</script>';
    }else{
        echo "
        <script type='text/javascript'>
            alert('Não foi possível alterar os dados!'); 
        </script>
        ";
        echo '<script type="text/javascript">location.replace("tela_perfil.php");</script>';
    
    }
?>