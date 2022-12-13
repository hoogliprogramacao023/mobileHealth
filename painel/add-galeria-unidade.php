<?php include "verifica.php";

include "../Class/portfolio.class.php";
$portfolio = Portfolio::getInstance(Conexao::getInstance());
$puxaPortfolio = $portfolio->rsDados($_GET['id']);

$galerias->add();
$galerias->editar();
$imagens = $galerias->rsDados('','','','','',$puxaPortfolio->id);



?>
<!DOCTYPE html>
<html dir="ltr" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Adriano Monteiro">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/hoogli_logo.svg">
    <title>Painel Hoogli - Adicionar Galeria</title>
    <link href="dist/css/style.min.css" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <?php include "header.php"; ?>
        <?php include "inc-menu-lateral.php"; ?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Adicionar Galeria</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="galerias.php" class="text-muted">Galerias</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-body">
                                    <div class="row">
                                        <?php foreach ($imagens as $imagem) { ?>
                                                <div class="col-lg-3 col-md-6">
                                                    <form method="POST" enctype="multipart/form-data">
                                                        <!-- Card -->
                                                        <div class="card">
                                                            
                                                            <?php if($puxaPortfolio->tipo == 'F' ){ ?>
                                                            <img class="card-img-top img-fluid" src="../img/<?php echo $imagem->foto; ?>" alt="<?php echo $imagem->descricao_imagem; ?>">
                                                            <?php } 
                                                            if($puxaPortfolio->tipo == 'V'){
                                                            ?>
                                                            
                                                            <iframe width="350" height="300" src="https://www.youtube.com/embed/<?php echo $imagem->embed; ?>" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                                                            <?php } ?>
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="descricao_imagem" value="<?php echo $imagem->descricao_imagem; ?>">
                                                                    <small>Descrição da imagem.</small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="legenda_imagem" value="<?php echo $imagem->legenda_imagem; ?>">
                                                                    <small>Legenda da imagem.</small>
                                                                </div>
                                                                <input type="hidden" name="id_projeto" value="<?php echo $imagem->id_projeto; ?>">
                                                                <input type="hidden" name="id" value="<?php echo $imagem->id; ?>">
                                                                <input type="hidden" name="acao" value="editarImagem">
                                                                <button type="submit" class="btn btn-success">Salvar</button>
                                                                <a href="galerias.php?id=<?php echo $imagem->id; ?>&acao=excluirGaleria" class="btn btn-danger">Excluir</a>
                                                            </div>
                                                        </div>
                                                        <!-- Card -->
                                                    </form>
                                                </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#centermodal">Adicionar imagem</button>
                                            <button type="reset" class="btn btn-warning" onclick="window.location='portfolio.php'">Voltar</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="acao" value="addGaleria">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php include "footer.php"; ?>
            </div>
        </div>
        <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myCenterModalLabel">Adicionar imagem</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <?php if($puxaPortfolio->tipo == 'F' ){ ?>
                                            <label class="mr-sm-2" for="">Imagem</label>
                                            <input type="file" name="foto" class="form-control">
                                            <?php } 
                                            if($puxaPortfolio->tipo == 'V' ){
                                            ?>
                                            <label class="mr-sm-2" for="">Video</label>
                                            <input type="text" name="embed" class="form-control">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="mr-sm-2" for="">Descrição Imagem</label>
                                            <input type="text" class="form-control" name="descricao_imagem">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="mr-sm-2" for="">Legenda Imagem</label>
                                            <input type="text" class="form-control" name="legenda_imagem">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success">Adicionar imagem</button>
                                    </div>
                                </div>
                                <input type="hidden" name="id_projeto" value="<?php echo $_GET['id']; ?>">
                                <input type="hidden" name="acao" value="addGaleria">
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <script src="assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
        <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="dist/js/app-style-switcher.js"></script>
        <script src="dist/js/feather.min.js"></script>
        <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
        <script src="assets/extra-libs/sparkline/sparkline.js"></script>
        <script src="dist/js/sidebarmenu.js"></script>
        <script src="dist/js/custom.min.js"></script>
</body>

</html>