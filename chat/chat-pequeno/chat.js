const button = document.getElementById('submit')

button.addEventListener('click', (event) => {
    event.preventDefault()

    



    console.log('TÁ CLICANDO')

    const msg = document.getElementById('mensagem')

    const destino = document.getElementById('destino')

    console.log(msg.value)
    console.log(destino.value)

    if (msg.value != '' && destino.value != ''){
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
            destino: destino.value
        }
    }).done(function(data){
        $('#mensagem').val('')
        $('#destino').val('')  

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
    if(destino.value == ''){
        event.preventDefault()
        destino.classList.add("errorInput")
    }
    else{
        destino.classList.remove("errorInput")
    }
} )    
