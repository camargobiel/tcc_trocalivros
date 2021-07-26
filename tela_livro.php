<!DOCTYPE html>
<html dir="ltr" lang="pt">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/estilo_tela_livro.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
    <script type="text/javascript" src="js/bootstrap.min.js"> </script>
</head>
<body>
    <?php include ('navbar.php'); ?>       
    <div> 
        <img src="imagens/exemplo_livro1.jpg" class = "capa_livro">  
    </div>
        
        <div>
            <div class = "div_anunciantes"> 
                <a href = ""><div class = "anunciantes">
                    <div> <img src="imagens/exemplo_foto1.jpg" class = "livro_foto"> </div>         
                    <?php include ('avaliacao_livro.html') ?>
                    <p class = "estado_livro"> Estado do livro: </p>
                    <p class = "nome_anunciante"> José da Silva </p> <br>
                    <p class = "bairro_anunciante"> Bairro Nazaré </p> 
                </div> </a>

                <a href = ""><div class = "anunciantes">
                    <div> <img src="imagens/exemplo_foto2.jpg" class = "livro_foto"> </div>         
                    <?php include ('avaliacao_livro.html') ?>
                    <p class = "estado_livro"> Estado do livro: </p>
                    <p class = "nome_anunciante"> Carlos Junior </p> <br>
                    <p class = "bairro_anunciante"> Bairro Jacaré </p> 
                </div> </a>

                <a href = ""><div class = "anunciantes">
                    <div> <img src="imagens/exemplo_foto3.jpg" class = "livro_foto"> </div>         
                    <?php include ('avaliacao_livro.html') ?>
                    <p class = "estado_livro"> Estado do livro: </p>
                    <p class = "nome_anunciante"> Gabriel Camargo </p> <br>
                    <p class = "bairro_anunciante"> Avenida 2 de maio </p> 
                </div> </a>

                
            </div>
            

            
            <h2 class = "titulo_livro"> Revolução dos bichos </h2>
            <div class = "descricao_div"> 
            <h3 class = "nome_autor"> Geoge Orwell </h3> <br>
                <p> Verdadeiro clássico moderno, concebido por um dos mais influentes escritores do século XX, A revolução dos bichos é uma fábula sobre o poder. Narra a insurreição dos animais de uma granja contra seus donos. Progressivamente, porém, a revolução degenera numa tirania ainda mais opressiva que a dos humanos.
                    Escrita em plena Segunda Guerra Mundial e publicada em 1945 depois de ter sido rejeitada por várias editoras, essa pequena narrativa causou desconforto ao satirizar ferozmente a ditadura stalinista numa época em que os soviéticos ainda eram aliados do Ocidente na luta contra o eixo nazifascista. De fato, são claras as referências: o despótico Napoleão seria Stálin, o banido Bola-de-Neve seria Trotsky, e os eventos políticos - expurgos, instituição de um estado policial, deturpação tendenciosa da História - mimetizam os que estavam em curso na União Soviética. Com o acirramento da Guerra Fria, as mesmas razões que causaram constrangimento na época de sua publicação levaram A revolução dos bichos a ser amplamente usada pelo Ocidente nas décadas seguintes como arma ideológica contra o comunismo. O próprio Orwell, adepto do socialismo e inimigo de qualquer forma de manipulação política, sentiu-se incomodado com a utilização de sua fábula como panfleto. Depois das profundas transformações políticas que mudaram a fisionomia do planeta nas últimas décadas, a pequena obra-prima de Orwell pode ser vista sem o viés ideológico reducionista. Mais de sessenta anos depois de escrita, ela mantém o viço e o brilho de uma alegoria perene sobre as fraquezas humanas que levam à corrosão dos grandes projetos de revolução política. É irônico que o escritor, para fazer esse retrato cruel da humanidade, tenha recorrido aos animais como personagens. De certo modo, a inteligência política que humaniza seus bichos é a mesma que animaliza os homens. Escrito com perfeito domínio da narrativa, atenção às minúcias e extraordinária capacidade de criação de personagens e situações, A revolução dos bichos combina de maneira feliz duas ricas tradições literárias: a das fábulas morais, que remontam a Esopo, e a da sátira política, que teve talvez em Jonathan Swift seu representante máximo. "A melhor sátira já escrita sobre a face negra da história moderna." Malcolm Bradbury "Um livro para todos os tipos de leitor, seu brilho ainda intacto depois de sessenta anos." Ruth Rendell 
                </p>
                <h5 class = "nome_autor"> Data de publicação: 23 de maio de 1992 </h5> 
            </div>
            
        
        </div> 

        
</body>
</html>