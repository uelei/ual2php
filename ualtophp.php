#!/usr/bin/php
<?php 



$file = file_get_contents($argv[1]);

//remover prog e fim
//$remover = array('prog','fim'); 
$file = str_replace("prog ", " <?php ///",$file);
$file = str_replace("fimprog", " ?>",$file);
$file = str_replace("imprima", "echo",$file);
$file = str_replace("<-", "=",$file);


//encontrando primeira declaracao de int 
$posicaoIntInicial = strpos($file,"int ");
//encontrando o fim da linha 
$posicaoIntFinal = strpos($file,";",$posicaoIntInicial);
//pegando as variaveis 
$variaveisIntS = substr($file,$posicaoIntInicial,$posicaoIntFinal-$posicaoIntInicial);
//$variaveisInt = ;
//declarando as variaveis int 
$variaveisInt = explode(',',str_replace(array('int ',';',' '),"",$variaveisIntS));
//limpa a linha variaveis int 
$iInt=0;
$linhaStringvariaveisInt = "";
$file = substr_replace($file," ",$posicaoIntInicial,$posicaoIntFinal-$posicaoIntInicial+1);
foreach ($variaveisInt as $varInt) {
    $s ="(int)$".$varInt;	
	$file = str_replace($varInt,$s,$file);
	$iInt++;
	$linhaStringvariaveisInt = $linhaStringvariaveisInt.$s."=0;\n ";
}
$file = substr_replace($file,$linhaStringvariaveisInt,$posicaoIntInicial,0);









//lendo variaveis via input 
$l = strpos($file,"leia ");
$ll = strpos($file,";",$l);
$lll= $ll - $l;
$idsas = substr($file,$l+5,$lll);
$st ='$handle = fopen ("php://stdin","r");'.explode(";", $idsas)[0].' = fgets($handle)';
$file = substr_replace($file, $st ,$l,$lll);


//substituindo operacao de div 
$file = str_replace("div", "/",$file);

// //salvando 
 $arq= explode(".ual",$argv[1]);
 $arquivo = $arq[0].".php";
 $save = fopen($arquivo,'w');
 echo fwrite($save,$file);
 fclose($save);
echo "convertido \n\n ";
echo "\n\n\n  ";

 ?>