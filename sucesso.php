<?php 
    include "includes.php";
    include "Class/banners.class.php";
    
    $banners    = Banners::getInstance(Conexao::getInstance());
    $puxaBanners = $banners->rsDados(8);
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
        <section class="home-slider-area slider-default d-sm-block d-none">
            <div class="home-slider-content">
                <div class="">
                    <div class="">
                        <div class="">
                                <!-- Slide Item --> 
                                <div class="home-slider-item">
                                    <div class="bg-thumb bg-img">
                                         <img src="<?php echo SITE_URL; ?>/img/<?php echo $puxaBanners->foto; ?>">
                                         <img class="mobile-banner" src="<?php echo SITE_URL; ?>/img/<?php echo $puxaBanners->imagem_mobile; ?>">
                                    </div>
                                    <div class="slider-content-area">
                                        <div class="container">
                                            <div class="row align-items-center" style="text-align: -webkit-center;justify-content: center;">
                                                <div class="col-sm-12 col-lg-7">
                                                    <div class="content">
                                                        <div class="inner-content">
                                                            <h1><?php echo $puxaBanners->titulo1; ?></h1>
                                                            <p><?php echo strip_tags($puxaBanners->breve); ?></p>
                                                                <div >
                                                                    <a href="<?php echo SITE_URL;?>" class="btn-theme"><?php echo $puxaBanners->nome_botao; ?></a>
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
                                </div>
                                <!-- Slide Item -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include "footer.php" ?>
