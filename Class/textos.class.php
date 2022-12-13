<?php
@ session_start();
$TextosInstanciada = '';
if(empty($TextosInstanciada)) {
	if(file_exists('Connection/conexao.php')) {
		require_once('Connection/con-pdo.php');
		require_once('funcoes.php');
	} else {
		require_once('../Connection/con-pdo.php');
		require_once('../funcoes.php');
	}
	
	class Textos {
		
		private $pdo = null;  

		private static $Textos = null; 

		private function __construct($conexao){  
			$this->pdo = $conexao;  
		}
	  
		public static function getInstance($conexao){   
			if (!isset(self::$Textos)):    
				self::$Textos = new Textos($conexao);   
			endif;
			return self::$Textos;    
		}
		
	
		function rsDados($id='', $orderBy='', $limite='', $pagina_individual='') {
			
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
			if(!empty($pagina_individual)) {
				$sql .= " and pagina_individual = ?"; 
				$nCampos++;
				$campo[$nCampos] = $pagina_individual;
			}

			/// ORDEM		
			if(!empty($orderBy)) {
				$sqlOrdem = " order by {$orderBy}";
			}
			
			if(!empty($limite)) {
				$sqlLimite = " limit 0,{$limite}";
			}
			
			try{   
				$sql = "SELECT * FROM tbl_textos where 1=1 $sql $sqlOrdem $sqlLimite";
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
		
		function editar($redireciona='textos.php') {
			if(isset($_POST['acao']) && $_POST['acao'] == 'editaTexto') {
				if(isset($_POST['titulo_sessao_1']) && !empty($_POST['titulo_sessao_1'])){
					$titulo_sessao_1 = $_POST['titulo_sessao_1'];
				}else{
					$titulo_sessao_1 = '';	
				}
				if(isset($_POST['breve_sessao_1']) && !empty($_POST['breve_sessao_1'])){
					$breve_sessao_1 = $_POST['breve_sessao_1'];
				}else{
					$breve_sessao_1 = '';	
				}
				if(isset($_POST['titulo_sessao_2']) && !empty($_POST['titulo_sessao_2'])){
					$titulo_sessao_2 = $_POST['titulo_sessao_2'];
				}else{
					$titulo_sessao_2 = '';	
				}
				if(isset($_POST['breve_sessao_2']) && !empty($_POST['breve_sessao_2'])){
					$breve_sessao_2 = $_POST['breve_sessao_2'];
				}else{
					$breve_sessao_2 = '';	
				}
				if(isset($_POST['bullet_1_sessao_2']) && !empty($_POST['bullet_1_sessao_2'])){
					$bullet_1_sessao_2 = $_POST['bullet_1_sessao_2'];
				}else{
					$bullet_1_sessao_2 = '';	
				}
				if(isset($_POST['bullet_2_sessao_2']) && !empty($_POST['bullet_2_sessao_2'])){
					$bullet_2_sessao_2 = $_POST['bullet_2_sessao_2'];
				}else{
					$bullet_2_sessao_2 = '';	
				}
				if(isset($_POST['bullet_3_sessao_2']) && !empty($_POST['bullet_3_sessao_2'])){
					$bullet_3_sessao_2 = $_POST['bullet_3_sessao_2'];
				}else{
					$bullet_3_sessao_2 = '';	
				}
				if(isset($_POST['bullet_4_sessao_2']) && !empty($_POST['bullet_4_sessao_2'])){
					$bullet_4_sessao_2 = $_POST['bullet_4_sessao_2'];
				}else{
					$bullet_4_sessao_2 = '';	
				}
				if(isset($_POST['titulo_2_sessao_2']) && !empty($_POST['titulo_2_sessao_2'])){
					$titulo_2_sessao_2 = $_POST['titulo_2_sessao_2'];
				}else{
					$titulo_2_sessao_2 = '';	
				}
				if(isset($_POST['breve_card_1_sessao_2']) && !empty($_POST['breve_card_1_sessao_2'])){
					$breve_card_1_sessao_2 = $_POST['breve_card_1_sessao_2'];
				}else{
					$breve_card_1_sessao_2 = '';	
				}
				if(isset($_POST['breve_card_2_sessao_2']) && !empty($_POST['breve_card_2_sessao_2'])){
					$breve_card_2_sessao_2 = $_POST['breve_card_2_sessao_2'];
				}else{
					$breve_card_2_sessao_2 = '';	
				}
				if(isset($_POST['breve_card_3_sessao_2']) && !empty($_POST['breve_card_3_sessao_2'])){
					$breve_card_3_sessao_2 = $_POST['breve_card_3_sessao_2'];
				}else{
					$breve_card_3_sessao_2 = '';	
				}
				if(isset($_POST['breve_card_4_sessao_2']) && !empty($_POST['breve_card_4_sessao_2'])){
					$breve_card_4_sessao_2 = $_POST['breve_card_4_sessao_2'];
				}else{
					$breve_card_4_sessao_2 = '';	
				}
				if(isset($_POST['titulo_botao_sessao_2']) && !empty($_POST['titulo_botao_sessao_2'])){
					$titulo_botao_sessao_2 = $_POST['titulo_botao_sessao_2'];
				}else{
					$titulo_botao_sessao_2 = '';	
				}
				if(isset($_POST['titulo_sessao_3']) && !empty($_POST['titulo_sessao_3'])){
					$titulo_sessao_3 = $_POST['titulo_sessao_3'];
				}else{
					$titulo_sessao_3 = '';	
				}
				if(isset($_POST['titulo_botao_sessao_3']) && !empty($_POST['titulo_botao_sessao_3'])){
					$titulo_botao_sessao_3 = $_POST['titulo_botao_sessao_3'];
				}else{
					$titulo_botao_sessao_3 = '';	
				}
				if(isset($_POST['titulo_sessao_4']) && !empty($_POST['titulo_sessao_4'])){
					$titulo_sessao_4 = $_POST['titulo_sessao_4'];
				}else{
					$titulo_sessao_4 = '';	
				}
				if(isset($_POST['subtitulo_sessao_4']) && !empty($_POST['subtitulo_sessao_4'])){
					$subtitulo_sessao_4 = $_POST['subtitulo_sessao_4'];
				}else{
					$subtitulo_sessao_4 = '';	
				}
				if(isset($_POST['breve_sessao_4']) && !empty($_POST['breve_sessao_4'])){
					$breve_sessao_4 = $_POST['breve_sessao_4'];
				}else{
					$breve_sessao_4 = '';	
				}
				if(isset($_POST['breve_2_sessao_4']) && !empty($_POST['breve_2_sessao_4'])){
					$breve_2_sessao_4 = $_POST['breve_2_sessao_4'];
				}else{
					$breve_2_sessao_4 = '';	
				}
				if(isset($_POST['titulo_botao_sessao_4']) && !empty($_POST['titulo_botao_sessao_4'])){
					$titulo_botao_sessao_4 = $_POST['titulo_botao_sessao_4'];
				}else{
					$titulo_botao_sessao_4 = '';	
				}
				if(isset($_POST['titulo_sessao_5']) && !empty($_POST['titulo_sessao_5'])){
					$titulo_sessao_5 = $_POST['titulo_sessao_5'];
				}else{
					$titulo_sessao_5 = '';	
				}
				if(isset($_POST['titulo_botao_sessao_5']) && !empty($_POST['titulo_botao_sessao_5'])){
					$titulo_botao_sessao_5 = $_POST['titulo_botao_sessao_5'];
				}else{
					$titulo_botao_sessao_5 = '';	
				}
				if(isset($_POST['titulo_sessao_6']) && !empty($_POST['titulo_sessao_6'])){
					$titulo_sessao_6 = $_POST['titulo_sessao_6'];
				}else{
					$titulo_sessao_6 = '';	
				}
				if(isset($_POST['subtitulo_sessao_6']) && !empty($_POST['subtitulo_sessao_6'])){
					$subtitulo_sessao_6 = $_POST['subtitulo_sessao_6'];
				}else{
					$subtitulo_sessao_6 = '';	
				}
				if(isset($_POST['titulo_2_sessao_6']) && !empty($_POST['titulo_2_sessao_6'])){
					$titulo_2_sessao_6 = $_POST['titulo_2_sessao_6'];
				}else{
					$titulo_2_sessao_6 = '';	
				}
				//$texto = htmlentities(filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_STRING));
				if(isset($_POST['texto']) && !empty($_POST['texto'])){
					$texto = $_POST['texto'];
				}else{
					$texto = '';	
				}
				
				
				$embed = filter_input(INPUT_POST, 'embed', FILTER_SANITIZE_STRING);
				$link_botao_sessao_2 = filter_input(INPUT_POST, 'link_botao_sessao_2', FILTER_SANITIZE_STRING);
				$link_botao_sessao_3 = filter_input(INPUT_POST, 'link_botao_sessao_3', FILTER_SANITIZE_STRING);
				$link_botao_sessao_4 = filter_input(INPUT_POST, 'link_botao_sessao_4', FILTER_SANITIZE_STRING);
				$link_botao_sessao_5 = filter_input(INPUT_POST, 'link_botao_sessao_5', FILTER_SANITIZE_STRING);
				$meta_title = filter_input(INPUT_POST, 'meta_title', FILTER_SANITIZE_STRING);
				$meta_keywords = filter_input(INPUT_POST, 'meta_keywords', FILTER_SANITIZE_STRING);
				$meta_description = filter_input(INPUT_POST, 'meta_description', FILTER_SANITIZE_STRING);
				$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
				$pagina_individual = filter_input(INPUT_POST, 'pagina_individual', FILTER_SANITIZE_STRING);
				try { 
					if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}
					
					$sql = "UPDATE tbl_textos SET titulo_sessao_1=?, breve_sessao_1=?, imagem_sessao_1=?, embed=?, imagem_fundo_sessao_1=?, titulo_sessao_2=?, breve_sessao_2=?, imagem_sessao_2=?, bullet_1_sessao_2=?, bullet_2_sessao_2=?, bullet_3_sessao_2=?, bullet_4_sessao_2=?, titulo_2_sessao_2=?, breve_card_1_sessao_2=?, breve_card_2_sessao_2=?, breve_card_3_sessao_2=?, breve_card_4_sessao_2=?, titulo_botao_sessao_2=?, link_botao_sessao_2=?, titulo_sessao_3=?, imagem_fundo_sessao_3=?, titulo_botao_sessao_3=?, link_botao_sessao_3=?, titulo_sessao_4=?, subtitulo_sessao_4=?, breve_sessao_4=?, imagem_sessao_4=?, breve_2_sessao_4=?, titulo_botao_sessao_4=?, link_botao_sessao_4=?, titulo_sessao_5=?, titulo_botao_sessao_5=?, link_botao_sessao_5=?, imagem_sessao_6=?, titulo_sessao_6=?, subtitulo_sessao_6=?, titulo_2_sessao_6=? WHERE id=?";   
					$stm = $this->pdo->prepare($sql);  
					$stm->bindValue(1, $titulo_sessao_1);
					$stm->bindValue(2, $breve_sessao_1);
					$stm->bindValue(3, upload('imagem_sessao_1', $pastaArquivos, 'N'));
					$stm->bindValue(4, $embed);
					$stm->bindValue(5, upload('imagem_fundo_sessao_1', $pastaArquivos, 'N'));
					$stm->bindValue(6, $titulo_sessao_2);
					$stm->bindValue(7, $breve_sessao_2);
					$stm->bindValue(8, upload('imagem_sessao_2', $pastaArquivos, 'N'));
					$stm->bindValue(9, $bullet_1_sessao_2);
					$stm->bindValue(10, $bullet_2_sessao_2);
					$stm->bindValue(11, $bullet_3_sessao_2);
					$stm->bindValue(12, $bullet_4_sessao_2);
					$stm->bindValue(13, $titulo_2_sessao_2);
					$stm->bindValue(14, $breve_card_1_sessao_2);
					$stm->bindValue(15, $breve_card_2_sessao_2);
					$stm->bindValue(16, $breve_card_3_sessao_2);
					$stm->bindValue(17, $breve_card_4_sessao_2);
					$stm->bindValue(18, $titulo_botao_sessao_2);
					$stm->bindValue(19, $link_botao_sessao_2);
					$stm->bindValue(20, $titulo_sessao_3);
					$stm->bindValue(21, upload('imagem_fundo_sessao_3', $pastaArquivos, 'N'));
					$stm->bindValue(22, $titulo_botao_sessao_3);
					$stm->bindValue(23, $link_botao_sessao_3);
					$stm->bindValue(24, $titulo_sessao_4);
					$stm->bindValue(25, $subtitulo_sessao_4);
					$stm->bindValue(26, $breve_sessao_4);
					$stm->bindValue(27, upload('imagem_sessao_4', $pastaArquivos, 'N'));
					$stm->bindValue(28, $breve_2_sessao_4);
					$stm->bindValue(29, $titulo_botao_sessao_4);
					$stm->bindValue(30, $link_botao_sessao_4);
					$stm->bindValue(31, $titulo_sessao_5);
					$stm->bindValue(32, $titulo_botao_sessao_5);
					$stm->bindValue(33, $link_botao_sessao_5);
					$stm->bindValue(34, upload('imagem_sessao_6', $pastaArquivos, 'N'));
					$stm->bindValue(35, $titulo_sessao_6);
					$stm->bindValue(36, $subtitulo_sessao_6);
					$stm->bindValue(37, $titulo_2_sessao_6);
					$stm->bindValue(38, $id);   
					$stm->execute(); 
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}
				// 	exit;
				if($pagina_individual == 'S'){
					echo "	<script>
							alert('Modificado com sucesso!');
							window.location='editar-texto.php?pi=S&id=$id';
						</script>";
						exit;
				}else{
				echo "	<script>
							window.location='{$redireciona}';
						</script>";
						exit;
				}
			}
		}
		
	
	}
	
	$TextosInstanciada = 'S';
}