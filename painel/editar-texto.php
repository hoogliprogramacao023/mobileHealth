<?php include "verifica.php";
$id = '';
if(isset($_GET['id'])){
    if(empty($_GET['id'])){
        header('Location: textos.php');
    }else{
        $id = $_GET['id'];
        
    }
}
$textos->editar();
$editaTexto = $textos->rsDados($id);
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
    <title>Painel Hoogli - Editar Texto</title>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Editar Texto</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="textos.php" class="text-muted">Textos</a></li>
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
                                    <!-- PRIMEIRO BLOCO -->
                                    <h4 class="card-title">Seção 1</h4>
                                    <hr>
                                    <br>
                                     <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <label  class="col-form-label">Imagem de fundo</label>
                                                <input class="form-control" type="file" name="imagem_fundo_sessao_1" />
                                        </div>
                                        <?php if(isset($editaTexto->imagem_fundo_sessao_1) && !empty($editaTexto->imagem_fundo_sessao_1)){ ?>
                                        <div class="col-md-4 col-sm-12">
                                          <img src="../img/<?php echo $editaTexto->imagem_fundo_sessao_1;?>" width="100">
                                        </div>
                                        <?php }?>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-7 col-sm-7">
                                            <label  class="col-form-label">Título</label>
                                                <input class="form-control" type="text" name="titulo_sessao_1" value="<?php if(isset($editaTexto->titulo_sessao_1) && !empty($editaTexto->titulo_sessao_1)){ echo $editaTexto->titulo_sessao_1;}?>" />
                                        </div>
                                         
                                        <div class="col-md-12 col-sm-12">
                                            <label  class="col-form-label">Breve</label>
                                            <textarea name="breve_sessao_1" class="ckeditor" id="ckeditor" cols="30" rows="10"><?php if(isset($editaTexto->breve_sessao_1) && !empty($editaTexto->breve_sessao_1)){ echo $editaTexto->breve_sessao_1;}?></textarea>
                                        </div>
                                    </div>
                                      <div class="row">
                                        <div class="col-md-7 col-sm-7">
                                            <label  class="col-form-label">Embed</label>
                                                <input class="form-control" type="text" name="embed" value="<?php if(isset($editaTexto->embed) && !empty($editaTexto->embed)){ echo $editaTexto->embed;}?>" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                        <label  class="col-form-label">Imagem</label>
                                            <input class="form-control" type="file" name="imagem_sessao_1"  />
                                        </div>
                                        <?php if(isset($editaTexto->imagem_sessao_1) && !empty($editaTexto->imagem_sessao_1)){ ?>
                                            <div class="col-md-4 col-sm-12">
                                                <img src="../img/<?php echo $editaTexto->imagem_sessao_1;?>" width="100">
                                            </div>
                                        <?php }?>
                                    </div>
                                  <br>
                                  <h4 class="card-title">Seção 2</h4>
                                    <hr>
                                    <br>
                                     <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                        <label  class="col-form-label">Imagem Lateral</label>
                                            <input class="form-control" type="file" name="imagem_sessao_2"  />
                                        </div>
                                        <?php if(isset($editaTexto->imagem_sessao_2) && !empty($editaTexto->imagem_sessao_2)){ ?>
                                            <div class="col-md-4 col-sm-12">
                                                <img src="../img/<?php echo $editaTexto->imagem_sessao_2;?>" width="100">
                                            </div>
                                        <?php }?>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-7 col-sm-7">
                                            <label  class="col-form-label">Título</label>
                                                <input class="form-control" type="text" name="titulo_sessao_2" value="<?php if(isset($editaTexto->titulo_sessao_2) && !empty($editaTexto->titulo_sessao_2)){ echo $editaTexto->titulo_sessao_2;}?>" />
                                        </div>
                                         
                                        <div class="col-md-12 col-sm-12">
                                            <label  class="col-form-label">Breve</label>
                                            <textarea name="breve_sessao_2" class="ckeditor" id="ckeditor" cols="30" rows="10"><?php if(isset($editaTexto->breve_sessao_2) && !empty($editaTexto->breve_sessao_2)){ echo $editaTexto->breve_sessao_2;}?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <label  class="col-form-label">Título bullet 1</label>
                                                <input class="form-control" type="text" name="bullet_1_sessao_2" value="<?php if(isset($editaTexto->bullet_1_sessao_2) && !empty($editaTexto->bullet_1_sessao_2)){ echo $editaTexto->bullet_1_sessao_2;}?>" />
                                        </div>
                                         
                                        <div class="col-md-6 col-sm-6"> 
                                            <label  class="col-form-label">Título bullet 2</label>
                                                <input class="form-control" type="text" name="bullet_2_sessao_2" value="<?php if(isset($editaTexto->bullet_2_sessao_2) && !empty($editaTexto->bullet_2_sessao_2)){ echo $editaTexto->bullet_2_sessao_2;}?>" />
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label  class="col-form-label">Título bullet 3</label>
                                                <input class="form-control" type="text" name="bullet_3_sessao_2" value="<?php if(isset($editaTexto->bullet_3_sessao_2) && !empty($editaTexto->bullet_3_sessao_2)){ echo $editaTexto->bullet_3_sessao_2;}?>" />
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label  class="col-form-label">Título bullet 4</label>
                                                <input class="form-control" type="text" name="bullet_4_sessao_2" value="<?php if(isset($editaTexto->bullet_4_sessao_2) && !empty($editaTexto->bullet_4_sessao_2)){ echo $editaTexto->bullet_4_sessao_2;}?>" />
                                        </div>
                                    </div>
                                    <br>
                                    <h4 class="card-title">Seção Cards</h4>
                                    <hr>
                                     <div class="row">
                                        <div class="col-md-7 col-sm-7">
                                            <label  class="col-form-label">Título 2</label>
                                                <input class="form-control" type="text" name="titulo_2_sessao_2" value="<?php if(isset($editaTexto->titulo_2_sessao_2) && !empty($editaTexto->titulo_2_sessao_2)){ echo $editaTexto->titulo_2_sessao_2;}?>" />
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-6 col-sm-7">
                                            <label  class="col-form-label">Card 1</label>
                                                <input class="form-control" type="text" name="breve_card_1_sessao_2" value="<?php if(isset($editaTexto->breve_card_1_sessao_2) && !empty($editaTexto->breve_card_1_sessao_2)){ echo $editaTexto->breve_card_1_sessao_2;}?>" />
                                        </div>
                                         <div class="col-md-6 col-sm-7">
                                            <label  class="col-form-label">Card 2</label>
                                                <input class="form-control" type="text" name="breve_card_2_sessao_2" value="<?php if(isset($editaTexto->breve_card_2_sessao_2) && !empty($editaTexto->breve_card_2_sessao_2)){ echo $editaTexto->breve_card_2_sessao_2;}?>" />
                                        </div>
                                         <div class="col-md-6 col-sm-7">
                                            <label  class="col-form-label">Card 3</label>
                                                <input class="form-control" type="text" name="breve_card_3_sessao_2" value="<?php if(isset($editaTexto->breve_card_3_sessao_2) && !empty($editaTexto->breve_card_3_sessao_2)){ echo $editaTexto->breve_card_3_sessao_2;}?>" />
                                        </div>
                                         <div class="col-md-6 col-sm-7">
                                            <label  class="col-form-label">Card 4</label>
                                                <input class="form-control" type="text" name="breve_card_4_sessao_2" value="<?php if(isset($editaTexto->breve_card_4_sessao_2) && !empty($editaTexto->breve_card_4_sessao_2)){ echo $editaTexto->breve_card_4_sessao_2;}?>" />
                                        </div>
                                        <div class="col-md-6 col-sm-7">
                                            <label  class="col-form-label">Título Botão</label>
                                                <input class="form-control" type="text" name="titulo_botao_sessao_2" value="<?php if(isset($editaTexto->titulo_botao_sessao_2) && !empty($editaTexto->titulo_botao_sessao_2)){ echo $editaTexto->titulo_botao_sessao_2;}?>" />
                                        </div>
                                        <div class="col-md-6 col-sm-7">
                                            <label  class="col-form-label">Link Botão</label>
                                                <input class="form-control" type="text" name="link_botao_sessao_2" value="<?php if(isset($editaTexto->link_botao_sessao_2) && !empty($editaTexto->link_botao_sessao_2)){ echo $editaTexto->link_botao_sessao_2;}?>" />
                                        </div>
                                    </div>
                                    <br>
                                    <h4 class="card-title">Seção Serviços</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                        <label  class="col-form-label">Imagem fundo</label>
                                            <input class="form-control" type="file" name="imagem_fundo_sessao_3"  />
                                        </div>
                                        <?php if(isset($editaTexto->imagem_fundo_sessao_3) && !empty($editaTexto->imagem_fundo_sessao_3)){ ?>
                                            <div class="col-md-4 col-sm-12">
                                                <img src="../img/<?php echo $editaTexto->imagem_fundo_sessao_3;?>" width="100">
                                            </div>
                                        <?php }?>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-12 col-sm-7">
                                            <label  class="col-form-label">Título </label>
                                                <input class="form-control" type="text" name="titulo_sessao_3" value="<?php if(isset($editaTexto->titulo_sessao_3) && !empty($editaTexto->titulo_sessao_3)){ echo $editaTexto->titulo_sessao_3;}?>" />
                                        </div>
                                         <div class="col-md-6 col-sm-7">
                                            <label  class="col-form-label">Título Botão</label>
                                                <input class="form-control" type="text" name="titulo_botao_sessao_3" value="<?php if(isset($editaTexto->titulo_botao_sessao_3) && !empty($editaTexto->titulo_botao_sessao_3)){ echo $editaTexto->titulo_botao_sessao_3;}?>" />
                                        </div>
                                        <div class="col-md-6 col-sm-7">
                                            <label  class="col-form-label">Link Botão</label>
                                                <input class="form-control" type="text" name="link_botao_sessao_3" value="<?php if(isset($editaTexto->link_botao_sessao_3) && !empty($editaTexto->link_botao_sessao_3)){ echo $editaTexto->link_botao_sessao_3;}?>" />
                                        </div>
                                    </div>
                                    <br>
                                    <h4 class="card-title">Seção explicação geral</h4>
                                    <hr>
                                    <div class="row"> 
                                        <div class="col-md-12 col-sm-7">
                                            <label  class="col-form-label">Título </label>
                                                <input class="form-control" type="text" name="titulo_sessao_4" value="<?php if(isset($editaTexto->titulo_sessao_4) && !empty($editaTexto->titulo_sessao_4)){ echo $editaTexto->titulo_sessao_4;}?>" />
                                        </div>
                                         <div class="col-md-8 col-sm-7">
                                            <label  class="col-form-label">Subtítulo </label>
                                                <input class="form-control" type="text" name="subtitulo_sessao_4" value="<?php if(isset($editaTexto->subtitulo_sessao_4) && !empty($editaTexto->subtitulo_sessao_4)){ echo $editaTexto->subtitulo_sessao_4;}?>" />
                                        </div>
                                         <div class="col-md-12 col-sm-12">
                                            <label  class="col-form-label">Breve</label>
                                            <textarea name="breve_sessao_4" class="ckeditor" id="ckeditor" cols="30" rows="10"><?php if(isset($editaTexto->breve_sessao_4) && !empty($editaTexto->breve_sessao_4)){ echo $editaTexto->breve_sessao_4;}?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                        <label  class="col-form-label">Imagem</label>
                                            <input class="form-control" type="file" name="imagem_sessao_4"  />
                                        </div>
                                        <?php if(isset($editaTexto->imagem_sessao_4) && !empty($editaTexto->imagem_sessao_4)){ ?>
                                            <div class="col-md-4 col-sm-12">
                                                <img src="../img/<?php echo $editaTexto->imagem_sessao_4;?>" width="100">
                                            </div>
                                        <?php }?>
                                        <br>
                                        <div class="col-md-12 col-sm-12">
                                            <label  class="col-form-label">Breve abaixo da imagem</label>
                                            <textarea name="breve_2_sessao_4" class="ckeditor" id="ckeditor" cols="30" rows="10"><?php if(isset($editaTexto->breve_2_sessao_4) && !empty($editaTexto->breve_2_sessao_4)){ echo $editaTexto->breve_2_sessao_4;}?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                         <div class="col-md-6 col-sm-7">
                                            <label  class="col-form-label">Nome Botão</label>
                                                <input class="form-control" type="text" name="titulo_botao_sessao_4" value="<?php if(isset($editaTexto->titulo_botao_sessao_4) && !empty($editaTexto->titulo_botao_sessao_4)){ echo $editaTexto->titulo_botao_sessao_4;}?>" />
                                        </div>
                                        <div class="col-md-6 col-sm-7">
                                            <label  class="col-form-label">Link Botão</label>
                                                <input class="form-control" type="text" name="link_botao_sessao_4" value="<?php if(isset($editaTexto->link_botao_sessao_4) && !empty($editaTexto->link_botao_sessao_4)){ echo $editaTexto->link_botao_sessao_4;}?>" />
                                        </div>
                                    </div>
                                    <br>
                                    <h4 class="card-title">Seção Todos os Benefícios</h4>
                                    <hr>
                                    <div class="row"> 
                                        <div class="col-md-12 col-sm-7">
                                            <label  class="col-form-label">Título </label>
                                                <input class="form-control" type="text" name="titulo_sessao_5" value="<?php if(isset($editaTexto->titulo_sessao_5) && !empty($editaTexto->titulo_sessao_5)){ echo $editaTexto->titulo_sessao_5;}?>" />
                                        </div>
                                    </div>
                                    <div class="row">
                                         <div class="col-md-6 col-sm-7">
                                            <label  class="col-form-label">Nome Botão</label>
                                                <input class="form-control" type="text" name="titulo_botao_sessao_5" value="<?php if(isset($editaTexto->titulo_botao_sessao_5) && !empty($editaTexto->titulo_botao_sessao_5)){ echo $editaTexto->titulo_botao_sessao_5;}?>" />
                                        </div>
                                        <div class="col-md-6 col-sm-7">
                                            <label  class="col-form-label">Link Botão</label>
                                                <input class="form-control" type="text" name="link_botao_sessao_5" value="<?php if(isset($editaTexto->link_botao_sessao_5) && !empty($editaTexto->link_botao_sessao_5)){ echo $editaTexto->link_botao_sessao_5;}?>" />
                                        </div>
                                    </div>
                                    <br>
                                    <h4 class="card-title">Seção Contato</h4>
                                    <hr>
                                     <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                        <label  class="col-form-label">Imagem Lateral Esquerda</label>
                                            <input class="form-control" type="file" name="imagem_sessao_6"  />
                                        </div>
                                        <?php if(isset($editaTexto->imagem_sessao_6) && !empty($editaTexto->imagem_sessao_6)){ ?>
                                            <div class="col-md-4 col-sm-12">
                                                <img src="../img/<?php echo $editaTexto->imagem_sessao_6;?>" width="100">
                                            </div>
                                        <?php }?>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-6 col-sm-7">
                                            <label  class="col-form-label">Título </label>
                                                <input class="form-control" type="text" name="titulo_sessao_6" value="<?php if(isset($editaTexto->titulo_sessao_6) && !empty($editaTexto->titulo_sessao_6)){ echo $editaTexto->titulo_sessao_6;}?>" />
                                        </div>
                                         <div class="col-md-6 col-sm-7">
                                            <label  class="col-form-label">Subtítulo </label>
                                                <input class="form-control" type="text" name="subtitulo_sessao_6" value="<?php if(isset($editaTexto->subtitulo_sessao_6) && !empty($editaTexto->subtitulo_sessao_6)){ echo $editaTexto->subtitulo_sessao_6;}?>" />
                                        </div>
                                        <div class="col-md-6 col-sm-7">
                                            <label  class="col-form-label">Título dentro do Fomulário</label>
                                                <input class="form-control" type="text" name="titulo_2_sessao_6" value="<?php if(isset($editaTexto->titulo_2_sessao_6) && !empty($editaTexto->titulo_2_sessao_6)){ echo $editaTexto->titulo_2_sessao_6;}?>" />
                                        </div>
                                    </div>
                                            <!-- BLOCO METAS TAG -->

                                            <?php if(isset($editaTexto->tem_metas_tag) && $editaTexto->tem_metas_tag == 'S'){ ?>
                                        <br>
                                        <h4 class="card-title">Metas Tags</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Meta Title</label>
                                                    <input type="text" class="form-control" name="meta_title" value="<?php if(isset($editaTexto->meta_title) && !empty($editaTexto->meta_title)){ echo $editaTexto->meta_title;}?>">
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Meta Keywords</label>
                                                    <input type="text" class="form-control" name="meta_keywords" value="<?php if(isset($editaTexto->meta_keywords) && !empty($editaTexto->meta_keywords)){ echo $editaTexto->meta_keywords;}?>">
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Meta Description</label>
                                                   <textarea name="meta_description" class="form-control" id="" cols="30" rows="4"><?php if(isset($editaTexto->meta_description) && !empty($editaTexto->meta_description)){ echo $editaTexto->meta_description;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <?php }?>

                                        <!-- FIM BLOCO METAS TAG -->


                                        
                                    </div>
                                    <br>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Salvar</button>
                                            <!-- <button type="reset" class="btn btn-dark">Resetar</button> -->
                                        </div>
                                    </div>
                                    <input type="hidden" name="acao" value="editaTexto">
                                    <input type="hidden" name="imagem_sessao_1_Atual" value="<?php if(isset($editaTexto->imagem_sessao_1) && !empty($editaTexto->imagem_sessao_1)){ echo $editaTexto->imagem_sessao_1;}?>">
                                    <input type="hidden" name="imagem_fundo_sessao_1_Atual" value="<?php if(isset($editaTexto->imagem_fundo_sessao_1) && !empty($editaTexto->imagem_fundo_sessao_1)){ echo $editaTexto->imagem_fundo_sessao_1;}?>">
                                    <input type="hidden" name="imagem_sessao_2_Atual" value="<?php if(isset($editaTexto->imagem_sessao_2) && !empty($editaTexto->imagem_sessao_2)){ echo $editaTexto->imagem_sessao_2;}?>">
                                    <input type="hidden" name="imagem_fundo_sessao_3_Atual" value="<?php if(isset($editaTexto->imagem_fundo_sessao_3) && !empty($editaTexto->imagem_fundo_sessao_3)){ echo $editaTexto->imagem_fundo_sessao_3;}?>">
                                    <input type="hidden" name="imagem_sessao_4_Atual" value="<?php if(isset($editaTexto->imagem_sessao_4) && !empty($editaTexto->imagem_sessao_4)){ echo $editaTexto->imagem_sessao_4;}?>">
                                    <input type="hidden" name="imagem_sessao_6_Atual" value="<?php if(isset($editaTexto->imagem_sessao_6) && !empty($editaTexto->imagem_sessao_6)){ echo $editaTexto->imagem_sessao_6;}?>">
                                    <input type="hidden" name="foto_7_Atual" value="<?php if(isset($editaTexto->foto_7) && !empty($editaTexto->foto_7)){ echo $editaTexto->foto_7;}?>">
                                    <input type="hidden" name="foto_8_Atual" value="<?php if(isset($editaTexto->foto_8) && !empty($editaTexto->foto_8)){ echo $editaTexto->foto_8;}?>">
                                    <input type="hidden" name="paralax_1_Atual" value="<?php if(isset($editaTexto->paralax_1) && !empty($editaTexto->paralax_1)){ echo $editaTexto->paralax_1;}?>">
                                    <input type="hidden" name="paralax_2_Atual" value="<?php if(isset($editaTexto->paralax_2) && !empty($editaTexto->paralax_2)){ echo $editaTexto->paralax_2;}?>">
                                    <input type="hidden" name="paralax_3_Atual" value="<?php if(isset($editaTexto->paralax_3) && !empty($editaTexto->paralax_3)){ echo $editaTexto->paralax_3;}?>">
                                    <input type="hidden" name="paralax_4_Atual" value="<?php if(isset($editaTexto->paralax_4) && !empty($editaTexto->paralax_4)){ echo $editaTexto->paralax_4;}?>">
                                    <input type="hidden" name="paralax_5_Atual" value="<?php if(isset($editaTexto->paralax_5) && !empty($editaTexto->paralax_5)){ echo $editaTexto->paralax_5;}?>">
                                    <input type="hidden" name="paralax_6_Atual" value="<?php if(isset($editaTexto->paralax_6) && !empty($editaTexto->paralax_6)){ echo $editaTexto->paralax_6;}?>">
                                    <input type="hidden" name="paralax_7_Atual" value="<?php if(isset($editaTexto->paralax_7) && !empty($editaTexto->paralax_7)){ echo $editaTexto->paralax_7;}?>">
                                    <input type="hidden" name="paralax_8_Atual" value="<?php if(isset($editaTexto->paralax_8) && !empty($editaTexto->paralax_8)){ echo $editaTexto->paralax_8;}?>">
                                    <input type="hidden" name="id" value="<?php if(isset($editaTexto->id) && !empty($editaTexto->id)){ echo $editaTexto->id;}?>">
                                    <input type="hidden" name="pagina_individual" value="<?php if(isset($_GET['pi']) && $_GET['pi'] == 'S'){echo "S";}else{echo "N";}?>">
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
    <script>
        var KTInputmask = function () {

// Private functions
var demos = function () {
 
 // phone number format
 $("#kt_inputmask_3").inputmask("mask", {
  "mask": "(99) 99999-9999"
 });

 // empty placeholder
 $("#kt_inputmask_4").inputmask({
  "mask": "999.999.999-99"
 });

}

return {
 // public functions
 init: function() {
  demos();
 }
};
}();

jQuery(document).ready(function() {
KTInputmask.init();
});
    </script>
</body>
</html>