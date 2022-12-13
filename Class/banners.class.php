<?php
@ session_start();
$BannersInstanciada = '';
if(empty($BannersInstanciada)) {
	if(file_exists('Connection/conexao.php')) {
		require_once('Connection/con-pdo.php');
		require_once('funcoes.php');
	} else {
		require_once('../Connection/con-pdo.php');
		require_once('../funcoes.php');
	}
	
	class Banners {
		
		private $pdo = null;  

		private static $Banners = null; 

		private function __construct($conexao){  
			$this->pdo = $conexao;  
		}
	  
		public static function getInstance($conexao){   
			if (!isset(self::$Banners)):    
				self::$Banners = new Banners($conexao);   
			endif;
			return self::$Banners;    
		}
		
	
		function rsDados($id='', $orderBy='', $limite='') {
			
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
				$sql = "SELECT * FROM tbl_sliders where 1=1 $sql $sqlOrdem $sqlLimite";
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
			if(isset($_POST['acao']) && $_POST['acao'] == 'addBanner') {

				
				$titulo1 	= $_POST['titulo1'];
				$titulo2 	= $_POST['titulo2'];
				$breve 		= $_POST['breve'];
				$tem_botao  = $_POST['tem_botao'];
				$nome_botao = $_POST['nome_botao'];
				$link_botao = $_POST['link_botao'];
				$embed 		= $_POST['embed'];
				$tem_video 	= $_POST['tem_video'];
				$lado_texto 	= $_POST['lado_texto'];
				
					try{

						if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}
						
						$sql = "INSERT INTO tbl_sliders (foto, titulo1, titulo2, breve, tem_botao, nome_botao, link_botao, lado_texto, imagem_mobile, embed, icone, tem_video) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";   
						$stm = $this->pdo->prepare($sql);   
						$stm->bindValue(1, upload('foto', $pastaArquivos, 'N'));   
						$stm->bindValue(2, $titulo1);   
						$stm->bindValue(3, $titulo2);   
						$stm->bindValue(4, $breve);
						$stm->bindValue(5, $tem_botao);
						$stm->bindValue(6, $nome_botao);
						$stm->bindValue(7, $link_botao);
						$stm->bindValue(8, $lado_texto);
						$stm->bindValue(9, upload('imagem_mobile', $pastaArquivos, 'N')); 
						$stm->bindValue(10, $embed);
						$stm->bindValue(11, upload('icone', $pastaArquivos, 'N')); 
						$stm->bindValue(12, $tem_video); 
						
						$stm->execute(); 
						$idBanner = $this->pdo->lastInsertId();
						
					} catch(PDOException $erro){
						echo $erro->getMessage(); 
					}
					//exit;
					echo "	<script>
								window.location='banners.php';
								</script>";
								exit;
				
			}
		}
		
		function editar($redireciona='banners.php') {
			if(isset($_POST['acao']) && $_POST['acao'] == 'editaBanner') {
				$titulo1 	= $_POST['titulo1'];
				$titulo2 	= $_POST['titulo2'];
				if(isset($_POST['breve']) && !empty($_POST['breve'])) {
					$breve 		= $_POST['breve'];
				} else {
					$breve 		=  null;
				}
				$tem_botao  = $_POST['tem_botao'];
				$nome_botao = $_POST['nome_botao'];
				$link_botao = $_POST['link_botao'];
				$embed 		= $_POST['embed'];
				$tem_video 	= $_POST['tem_video'];
				if(isset($_POST['lado_texto']) && !empty($_POST['lado_texto'])) {
					$lado_texto 	= $_POST['lado_texto'];
				} else {
					$lado_texto 		=  null;
				}
				$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
				try { 

					if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}
				
					$sql = "UPDATE tbl_sliders SET foto=?, titulo1=?, titulo2=?, breve=?, tem_botao=?, nome_botao=?, link_botao=?, lado_texto=?, imagem_mobile=?, embed=?, icone=?, tem_video=? WHERE id=?";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, upload('foto', $pastaArquivos, 'N'));   
					$stm->bindValue(2, $titulo1);   
					$stm->bindValue(3, $titulo2);   
					$stm->bindValue(4, $breve);
					$stm->bindValue(5, $tem_botao);
					$stm->bindValue(6, $nome_botao);
					$stm->bindValue(7, $link_botao);
					$stm->bindValue(8, $lado_texto);
					$stm->bindValue(9, upload('imagem_mobile', $pastaArquivos, 'N'));
					$stm->bindValue(10, $embed); 
					$stm->bindValue(11, upload('icone', $pastaArquivos, 'N'));
					$stm->bindValue(12, $tem_video);
					$stm->bindValue(13, $id);   
					$stm->execute(); 
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}
				echo "	<script>
							window.location='{$redireciona}';
							</script>";
							exit;
			}
		}
		
		function excluir() {
			if(isset($_GET['acao']) && $_GET['acao'] == 'excluirBanner') {
				
				try{   
					$sql = "DELETE FROM tbl_sliders WHERE id=? ";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $_GET['id']);   
					$stm->execute();
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}
				echo "	<script>
								window.location='banners.php';
								</script>";
								exit;

			}
		}
	}
	
	$BannersInstanciada = 'S';
}