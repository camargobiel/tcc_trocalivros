const button = document.getElementById('submit')

button.addEventListener('click', (event) => {
    event.preventDefault()

    



    console.log('TÁ CLICANDO')

    const msg = document.getElementById('mensagem')
    const id_destino = document.getElementById('nome_anunciante').dataset.id



    console.log(msg.value)
    console.log(id_destino)

    if (msg.value != '' && id_destino != ''){
        console.log('EAEE BOCA ')
        $.ajax
    ({
        //Configurações
        type: 'POST',//Método que está sendo utilizado.
        dataType: 'html',//É o tipo de dado que a página vai retornar.
        url: 'chat-pequeno/mandar-msg.php',//Indica a página que está sendo solicitada.        
        //Dados para envio
        data: {
            msg : msg.value,
            id_destino: id_destino
        }
    }).done(function(data){
        console.log('TÁ MANDANDO PRO MANDAR-MSG.PHP')
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
