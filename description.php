<meta name="theme-color" content="#2e427c">
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="manifest" href="site.webmanifest">


<?php if(basename($_SERVER['SCRIPT_NAME']) == 'index.php'){?>
	<link rel=”canonical” href="<?php echo SITE_URL;?>" />
<title><?php if(isset($metastags->meta_title_principal) && !empty($metastags->meta_title_principal)){echo $metastags->meta_title_principal;}?></title>
    <meta name="description" content="<?php if(isset($metastags->meta_description_principal) && !empty($metastags->meta_description_principal)){echo $metastags->meta_description_principal;}?>"/>
	<meta name="keywords" content="<?php if(isset($metastags->meta_keywords_principal) && !empty($metastags->meta_keywords_principal)){echo $metastags->meta_keywords_principal;}?>">
	<meta name="twitter:card" content="<?php if(isset($metastags->meta_title_principal) && !empty($metastags->meta_title_principal)){echo $metastags->meta_title_principal;}?>" />
		<meta name="twitter:site" content="<?php echo SITE_URL;?>" />
		<meta name="twitter:creator" content="Hoogli" />
		<meta property="og:title" content="<?php if(isset($metastags->meta_title_principal) && !empty($metastags->meta_title_principal)){echo $metastags->meta_title_principal;}?>" />
		<meta property="og:type" content="website" /><meta name="facebook-domain-verification" content="hfvf5rz4pxo5xricxcztjgagyh114v" />
		<meta property="og:url" content="<?php echo SITE_URL;?>" />
		<meta property="og:image:type" content="image/png" />
		<meta property="og:image" content="<?php echo SITE_URL;?>/img/<?php echo $infoSistema->logo_principal;?>" />
		<meta property="og:image:width" content="400" />
		<meta property="og:image:height" content="300" />
<?php }?>


<?php if(basename($_SERVER['SCRIPT_NAME']) == 'confirmacao.php'){?>
    <link rel=”canonical” href="<?php echo SITE_URL;?>" />
    <title><?php if(isset($metastags->meta_title_confirma) && !empty($metastags->meta_title_confirma)){echo $metastags->meta_title_confirma;}?></title>
    <meta name="description" content="<?php if(isset($metastags->meta_description_confirma) && !empty($metastags->meta_description_confirma)){echo $metastags->meta_description_confirma;}?>"/>
    <meta name="keywords" content="<?php if(isset($metastags->meta_keywords_confirma) && !empty($metastags->meta_keywords_confirma)){echo $metastags->meta_keywords_confirma;}?>">
    <meta name="twitter:card" content="<?php if(isset($metastags->meta_title_confirma) && !empty($metastags->meta_title_confirma)){echo $metastags->meta_title_confirma;}?>" />
        <meta name="twitter:site" content="<?php echo SITE_URL;?>" />
        <meta name="twitter:creator" content="Hoogli" />
        <meta property="og:title" content="<?php if(isset($metastags->meta_title_confirma) && !empty($metastags->meta_title_confirma)){echo $metastags->meta_title_confirma;}?>" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="<?php echo SITE_URL;?>" />
        <meta property="og:image:type" content="image/png" />
        <meta property="og:image" content="<?php echo SITE_URL;?>/img/<?php echo $infoSistema->logo_confirma;?>" />
        <meta property="og:image:width" content="400" />
        <meta property="og:image:height" content="300" />
<?php }?>



