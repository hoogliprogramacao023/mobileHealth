<?php include "verifica.php";
if (isset($_GET['id'])) {
    if (empty($_GET['id'])) {
        header('Location: unidades.php');
    } else {
        $id = $_GET['id'];
    }
}
include "../Class/unidades.class.php";

$unidades = Unidades::getInstance(Conexao::getInstance());
$unidades->editar();
$editaUnidade = $unidades->rsDados($id);
$puxaEstados = $estados->rsDados();
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
    <title>Painel Hoogli - Editar Unidade</title>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Editar Unidade</h4>
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
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label">Título</label>
                                                <input class="form-control" type="text" name="nome" value="<?php if (isset($editaUnidade->nome) && !empty($editaUnidade->nome)) {echo $editaUnidade->nome;} ?>" />
                                            </div>
                                                                                        <div class="col-md-4">
                                                 <div class="form-group">
                                                 <label class="mr-sm-2" for="">Estado</label>
                                                     <select name="id_estado" class="form-control" id="">
                                                     <?php foreach ($puxaEstados as $estado) { ?>
                                                     <option value="<?php echo $estado->id; ?>" <?php if($estado->id == $editaUnidade->id_estado){echo "selected";}?>><?php echo $estado->nome; ?></option>
                                                     <?php } ?>
                                                     </select>
                                                 </div>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label">Foto Principal </label>
                                                <input class="form-control" type="file" name="foto" />
                                            </div>
                                            <?php if (isset($editaUnidade->foto) && !empty($editaUnidade->foto)) { ?>
                                                <div class="col-md-6 col-sm-12">
                                                    <img src="../img/<?php echo $editaUnidade->foto; ?>" width="150">
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="col-form-label">Banner </label>
                                                <input class="form-control" type="file" name="banner" />
                                            </div>
                                            <?php if (isset($editaUnidade->banner) && !empty($editaUnidade->banner)) { ?>
                                                <div class="col-md-6 col-sm-12">
                                                    <img src="../img/<?php echo $editaUnidade->banner; ?>" width="150">
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label">Endereço </label>
                                                <input class="form-control" type="text" name="endereco" value="<?php if (isset($editaUnidade->endereco) && !empty($editaUnidade->endereco)) {echo $editaUnidade->endereco;} ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label">Informações</label>
                                                <textarea class="ckeditor" id="ckeditor" cols="30" rows="10" name="horario" ><?php if (isset($editaUnidade->horario) && !empty($editaUnidade->horario)) {echo $editaUnidade->horario;} ?></textarea>
                                            </div>
                                        </div>
                                        <!--<div class="form-group row">-->

                                        <!-- <div class="col-md-12 col-sm-12">-->
                                        <!-- <label  class="col-form-label">Diferenciais</label>-->
                                        <!--  <textarea name="diferenciais" class="ckeditor" id="ckeditor" cols="30" rows="10"><?php if (isset($editaUnidade->diferenciais) && !empty($editaUnidade->diferenciais)) {
                                                                                                                                    echo $editaUnidade->diferenciais;
                                                                                                                                } ?></textarea>-->
                                        <!-- </div>-->

                                        <!--</div>-->
                                        <div class="form-group row">

                                            <div class="col-md-6 col-sm-6">
                                                <label class="col-form-label">Mapa</label>
                                                <input class="form-control" type="text" name="mapa" value="<?php if (isset($editaUnidade->mapa) && !empty($editaUnidade->mapa)) {echo $editaUnidade->mapa;} ?>">
                                            </div>
                                            <?php if (isset($editaUnidade->mapa) && !empty($editaUnidade->mapa)) { ?>
                                            <div class="col-md-6 col-sm-6">
                                                <iframe src="<?php echo $editaUnidade->mapa;?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                               
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Link do Google Maps</label>
                                                    <input type="text" class="form-control" name="link_maps" value="<?php if (isset($editaUnidade->link_maps) && !empty($editaUnidade->link_maps)) {echo $editaUnidade->link_maps;} ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Link do Waze</label>
                                                    <input type="text" name="link_waze" class="form-control" value="<?php if (isset($editaUnidade->link_waze) && !empty($editaUnidade->link_waze)) {echo $editaUnidade->link_waze;} ?>">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Telefone</label>
                                                    <input type="text" class="form-control" name="telefone" value="<?php if (isset($editaUnidade->telefone) && !empty($editaUnidade->telefone)) {echo $editaUnidade->telefone;} ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Whatsapp<small>(sem formatação Ex:61988887777)</small></label>
                                                    <input type="text" name="whatsapp" class="form-control" value="<?php if (isset($editaUnidade->whatsapp) && !empty($editaUnidade->whatsapp)) {echo $editaUnidade->whatsapp;} ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <h5>Informaçåo SEO</h5>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label">Meta Title</label>
                                                <input class="form-control" type="text" name="meta_title" value="<?php if (isset($editaUnidade->meta_title) && !empty($editaUnidade->meta_title)) { echo $editaUnidade->meta_title;} ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label">Meta Keywords</label>
                                                <input class="form-control" type="text" name="meta_keywords" value="<?php if (isset($editaUnidade->meta_keywords) && !empty($editaUnidade->meta_keywords)) {echo $editaUnidade->meta_keywords;} ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label">Meta Description</label>
                                                <textarea name="meta_description" class="form-control" id="" cols="30" rows="10"><?php if (isset($editaUnidade->meta_description) && !empty($editaUnidade->meta_description)) {echo $editaUnidade->meta_description;} ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                             <a class="btn btn-info" style="background: #0000009e;" href="fotos.php?referencia=Unidades&relacionamento=<?php echo $editaUnidade->id?>">Inserir Fotos</a>
                                            <button type="submit" class="btn btn-info">Salvar</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="acao" value="editarUnidade">
                                    <input type="hidden" name="id" value="<?php echo $editaUnidade->id;?>">
                                    <input type="hidden" name="foto_Atual" value="<?php if (isset($editaUnidade->foto) && !empty($editaUnidade->foto)) {echo $editaUnidade->foto;} ?>">
                                    <input type="hidden" name="banner_Atual" value="<?php if (isset($editaUnidade->banner) && !empty($editaUnidade->banner)) {echo $editaUnidade->banner;} ?>">
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