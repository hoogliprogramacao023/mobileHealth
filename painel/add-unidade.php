<?php include "verifica.php";
include "../Class/unidades.class.php";
$unidades = Unidades::getInstance(Conexao::getInstance());
$unidades->add();
$puxaEstados = $estados->rsDados();
$puxaCidades = $cidades->rsDadosCidades();
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
    <title>Painel Hoogli - Adicionar Unidade</title>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Adicionar Unidade</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="unidades.php" class="text-muted">Unidades</a></li>
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
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-body">

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Título</label>
                                                    <input type="text" class="form-control" name="nome">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Estado</label>
                                                    <select name="id_estado" class="form-control" id="">
                                                        <?php foreach ($puxaEstados as $estado) { ?>
                                                            <option value="<?php echo $estado->id; ?>"><?php echo $estado->nome; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--<div class="col-md-4">-->
                                            <!--     <div class="form-group">-->
                                            <!--     <label class="mr-sm-2" for="">Cidade</label>-->
                                            <!--         <select name="id_cidade" class="form-control" id="">-->
                                            <!--         <?php foreach ($puxaCidades as $cidade) { ?>-->
                                            <!--         <option value="<?php echo $cidade->id; ?>"><?php echo $cidade->nome; ?></option>-->
                                            <!--         <?php } ?>-->
                                            <!--         </select>-->
                                            <!--     </div>-->
                                            <!-- </div>-->
                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Endereço</label>
                                                    <input type="text" class="form-control" name="endereco">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Mapa</label>
                                                    <input type="text" name="mapa" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Banner</label>
                                                    <input type="file" name="banner" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Foto Principal</label>
                                                    <input type="file" name="foto" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Informações</label>
                                                    <textarea class="ckeditor" id="ckeditor" cols="30" rows="10" name="horario"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="row">-->

                                            <!--<div class="col-md-6">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label class="mr-sm-2" for="">Diferenciais</label>-->
                                            <!--        <input type="text" class="form-control" name="horario">-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            
                                        <!--</div>-->
                                        
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Link do Google Maps</label>
                                                    <input type="text" class="form-control" name="link_maps">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Link do Waze</label>
                                                    <input type="text" name="link_waze" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Telefone</label>
                                                    <input type="text" class="form-control" name="telefone">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Whatsapp<small>(sem formatação Ex:61988887777)</small></label>
                                                    <input type="text" name="whatsapp" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <h5>Informaçåo SEO</h5>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label">Meta Title</label>
                                                <input class="form-control" type="text" name="meta_title" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label">Meta Keywords</label>
                                                <input class="form-control" type="text" name="meta_keywords" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label">Meta Description</label>
                                                <textarea name="meta_description" class="form-control" id="" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Salvar</button>
                                            <button type="reset" class="btn btn-dark">Resetar</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="acao" value="addUnidade">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php include "footer.php"; ?>
        </div>
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
    <script src="vendor/ckeditor/ckeditor.js"></script>

</body>

</html>