<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
	<body>
		<h1>Liste user :</h1><br/>
		<form method="post" action="" >
			<p>Formulaire :</p>
			Nom:<input type="text" name="nom" />
			Prenom:<input type="text" name="prenom" />
			Numero:<input type="text" name="num" />
			<input type="submit" name="send" value="OK"/>
		</form>
	</body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
header('Location: http://localhost/exophp/users/Liste_user.php');
}
?>
