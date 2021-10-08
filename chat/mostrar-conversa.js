    $(document).ready(function (){
    $(document).on('click', '.box_msg', function(){
        
        var data_nome = $(this).attr("data-nome");

        $(".box_msg_geral > div").removeClass('selecionado');
        $(this).addClass('selecionado')

        console.log(data_nome)

        $.ajax
    ({
        //Configurações
        type: 'POST',//Método que está sendo utilizado.
        dataType: 'html',//É o tipo de dado que a página vai retornar.
        url: 'mudar-user.php',//Indica a página que está sendo solicitada.        
        //Dados para envio 
        data: {
            data_nome : data_nome
        }
    }).done(function(data){
        console.log('FUNCIONOU E MANDOU!!')
        console.log(data)
        })
    })
})
