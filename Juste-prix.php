<html>
	<body>
		<form method="post" action="" >
			<p>Devinez la valeur génenerer aléatoirement:</p>
			<input type="text" name="nb" class="ab" id="ab"/>
			
			<input type="submit" value="OK"/>
		</form>
	</body>
</html>
<?php 

$compt=0;
$prix = mt_rand(0, 100);
//$prix=53;
do {
	$recup=$_POST['ab'];

	if($recup<$prix){
		echo "C'est plus";
	}
	if($recup>$prix){
		echo "C'est moins";
	}
	if($recup==$prix){
		echo"Bien joué, Voici votre nombre de tentative".$compt++;
	}

}while ($recup==$prix);

?>



<!--
session_start();
if isset(session){
	
}
$prix=

ifset();

session_start();
if (!isset($_SESSION]['nb'])){
	$_SESSION['nb']=mt_rand(0, 100);
}

>
