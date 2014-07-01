<?php 
function removeVariaveisInt($fi)
{
	//encontrando primeira declaracao de int 
	$posicaoIntInicial = strpos($fi,"int");
	if($posicaoIntInicial){//encontrando o fim da linha 
		$posicaoIntFinal = strpos($fi,";",$posicaoIntInicial);
		//pegando as variaveis 
		$variaveisIntS = substr($fi,$posicaoIntInicial,$posicaoIntFinal-$posicaoIntInicial);
		//$variaveisInt = ;
		//declarando as variaveis int 
		$variaveisInt = explode(',',str_replace(array('int ',';',' '),"",$variaveisIntS));
		//limpa a linha variaveis int 
		$iInt=0;
		$linhaStringvariaveisInt = "";
		$fi = substr_replace($fi," ",$posicaoIntInicial,$posicaoIntFinal-$posicaoIntInicial+1);
		if (count($variaveisInt) >= 1){
			foreach ($variaveisInt as $varInt) {
			    $s ="(int)$".$varInt;	
				$fi = str_replace($varInt,$s,$fi);
				$iInt++;
				$linhaStringvariaveisInt = $linhaStringvariaveisInt.$s."=0;\n ";
			}
			$fi = substr_replace($fi,$linhaStringvariaveisInt,$posicaoIntInicial,0);
		}
	 return $fi;
	}else{return $fi;}
}


function removeVariaveisReal($fil)
{
	//encontrando primeira declaracao de real 

$posicaorealInicial = strpos($fil,"real");
//encontrando o fim da linha 
if ($posicaorealInicial){
		$posicaorealFinal = strpos($fil,";",$posicaorealInicial);
		//pegando as variaveis 
		$variaveisrealS = substr($fil,$posicaorealInicial,$posicaorealFinal-$posicaorealInicial);
		//$variaveisreal = ;
		//declarando as variaveis real 
		$variaveisreal = explode(',',str_replace(array('real ',';',' '),"",$variaveisrealS));
		//limpa a linha variaveis real 
		$ireal=0;
		$linhaStringvariaveisreal = "";
		$fil = substr_replace($fil," ",$posicaorealInicial,$posicaorealFinal-$posicaorealInicial+1);
		if (count($variaveisreal) > 1){
			foreach ($variaveisreal as $varreal) {
			    $s ="(float)$".$varreal;	
				$fil = str_replace($varreal,$s,$fil);
				$ireal++;
				$linhaStringvariaveisreal = $linhaStringvariaveisreal.$s."=0.0;\n ";
			}
			$fil = substr_replace($fil,$linhaStringvariaveisreal,$posicaorealInicial,0);
		}
		return $fil;
	}else { return $fil;}

}
?>