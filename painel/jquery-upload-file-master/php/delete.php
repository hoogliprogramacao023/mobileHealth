<?php
session_start();

if(isset($_SESSION['fotosUp']) && !empty($_SESSION['fotosUp'])) {
	if(isset($_GET['arq']) && !empty($_GET['arq'])) {
		$arquivo = substr($_GET['arq'],2,-2);
		unlink("uploads/{$arquivo}");
		
		$key = array_search($arquivo, $_SESSION['fotosUp']);
		if($key !== false){
			unset($_SESSION['fotosUp'][$key]);
		}
	}
}
?>