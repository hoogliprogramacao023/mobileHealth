<?php
@ session_start();
$ServicosInstanciada = '';
if(empty($ServicosInstanciada)) {
	if(file_exists('Connection/conexao.php')) {
		require_once('Connection/con-pdo.php');
		require_once('funcoes.php');
	} else {
		require_once('../Connection/con-pdo.php');
		require_once('../funcoes.php');
	}
	
	class Servicos {
		
		private $pdo = null;  

		private static $Servicos = null; 

		private function __construct($conexao){  
			$this->pdo = $conexao;  
		}
	  
		public static function getInstance($conexao){   
			if (!isset(self::$Servicos)):    
				self::$Servicos = new Servicos($conexao);   
			endif;
			return self::$Servicos;    
		}
		
	
		function rsDados($id='', $orderBy='', $limite='', $idCat='', $idDiferente='', $url_amigavel='') {
			
			/// FILTROS
			$nCampos = 0;
			$sql = '';
			$sqlOrdem = ''; 
			$sqlLimite = '';
			if(!empty($id)) {
				$sql .= " and id = ?"; 
				$nCampos++;
				$campo[$nCampos] = $id;
			}
			if(!empty($idCat)) {
				$sql .= " and id_cat = ?"; 
				$nCampos++;
				$campo[$nCampos] = $idCat;
			}
			if(!empty($idDiferente)) {
				$sql .= " and id != ?"; 
				$nCampos++;
				$campo[$nCampos] = $idDiferente;
			}
			if(!empty($url_amigavel)) {
				$sql .= " and url_amigavel = ?"; 
				$nCampos++;
				$campo[$nCampos] = $url_amigavel;
			}
		
			/// ORDEM		
			if(!empty($orderBy)) {
				$sqlOrdem = " order by {$orderBy}";
			}
			
			if(!empty($limite)) {
				$sqlLimite = " limit {$limite}";
			}
			
			try{   
				$sql = "SELECT * FROM tbl_servicos where 1=1 $sql $sqlOrdem $sqlLimite";
				$stm = $this->pdo->prepare($sql);
				
				for($i=1; $i<=$nCampos; $i++) {
					$stm->bindValue($i, $campo[$i]);
				}
				
				$stm->execute();
				$rsDados = $stm->fetchAll(PDO::FETCH_OBJ);
				//print_r($rsDados);
				if($id <> '' or $limite == 1) {
					return($rsDados[0]);
				} else {
					return($rsDados);
				}
			} catch(PDOException $erro){   
				echo $erro->getMessage(); 
			}
		}

		function add($redireciona='') {
			if(isset($_POST['acao']) && $_POST['acao'] == 'addServico') {
	
				$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
				//$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
				
				if(isset($_POST['descricao']) && !empty($_POST['descricao'])){
					$descricao = $_POST['descricao'];
				}else{
					$descricao = '';	
				}
				if(isset($_POST['breve']) && !empty($_POST['breve'])){
					$breve = $_POST['breve'];
				}else{
					$breve = '';	
				}
				$id_cat = filter_input(INPUT_POST, 'id_cat', FILTER_SANITIZE_STRING);
				//$breve = filter_input(INPUT_POST, 'breve', FILTER_SANITIZE_STRING);
				
				$banner_titulo = filter_input(INPUT_POST, 'banner_titulo', FILTER_SANITIZE_STRING);
				$banner_texto = $_POST['banner_texto'];
				$sessao1_titulo = filter_input(INPUT_POST, 'sessao1_titulo', FILTER_SANITIZE_STRING);
				$sessao1_texto = $_POST['sessao1_texto'];
				$sessao2_titulo = filter_input(INPUT_POST, 'sessao2_titulo', FILTER_SANITIZE_STRING);
				$sessao2_texto = $_POST['sessao2_texto'];
				$sessao3_titulo = filter_input(INPUT_POST, 'sessao3_titulo', FILTER_SANITIZE_STRING);
				$sessao3_texto = $_POST['sessao3_texto'];
				$sessao4_titulo = filter_input(INPUT_POST, 'sessao4_titulo', FILTER_SANITIZE_STRING);
				$sessao4_texto = $_POST['sessao4_texto'];
				$sessao5_titulo = filter_input(INPUT_POST, 'sessao5_titulo', FILTER_SANITIZE_STRING);
				$sessao5_texto = $_POST['sessao5_texto'];
				$topico1_titulo = filter_input(INPUT_POST, 'topico1_titulo', FILTER_SANITIZE_STRING);
				$topico1_texto = $_POST['topico1_texto'];
				$topico2_titulo = filter_input(INPUT_POST, 'topico2_titulo', FILTER_SANITIZE_STRING);
				$topico2_texto = $_POST['topico2_texto'];
				$topico3_titulo = filter_input(INPUT_POST, 'topico3_titulo', FILTER_SANITIZE_STRING);
				$topico3_texto = $_POST['topico3_texto'];
				$topico4_titulo = filter_input(INPUT_POST, 'topico4_titulo', FILTER_SANITIZE_STRING);
				$topico4_texto = $_POST['topico4_texto'];
				$diferenca1_titulo = filter_input(INPUT_POST, 'diferenca1_titulo', FILTER_SANITIZE_STRING);
				$diferenca1_texto = $_POST['diferenca1_texto'];
				$diferenca2_titulo = filter_input(INPUT_POST, 'diferenca2_titulo', FILTER_SANITIZE_STRING);
				$diferenca2_texto = $_POST['diferenca2_texto'];
				$diferenca3_titulo = filter_input(INPUT_POST, 'diferenca3_titulo', FILTER_SANITIZE_STRING);
				$diferenca3_texto = $_POST['diferenca3_texto'];
				$contato_titulo = filter_input(INPUT_POST, 'contato_titulo', FILTER_SANITIZE_STRING);
				$contato_texto = $_POST['contato_texto'];
				$meta_title = filter_input(INPUT_POST, 'meta_title', FILTER_SANITIZE_STRING);
				$meta_keywords = filter_input(INPUT_POST, 'meta_keywords', FILTER_SANITIZE_STRING);
				$meta_description = filter_input(INPUT_POST, 'meta_description', FILTER_SANITIZE_STRING);
				$botao = filter_input(INPUT_POST, 'botao', FILTER_SANITIZE_STRING);
				$banner_titulo2 = filter_input(INPUT_POST, 'banner_titulo2', FILTER_SANITIZE_STRING);
				$banner_titulo3 = filter_input(INPUT_POST, 'banner_titulo3', FILTER_SANITIZE_STRING);
				$urlAmigavel = gerarTituloSEO($titulo);
				$banner_botao_link = $_POST['banner_botao_link'];
				$banner_botao_nome = $_POST['banner_botao_nome'];
				$sessao1_botao_link = $_POST['sessao1_botao_link'];
				$sessao1_botao_nome = $_POST['sessao1_botao_nome'];
				$sessao3_botao_link = $_POST['sessao3_botao_link'];
				$sessao3_botao_nome = $_POST['sessao3_botao_nome'];
				$sessao4_botao_link = $_POST['sessao4_botao_link'];
				$sessao4_botao_nome = $_POST['sessao4_botao_nome'];

				$sessao6_titulo = $_POST['sessao6_titulo'];
				$sessao6_texto = $_POST['sessao6_texto'];
				$sessao6_nome_botao = $_POST['sessao6_nome_botao'];
				$sessao6_link_botao = $_POST['sessao6_link_botao'];
				$sessao7_titulo = $_POST['sessao7_titulo'];
				
				// $id_especialista = $_POST['id_especialista'];
				// $id_especialista2 = $_POST['id_especialista2'];
				// $id_especialista3 = $_POST['id_especialista3'];
				
					try{

						if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}
						
						$sql = "INSERT INTO tbl_servicos (foto, titulo, descricao, id_cat, meta_title, meta_keywords, meta_description, url_amigavel, breve, banner_foto, sessao1_foto, sessao2_foto, sessao4_foto, topico1_foto, topico2_foto, topico3_foto, topico4_foto, diferenca1_foto, diferenca2_foto, diferenca3_foto, banner_titulo, banner_texto, sessao1_titulo, sessao1_texto, sessao2_titulo, sessao2_texto, sessao3_titulo, sessao3_texto, sessao4_titulo, sessao4_texto, sessao5_titulo, sessao5_texto, topico1_titulo, topico1_texto, topico2_titulo, topico2_texto, topico3_titulo, topico3_texto, topico4_titulo, topico4_texto, diferenca1_titulo, diferenca1_texto, diferenca2_titulo, diferenca2_texto, diferenca3_titulo, diferenca3_texto, contato_titulo, contato_texto, imagem_final, imagem_mobile_final, icone, botao, banner_titulo2, banner_titulo3, sessao3_foto, banner_botao_link, banner_botao_nome, sessao1_botao_link, sessao1_botao_nome, sessao3_botao_link, sessao3_botao_nome, sessao4_botao_link, sessao4_botao_nome, sessao6_foto, sessao6_titulo, sessao6_texto, sessao6_nome_botao, sessao6_link_botao, sessao7_titulo, sessao5_foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";   
						$stm = $this->pdo->prepare($sql);   
						$stm->bindValue(1, upload('foto', $pastaArquivos, 'N'));
						$stm->bindValue(2, $titulo);   
						$stm->bindValue(3, $descricao);
						$stm->bindValue(4, $id_cat);   
						$stm->bindValue(5, $meta_title);   
						$stm->bindValue(6, $meta_keywords);   
						$stm->bindValue(7, $meta_description); 
						$stm->bindValue(8, $urlAmigavel);
						$stm->bindValue(9, $breve);
						$stm->bindValue(10, upload('banner_foto', $pastaArquivos, 'N')); 
						$stm->bindValue(11, upload('sessao1_foto', $pastaArquivos, 'N')); 
						$stm->bindValue(12, upload('sessao2_foto', $pastaArquivos, 'N')); 
						$stm->bindValue(13, upload('sessao4_foto', $pastaArquivos, 'N')); 
						$stm->bindValue(14, upload('topico1_foto', $pastaArquivos, 'N')); 
						$stm->bindValue(15, upload('topico2_foto', $pastaArquivos, 'N')); 
						$stm->bindValue(16, upload('topico3_foto', $pastaArquivos, 'N')); 
						$stm->bindValue(17, upload('topico4_foto', $pastaArquivos, 'N')); 
						$stm->bindValue(18, upload('diferenca1_foto', $pastaArquivos, 'N')); 
						$stm->bindValue(19, upload('diferenca2_foto', $pastaArquivos, 'N')); 
						$stm->bindValue(20, upload('diferenca3_foto', $pastaArquivos, 'N'));
						$stm->bindValue(21, $banner_titulo);
						$stm->bindValue(22, $banner_texto);
						$stm->bindValue(23, $sessao1_titulo);
						$stm->bindValue(24, $sessao1_texto);
						$stm->bindValue(25, $sessao2_titulo);
						$stm->bindValue(26, $sessao2_texto);
						$stm->bindValue(27, $sessao3_titulo);
						$stm->bindValue(28, $sessao3_texto);
						$stm->bindValue(29, $sessao4_titulo);
						$stm->bindValue(30, $sessao4_texto);
						$stm->bindValue(31, $sessao5_titulo);
						$stm->bindValue(32, $sessao5_texto);
						$stm->bindValue(33, $topico1_titulo);
						$stm->bindValue(34, $topico1_texto);
						$stm->bindValue(35, $topico2_titulo);
						$stm->bindValue(36, $topico2_texto);
						$stm->bindValue(37, $topico3_titulo);
						$stm->bindValue(38, $topico3_texto);
						$stm->bindValue(39, $topico4_titulo);
						$stm->bindValue(40, $topico4_texto);
						$stm->bindValue(41, $diferenca1_titulo);
						$stm->bindValue(42, $diferenca1_texto);
						$stm->bindValue(43, $diferenca2_titulo);
						$stm->bindValue(44, $diferenca2_texto);
						$stm->bindValue(45, $diferenca3_titulo);
						$stm->bindValue(46, $diferenca3_texto);
						$stm->bindValue(47, $contato_titulo);
						$stm->bindValue(48, $contato_texto);
						$stm->bindValue(49, upload('imagem_final', $pastaArquivos, 'N'));
						$stm->bindValue(50, upload('imagem_mobile_final', $pastaArquivos, 'N'));
						$stm->bindValue(51, upload('icone', $pastaArquivos, 'N'));
						$stm->bindValue(52, $botao);
						$stm->bindValue(53, $banner_titulo2);
						$stm->bindValue(54, $banner_titulo3);
						$stm->bindValue(55, upload('sessao3_foto', $pastaArquivos, 'N'));
						$stm->bindValue(56, $banner_botao_link);
						$stm->bindValue(57, $banner_botao_nome);
						$stm->bindValue(58, $sessao1_botao_link);
						$stm->bindValue(59, $sessao1_botao_nome); 
						$stm->bindValue(60, $sessao3_botao_link);
						$stm->bindValue(61, $sessao3_botao_nome); 
						$stm->bindValue(62, $sessao4_botao_link);
						$stm->bindValue(63, $sessao4_botao_nome);
						$stm->bindValue(64, upload('sessao6_foto', $pastaArquivos, 'N'));
						$stm->bindValue(65, $sessao6_titulo);
						$stm->bindValue(66, $sessao6_texto);
						$stm->bindValue(67, $sessao6_nome_botao);
						$stm->bindValue(68, $sessao6_link_botao);
						$stm->bindValue(69, $sessao7_titulo);
						$stm->bindValue(70, upload('sessao5_foto', $pastaArquivos, 'N'));
						$stm->execute(); 
						$idBanner = $this->pdo->lastInsertId();
						
						if($redireciona == '') {
							$redireciona = '.';
						}
						//exit;
						
					} catch(PDOException $erro){
						echo $erro->getMessage(); 
					}
					echo "	<script>
								window.location='servicos.php';
								</script>";
								exit;
				
			}
		}
		
		function editar($redireciona='servicos.php') {
			if(isset($_POST['acao']) && $_POST['acao'] == 'editaServico') {

				

				$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
				//$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
				
				if(isset($_POST['descricao']) && !empty($_POST['descricao'])){
					$descricao = $_POST['descricao'];
				}else{
					$descricao = '';	
				}
				if(isset($_POST['breve']) && !empty($_POST['breve'])){
					$breve = $_POST['breve'];
				}else{
					$breve = '';	
				}
				$id_cat = filter_input(INPUT_POST, 'id_cat', FILTER_SANITIZE_STRING);
				//$breve = filter_input(INPUT_POST, 'breve', FILTER_SANITIZE_STRING);
				
				$meta_title = filter_input(INPUT_POST, 'meta_title', FILTER_SANITIZE_STRING);
				$meta_keywords = filter_input(INPUT_POST, 'meta_keywords', FILTER_SANITIZE_STRING);
				$meta_description = filter_input(INPUT_POST, 'meta_description', FILTER_SANITIZE_STRING);
				$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
				$banner_titulo = filter_input(INPUT_POST, 'banner_titulo', FILTER_SANITIZE_STRING);
				$banner_texto = $_POST['banner_texto'];
				$sessao1_titulo = filter_input(INPUT_POST, 'sessao1_titulo', FILTER_SANITIZE_STRING);
				$sessao1_texto = $_POST['sessao1_texto'];
				$sessao2_titulo = filter_input(INPUT_POST, 'sessao2_titulo', FILTER_SANITIZE_STRING);
				$sessao2_texto = $_POST['sessao2_texto'];
				$sessao3_titulo = filter_input(INPUT_POST, 'sessao3_titulo', FILTER_SANITIZE_STRING);
				$sessao3_texto = $_POST['sessao3_texto'];
				$sessao4_titulo = filter_input(INPUT_POST, 'sessao4_titulo', FILTER_SANITIZE_STRING);
				$sessao4_texto = $_POST['sessao4_texto'];
				$sessao5_titulo = filter_input(INPUT_POST, 'sessao5_titulo', FILTER_SANITIZE_STRING);
				$sessao5_texto = $_POST['sessao5_texto'];
				$topico1_titulo = filter_input(INPUT_POST, 'topico1_titulo', FILTER_SANITIZE_STRING);

				if(isset($_POST['topico1_texto']) && !empty($_POST['topico1_texto'])) {
					$topico1_texto = $_POST['topico1_texto'];
				} else {
					$topico1_texto = null;
				}
				$topico2_titulo = filter_input(INPUT_POST, 'topico2_titulo', FILTER_SANITIZE_STRING);
				if(isset($_POST['topico2_texto']) && !empty($_POST['topico2_texto'])) {
					$topico2_texto = $_POST['topico2_texto'];
				} else {
					$topico2_texto = null;
				}
				$topico3_titulo = filter_input(INPUT_POST, 'topico3_titulo', FILTER_SANITIZE_STRING);
				if(isset($_POST['topico3_texto']) && !empty($_POST['topico3_texto'])) {
					$topico3_texto = $_POST['topico3_texto'];
				} else {
					$topico3_texto = null;
				}
				$topico4_titulo = filter_input(INPUT_POST, 'topico4_titulo', FILTER_SANITIZE_STRING);
				if(isset($_POST['topico4_texto']) && !empty($_POST['topico4_texto'])) {
					$topico4_texto = $_POST['topico4_texto'];
				} else {
					$topico4_texto = null;
				}
				$diferenca1_titulo = filter_input(INPUT_POST, 'diferenca1_titulo', FILTER_SANITIZE_STRING);

				if(isset($_POST['diferenca1_texto']) && !empty($_POST['diferenca1_texto'])) {
					$diferenca1_texto = $_POST['diferenca1_texto'];
				} else {
					$diferenca1_texto = null;
				}

				$diferenca2_titulo = filter_input(INPUT_POST, 'diferenca2_titulo', FILTER_SANITIZE_STRING);

				if(isset($_POST['diferenca2_texto']) && !empty($_POST['diferenca2_texto'])) {
					$diferenca2_texto = $_POST['diferenca2_texto'];
				} else {
					$diferenca2_texto = null;
				}

				$diferenca3_titulo = filter_input(INPUT_POST, 'diferenca3_titulo', FILTER_SANITIZE_STRING);

				if(isset($_POST['diferenca3_texto']) && !empty($_POST['diferenca3_texto'])) {
					$diferenca3_texto = $_POST['diferenca3_texto'];
				} else {
					$diferenca3_texto = null;
				}

				$contato_titulo = filter_input(INPUT_POST, 'contato_titulo', FILTER_SANITIZE_STRING);

				if(isset($_POST['contato_texto']) && !empty($_POST['contato_texto'])) {
					$contato_texto = $_POST['contato_texto'];
				} else {
					$contato_texto = null;
				}

				$urlAmigavel = gerarTituloSEO($titulo);
				$botao = filter_input(INPUT_POST, 'botao', FILTER_SANITIZE_STRING);
				$banner_titulo2 = filter_input(INPUT_POST, 'banner_titulo2', FILTER_SANITIZE_STRING);
				$banner_titulo3 = filter_input(INPUT_POST, 'banner_titulo3', FILTER_SANITIZE_STRING);
				$banner_botao_link = $_POST['banner_botao_link'];
				$banner_botao_nome = $_POST['banner_botao_nome'];
				$sessao1_botao_link = $_POST['sessao1_botao_link'];
				$sessao1_botao_nome = $_POST['sessao1_botao_nome'];
				if(isset($_POST['sessao3_botao_link']) && !empty($_POST['sessao3_botao_link'])) {
					$sessao3_botao_link = $_POST['sessao3_botao_link'];
				} else {
					$sessao3_botao_link = null;
				}
				if(isset($_POST['sessao3_botao_nome']) && !empty($_POST['sessao3_botao_nome'])) {
					$sessao3_botao_nome = $_POST['sessao3_botao_nome'];
				} else {
					$sessao3_botao_nome = null;
				}
				if(isset($_POST['sessao4_botao_link']) && !empty($_POST['sessao4_botao_link'])) {
					$sessao4_botao_link = $_POST['sessao4_botao_link'];
				} else {
					$sessao4_botao_link = null;
				}

				if(isset($_POST['sessao4_botao_nome']) && !empty($_POST['sessao4_botao_nome'])) {
					$sessao4_botao_nome = $_POST['sessao4_botao_nome'];
				} else {
					$sessao4_botao_nome = null;
				}
				
				
				
			

				$sessao6_titulo = $_POST['sessao6_titulo'];
				$sessao6_texto = $_POST['sessao6_texto'];
				if(isset($_POST['sessao6_nome_botao']) && !empty($_POST['sessao6_nome_botao'])) {
					$sessao6_nome_botao = $_POST['sessao6_nome_botao'];
				} else {
					$sessao6_nome_botao = null;
				}
				if(isset($_POST['sessao6_link_botao']) && !empty($_POST['sessao6_link_botao'])) {
					$sessao6_link_botao = $_POST['sessao6_link_botao'];
				} else {
					$sessao6_link_botao = null;
				}
				$sessao7_titulo = $_POST['sessao7_titulo'];
				
				// $id_especialista = $_POST['id_especialista'];
				// $id_especialista2 = $_POST['id_especialista2'];
				// $id_especialista3 = $_POST['id_especialista3'];

				
				try { 

					if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}
				
					$sql = "UPDATE tbl_servicos SET foto=?, titulo=?, descricao=?, id_cat=?, meta_title=?, meta_keywords=?, meta_description=?, url_amigavel=?, breve=?, banner_foto=?, sessao1_foto=?, sessao2_foto=?, sessao4_foto=?, topico1_foto=?, topico2_foto=?, topico3_foto=?, topico4_foto=?, diferenca1_foto=?, diferenca2_foto=?, diferenca3_foto=?, banner_titulo=?, banner_texto=?, sessao1_titulo=?, sessao1_texto=?, sessao2_titulo=?, sessao2_texto=?, sessao3_titulo=?, sessao3_texto=?, sessao4_titulo=?, sessao4_texto=?, sessao5_titulo=?, sessao5_texto=?, topico1_titulo=?, topico1_texto=?, topico2_titulo=?, topico2_texto=?, topico3_titulo=?, topico3_texto=?, topico4_titulo=?, topico4_texto=?, diferenca1_titulo=?, diferenca1_texto=?, diferenca2_titulo=?, diferenca2_texto=?, diferenca3_titulo=?, diferenca3_texto=?, contato_titulo=?, contato_texto=?, imagem_final=?, imagem_mobile_final=?, icone=?, botao=?, banner_titulo2=?, banner_titulo3=?, sessao3_foto=?, banner_botao_link=?, banner_botao_nome=?, sessao1_botao_link=?, sessao1_botao_nome=?, sessao3_botao_link=?, sessao3_botao_nome=?, sessao4_botao_link=?, sessao4_botao_nome=?, sessao6_foto=?, sessao6_titulo=?, sessao6_texto=?, sessao6_nome_botao=?, sessao6_link_botao=?, sessao7_titulo=?, sessao5_foto=? WHERE id=?";
					$stm = $this->pdo->prepare($sql);
					$stm->bindValue(1, upload('foto', $pastaArquivos, 'N'));
					$stm->bindValue(2, $titulo);
					$stm->bindValue(3, $descricao);
					$stm->bindValue(4, $id_cat);
					$stm->bindValue(5, $meta_title);
					$stm->bindValue(6, $meta_keywords);
					$stm->bindValue(7, $meta_description);
					$stm->bindValue(8, $urlAmigavel);
					$stm->bindValue(9, $breve);
					$stm->bindValue(10, upload('banner_foto', $pastaArquivos, 'N')); 
					$stm->bindValue(11, upload('sessao1_foto', $pastaArquivos, 'N')); 
					$stm->bindValue(12, upload('sessao2_foto', $pastaArquivos, 'N')); 
					$stm->bindValue(13, upload('sessao4_foto', $pastaArquivos, 'N')); 
					$stm->bindValue(14, upload('topico1_foto', $pastaArquivos, 'N')); 
					$stm->bindValue(15, upload('topico2_foto', $pastaArquivos, 'N')); 
					$stm->bindValue(16, upload('topico3_foto', $pastaArquivos, 'N')); 
					$stm->bindValue(17, upload('topico4_foto', $pastaArquivos, 'N')); 
					$stm->bindValue(18, upload('diferenca1_foto', $pastaArquivos, 'N')); 
					$stm->bindValue(19, upload('diferenca2_foto', $pastaArquivos, 'N')); 
					$stm->bindValue(20, upload('diferenca3_foto', $pastaArquivos, 'N'));
					$stm->bindValue(21, $banner_titulo);
					$stm->bindValue(22, $banner_texto);
					$stm->bindValue(23, $sessao1_titulo);
					$stm->bindValue(24, $sessao1_texto);
					$stm->bindValue(25, $sessao2_titulo);
					$stm->bindValue(26, $sessao2_texto);
					$stm->bindValue(27, $sessao3_titulo);
					$stm->bindValue(28, $sessao3_texto);
					$stm->bindValue(29, $sessao4_titulo);
					$stm->bindValue(30, $sessao4_texto);
					$stm->bindValue(31, $sessao5_titulo);
					$stm->bindValue(32, $sessao5_texto);
					$stm->bindValue(33, $topico1_titulo);
					$stm->bindValue(34, $topico1_texto);
					$stm->bindValue(35, $topico2_titulo);
					$stm->bindValue(36, $topico2_texto);
					$stm->bindValue(37, $topico3_titulo);
					$stm->bindValue(38, $topico3_texto);
					$stm->bindValue(39, $topico4_titulo);
					$stm->bindValue(40, $topico4_texto);
					$stm->bindValue(41, $diferenca1_titulo);
					$stm->bindValue(42, $diferenca1_texto);
					$stm->bindValue(43, $diferenca2_titulo);
					$stm->bindValue(44, $diferenca2_texto);
					$stm->bindValue(45, $diferenca3_titulo);
					$stm->bindValue(46, $diferenca3_texto);
					$stm->bindValue(47, $contato_titulo);
					$stm->bindValue(48, $contato_texto);
					$stm->bindValue(49, upload('imagem_final', $pastaArquivos, 'N'));
					$stm->bindValue(50, upload('imagem_mobile_final', $pastaArquivos, 'N'));
					$stm->bindValue(51, upload('icone', $pastaArquivos, 'N'));
					$stm->bindValue(52, $botao);
					$stm->bindValue(53, $banner_titulo2);
					$stm->bindValue(54, $banner_titulo3);
					$stm->bindValue(55, upload('sessao3_foto', $pastaArquivos, 'N'));
					$stm->bindValue(56, $banner_botao_link);
					$stm->bindValue(57, $banner_botao_nome);
					$stm->bindValue(58, $sessao1_botao_link);
					$stm->bindValue(59, $sessao1_botao_nome); 
					$stm->bindValue(60, $sessao3_botao_link);
					$stm->bindValue(61, $sessao3_botao_nome); 
					$stm->bindValue(62, $sessao4_botao_link);
					$stm->bindValue(63, $sessao4_botao_nome);
					$stm->bindValue(64, upload('sessao6_foto', $pastaArquivos, 'N'));
					$stm->bindValue(65, $sessao6_titulo);
					$stm->bindValue(66, $sessao6_texto);
					$stm->bindValue(67, $sessao6_nome_botao);
					$stm->bindValue(68, $sessao6_link_botao);
					$stm->bindValue(69, $sessao7_titulo);
					$stm->bindValue(70, upload('sessao5_foto', $pastaArquivos, 'N'));
					$stm->bindValue(71, $id);
					$stm->execute(); 
					
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}

				//exit;

				echo "	<script>
							window.location='{$redireciona}';
							</script>";
							exit;
			}
		}
		
		function excluir() {
			if(isset($_GET['acao']) && $_GET['acao'] == 'excluirServico') {
				
				try{   
					$sql = "DELETE FROM tbl_servicos WHERE id=? ";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $_GET['id']);   
					$stm->execute();
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}

				echo "	<script>
								window.location='servicos.php';
								</script>";
								exit;

			}
		}

		function rsCatServicos($id='', $orderBy='', $limite='') {
			
			/// FILTROS
			$nCampos = 0;
			$sql = '';
			$sqlOrdem = ''; 
			$sqlLimite = '';
			if(!empty($id)) {
				$sql .= " and id = ?"; 
				$nCampos++;
				$campo[$nCampos] = $id;
			}
		
			/// ORDEM		
			if(!empty($orderBy)) {
				$sqlOrdem = " order by {$orderBy}";
			}
			
			if(!empty($limite)) {
				$sqlLimite = " limit 0,{$limite}";
			}
			
			try{   
				$sql = "SELECT * FROM tbl_cat_servicos where 1=1 $sql $sqlOrdem $sqlLimite";
				$stm = $this->pdo->prepare($sql);
				
				for($i=1; $i<=$nCampos; $i++) {
					$stm->bindValue($i, $campo[$i]);
				}
				
				$stm->execute();
				$rsDados = $stm->fetchAll(PDO::FETCH_OBJ);
				//print_r($rsDados);
				if($id <> '' or $limite == 1) {
					return($rsDados[0]);
				} else {
					return($rsDados);
				}
			} catch(PDOException $erro){   
				echo $erro->getMessage(); 
			}
		}

	}
	
	$ServicosInstanciada = 'S';
}