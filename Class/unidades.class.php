<?php
@ session_start();
$UnidadesInstanciada = '';
if(empty($UnidadesInstanciada)) {
	if(file_exists('Connection/conexao.php')) {
		require_once('Connection/con-pdo.php');
		require_once('funcoes.php');
	} else {
		require_once('../Connection/con-pdo.php');
		require_once('../funcoes.php');
	}
	
	class Unidades {
		
		private $pdo = null;  

		private static $Unidades = null; 

		private function __construct($conexao){  
			$this->pdo = $conexao;  
		}
	  
		public static function getInstance($conexao){   
			if (!isset(self::$Unidades)):    
				self::$Unidades = new Unidades($conexao);   
			endif;
			return self::$Unidades;    
		}
		
	
		function rsDados($id='', $orderBy='', $limite='', $url_amigavel='') {
			
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
			if(!empty($url_amigavel)) {
				$sql .= " and url_amigavel = ?"; 
				$nCampos++;
				$campo[$nCampos] = $url_amigavel;
			}
			try{   
				$sql = "SELECT * FROM tbl_unidades where 1=1 $sql $sqlOrdem $sqlLimite";
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
			if(isset($_POST['acao']) && $_POST['acao'] == 'addUnidade') {

				
				$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
				$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
				$horario = filter_input(INPUT_POST, 'horario', FILTER_SANITIZE_STRING);
				$id_galeria = filter_input(INPUT_POST, 'id_galeria', FILTER_SANITIZE_STRING);
				$mapa = filter_input(INPUT_POST, 'mapa', FILTER_SANITIZE_STRING);
				$id_estado = filter_input(INPUT_POST, 'id_estado', FILTER_SANITIZE_STRING);
				$urlAmigavel = gerarTituloSEO($nome);
				$meta_title = filter_input(INPUT_POST, 'meta_title', FILTER_SANITIZE_STRING);
				$meta_keywords = filter_input(INPUT_POST, 'meta_keywords', FILTER_SANITIZE_STRING);
				$meta_description = filter_input(INPUT_POST, 'meta_description', FILTER_SANITIZE_STRING);
				$link_maps = filter_input(INPUT_POST, 'link_maps', FILTER_SANITIZE_STRING);
				$link_waze= filter_input(INPUT_POST, 'link_waze', FILTER_SANITIZE_STRING);
				$telefone= filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
				$whatsapp= filter_input(INPUT_POST, 'whatsapp', FILTER_SANITIZE_STRING);

					try{
                        						if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}
						
						$sql = "INSERT INTO tbl_unidades (nome, endereco, horario, id_galeria, mapa, foto, banner, id_estado, url_amigavel, meta_title, meta_keywords, meta_description, link_maps, link_waze, telefone, whatsapp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";   
						$stm = $this->pdo->prepare($sql);   
						$stm->bindValue(1, $nome);   
						$stm->bindValue(2, $endereco);
						$stm->bindValue(3, $horario);
						$stm->bindValue(4, $id_galeria);
						$stm->bindValue(5, $mapa);
						$stm->bindValue(6, upload('foto', $pastaArquivos, 'N'));
						$stm->bindValue(7, upload('banner', $pastaArquivos, 'N'));
						$stm->bindValue(8, $id_estado);
						$stm->bindValue(9, $urlAmigavel);
						$stm->bindValue(10, $meta_title);
						$stm->bindValue(11, $meta_keywords);
						$stm->bindValue(12, $meta_description);
						$stm->bindValue(13, $link_maps);
						$stm->bindValue(14, $link_waze);
						$stm->bindValue(15, $telefone);
						$stm->bindValue(16, $whatsapp);
						$stm->execute(); 
						$idUnidade = $this->pdo->lastInsertId();
						
						if($redireciona == '') {
							$redireciona = '.';
						}
						
						
					} catch(PDOException $erro){
						echo $erro->getMessage(); 
			
					}
					//exit;
                    
                         echo "	<script>
					if(confirm('Gostaria de inserir imagens?')){;
								window.location='fotos.php?referencia=Unidade&relacionamento=$idUnidade';
					}else{
					    window.location='unidades.php';
					}
								</script>";
								exit;
				
			}
		}
		
		function editar($redireciona='unidades.php') {
		   
			if(isset($_POST['acao']) && $_POST['acao'] == 'editarUnidade') {

				$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
				$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
				$horario = filter_input(INPUT_POST, 'horario', FILTER_SANITIZE_STRING);
				$id_galeria = filter_input(INPUT_POST, 'id_galeria', FILTER_SANITIZE_STRING);
				$mapa = filter_input(INPUT_POST, 'mapa', FILTER_SANITIZE_STRING);
				$id_estado = filter_input(INPUT_POST, 'id_estado', FILTER_SANITIZE_STRING);
				$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
				$urlAmigavel = gerarTituloSEO($nome);
				$meta_title = filter_input(INPUT_POST, 'meta_title', FILTER_SANITIZE_STRING);
				$meta_keywords = filter_input(INPUT_POST, 'meta_keywords', FILTER_SANITIZE_STRING);
				$meta_description = filter_input(INPUT_POST, 'meta_description', FILTER_SANITIZE_STRING);
				$link_maps = filter_input(INPUT_POST, 'link_maps', FILTER_SANITIZE_STRING);
				$link_waze= filter_input(INPUT_POST, 'link_waze', FILTER_SANITIZE_STRING);
				$telefone= filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
				$whatsapp= filter_input(INPUT_POST, 'whatsapp', FILTER_SANITIZE_STRING);				
				try { 
				    if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}

					$sql = "UPDATE tbl_unidades SET nome=?, endereco=?, horario=?, id_galeria=?, mapa=?, foto=?, banner=?, id_estado=?, url_amigavel=?, meta_title=?, meta_keywords=?, meta_description=?, link_maps=?, link_waze=?, telefone=?, whatsapp=?  WHERE id=?";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $nome);   
					$stm->bindValue(2, $endereco);
					$stm->bindValue(3, $horario);
					$stm->bindValue(4, $id_galeria);
					$stm->bindValue(5, $mapa);
					$stm->bindValue(6, upload('foto', $pastaArquivos, 'N'));
					$stm->bindValue(7, upload('banner', $pastaArquivos, 'N'));
					$stm->bindValue(8, $id_estado);
					$stm->bindValue(9, $urlAmigavel);
					$stm->bindValue(10, $meta_title);
					$stm->bindValue(11, $meta_keywords);
					$stm->bindValue(12, $meta_description);
					$stm->bindValue(13, $link_maps);
					$stm->bindValue(14, $link_waze);
					$stm->bindValue(15, $telefone);
					$stm->bindValue(16, $whatsapp);
					$stm->bindValue(17, $id); 
					
					$stm->execute(); 
					
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
					exit;
				}
				//exit;
				echo "	<script>
							window.location='{$redireciona}';
							</script>";
							exit;
			}
		}
		function excluir() {
			if(isset($_GET['acao']) && $_GET['acao'] == 'excluirUnidade') {
				
				try{   
					$sql = "DELETE FROM tbl_unidades WHERE id=? ";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $_GET['id']);   
					$stm->execute();
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}
				echo "	<script>
								window.location='unidades.php';
								</script>";
								exit;

			}
		}

	
	}
	
	
	$UnidadesInstanciada = 'S';
}