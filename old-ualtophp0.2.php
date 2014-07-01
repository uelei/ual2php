#!/usr/bin/php
<?php 

foreach ($argv as $arg) {
    if ($arg=='-h' ||$arg=='--help') {
        echo "Displaying help!\n";
        //displayHelp();
    }
}



$file = file_get_contents($argv[1]);

//remover prog e fim
//$remover = array('prog','fim'); 
$file = str_replace("prog ", " <?php ///",$file);
$file = str_replace("fimprog", " ?>",$file);
$file = str_replace("imprima", "echo",$file);
$file = str_replace("<-", "=",$file);




// $domain = strstr(strstr($file, 'int'),";",true);


$ints = strstr( $file,'int ');
$var = strstr($ints,';',true);
$var=str_replace("int ","", $var);
$var=str_replace(" ","", $var);
$int=explode(",",$var);
$i=0;
foreach ($int as $intkey) {
	$s ="$".$intkey;	
	$file = str_replace($intkey,$s,$file);
	$i++;
}




$l = strpos($file,"leia ");
//echo $l ;

$ll = strpos($file,";",$l);
//echo $ll;
$lll= $ll - $l;
$idsas = substr($file,$l+5,$lll);
//echo explode(";", $idsas)[0];


$st ='$handle = fopen ("php://stdin","r");'.explode(";", $idsas)[0].' = fgets($handle)';
// substr_replace($file,'', start);
$file = substr_replace($file, $st ,$l,$lll);
// $handle = fopen ("php://stdin","r");
// fgets($handle) :: $line;
// print_r($line);


// //salvando 
 $arq= explode(".ual",$argv[1]);
 $arquivo = $arq[0].".php";
 $save = fopen($arquivo,'w');
 echo fwrite($save,$file);
 fclose($save);
echo "convertido \n\n ";
echo "\n\n\n  ";
//echo $file;

 ?>