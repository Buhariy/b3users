<?php 
/*
session_start();
if (!isset($_SESSION['nom'])){
$_SESSION['nom']=$_POST['nom'];}
if (!isset($_SESSION['prenom'])){
$_SESSION['prenom']=$_POST['prenom'];}	
if (!isset($_SESSION['num'])){
$_SESSION['num']=$_POST['num'];}

if(check($_POST)){
$tab[]= $_SESSION['nom'];
$tab[]= $_SESSION['prenom'];
$tab[]= $_SESSION['num'];

echo "<pre>";
print_r($tab);
echo "</pre>";
}*/
?>
<html>
	<body>
		<h1>Liste user :</h1>
		<form method="post" action="" >
			<p>Formulaire :</p>
			Nom:<input type="text" name="nom" />
			Prenom:<input type="text" name="prenom" />
			Numero:<input type="text" name="num" />
			<input type="submit" name="send" value="OK"/>
		</form>
	</body>
</html>


<?php
function connect(){
	try {
		return $link = new PDO('mysql:host=localhost:3307;dbname=user',
		'root', '');
	} catch (PDOException $e) {
		print "Erreur !: " . $e->getMessage() . "<br>";
		die();
	}
}
function check($post){
	if(isset($post['send'])){
		if(!empty($post['nom']) &&!empty($post['prenom'])&&!empty($post['num'])){

		return true;
		}
	}
	return false;
}

if(!empty($_POST['nom'])&& !empty($_POST['prenom'])&& !empty($_POST['num'])){
$link=connect();

$sql = "INSERT INTO `user`(`nom`, `prenom`, `num`) VALUES (:nom,:prenom,:num)";

$stmt = $link->prepare($sql);
$stmt->execute(array(
	"nom" => $_POST['nom'],
	"prenom" => $_POST['prenom'],
	"num" => $_POST['num'],
));
header('Location: http://localhost/exophp/Liste_user.php');
}
?>
UPDATE `user` SET `nom`='maj',`prenom`='maj',`num`='2727' WHERE `nom`='adam';