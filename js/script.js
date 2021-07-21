$(
    function(){

        $('#login').click(
            function(){
              if($(this).val() == 'usuario'){ 
                $(this).val(''); 
              }
              }
        ); // fim do click do login.

        $('#senha').click(
            function(){
              if($(this).val() == "senha"){ 
                $(this).val('');
              }
            }
        ); // fim do click da senha.

        $('#botao').click(
            function(){

              $('#mensagem').slideUp('fast');
              
              if($('#login').val() =='usuario' && $('#senha').val() =='senha'){
                $('#mensagem').html("Campos inválidos! Preencha-os");
                $('#mensagem').slideDown('fast');

              } else if($('#login').val() =='usuario'){
                $('#mensagem').html("Usuário inválido");
                $('#mensagem').slideDown('fast');

              } else if($('#senha').val() =='senha'){
                $('#mensagem').html("Senha inválida");
                $('#mensagem').slideDown('fast');

              } else if($('#senha').val() == '' && $('#login').val() == ''){
                $('#mensagem').html("Campos em branco! Preencha-os");
                $('#mensagem').slideDown('fast');

              } 
              
              
              else {
                   //alert ("ok")
                  var dados;
                  dados={login: $('#login').val(), senha: $('#senha').val()};

                  $.post('pesquisa_usuario.php', dados, function(retornaUsuario) {

                    if(retornaUsuario != false){
                      $('#mensagem').html('Usuário encontrado');
                      $('#mensagem').slideDown('fast');
                      
                    } else{
                      $('#mensagem').html('Usuário não encontrado');
                      $('#mensagem').slideDown('fast');
                    }
                      
                  });
              }
             
            } // fim da function.
        ); // fim do click do botão.

        $('#mensagem').click(
            function(){
              $(this).slideUp();
            }
        ); // fim do click da mensagem.

    } // fim da função anônima principal.
);