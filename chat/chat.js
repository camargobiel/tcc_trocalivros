const button = document.getElementById('submit')

var id_conversador;

$(document).on('click', '.box_msg',function(){
    id_conversador = $(this).attr("data-id");

    console.log(id_conversador)
})


button.addEventListener('click', (event) => {

    console.log('ESSE É O ID CONVERSADOR PEGO NO CHAT.JS: ' + id_conversador)

    event.preventDefault()
    
    console.log('TÁ CLICANDO')

    const msg = document.getElementById('mensagem')


    console.log(msg.value)

    if (msg.value != ''){
        console.log('EAEE BOCA ')
        $.ajax
    ({
        //Configurações
        type: 'POST',//Método que está sendo utilizado.
        dataType: 'html',//É o tipo de dado que a página vai retornar.
        url: 'mandar-msg.php',//Indica a página que está sendo solicitada.        
        //Dados para envio
        data: {
            msg : msg.value,
            id_conversador, id_conversador,
        }
    }).done(function(data){
        $('#mensagem').val('')

    })
    }
    
    if (msg.value == ''){
        console.log('DEU RUIM')
        event.preventDefault()
        msg.classList.add("errorInput")
    }
    else{
        msg.classList.remove("errorInput")
    }

} )    