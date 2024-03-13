<?php


	/*
  $long = strlen($string);
  $str = '';
  for($x = 0; $x < $long; $x++) {
    $str .= ($x % 2) != 0 ? md5($string[$x]) : $x;
  }
  return md5($str);
  */
	function Encrypt($string){
				  $contra= strToHex($string);
				  $long= strlen($contra);
				  $vector = array('10','10');
				  if($long %2 ==0){
				      // echo $contra;
				  }else{
				      $contra= $contra . '0';
							$long++;
				    //  echo $contra;
				      //guarda en la base cuantos 0 se agregaron
				  }
				  $arreglo = str_split($contra);
					for($i=0; $i<count($arreglo); $i++){
						if($arreglo[$i]=='a'){
							$arreglo[$i]=10;
						}else{
							if($arreglo[$i]=='b'){
								$arreglo[$i]=11;
							}else{
								if($arreglo[$i]=='c'){
									$arreglo[$i]=12;
								}else{
									if($arreglo[$i]=='d'){
										$arreglo[$i]=13;
									}else{
										if($arreglo[$i]=='e'){
											$arreglo[$i]=14;
										}else{
											if($arreglo[$i]=='f'){
												$arreglo[$i]=15;
											}else{
				                 $arreglo[$i] = intval($arreglo[$i]);
											}
										}
									}
								}
							}
						}
						//echo ($arreglo[$i] . ' ');
					}
					//echo( ' <br> ');
					$contador = 0;
					while($contador < ($long/2)){
							  $x= ( $arreglo[(2*$contador)] ^ $vector[0]);
								$y = ( $arreglo[(2*$contador) +1] ^ $vector[1]);
							//	echo('res ' . $x .' ' . $y);
							  $res = ( $y & 12);
							//  echo(' res chido' . $res);
								$res = ( $res ^ $x);
								$w= $res;
						//	  echo(' res chido2 ' . $res);
								$res = ($res | 13);
							//  echo(' res chido3 ' . $res);
							  $res = ( $res ^ $y);
								$z= $res;
							//	echo(' res chido4 ' . $res);
				        $res= 15 - $res;
							//	echo(' res chido5 ' . $res);
							  $res = ($res ^ $w);
							//		echo(' res chido6 ' . $res);
							$vector[0]=$res;
							$vector[1]=$z;
							if($res==10){
								$res='a';
							}else{
								if($res==11){
									$res='b';
								}else{
									if($res==12){
										$res='c';
									}else{
										if($res==13){
											$res='d';
										}else{
											if($res==14){
												$res='e';
											}else{
												if($res==15){
													$res='f';
												}else{
													 $res = intval($res);
												}
											}
										}
									}
								}
							}
							if($z==10){
								$z='a';
							}else{
								if($z==11){
									$z='b';
								}else{
									if($z==12){
										$z='c';
									}else{
										if($z==13){
											$z='d';
										}else{
											if($z==14){
												$z='e';
											}else{
												if($z==15){
													$z='f';
												}else{
													 $z = intval($z);
												}
											}
										}
									}
								}
							}
							$c[$contador]= array($res,$z);
							//	 echo(' FINAL'. $c[$contador][0].$c[$contador][1] . '<br>');
							$contador++;
				  }
				//	echo 'Cifrado';
				 $pass= '';
					for($i=0; $i<count($c); $i++){
						   $pass=( $pass . $c[$i][0] . $c[$i][1]);
					}
		return $pass;
}
function desEncrypt($string){

				$long= strlen($string);
				$vector = array('10','10');
				$arreglo = str_split($string);
				for($i=0; $i<count($arreglo); $i++){
					if($arreglo[$i]=='a'){
						$arreglo[$i]=10;
					}else{
						if($arreglo[$i]=='b'){
							$arreglo[$i]=11;
						}else{
							if($arreglo[$i]=='c'){
								$arreglo[$i]=12;
							}else{
								if($arreglo[$i]=='d'){
									$arreglo[$i]=13;
								}else{
									if($arreglo[$i]=='e'){
										$arreglo[$i]=14;
									}else{
										if($arreglo[$i]=='f'){
											$arreglo[$i]=15;
										}else{
											 $arreglo[$i] = intval($arreglo[$i]);
										}
									}
								}
							}
						}
					}
					//echo ($arreglo[$i] . ' ');
				}
				//echo( ' <br> ');
				$contador = 0;
				while($contador < ($long/2)){;
							$x= ( $arreglo[(2*$contador)]);
							$y = ( $arreglo[(2*$contador) +1]);
						//	echo('res ' . $x .' ' . $y);
							$res= 15 - $y;
						//  echo(' res chido' . $res);
							$res = ( $res ^ $x);
							$w= $res;
					//	  echo(' res chido2 ' . $res);
							$res = ($res | 13);
						//  echo(' res chido3 ' . $res);
							$res = ( $res ^ $y);
							$z= $res;
						//	echo(' res chido4 ' . $res);
							$res= $res & 12;
						//	echo(' res chido5 ' . $res);
							$res = ($res ^ $w);
						//		echo(' res chido6 ' . $res);
						$res = $res ^ $vector[0];
						$z= $z ^ $vector[1];
						$vector[0]= $arreglo[(2*$contador)];
						$vector[1]= $arreglo[(2*$contador)+1];
						if($res==10){
							$res='a';
						}else{
							if($res==11){
								$res='b';
							}else{
								if($res==12){
									$res='c';
								}else{
									if($res==13){
										$res='d';
									}else{
										if($res==14){
											$res='e';
										}else{
											if($res==15){
												$res='f';
											}else{
												 $res = intval($res);
											}
										}
									}
								}
							}
						}
						if($z==10){
							$z='a';
						}else{
							if($z==11){
								$z='b';
							}else{
								if($z==12){
									$z='c';
								}else{
									if($z==13){
										$z='d';
									}else{
										if($z==14){
											$z='e';
										}else{
											if($z==15){
												$z='f';
											}else{
												 $z = intval($z);
											}
										}
									}
								}
							}
						}
						$c[$contador]= array($res,$z);
						//	 echo(' FINAL'. $c[$contador][0].$c[$contador][1] . '<br>');
						$contador++;
				}
			//	echo 'Cifrado';
			 $pass= '';
				for($i=0; $i<count($c); $i++){
						 $pass=( $pass . $c[$i][0] . $c[$i][1]);
				}
	return hexToStr($pass);
}
	function strToHex($string){
	    $hex='';
	    for ($i=0; $i < strlen($string); $i++){
	        $hex .= dechex(ord($string[$i]));
	    }
	    return $hex;
	}


	function hexToStr($hex){
	    $string='';
	    for ($i=0; $i < strlen($hex)-1; $i+=2){
	        $string .= chr(hexdec($hex[$i].$hex[$i+1]));
	    }
	    return $string;
	}
/*
function Ande($a,$b){
     if($a==1 and $b==1){
           return 1;
     }else{
          return 0;
     }
}
function Xore($a,$b){
     if($a==1 || $b==1){
           return 0;
     }else{
          if($a==0 || $b==1){
               return 1;
          }else{
              if($a==1 || $b==0){
                   return 1;
              }else{
                if($a==0 || $b==0){
                    return 0;
                }
              }
          }
     }
}
function Ore($a,$b){
     if($a==1 || $b==1){
           return 1;
     }else{
          return 0;
     }
}
function Neg($a){
     if($a==1){
           return 0;
     }else{
          return 1;
     }
}
*/

?>
