    $(document).ready(function (){
    $(document).on('click', '.box_msg', function(){
        console.log('TÁ CLICANDO')
        var data_id = $(this).attr("data-id");

        $(".box_msg_geral > div").removeClass('selecionado');
        $(this).addClass('selecionado')

        console.log(data_id)

        $.ajax
    ({
        //Configurações
        type: 'POST',//Método que está sendo utilizado.
        dataType: 'html',//É o tipo de dado que a página vai retornar.
        url: 'chat.php',//Indica a página que está sendo solicitada.        
        //Dados para envio 
        data: {
            data_id : data_id
        }
    }).done(function(data){
        console.log('FUNCIONOU E MANDOU!!')
        console.log(data)
        })
    })
})
