#!/usr/bin/php
<?php 
include "ual2phpfunc.php";

$file = file_get_contents($argv[1]);
//remover prog e fim
//$remover = array('prog','fim'); 
$file = str_replace("prog ", " <?php /// ",$file);
$file = str_replace("fimprog", " ?>",$file);
$file = str_replace("imprima", "echo",$file);
$file = str_replace("para", "for", $file);
$file = str_replace("<-", "=",$file);

$file = removeVariaveisInt($file);
$file = removeVariaveisReal($file);

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