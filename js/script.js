$(
    function(){

        $('#email').click(
            function(){
              if($(this).val() == 'usuario'){ 
                $(this).val(''); 
              }
              }
        ); // fim do click do login.

        $('#botao').click(
            function(){

              $('#mensagem').slideUp('fast');
              
              
                   //alert ("ok")
                  var dados;
                  dados={login: $('#email').val()};

                  $.post('../sistemas/sistema_registro.php', dados, function(retornaUsuario) {

                    if(retornaUsuario != false){
                      $('#mensagem').html('Usuário encontrado');
                      $('#mensagem').slideDown('fast');
                      
                    } else{
                      $('#mensagem').html('Usuário não encontrado');
                      $('#mensagem').slideDown('fast');
                    }
                      
                  });
              }
             
             // fim da function.
        ); // fim do click do botão.

        $('#mensagem').click(
            function(){
              $(this).slideUp();
            }
        ); // fim do click da mensagem.

    } // fim da função anônima principal.
);