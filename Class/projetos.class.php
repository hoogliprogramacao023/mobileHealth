<?php
@ session_start();
$ProjetosInstanciada = '';
if(empty($ProjetosInstanciada)) {
	if(file_exists('Connection/conexao.php')) {
		require_once('Connection/con-pdo.php');
		require_once('funcoes.php');
	} else {
		require_once('../Connection/con-pdo.php');
		require_once('../funcoes.php');
	}
	
	class Projetos {
		
		private $pdo = null;  

		private static $Projetos = null; 

		private function __construct($conexao){  
			$this->pdo = $conexao;  
		}
	  
		public static function getInstance($conexao){   
			if (!isset(self::$Projetos)):    
				self::$Projetos = new Projetos($conexao);   
			endif;
			return self::$Projetos;    
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
				$sql .= " and id_categoria = ?"; 
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
				$sql = "SELECT * FROM tbl_projetos where 1=1 $sql $sqlOrdem $sqlLimite";
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

		function add() {
			if(isset($_POST['acao']) && $_POST['acao'] == 'addProjeto') {
	
				if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
					$titulo = $_POST['titulo'];
				}else{
					$titulo = '';	
				}
				if(isset($_POST['texto']) && !empty($_POST['texto'])){
					$texto = $_POST['texto'];
				}else{
					$texto = '';	
				}
				if(isset($_POST['breve']) && !empty($_POST['breve'])){
					$breve = $_POST['breve'];
				}else{
					$breve = '';	
				}
				if(isset($_POST['url_amigavel']) && !empty($_POST['url_amigavel'])){
					$urlAmigavel = $_POST['url_amigavel'];
				}else{
					$urlAmigavel = gerarTituloSEO($titulo);	
				}
				$id_categoria = filter_input(INPUT_POST, 'id_categoria', FILTER_SANITIZE_STRING);
				$meta_title = filter_input(INPUT_POST, 'meta_title', FILTER_SANITIZE_STRING);
				$meta_keywords = filter_input(INPUT_POST, 'meta_keywords', FILTER_SANITIZE_STRING);
				$meta_description = filter_input(INPUT_POST, 'meta_description', FILTER_SANITIZE_STRING);
				
					try{

						if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}

						$sql = "INSERT INTO tbl_projetos (titulo, texto, id_categoria, url_amigavel, foto, meta_title, meta_description, meta_keywords, breve, foto_principal) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";   
						$stm = $this->pdo->prepare($sql);   
						$stm->bindValue(1, $titulo);
						$stm->bindValue(2, $texto);
						$stm->bindValue(3, $id_categoria);
						$stm->bindValue(4, $urlAmigavel);
						$stm->bindValue(5, upload('foto', $pastaArquivos, 'N')); 
						$stm->bindValue(6, $meta_title);
						$stm->bindValue(7, $meta_description); 
						$stm->bindValue(8, $meta_keywords);
						$stm->bindValue(9, $breve);
						$stm->bindValue(10, upload('foto_principal', $pastaArquivos, 'N'));
						$stm->execute(); 
						$idProjeto = $this->pdo->lastInsertId();
						
					
						
					} catch(PDOException $erro){
						echo $erro->getMessage(); 
					}

					echo "	<script>
					if(confirm(Gostaria de inserir imagens?)){
						window.location='fotos.php?referencia=Projetos&relacionamento=$idProjeto';
					}else{
						window.location='projetos.php';
					}
					</script>";
					exit;
				
			}
		}
		
		function editar($redireciona='projetos.php') {
			if(isset($_POST['acao']) && $_POST['acao'] == 'editaProjeto') {

				if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
					$titulo = $_POST['titulo'];
				}else{
					$titulo = '';	
				}
				if(isset($_POST['texto']) && !empty($_POST['texto'])){
					$texto = $_POST['texto'];
				}else{
					$texto = '';	
				}
				if(isset($_POST['breve']) && !empty($_POST['breve'])){
					$breve = $_POST['breve'];
				}else{
					$breve = '';	
				}
				if(isset($_POST['url_amigavel']) && !empty($_POST['url_amigavel'])){
					$urlAmigavel = $_POST['url_amigavel'];
				}else{
					$urlAmigavel = gerarTituloSEO($titulo);	
				}
				$id_categoria = filter_input(INPUT_POST, 'id_categoria', FILTER_SANITIZE_STRING);
				$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
				$meta_title = filter_input(INPUT_POST, 'meta_title', FILTER_SANITIZE_STRING);
				$meta_keywords = filter_input(INPUT_POST, 'meta_keywords', FILTER_SANITIZE_STRING);
				$meta_description = filter_input(INPUT_POST, 'meta_description', FILTER_SANITIZE_STRING);
				
				try { 

					if(file_exists('Connection/conexao.php')) {
						$pastaArquivos = 'img';
					} else {
						$pastaArquivos = '../img';
					}

					$sql = "UPDATE tbl_projetos SET titulo=?, texto=?, id_categoria=?, url_amigavel=?, foto=?, meta_title=?, meta_description=?, meta_keywords=?, breve=?, foto_principal=? WHERE id=?";
					$stm = $this->pdo->prepare($sql);
					$stm->bindValue(1, $titulo);
					$stm->bindValue(2, $texto);
					$stm->bindValue(3, $id_categoria);
					$stm->bindValue(4, $urlAmigavel);
					$stm->bindValue(5, upload('foto', $pastaArquivos, 'N')); 
					$stm->bindValue(6, $meta_title);
					$stm->bindValue(7, $meta_description); 
					$stm->bindValue(8, $meta_keywords);
					$stm->bindValue(9, $breve);
					$stm->bindValue(10, upload('foto_principal', $pastaArquivos, 'N'));
					$stm->bindValue(11, $id);
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
			if(isset($_GET['acao']) && $_GET['acao'] == 'excluirProjeto') {
				
				try{   
					$sql = "DELETE FROM tbl_projetos WHERE id=? ";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $_GET['id']);   
					$stm->execute();
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}

				echo "	<script>
								window.location='projetos.php';
								</script>";
								exit;

			}
		}

	}
	
	$ProjetosInstanciada = 'S';
}