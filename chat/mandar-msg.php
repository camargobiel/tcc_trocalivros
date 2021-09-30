<script>
   const button = document.getElementById('submit')

button.addEventListener('click', (event) => {
    <?php 
    include ('../sistemas/sistema_conexao.php');
        $destinatario = $_POST['destino'];

        if ($destinatario != 0){
        $busca_id_destino = mysqli_query($conn, "SELECT id_usuario from tb_usuario where nome = '$destinatario'");
        $busca = mysqli_fetch_array($busca_id_destino);
        $id_destinatario = $busca['id_usuario'];
        $_SESSION['id_destino'] = $id_destinatario;
    
        $mensagem = $_POST['msg'];
    
        if($mensagem != "" or $id_destinatario != ""){
        $sql =  mysqli_query($conn ,"INSERT INTO chat2(remetente_id, destinatario_id, msg) VALUES('$id_remetente', '$id_destinatario', '$mensagem')");
        }
        }
    ?>
})

</script>    