<?php if(basename($_SERVER['SCRIPT_NAME']) == 'contato.php'){?>
	<link rel=”canonical” href="<?php echo SITE_URL;?>/contato" />
<title><?php if(isset($metastags->meta_title_contato) && !empty($metastags->meta_title_contato)){echo $metastags->meta_title_contato;}?></title>
    <meta name="description" content="<?php if(isset($metastags->meta_description_contato) && !empty($metastags->meta_description_contato)){echo $metastags->meta_description_principal;}?>"/>
	<meta name="keywords" content="<?php if(isset($metastags->meta_keywords_contato) && !empty($metastags->meta_keywords_contato)){echo $metastags->meta_keywords_contato;}?>">
	<meta name="twitter:card" content="<?php if(isset($metastags->meta_title_contato) && !empty($metastags->meta_title_contato)){echo $metastags->meta_title_contato;}?>" />
		<meta name="twitter:site" content="<?php echo SITE_URL;?>" />
		<meta name="twitter:creator" content="Hoogli" />
		<meta property="og:title" content="<?php if(isset($metastags->meta_title_contato) && !empty($metastags->meta_title_contato)){echo $metastags->meta_title_contato;}?>" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?php echo SITE_URL;?>" />
		<meta property="og:image:type" content="image/png" />
		<meta property="og:image" content="<?php echo SITE_URL;?>/img/<?php echo $infoSistema->logo_principal;?>" />
		<meta property="og:image:width" content="400" />
		<meta property="og:image:height" content="300" />
<?php }?>
<?php if(basename($_SERVER['SCRIPT_NAME']) == 'services.php'){?>
	<link rel=”canonical” href="<?php echo SITE_URL;?>/especial-day" />
<title><?php if(isset($metastags->meta_title_contato) && !empty($metastags->meta_title_contato)){echo $metastags->meta_title_contato;}?></title>
    <meta name="description" content="<?php if(isset($metastags->meta_description_contato) && !empty($metastags->meta_description_contato)){echo $metastags->meta_description_principal;}?>"/>
	<meta name="keywords" content="<?php if(isset($metastags->meta_keywords_contato) && !empty($metastags->meta_keywords_contato)){echo $metastags->meta_keywords_contato;}?>">
	<meta name="twitter:card" content="<?php if(isset($metastags->meta_title_contato) && !empty($metastags->meta_title_contato)){echo $metastags->meta_title_contato;}?>" />
		<meta name="twitter:site" content="<?php echo SITE_URL;?>" />
		<meta name="twitter:creator" content="Hoogli" />
		<meta property="og:title" content="<?php if(isset($metastags->meta_title_contato) && !empty($metastags->meta_title_contato)){echo $metastags->meta_title_contato;}?>" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?php echo SITE_URL;?>" />
		<meta property="og:image:type" content="image/png" />
		<meta property="og:image" content="<?php echo SITE_URL;?>/img/<?php echo $infoSistema->logo_principal;?>" />
		<meta property="og:image:width" content="400" />
		<meta property="og:image:height" content="300" />
<?php }?>

<?php if(basename($_SERVER['SCRIPT_NAME']) == 'equipe.php'){?>
	<link rel=”canonical” href="<?php echo SITE_URL;?>/equipe" />
    <title>Nossa Equipe | Mesquita & Berredo | (61) 98220-1002</title>
    <meta name="description" content="Conheça o corpo jurídico do Mesquita & Berredo, advogados em Brasília-DF, especializados em Direito preventivo e estratégico."/>
	<meta name="keywords" content="Advogados em Brasília, Advocacia em Brasília, Advogados, Consultoria Jurídica, Direito Civil, Direito Imobiliário, Direito Tributário, LGPD, Advocacia Preventiva, Advocacia Contenciosa, Advocacia Extrajudicial, Equipe, Corpo Jurídico">
	<meta name="twitter:card" content="Nossa Equipe | Mesquita & Berredo | (61) 98220-1002" />
		<meta name="twitter:site" content="<?php echo SITE_URL;?>" />
		<meta name="twitter:creator" content="Hoogli" />
		<meta property="og:title" content="Nossa Equipe | Mesquita & Berredo | (61) 98220-1002" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?php echo SITE_URL;?>" />
		<meta property="og:image:type" content="image/png" />
		<meta property="og:image" content="<?php echo SITE_URL;?>/img/<?php echo $infoSistema->logo_principal;?>" />
		<meta property="og:image:width" content="400" />
		<meta property="og:image:height" content="300" />
<?php }?>

