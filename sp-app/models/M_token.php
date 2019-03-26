<?php

class M_token extends CI_Model {
	function get($qtd){ 
		//Under the string $Caracteres you write all the characters you want to be used to randomly generate the code. 
		$Caracteres = 'ABCDEFGHIJKLMNPQRSTUVWXYZ12345789'; 
		// $Caracteres .= 'abcdefghijklmnpqrstuvwxyz'; 
		// $Caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
		// $Caracteres = '123456789'; 
		$QuantidadeCaracteres = strlen($Caracteres); 
		$QuantidadeCaracteres--; 
		$Hash=NULL; 
		for($x=1;$x<=$qtd;$x++){ 
				$Posicao = rand(0,$QuantidadeCaracteres); 
				$Hash .= substr($Caracteres,$Posicao,1); 
		} 
		return $Hash; 
	} 
	function get_pwd($qtd){ 
		//Under the string $Caracteres you write all the characters you want to be used to randomly generate the code. 
		$Caracteres = 'ABCDEFGHIJKLMNPQRSTUVWXYZ12345789'; 
		$Caracteres .= 'abcdefghijklmnpqrstuvwxyz'; 
		// $Caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
		// $Caracteres = '123456789'; 
		$QuantidadeCaracteres = strlen($Caracteres); 
		$QuantidadeCaracteres--; 
		$Hash=NULL; 
		for($x=1;$x<=$qtd;$x++){ 
				$Posicao = rand(0,$QuantidadeCaracteres); 
				$Hash .= substr($Caracteres,$Posicao,1); 
		} 
		return $Hash; 
	} 

}
