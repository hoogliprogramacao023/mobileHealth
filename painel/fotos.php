<?php include "verifica.php";
$relacionamento = '';
if(isset($_GET['relacionamento'])){
    if(empty($_GET['referencia'])){
        header('Location: index.php');
    }else{
        $relacionamento = $_GET['relacionamento'];
    }
}
include('../Class/fotos.class.php');
$fotos = Fotos::getInstance(Conexao::getInstance());
 $fotos->add();
 $fotos->excluir();
 $fotos->editarLegenda();
 $_SESSION['fotosUp'] = '';
 $rsFotos = $fotos->rsDados('', '', '', $relacionamento);

 $tituloRelacionamento = $projetos->rsDados($relacionamento);
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
    <title>Painel Hoogli - Adicionar Fotos</title>
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="jquery-upload-file-master/css/uploadfile.css" rel="stylesheet">
</head>
<style>
    .panel-body img {
    width: 200px;
    height: 140px;
    display: inline-block;
    margin: 0 15px 0 0;
    object-fit: scale-down;
    object-position: 50% 10%;
}
</style>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Fotos <?php echo $tituloRelacionamento->titulo;?></h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a class="text-muted">Fotos</a></li>
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
                            <form action="" method="post" id="formFotos">
        <div class="row gallery">
         
        <?php foreach($rsFotos as $foto) { ?>
          <div class="col-md-3" style="margin-bottom: 30px;">
            <div class="row">
              <div class="col-xs-12">
                <div class="panel">
                  <div class="panel-body" style="text-align:center;"> <img src="../img/<?php echo $foto->foto;?>" class="img-responsive" >
                    <div style="text-align:center;">
                    
                    <input type="text" class="form-control" value="<?php echo $foto->titulo;?>" style="margin-bottom:13px;" onKeyUp="document.getElementById('frameFotos').src='fotos.php?id=<?php echo $foto->id;?>&acao=editarLegendaFoto&titulo=' + this.value;" placeholder="Legenda (Descrição)">
                    
                    <button type="button" class="btn btn-danger btn-sm btn-icon mr5 btExcluir" onclick="if(confirm('Tem certeza que deseja excluir essa foto?')) { window.location='fotos.php?id_foto=<?php echo $foto->id;?>&foto=<?php echo str_replace("'", "", $foto->foto);?>&acao=excluirFoto&relacionamento=<?php echo $_GET['relacionamento'];?>&referencia=<?php echo $_GET['referencia'];?>'; } ">
                  <i class="fa fa-exclamation-triangle"></i>
                  <span>Excluir</span>
                </button>
                    </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        <div class="row">
        <div class="panel">
          <div class="panel-body">
            <div class="row no-margin">
              <div class="col-lg-12">
                <div id="fileuploader" style="display:block">Upload</div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <div class="panel">
          <div class="panel-body">
            <div class="row no-margin">
              <div class="col-lg-12">
                <button class="btn btn-primary mr10" type="submit">Confimar</button>
                <button class="btn btn-default" type="button" onClick="history.back();">Voltar</button>
                <input type="hidden" name="acao" value="addFotos">
                <input type="hidden" name="relacionamento" value="<?php echo $_GET['relacionamento'];?>">
                <input type="hidden" name="referencia" value="<?php echo $_GET['referencia'];?>">
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
           <?php include "footer.php";?>
        </div>
    </div>
    <iframe src="" name="frameFotos" id="frameFotos" style="display:none" frameborder="0"></iframe>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="dist/js/custom.min.js"></script>
    <script type="text/javascript" src="jquery.fancybox-1.3.4/fancybox/jquery.mousewheel-3.0.4.pack.js"></script> 
    <script type="text/javascript" src="jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.pack.js"></script> 
    <script type="text/javascript" src="jquery.fancybox-1.3.4/padrao.js"></script>
    <link rel="stylesheet" type="text/css" href="jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    <script src="jquery-upload-file-master/js/jquery.uploadfile.min.js"></script> 
    <script>
$(document).ready(function() {
	$("#fileuploader").uploadFile({
		url:"jquery-upload-file-master/php/upload.php",
		fileName:"myfile",
		showPreview:true,
		previewWidth: "150px",
		showDelete: true,
		deleteCallback: function(filename,pd) {
			$.post("jquery-upload-file-master/php/delete.php?arq="+filename);
		}
	});
});
</script>

<script src="vendor/blueimp-gallery/js/jquery.blueimp-gallery.min.js"></script>
  <script src="vendor/blueimp-bootstrap-image-gallery/js/bootstrap-image-gallery.min.js"></script>
</body>
</html>