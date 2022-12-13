<?php include "verifica.php";
if(isset($_GET['id'])){
    if(empty($_GET['id'])){
        header('Location: projetos.php');
    }else{
        $id = $_GET['id'];        
    }
}
$projetos->editar();
$puxaCategorias = $categorias->rsDados();
$editaProjeto = $projetos->rsDados($id);
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
    <title>Painel Hoogli - Editar Projeto</title>
    <link href="dist/css/style.min.css" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <?php include "header.php";?>
        <?php include "inc-menu-lateral.php";?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Editar Projeto</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a
                                            href="projetos.php" class="text-muted">Projetos</a></li>
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
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label">Título</label>
                                                <input class="form-control" type="text" name="titulo"
                                                    value="<?php if(isset($editaProjeto->titulo) && !empty($editaProjeto->titulo)){ echo $editaProjeto->titulo;}?>" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                            <label  class="col-form-label">Icone</label>
                                                <input class="form-control" type="file" name="foto"  />
                                            </div>
                                            <?php if(isset($editaTexto->foto) && !empty($editaTexto->foto)){ ?>
                                                <div class="col-md-4 col-sm-12">
                                                    <img src="../img/<?php echo $editaTexto->foto;?>" width="100">
                                                </div>
                                            <?php }?>
                                        </div>
                                        <br>
                                        <div class="clearfix"></div>
                                        
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Salvar</button>
                                            <a href="fotos.php?referencia=Projetos&relacionamento=<?php echo $editaProjeto->id;?>"
                                                class="btn btn-dark">Inserir Fotos</a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="acao" value="editaProjeto">
                                    <input type="hidden" name="id"
                                        value="<?php if(isset($editaProjeto->id) && !empty($editaProjeto->id)){ echo $editaProjeto->id;}?>">
                                    <input type="hidden" name="foto_Atual"
                                        value="<?php if(isset($editaProjeto->foto) && !empty($editaProjeto->foto)){ echo $editaProjeto->foto;}?>">
                                    <input type="hidden" name="foto_principal_Atual"
                                        value="<?php if(isset($editaProjeto->foto_principal) && !empty($editaProjeto->foto_principal)){ echo $editaProjeto->foto_principal;}?>">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "footer.php";?>
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