<?php if(basename($_SERVER['SCRIPT_NAME']) == 'sucesso.php'){?>
	<link rel=”canonical” href="<?php echo SITE_URL;?>/sucesso" />
<title><?php if(isset($metastags->meta_title_servico) && !empty($metastags->meta_title_servico)){echo $metastags->meta_title_servico;}?></title>
    <meta name="description" content="<?php if(isset($metastags->meta_description_servico) && !empty($metastags->meta_description_servico)){echo $metastags->meta_description_servico;}?>"/>
	<meta name="keywords" content="<?php if(isset($metastags->meta_keywords_servico) && !empty($metastags->meta_keywords_servico)){echo $metastags->meta_keywords_servico;}?>">
	<meta name="twitter:card" content="<?php if(isset($metastags->meta_title_servico) && !empty($metastags->meta_title_servico)){echo $metastags->meta_title_servico;}?>" />
		<meta name="twitter:site" content="<?php echo SITE_URL;?>" />
		<meta name="twitter:creator" content="Hoogli" />
		<meta property="og:title" content="<?php if(isset($metastags->meta_title_servico) && !empty($metastags->meta_title_servico)){echo $metastags->meta_title_servico;}?>" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?php echo SITE_URL;?>" />
		<meta property="og:image:type" content="image/png" />
		<meta property="og:image" content="<?php echo SITE_URL;?>/img/<?php echo $infoSistema->logo_principal;?>" />
		<meta property="og:image:width" content="400" />
		<meta property="og:image:height" content="300" />
<?php }?>
<?php if(basename($_SERVER['SCRIPT_NAME']) == 'sobre.php'){?>
	<link rel=”canonical” href="<?php echo SITE_URL;?>/sobre" />
<title><?php if(isset($metastags->meta_title_sobre) && !empty($metastags->meta_title_sobre)){echo $metastags->meta_title_sobre;}?></title>
    <meta name="description" content="<?php if(isset($metastags->meta_description_sobre) && !empty($metastags->meta_description_sobre)){echo $metastags->meta_description_sobre;}?>"/>
	<meta name="keywords" content="<?php if(isset($metastags->meta_keywords_sobre) && !empty($metastags->meta_keywords_sobre)){echo $metastags->meta_keywords_sobre;}?>">
	<meta name="twitter:card" content="<?php if(isset($metastags->meta_title_sobre) && !empty($metastags->meta_title_sobre)){echo $metastags->meta_title_sobre;}?>" />
		<meta name="twitter:site" content="<?php echo SITE_URL;?>" />
		<meta name="twitter:creator" content="Hoogli" />
		<meta property="og:title" content="<?php if(isset($metastags->meta_title_sobre) && !empty($metastags->meta_title_sobre)){echo $metastags->meta_title_sobre;}?>" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?php echo SITE_URL;?>" />
		<meta property="og:image:type" content="image/png" />
		<meta property="og:image" content="<?php echo SITE_URL;?>/img/<?php echo $infoSistema->logo_principal;?>" />
		<meta property="og:image:width" content="400" />
		<meta property="og:image:height" content="300" />
<?php }?>
<?php if(basename($_SERVER['SCRIPT_NAME']) == 'produtos.php'){?>
	<link rel=”canonical” href="<?php echo SITE_URL;?>/produtos" />
<title><?php if(isset($metastags->meta_title_produtos) && !empty($metastags->meta_title_produtos)){echo $metastags->meta_title_produtos;}?></title>
    <meta name="description" content="<?php if(isset($metastags->meta_description_produtos) && !empty($metastags->meta_description_produtos)){echo $metastags->meta_description_produtos;}?>"/>
	<meta name="keywords" content="<?php if(isset($metastags->meta_keywords_produtos) && !empty($metastags->meta_keywords_produtos)){echo $metastags->meta_keywords_produtos;}?>">
	<meta name="twitter:card" content="<?php if(isset($metastags->meta_title_produtos) && !empty($metastags->meta_title_produtos)){echo $metastags->meta_title_produtos;}?>" />
		<meta name="twitter:site" content="<?php echo SITE_URL;?>" />
		<meta name="twitter:creator" content="Hoogli" />
		<meta property="og:title" content="<?php if(isset($metastags->meta_title_produtos) && !empty($metastags->meta_title_produtos)){echo $metastags->meta_title_produtos;}?>" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?php echo SITE_URL;?>" />
		<meta property="og:image:type" content="image/png" />
		<meta property="og:image" content="<?php echo SITE_URL;?>/img/<?php echo $infoSistema->logo_principal;?>" />
		<meta property="og:image:width" content="400" />
		<meta property="og:image:height" content="300" />
<?php }?>
<?php if(basename($_SERVER['SCRIPT_NAME']) == 'blog.php'){?>
	<link rel=”canonical” href="<?php echo SITE_URL;?>/blog" />
<title><?php if(isset($metastags->meta_title_blog) && !empty($metastags->meta_title_blog)){echo $metastags->meta_title_blog;}?></title>
    <meta name="description" content="<?php if(isset($metastags->meta_description_blog) && !empty($metastags->meta_description_blog)){echo $metastags->meta_description_blog;}?>"/>
	<meta name="keywords" content="<?php if(isset($metastags->meta_keywords_blog) && !empty($metastags->meta_keywords_blog)){echo $metastags->meta_keywords_blog;}?>">
	<meta name="twitter:card" content="<?php if(isset($metastags->meta_title_blog) && !empty($metastags->meta_title_blog)){echo $metastags->meta_title_blog;}?>" />
		<meta name="twitter:site" content="<?php echo SITE_URL;?>" />
		<meta name="twitter:creator" content="Hoogli" />
		<meta property="og:title" content="<?php if(isset($metastags->meta_title_blog) && !empty($metastags->meta_title_blog)){echo $metastags->meta_title_blog;}?>" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?php echo SITE_URL;?>" />
		<meta property="og:image:type" content="image/png" />
		<meta property="og:image" content="<?php echo SITE_URL;?>/img/<?php echo $infoSistema->logo_principal;?>" />
		<meta property="og:image:width" content="400" />
		<meta property="og:image:height" content="300" />
<?php }?>
<?php if(basename($_SERVER['SCRIPT_NAME']) == 'desc-blog.php'){?>
	<link rel=”canonical” href="<?php echo SITE_URL;?>blog/<?php echo $id;?>" />
<title><?php if(isset($descBlog[0]->meta_title) && !empty($descBlog[0]->meta_title)){echo $descBlog[0]->meta_title;}?></title>
    <meta name="description" content="<?php if(isset($descBlog[0]->meta_description) && !empty($descBlog[0]->meta_description)){echo $descBlog[0]->meta_description;}?>"/>
	<meta name="keywords" content="<?php if(isset($descBlog[0]->meta_keywords) && !empty($descBlog[0]->meta_keywords)){echo $descBlog[0]->meta_keywords;}?>">
	<meta name="twitter:card" content="<?php if(isset($descBlog[0]->meta_title) && !empty($descBlog[0]->meta_title)){echo $descBlog[0]->meta_title;}?>" />
		<meta name="twitter:site" content="<?php echo SITE_URL;?>" />
		<meta name="twitter:creator" content="Hoogli" />
		<meta property="og:title" content="<?php if(isset($descBlog[0]->meta_title) && !empty($descBlog[0]->meta_title)){echo $descBlog[0]->meta_title;}?>" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?php echo SITE_URL;?>" />
		<meta property="og:image:type" content="image/png" />
		<meta property="og:image" content="<?php echo SITE_URL;?>/img/<?php echo $infoSistema->logo_principal;?>" />
		<meta property="og:image:width" content="400" />
		<meta property="og:image:height" content="300" />
<?php }?>

