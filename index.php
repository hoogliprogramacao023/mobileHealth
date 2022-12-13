<?php 
    include "includes.php";
    include "Class/banners.class.php";
    include "Class/textos.class.php";
    include "Class/faqs.class.php";
    include "Class/servicos.class.php";
    include "Class/projetos.class.php";
    include 'envia.php';
    
    $banners    = Banners::getInstance(Conexao::getInstance());
    $faqs    = Faqs::getInstance(Conexao::getInstance());
    $servicos    = Servicos::getInstance(Conexao::getInstance());
    $textos     = Textos::getInstance(Conexao::getInstance());
    $projeto    = Projetos::getInstance(Conexao::getInstance());
    
    $texto = $textos->rsDados(1);
    $puxaBanners = $banners->rsDados(7);
    $puxaFaq = $faqs->rsDados();
    $puxaServicos = $servicos->rsDados();
    $puxaProjetos = $projeto->rsDados();

?>
<!doctype html>
<html lang="pt-BR">

<head>
    <?php include "description.php"; ?>
    <?php include "inc-assets-head.php"; ?>
    <?php include "inc-tagmanager-head.php"; ?>
   
</head>

<body class="home-2-bg">
    <?php include "inc-tagmanager-body.php"; ?>
    <?php include "header.php"; ?>
    <main class="main-content">
        <section class="home-slider-area slider-default d-sm-block">
            <div class="home-slider-content">
                <div class="home-slider-item">
                    <div class="bg-thumb bg-img">
                        <img class="web-banner" src="<?php echo SITE_URL; ?>/img/<?php echo $puxaBanners->foto; ?>">
                        <img class="mobile-banner" src="<?php echo SITE_URL; ?>/img/<?php echo $puxaBanners->imagem_mobile; ?>">
                    </div>
                    <div class="slider-content-area">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-sm-12 col-lg-7">
                                    <div class="content">
                                        <div class="inner-content">
                                            <h1><?php echo $puxaBanners->titulo1; ?></h1>
                                            <p><?php echo strip_tags($puxaBanners->breve); ?></p>
                                            <div>
                                                <a href="#contato" class="btn-theme"><?php echo $puxaBanners->nome_botao; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
           @media(max-width:1080px) and (min-width:769px){
                .slider-content-area{
                    background: url(<?php echo SITE_URL; ?>/img/<?php echo $puxaBanners->foto; ?>);
                    background-repeat: round;
                    position: relative;
                }
           }
            
            </style>
        </section>
         <section class="about-area about-inner-area position-relative" id="sobre">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="section-title stitle-style3 text-center">
                            <h2 class="title"><?php echo $texto->titulo_sessao_1;?></h2>
                            <div class="desc">
                                <?php echo $texto->breve_sessao_1;?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if ($texto->embed <> ''){?>
                    <div class="mobile-about-img" class="col-md-6 col-sm-12 ">
                        <iframe width="100%" height="350px" src="https://www.youtube.com/embed/<?php echo $texto->embed;?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <?php }else{?>
                    <div class="col-md-6 col-sm-12 tablet-formation-faq">
                    <img class="mobile-about-img" src="<?php echo SITE_URL.'/img/'.$texto->imagem_sessao_1?>">
                    </div>
                    <?php }?>
                    <div class="col-md-6 col-sm-12">
                        <?php $i = 0;  foreach ($puxaFaq as $pilares){?>
                        <div>
                            <button class="btn btn-primary pilares" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample<?php echo $i?>" aria-expanded="false" aria-controls="collapseExample<?php echo $i?>"><?php echo $pilares->titulo?></button>
                            <div class="collapse " id="collapseExample<?php echo $i?>">
                                <div class="card card-body">
                                    <?php echo $pilares->descricao;?>
                                </div>
                            </div>
                        </div>
                        <?php $i++; }?>
                    </div>

                </div>
            </div>
        </section>
        <section class="about-area about-inner-area position-relative bg-secondary-b pt-120 pb-120" id="solucoes">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-sm-12 img-about-tablet">
                        <img class="lazy" data-src="<?php echo SITE_URL.'/img/'.$texto->imagem_sessao_2?>" style="border-radius: 15px;" alt="">
                    </div>
                    <div class="col-lg-7 col-sm-12">
                        <div class="section-title stitle-style3 text-left">
                            <h2 class="title pt-sm-30"><?php echo $texto->titulo_sessao_2;?></h2>
                            <div class="desc mb-30">
                                <?php echo $texto->breve_sessao_2;?>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <ul>
                                        <li><p style="line-height: 25px;font-size: 15px;"><?php echo $texto->bullet_1_sessao_2;?></p></li>
                                        <li><p style="line-height: 25px;font-size: 15px;"><?php echo $texto->bullet_2_sessao_2;?></p></li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <ul>
                                        <li><p style="line-height: 25px;font-size: 15px;"><?php echo $texto->bullet_3_sessao_2;?></p></li>
                                        <li><p style="line-height: 25px;font-size: 15px;"><?php echo $texto->bullet_4_sessao_2;?></p></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h3 class="title text-center"><?php echo $texto->titulo_2_sessao_2;?></h3>
                </div>
                <div class="row text-center">
                    <div class="col-lg-3">
                        <div class="card-item">
                            <p class="text-black"><?php echo $texto->breve_card_1_sessao_2;?></p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card-item">
                            <p class="text-black"><?php echo $texto->breve_card_2_sessao_2;?></p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card-item">
                            <p class="text-black"><?php echo $texto->breve_card_3_sessao_2;?></p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card-item">
                            <p class="text-black"><?php echo $texto->breve_card_4_sessao_2;?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row text-center pt-70 bnt-width">
                        <a class="btn-cta m15" href="<?php echo $texto->link_botao_sessao_2;?>"><?php echo $texto->titulo_botao_sessao_2;?></a>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="product-area product-default-area position-relative" id="servicos" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h2 class="title"><?php echo $texto->titulo_sessao_3;?></h2>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <?php foreach ($puxaServicos as $servicos){?>
                    <div class="col-lg-3">
                        <div class="card-item">
                            <img class="" data-src="<?php echo SITE_URL.'/img/'.$servicos->icone?>" width="64" alt="Icone de Mercado fitness" src="<?php echo SITE_URL.'/img/'.$servicos->icone?>">
                            <h3><?php echo $servicos->titulo;?></h3>
                            <p><?php echo $servicos->breve;?></p>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <div class="row text-center pt-70 bnt-width">
                    <a class="btn-cta m15" href="<?php echo $texto->link_botao_sessao_3;?>"><?php echo $texto->titulo_botao_sessao_3;?></a>
                </div>
            </div>
        </section>
        <section class="about-area about-inner-area bg-secondary-b position-relative pt-120 pb-120" id="saiba-mais">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title stitle-style3 text-center">
                            <h2 class="title"><?php echo $texto->titulo_sessao_4;?></h2>
                            <h3 class=""><?php echo $texto->subtitulo_sessao_4;?></h3>
                            <p class="title"><?php echo $texto->breve_sessao_4;?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="row">
                            <img class="lazy" data-src="<?php echo SITE_URL.'/img/'.$texto->imagem_sessao_4?>" alt="">
                        </div>
                       
                    </div>
                    <div class="row text-center pt-70 bnt-width">
                        <a class="btn-cta m15" href="<?php echo $texto->link_botao_sessao_4;?>"><?php echo $texto->titulo_botao_sessao_4;?></a>
                    </div>
                </div>
            </div>
        </section>
         <section class="about-area about-inner-area position-relative  pt-120 pb-120 text-center" id="beneficios">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title stitle-style3 text-left text-lg-center">
                            <h2 class="title"><?php echo $texto->titulo_sessao_5;?></h2>
                        </div>
                    </div>
                </div>
                <div class="row row-cards">
                    <?php foreach ($puxaProjetos as $projetos){?>
                    <div class="col-lg-3 col-cards">
                        <div class="card-item">
                            <img class="" data-src="<?php echo SITE_URL.'/img/'.$projetos->foto?>" height="90" alt="icone de cadastro" src="<?php echo SITE_URL.'/img/'.$projetos->foto?>">
                            <p><?php echo $projetos->titulo;?></p>
                        </div>
                    </div>
                    <?php }?>
                </div>

                <div class="row text-center pt-70 bnt-width">
                    <a class="btn-cta m15" href="<?php echo $texto->link_botao_sessao_5;?>"><?php echo $texto->titulo_botao_sessao_5;?></a>
                </div>
            </div>
        </section>
        <section class="contact-area position-relative bg-secondary-b" id="contato">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 form-tablet">
                        <div class="section-title" style="margin-bottom: 44px;">
                            <h2 class="title"><?php echo $texto->titulo_sessao_6;?></h2>
                            <p class=""><?php echo $texto->subtitulo_sessao_6;?></p>
                        </div>
                        <div class="contact-form mb-md-90 formul">
                            <form class="contact-form-wrapper" method="POST">
                                    <?php
                                    if (!empty($erros)) {
                                    ?>
                                                <div class="alert alert-danger" role="alert">
                                                    Seu contato não foi enviado:
                                                    <ul class="mb-0">
                                                        <?php
                                          foreach ($erros as $erro)
                                            echo '<li>' . htmlspecialchars($erro) . "</li>\n";
                                          ?>
                                                    </ul>
                                                </div>
                                                <?php
                                    }
                                    ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="section-title">
                                            <h2 class="title text-center"><?php echo $texto->titulo_2_sessao_6;?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row row-gutter-12">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="nome" placeholder="Nome">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="telefone" placeholder="Telefone">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="email" name="email" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-bottom:10px">
                                                <textarea class="form-control" name="mensagem" type="text" class="form-control" cols="30" rows="3" placeholder="Mensagem"></textarea>
                                            </div>
                                            <div class="form-box1 col-md-12 col-lg-4">
                                                <div class="math">
                                                    <p id="conta" class="text-black"><span id="valor1"></span> + <span id="valor2"></span> =</p>
                                                </div>
                                            </div>
                                            <div class="form-box1 col-md-12 col-lg-5">
                                                <div class="math">
                                                    <input class="form-control" id="totalvalores" type="text" name="totalvalores" onchange="validar()" placeholder="Total da Soma" required>
                                                </div>
                                            </div>
                                            <div class="form-box1 col-md-12 col-lg-5">
                                                <p id="aviso"></p>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <div class="form-group text-center">
                                                    <input type="hidden" name="acao" value="enviarMensagem">
                                                    <button class="btn btn-theme" type="submit" id="enviar" disabled>Enviar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="form-message"></div>
                    </div>
                    <div class="col-lg-6 align-self-center img-contact-mobile">
                        <img src="<?php echo SITE_URL.'/img/'.$texto->imagem_sessao_6?>">
                    </div>
                    
                </div>
            </div>
            </div>
        </section>
        <!-- Contato - Fim -->

        <script>
            var valor1 = Math.floor((Math.random() * 10) + 1);

            var valor2 = Math.floor((Math.random() * 10) + 1);
            document.getElementById("valor1").innerHTML = valor1;
            document.getElementById("valor2").innerHTML = valor2;

            document.getElementById("enviar").setAttribute("disabled", "");

            function validar() {
                var totalvalores = document.getElementById("totalvalores").value;

                if (totalvalores == valor1 + valor2) {

                    document.getElementById('aviso').innerHTML = "reCAPTCHA válido";

                    document.getElementById("enviar").removeAttribute("disabled");

                } else {

                    document.getElementById('aviso').innerHTML = "reCAPTCHA inválido";

                    document.getElementById("enviar").setAttribute("disabled", "");

                }

            }
        </script>

        <script>
            // PARALLAX JS

            const cards = document.querySelector(".cards");
            const images = document.querySelectorAll(".card__img");
            const backgrounds = document.querySelectorAll(".card__bg");
            const range = 40;

            // const calcValue = (a, b) => (((a * 100) / b) * (range / 100) -(range / 2)).toFixed(1);
            const calcValue = (a, b) => (a / b * range - range / 2).toFixed(1) // thanks @alice-mx

            let timeout;
            document.addEventListener('mousemove', ({
                x,
                y
            }) => {
                if (timeout) {
                    window.cancelAnimationFrame(timeout);
                }

                timeout = window.requestAnimationFrame(() => {
                    const yValue = calcValue(y, window.innerHeight);
                    const xValue = calcValue(x, window.innerWidth);

                    cards.style.transform = `translateX(${-xValue}px) translateY(${yValue}px)`;

                    [].forEach.call(images, (image) => {
                        image.style.transform = `translateX(${-xValue}px) translateY(${yValue}px)`;
                    });

                    [].forEach.call(backgrounds, (background) => {
                        background.style.backgroundPosition = `${xValue * .45}px ${-yValue * .45}px`;
                    })
                })
            }, false);

            // FIM PARALLAX  
        </script>

        <?php include "footer.php" ?>