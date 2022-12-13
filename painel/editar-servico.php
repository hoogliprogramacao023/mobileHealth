<?php include "verifica.php";
$id = '';
if(isset($_GET['id'])){
    if(empty($_GET['id'])){
        header('Location: servicos.php');
    }else{
        $id = $_GET['id'];        
    }
}
$servicos->editar();
$editaServico = $servicos->rsDados($id);

$puxaEspecialistas = $doutores->rsDados();
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
    <title>Painel Hoogli - Adicionar Serviço</title>
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
       <?php include "header.php";?>
       <?php include "inc-menu-lateral.php";?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Editar Serviço</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="servicos.php" class="text-muted">Serviços</a></li>
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
                                    <h4 class="card-title">Título Serviço</h4>
                                        <div class="row">
                                          
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Título</label>
                                                    <input type="text" class="form-control" name="titulo" value="<?php if(isset($editaServico->titulo) && !empty($editaServico->titulo)){ echo $editaServico->titulo;}?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Icone</label>
                                                    <input type="file" class="form-control" name="icone" >
                                                </div>
                                                </div>
                                                <?php if(isset($editaServico->icone) && !empty($editaServico->icone)){ ?>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                <img src="../img/<?php echo $editaServico->icone;?>" width="150" alt="">
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Breve</label>
                                                   <textarea name="breve" class="ckeditor" id="ckeditor" cols="30" rows="4"><?php if(isset($editaServico->breve) && !empty($editaServico->breve)){ echo $editaServico->breve;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div> 
                                        <hr>
                                      
                                        <h4 class="card-title">Metas Tags</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Meta Title</label>
                                                    <input type="text" class="form-control" name="meta_title" value="<?php if(isset($editaServico->meta_title) && !empty($editaServico->meta_title)){ echo $editaServico->meta_title;}?>">
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Meta Keywords</label>
                                                    <input type="text" class="form-control" name="meta_keywords" value="<?php if(isset($editaServico->meta_keywords) && !empty($editaServico->meta_keywords)){ echo $editaServico->meta_keywords;}?>">
                                                </div>
                                            </div>                                        
                                        </div> 
                                         <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Meta Description</label>
                                                   <textarea name="meta_description" class="form-control" id="" cols="30" rows="4"><?php if(isset($editaServico->meta_description) && !empty($editaServico->meta_description)){ echo $editaServico->meta_description;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div> 
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Salvar</button>
                                            <button type="reset" class="btn btn-dark">Resetar</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="acao" value="editaServico">
                                    <input type="hidden" name="id" value="<?php echo $editaServico->id;?>">
                                    <input type="hidden" name="banner_foto_Atual" value="<?php if(isset($editaServico->banner_foto) && !empty($editaServico->banner_foto)){ echo $editaServico->banner_foto;}?>">
                                    <input type="hidden" name="sessao1_foto_Atual" value="<?php if(isset($editaServico->sessao1_foto) && !empty($editaServico->sessao1_foto)){ echo $editaServico->sessao1_foto;}?>">
                                    <input type="hidden" name="sessao2_foto_Atual" value="<?php if(isset($editaServico->sessao2_foto) && !empty($editaServico->sessao2_foto)){ echo $editaServico->sessao2_foto;}?>">
                                    <input type="hidden" name="sessao3_foto_Atual" value="<?php if(isset($editaServico->sessao3_foto) && !empty($editaServico->sessao3_foto)){ echo $editaServico->sessao3_foto;}?>">
                                    <input type="hidden" name="sessao4_foto_Atual" value="<?php if(isset($editaServico->sessao4_foto) && !empty($editaServico->sessao4_foto)){ echo $editaServico->sessao4_foto;}?>">
                                    <input type="hidden" name="sessao5_foto_Atual" value="<?php if(isset($editaServico->sessao5_foto) && !empty($editaServico->sessao5_foto)){ echo $editaServico->sessao5_foto;}?>">
                                    <input type="hidden" name="sessao6_foto_Atual" value="<?php if(isset($editaServico->sessao6_foto) && !empty($editaServico->sessao6_foto)){ echo $editaServico->sessao6_foto;}?>">
                                    <input type="hidden" name="topico1_foto_Atual" value="<?php if(isset($editaServico->topico1_foto) && !empty($editaServico->topico1_foto)){ echo $editaServico->topico1_foto;}?>">
                                    <input type="hidden" name="topico2_foto_Atual" value="<?php if(isset($editaServico->topico2_foto) && !empty($editaServico->topico2_foto)){ echo $editaServico->topico2_foto;}?>">
                                    <input type="hidden" name="topico3_foto_Atual" value="<?php if(isset($editaServico->topico3_foto) && !empty($editaServico->topico3_foto)){ echo $editaServico->topico3_foto;}?>">
                                    <input type="hidden" name="topico4_foto_Atual" value="<?php if(isset($editaServico->topico4_foto) && !empty($editaServico->topico4_foto)){ echo $editaServico->topico4_foto;}?>">
                                    <input type="hidden" name="diferenca1_foto_Atual" value="<?php if(isset($editaServico->diferenca1_foto) && !empty($editaServico->diferenca1_foto)){ echo $editaServico->diferenca1_foto;}?>">
                                    <input type="hidden" name="diferenca2_foto_Atual" value="<?php if(isset($editaServico->diferenca2_foto) && !empty($editaServico->diferenca2_foto)){ echo $editaServico->diferenca2_foto;}?>">
                                    <input type="hidden" name="diferenca3_foto_Atual" value="<?php if(isset($editaServico->diferenca3_foto) && !empty($editaServico->diferenca3_foto)){ echo $editaServico->diferenca3_foto;}?>">
                                    <input type="hidden" name="imagem_final_Atual" value="<?php if(isset($editaServico->imagem_final) && !empty($editaServico->imagem_final)){ echo $editaServico->imagem_final;}?>">
                                    <input type="hidden" name="imagem_mobile_final_Atual" value="<?php if(isset($editaServico->imagem_mobile_final) && !empty($editaServico->imagem_mobile_final)){ echo $editaServico->imagem_mobile_final;}?>">
                                    <input type="hidden" name="icone_Atual" value="<?php if(isset($editaServico->icone) && !empty($editaServico->icone)){ echo $editaServico->icone;}?>">
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