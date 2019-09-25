<?php
/* REVISION
$fruits =array('peche','kiwi','banane');
foreach($fruits as $fruit){
	if(stristr($fruit,'a')!== false){
		echo $fruit.'</br>';
	}
}
faire un juste prix entre 0 et 100 et affichjer la tentative

*/
function compar($param1,$param2,$param3){
	if($param1 > $param2){
		if($param1 > $param3){
			return $param1;
		}else {
			return $param3;
		}
	}else{
		if($param2 > $param3){
			return $param2;
		}else{
			return $param3;
		}
	}
}
$var = compar(30,45,95);
//echo $var;
?>

<html>
	<body>
		<form action="" method="POST">
		A:<input type="test" name='a'/></br>
		B:<input type="test" name='b'/></br>
		C:<input type="test" name='c'/></br>
		<input type="submit" value="ok" name="envoyer">
		</form>
	</body>
</html>