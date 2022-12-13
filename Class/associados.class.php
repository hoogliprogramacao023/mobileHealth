<?php
@ session_start();
$AssociadosInstanciada = '';
if(empty($AssociadosInstanciada)) {
	if(file_exists('Connection/conexao.php')) {
		require_once('Connection/con-pdo.php');
		require_once('funcoes.php');
	} else {
		require_once('../Connection/con-pdo.php');
		require_once('../funcoes.php');
	}
	
	class Associados {
		
		private $pdo = null;  

		private static $Associados = null; 

		private function __construct($conexao){  
			$this->pdo = $conexao;  
		}
	  
		public static function getInstance($conexao){   
			if (!isset(self::$Associados)):    
				self::$Associados = new Associados($conexao);   
			endif;
			return self::$Associados;    
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
				$sql = "SELECT * FROM tbl_associado where 1=1 $sql $sqlOrdem $sqlLimite";
				$stm = $this->pdo->prepare($sql);
				
				for($i=1; $i<=$nCampos; $i++) {
					$stm->bindValue($i, $campo[$i]);
				}
				
				$stm->execute();
				$rsDados = $stm->fetchAll(PDO::FETCH_OBJ);
				//print_r($rsDados);

				return($rsDados);
			} catch(PDOException $erro){   
				echo $erro->getMessage(); 
			}
		}

		function add($redireciona='') {
			if(isset($_POST['acao']) && $_POST['acao'] == 'addAssociado') {
			    
				$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
				$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
				$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
				$idEstado = $_POST['id_estado'];
				$profissao = $_POST['profissao'];
				
					try{
						$sql = "INSERT INTO tbl_associado (nome, telefone, id_estado, cidade, profissao) VALUES (?, ?, ?, ?, ?)";   
						$stm = $this->pdo->prepare($sql);   
    					$stm->bindValue(1, $nome);   
    					$stm->bindValue(2, $telefone);   
    					$stm->bindValue(3, $idEstado); 
    					$stm->bindValue(4, $cidade); 
    					$stm->bindValue(5, $profissao); 
						$stm->execute(); 
						
						if($redireciona == '') {
							$redireciona = '.';
						}
						
					} catch(PDOException $erro){
						echo $erro->getMessage(); 
					}
					echo "	<script>
								window.location='associados.php';
								</script>";
								exit;
			}
		}
		
		function editar($redireciona='associados.php') {
			if(isset($_POST['acao']) && $_POST['acao'] == 'editaAssociado') {
			    
				$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
				$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
				$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
				$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
				$idEstado = $_POST['id_estado'];
				$profissao = $_POST['profissao'];
				
				try { 
					$sql = "UPDATE tbl_associado SET nome=?, telefone=?, id_estado=?, cidade=?, profissao=? WHERE id=?";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $nome);   
					$stm->bindValue(2, $telefone);   
					$stm->bindValue(3, $idEstado); 
					$stm->bindValue(4, $cidade);
					$stm->bindValue(5, $profissao); 
					$stm->bindValue(6, $id);   
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
			if(isset($_GET['acao']) && $_GET['acao'] == 'excluirAssociado') {
				
				try{   
					$sql = "DELETE FROM tbl_associado WHERE id=? ";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $_GET['id']);   
					$stm->execute();
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}
				echo "	<script>
								window.location='associados.php';
								</script>";
								exit;

			}
		}
	}
	
	$AssociadosInstanciada = 'S';
}