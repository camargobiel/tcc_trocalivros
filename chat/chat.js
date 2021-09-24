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
        url: 'chat-index.php',//Indica a página que está sendo solicitada.        
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

    /*const nome = document.getElementById('nome')
    const email = document.getElementById('email')
    const senha = document.getElementById('senha')
    const senhaConfir = document.getElementById('senhaconf')

    if (nome.value == ''){
        nome.classList.add("errorInput")
        event.preventDefault()
    }   else{
        nome.classList.remove("errorInput")
    }
    
    if (senha.value == '' || senha.value.length < 6 || (senha.value != senhaConfir.value)) {
        senha.classList.add("errorInput")
        event.preventDefault()
    }   else{
        senha.classList.remove("errorInput")   
    }
  
    if (senhaConfir.value == '' || (senhaConfir.value != senha.value) || senhaConfir.value.length < 6){
        senhaConfir.classList.add("errorInput")
        event.preventDefault()
    }   else{
        senhaConfir.classList.remove("errorInput")
    }
    if (email.value == '' || email.value.indexOf("@") == -1 || email.value.indexOf(".") == -1 || (email.value.indexOf(".") - email.value.indexOf("@")) == 1){
        email.classList.add("errorInput")
        event.preventDefault()
    }   else{
        email.classList.remove("errorInput")
    }
    exit*/
} )    