<?php if(basename($_SERVER['SCRIPT_NAME']) == 'desc-servico.php'){?>
	<link rel=”canonical” href="<?php echo SITE_URL;?>servico/<?php echo $id;?>" />
<title><?php if(isset($descServico[0]->meta_title) && !empty($descServico[0]->meta_title)){echo $descServico[0]->meta_title;}?></title>
    <meta name="description" content="<?php if(isset($descServico[0]->meta_description) && !empty($descServico[0]->meta_description)){echo $descServico[0]->meta_description;}?>"/>
	<meta name="keywords" content="<?php if(isset($descServico[0]->meta_keywords) && !empty($descServico[0]->meta_keywords)){echo $descServico[0]->meta_keywords;}?>">
	<meta name="twitter:card" content="<?php if(isset($descServico[0]->meta_title) && !empty($descServico[0]->meta_title)){echo $descServico[0]->meta_title;}?>" />
		<meta name="twitter:site" content="<?php echo SITE_URL;?>" />
		<meta name="twitter:creator" content="Hoogli" />
		<meta property="og:title" content="<?php if(isset($descServico[0]->meta_title) && !empty($descServico[0]->meta_title)){echo $descServico[0]->meta_title;}?>" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?php echo SITE_URL;?>" />
		<meta property="og:image:type" content="image/png" />
		<meta property="og:image" content="<?php echo SITE_URL;?>/img/<?php echo $infoSistema->logo_principal;?>" />
		<meta property="og:image:width" content="400" />
		<meta property="og:image:height" content="300" />
<?php }?>


<meta name="facebook-domain-verification" content="hfvf5rz4pxo5xricxcztjgagyh114v" />
<meta name="author" content="Adriano Monteiro">
<link rel="shortcut icon" href="<?php echo SITE_URL;?>/img/<?php echo $infoSistema->favicon;?>">
<link rel="icon" href="<?php echo SITE_URL;?>/img/<?php echo $infoSistema->favicon;?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php if(isset($infoSistema->link_fonte_titulo) && !empty($infoSistema->link_fonte_titulo)){?>
<link href="<?php echo $infoSistema->link_fonte_titulo;?>" rel="stylesheet">
<?php }?>
<?php if(isset($infoSistema->link_fonte_texto_apoio) && !empty($infoSistema->link_fonte_texto_apoio)){?>
<link href="<?php echo $infoSistema->link_fonte_texto_apoio;?>" rel="stylesheet">
<?php }?>
<style>
	:root{
		--font-family-titulo:<?php echo $infoSistema->font_family_titulo;?>;
		--font-weight-titulo:<?php echo $infoSistema->font_weight_titulo;?>;
		--font-family-texto-apoio:<?php echo $infoSistema->font_family_texto_apoio;?>;
		--font-weight-texto-apoio:<?php echo $infoSistema->font_weight_texto_apoio;?>;
	}
</style>
<!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" /> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" /> 