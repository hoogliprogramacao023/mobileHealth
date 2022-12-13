<?php
@session_start();
$FotosInstanciada == '';
if(isset($FotosInstanciada)) {
	if(file_exists('Connection/conexao.php')) {
		require_once('Connection/con-pdo.php');
		require_once('funcoes.php');
	} else {
		require_once('../Connection/con-pdo.php');
		require_once('../funcoes.php');
	}
	
	class Fotos {

		private $pdo = null;  

		private static $Fotos = null; 

		private function __construct($conexao){  
			$this->pdo = $conexao;  
		}
	  
		public static function getInstance($conexao){   
			if (!isset(self::$Fotos)):    
				self::$Fotos = new Fotos($conexao);   
			endif;
			return self::$Fotos;    
		}
		
		
		function rsFotos($id='', $orderBy='', $limite='', $id_relacionamento='') {
			
			$nCampos = 0;
			$sql = '';
			$sqlOrdem = ''; 
			$sqlLimite = '';
			
			if(!empty($id)) {
				$sql .= " and id = ?"; 
				$nCampos++;
				$campo[$nCampos] = $id;
			}
			if(!empty($id_relacionamento)) {
				$sql .= " and id_relacionamento = ?"; 
				$nCampos++;
				$campo[$nCampos] = $id_relacionamento;
			}
			
			if(!empty($orderBy)) {
				$sqlOrdem = "order by {$orderBy}";
			}
			
			if(!empty($limite)) {
				$sqlLimite = " limit 0, {$limite}";
			}
			try{   
			echo	$sql = "SELECT * FROM tbl_fotos where 1=1 $sql $sqlOrdem $sqlLimite";
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
			if(isset($_POST['acao']) && $_POST['acao'] == 'addFotos') {
				
				if($_SESSION['fotosUp'] <> '') {
					for($i=0; $i<count($_SESSION['fotosUp']); $i++) {
						$randLinha = rand(0,999999);
						$nomeBanco = $randLinha.str_replace(array(' ', '(', ')', 'jpeg', '+', '-',"'", '}', '{'), array('', '_', '_', 'jpg', '_', '_', "_", '', ''), retiraAcentos($_SESSION['fotosUp'][$i]));
						$nomeBanco = substr($nomeBanco,0,-3).'.'.substr($nomeBanco,-3);
						$fotosOk[] = $nomeBanco;
						
						$novoCaminho = "../img/".$nomeBanco;
						
						if($_SESSION['fotosUp'][$i] <> '') {
							rename("jquery-upload-file-master/php/uploads/{$_SESSION['fotosUp'][$i]}", $novoCaminho);
						}
						//exit;
					}
					
					for($i=0; $i<=count($fotosOk); $i++) {
						if($fotosOk[$i] <> '') {	
							try {
								$sql = "INSERT INTO tbl_fotos (id_relacionamento, foto, referencia) VALUES (?, ?, ?)";   
								$stm = $this->pdo->prepare($sql);   
								$stm->bindValue(1, $_POST['relacionamento']);   
								$stm->bindValue(2, $fotosOk[$i]);   
								$stm->bindValue(3, $_POST['referencia']);   
								$stm->execute(); 
							} catch(PDOException $erro){
								echo $erro->getMessage();
							}
						}
					}
				} 
				
				echo "	<script>
						window.location='fotos.php?referencia={$_POST['referencia']}&relacionamento={$_POST['relacionamento']}'
						</script>";
						exit;
			}
		}
		
		function excluir() {
			if(isset($_POST['acao']) && $_GET['acao'] == 'excluirFoto') {
				// deleta foto
				if($_GET['foto'] <> '') {
					unlink ("../img/{$_GET['foto']}");
				}
				
				try{   
					$sql = "DELETE FROM tbl_fotos WHERE id=? ";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $_GET['id_foto']);   
					$stm->execute();
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}
			}
		}
		
		function editarLegenda() {
			if(isset($_POST['acao']) && $_GET['acao'] == 'editarLegendaFoto') {
				try{   
					$sql = "UPDATE tbl_fotos SET titulo=? WHERE id=?";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $_GET['titulo']);   
					$stm->bindValue(2, $_GET['id']);   
					$stm->execute();
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}
				exit;
			}
		}
		
	}
	
	$FotosInstanciada = 'S';
}